<?php namespace Recipes\Commands;

use Cache;
use Category;
use Code;
use DB;
use Recipe;
use Recipes\FileStore\Repository;
use Section;
use Topic;

class RecipeSyncCommand extends RecipeScanCommand {

    protected $name = 'recipe:sync';
    protected $description = 'Synchronized source recipes with database.';
    protected $syncCount = 0;
    protected $anySynced = false;

    /**
     * Execute the console command.
     */
    public function fire()
    {
        $verbose = in_array($this->option('verbose'), ['v', 'vv']);
        $this->repository = new Repository;
        $sections = $this->repository->loadSections();
        $this->scanSections($sections, $verbose);
        $this->syncSections($sections);

        $categories = $this->repository->loadCategories(true);
        $this->scanCategories($categories, $verbose);
        $this->syncCategories($categories);

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

        $this->info("Syncing recipes ...");
        foreach ($categories as $category)
        {
            $this->syncRecipes($category);
        }
        $this->line($this->syncCount.' synchronized');

        // Clear the cache if needed
        if ($this->anySynced > 0)
        {
            Cache::flush();
        }
    }

    /**
     * Update database sections from file sections
     */
    protected function syncSections(array $sections)
    {
        $this->info("Synchronizing sections ...");
        $dbrows = array();
        foreach (Section::all() as $row)
        {
            $dbrows[$row->id] = $row->toArray();
        }

        $count = 0;
        foreach ($sections as $section)
        {
            $position = $section->position;
            if (is_null($position))
            {
                $position = Section::max('position');
                $position++;
            }

            if (is_null($section->id) || ! array_key_exists($section->id, $dbrows))
            {
                $row = new Section;
                if ( ! is_null($section->id))
                    $row->id = $section->id;
                $row->name = $section->name;
                $row->description = $section->description;
                $row->position = $position;
                $row->save();

                Category::syncSections($row->id, $section->catsArray());

                $section->setId($row->id);
                $section->setPosition($position);
                $section->writeFile();

                $count++;
                $this->anySynced = true;
            }
            else
            {
                $id = $section->id;
                $cat_slugs = Category::whereSectionId($id)->lists('slug');
                if (is_null($cat_slugs)) $cat_slugs = [];
                if ($section->hasChanged($dbrows[$id], $cat_slugs, false))
                {
                    $row = Section::findOrFail($id);
                    $row->name = $section->name;
                    $row->description = $section->description;
                    $row->position = $position;
                    $row->save();

                    Category::syncSections($row->id, $section->catsArray());

                    $section->setPosition($position);
                    $section->writeFile();
                    $count++;
                    $this->anySynced = true;
                }
            }
        }
        $this->line($count.' synchronized');
    }

    /**
     * Update database categories from file categories
     */
    protected function syncCategories(array $categories)
    {
        $this->info("Synchronizing categories ...");
        $dbcats = array();
        foreach (Category::all() as $row)
        {
            $dbcats[$row->id] = $row->toArray();
        }

        $count = 0;
        foreach ($categories as $category)
        {
            $position = $category->position;
            if (is_null($position)) $position = 1;
            if (is_null($category->id) || ! array_key_exists($category->id, $dbcats))
            {
                $dbcat = new Category;
                if ( ! is_null($category->id))
                    $dbcat->id = $category->id;
                $dbcat->slug = $category->slug();
                $dbcat->name = $category->name;
                $dbcat->description = $category->description;
                $dbcat->position = $position;
                $dbcat->save();

                $category->setId($dbcat->id);
                $category->setPosition($position);
                $category->writeFile();

                $count++;
                $this->anySynced = true;
            }
            else
            {
                $id = $category->id;
                if ($category->hasChanged($dbcats[$id], false))
                {
                    $dbcat = Category::findOrFail($id);
                    $dbcat->slug = $category->slug();
                    $dbcat->name = $category->name;
                    $dbcat->description = $category->description;
                    $dbcat->position = $position;
                    $dbcat->save();

                    $count++;
                    $this->anySynced = true;

                    $category->setPosition($position);
                    $category->writeFile();
                }
                unset($dbcats[$id]);
            }
        }

        // Any remaining
        if (count($dbcats))
        {
            list($key, $row) = each($dbcats);
            $msg = "Category #$key in db but not in a file";
            throw new \RuntimeException($msg);
        }

        $this->line($count.' synchronized');
    }

    /**
     * Sync database recipes from file recipes for a category
     */
    protected function syncRecipes($category)
    {
        if ( ! $category->id)
        {
            $msg = "Expecting category to have an id";
            throw new \RuntimeException($msg);
        }

        $dbrecipes = [];
        $dbcat = Category::whereSlug($category->slug())->firstOrFail();
        foreach ($dbcat->recipes as $recipe)
        {
            $row = $recipe->toArray();
            $row['topics'] = $recipe->topics->lists('name');
            $row['codes'] = $recipe->codes->lists('name');
            $dbrecipes[$recipe['id']] = $row;
        }

        foreach ($category->recipes() as $recipe)
        {
            $position = $recipe->position;
            if (is_null($position))
            {
                $position = Recipe::where('category_id', $category->id)
                    ->max('position');
                $position++;
            }
            if (is_null($recipe->id) || ! array_key_exists($recipe->id, $dbrecipes))
            {
                $dbrecipe = new Recipe;
                if ( ! is_null($recipe->id))
                {
                    $dbrecipe->id = $recipe->id;
                    $dbrecipe->clearTouches();
                }
                $dbrecipe->title = $recipe->title;
                $dbrecipe->category_id = $category->id;
                $dbrecipe->problem = $recipe->problem();
                $dbrecipe->solution = $recipe->solution();
                $dbrecipe->discussion = $recipe->discussion();
                $dbrecipe->position = $position;
                $dbrecipe->save();

                $topic_ids = Topic::idsFromNames($recipe->topicsArray());
                $dbrecipe->topics()->sync($topic_ids);

                $code_ids = Code::idsFromNames($recipe->codesArray());
                $dbrecipe->codes()->sync($code_ids);

                $recipe->setId($dbrecipe->id);
                $recipe->setPosition($position);
                $recipe->writeFile();

                $this->syncCount++;
                $this->anySynced = true;
            }
            else
            {
                $id = $recipe->id;
                if ($recipe->hasChanged($dbrecipes[$id], $category->slug(), false))
                {
                    $dbrecipe = Recipe::findOrFail($id);
                    $dbrecipe->title = $recipe->title;
                    $dbrecipe->category_id = $category->id;
                    $dbrecipe->problem = $recipe->problem();
                    $dbrecipe->solution = $recipe->solution();
                    $dbrecipe->discussion = $recipe->discussion();
                    $dbrecipe->position = $position;
                    $dbrecipe->save();

                    $topic_ids = Topic::idsFromNames($recipe->topicsArray());
                    $dbrecipe->topics()->sync($topic_ids);

                    $code_ids = Code::idsFromNames($recipe->codesArray());
                    $dbrecipe->codes()->sync($code_ids);

                    $recipe->setPosition($position);
                    $recipe->writeFile();
                    $this->syncCount++;
                    $this->anySynced = true;
                }
            }
        }

    }


}