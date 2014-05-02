<?php namespace Recipes\Commands;

use Category;
use DB;
use Illuminate\Console\Command;
use Recipe;
use Recipes\FileStore\Repository;
use Section;

class RecipeScanCommand extends Command {

    protected $name = 'recipe:scan';
    protected $description = 'Scan recipes for integrity.';
    protected $repository;
    protected $scanNew = 0;
    protected $scanChanged = 0;
    protected $scanUnchanged = 0;

    /**
     * Execute the console command.
     */
    public function fire()
    {
        $verbose = in_array($this->option('verbose'), ['v', 'vv']);
        $this->repository = new Repository;
        $sections = $this->repository->loadSections();
        $this->scanSections($sections, $verbose);

        $categories = $this->repository->loadCategories(true);
        $this->scanCategories($categories, $verbose);
        $this->info("Scanning recipes ...");
        foreach ($categories as $category)
        {
            $this->scanRecipes($category, $verbose);
        }
        $this->line(sprintf(
            '%d new, %d changed, %d unchanged',
            $this->scanNew,
            $this->scanChanged,
            $this->scanUnchanged
        ));

        $this->checkSections($sections);
    }

    /**
     * Scan and compare database sections to file sections
     */
    protected function scanSections(array $sections, $verbose)
    {
        $this->info('Scanning sections ...');
        $dbrows = [];
        foreach (Section::all() as $row)
        {
            $dbrows[$row->id] = $row->toArray();
        }
        $outputter = ($verbose) ? $this : null;

        $countNew = 0;
        $countChanged = 0;
        $countUnchanged = 0;
        foreach ($sections as $section)
        {
            if (is_null($section->id))
            {
                $countNew++;
                if ($verbose)
                {
                    $this->comment("'$section->name' is a new section");
                }
            }
            else
            {
                $id = $section->id;
                if ( ! array_key_exists($id, $dbrows))
                {
                    $countNew++;
                    //$msg = "Section not in database " . $section->filename(false);
                    //throw new \RuntimeException($msg);
                }
                else
                {
                    $cat_slugs = Category::whereSectionId($id)->lists('slug');
                    if (is_null($cat_slugs)) $cat_slugs = [];
                    if ($section->hasChanged($dbrows[$id], $cat_slugs, $outputter))
                    {
                        $countChanged++;
                    }
                    else
                    {
                        $countUnchanged++;
                    }
                    unset($dbrows[$id]);
                }
            }
        }

        // Any remaining
        if (count($dbrows))
        {
            list($key, $row) = each($dbrows);
            $msg = "Section #$key in db but not in a file";
            throw new \RuntimeException($msg);
        }

        $msg = "$countNew new, $countChanged changed, $countUnchanged unchanged";
        $this->line($msg);
    }

    /**
     * Scan and compare database categories to file categories
     */
    protected function scanCategories(array $categories, $verbose)
    {
        $this->info("Scanning categories ...");
        $dbcats = array();
        foreach (Category::all() as $row)
        {
            $dbcats[$row->slug] = $row->toArray();
        }
        $outputter = ($verbose) ? $this : null;

        $countNew = 0;
        $countChanged = 0;
        $countUnchanged = 0;
        foreach ($categories as $category)
        {
            if (is_null($category->id))
            {
                $countNew++;
                if ($verbose)
                {
                    $this->comment("$category->name is a new category");
                }
            }
            else
            {
                $slug = $category->slug();
                if ( ! array_key_exists($slug, $dbcats))
                {
                    $countNew++;
                    //$msg = "Category not in database " . $category->filename(false);
                    //throw new \RuntimeException($msg);
                }
                else
                {
                    if ($category->hasChanged($dbcats[$slug], $outputter))
                    {
                        $countChanged++;
                    }
                    else
                    {
                        $countUnchanged++;
                    }
                    unset($dbcats[$slug]);
                }
            }
        }

        // Any remaining
        if (count($dbcats))
        {
            list($key, $row) = each($dbcats);
            $msg = "Category #$key in db but not in a file";
            throw new \RuntimeException($msg);
        }

        $msg = "$countNew new, $countChanged changed, $countUnchanged unchanged";
        $this->line($msg);
    }

    /**
     * Scan and compare database recipes to file recipes for a category
     */
    protected function scanRecipes($category, $verbose)
    {
        $outputter = ($verbose) ? $this : null;

        $dbrecipes = [];
        if ($category->id)
        {
            $dbcat = Category::find($category->id);
            if ($dbcat)
            {
                foreach ($dbcat->recipes as $recipe)
                {
                    $row = $recipe->toArray();
                    $row['topics'] = $recipe->topics->lists('name');
                    $row['codes'] = $recipe->codes->lists('name');
                    $dbrecipes[$recipe['id']] = $row;
                }
            }
        }

        foreach ($category->recipes() as $recipe)
        {
            $recipe->parse();
            $this->checkCrossLinks($recipe);
            $this->checkTags($recipe);
            if (is_null($recipe->id))
            {
                $this->scanNew++;
            }
            else
            {
                $id = $recipe->id;
                if ( ! array_key_exists($id, $dbrecipes))
                {
                    $this->scanNew++;
                    //$msg = sprintf(
                    //    "Recipe not in database [%s]",
                    //    $recipe->filename(false)
                    //);
                    //throw new \RuntimeException($msg);
                }
                else
                {
                    if ($recipe->hasChanged($dbrecipes[$id], $category->slug(), $outputter))
                    {
                        $this->scanChanged++;
                    }
                    else
                    {
                        $this->scanUnchanged++;
                    }
                    unset($dbrecipes[$id]);
                }
            }
        }

        // Any remaining
        if (count($dbrecipes))
        {
            list($key, $row) = each($dbrecipes);
            $msg = "Recipe #$key in db but not in a file";
            throw new \RuntimeException($msg);
        }
    }

    /**
     * Make sure any cross links in the recipe exists
     */
    protected function checkCrossLinks($recipe)
    {
        $text = $recipe->problem().$recipe->solution().$recipe->discussion();
        if (preg_match_all('!\[\[(.*)\]\]!', $text, $matches))
        {
            foreach ($matches[1] as $match)
            {
                $id = Recipe::whereTitle($match)->pluck('id');
                if (is_null($id))
                {
                    $this->error("WARNING: Crosslink [[$match]]\nnot found in '$recipe->title'");
                    $this->line('');
                }
            }
        }
    }

    /**
     * Make sure all the open and closing tags match
     */
    protected function checkTags($recipe)
    {
        $text = $recipe->problem().$recipe->solution().$recipe->discussion();
        $tags = ['bash', 'bash-lines', '/bash', 'php', '/php', 'ruby', '/ruby',
            'text', '/text', 'tip', '/tip', 'warn', '/warn', 'html',
            'html-lines', '/html'];
        $counts = [];
        foreach ($tags as $tag)
        {
            $counts[$tag] = substr_count($text, '{'.$tag.'}');
        }
        if ($counts['bash'] + $counts['bash-lines'] != $counts['/bash'])
        {
            $error = "Missing or extra {/bash} tag";
        }
        if ($counts['html'] + $counts['html-lines'] != $counts['/html'])
        {
            $error = "Missing or extra {/html} tag";
        }
        foreach (['php', 'ruby', 'text', 'tip', 'warn'] as $tag)
        {
            if ($counts[$tag] != $counts['/'.$tag])
            {
                $error = "Missing or extra {/$tag} tag";
            }
        }
        if ( ! empty($error))
        {
            $error .= ' in ' . $recipe->filename(false);
            throw new \Exception($error);
        }
    }

    /**
     * Additional section checks
     */
    protected function checkSections(array $sections)
    {
        // Load all the categories in the db by slug
        $cats = Category::lists('name', 'slug');

        // Any categories in any of the sections that don't actually exist?
        foreach ($sections as $section)
        {
            foreach ($section->catsArray() as $slug)
            {
                if (array_key_exists($slug, $cats))
                {
                    unset($cats[$slug]);
                }
                else
                {
                    $msg = sprintf(
                        "Category slug '%s' used by Section %s not in DB",
                        $slug,
                        $section->name
                    );
                    $this->error('WARNING: '.$msg);
                    $this->line('');
                    //throw new \Exception($msg);
                }
            }
        }

        // Anything left over is a category not assigned to section
        foreach ($cats as $slug => $name)
        {
            throw new \Exception("Category '$name' not assigned to a Section");
        }
    }

}
