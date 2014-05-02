<?php namespace Recipes\FileStore;

use Config;
use File;

class Repository
{

    /**
     * Load all the categories from the file system
     * @param bool $parse Should file also be parsed?
     */
    public function loadCategories($parse = false)
    {
        $path = Config::get('app.recipe_path').'/recipes/*/00-about.md';
        $files = File::glob($path);
        $categories = array();
        foreach ($files as $file)
        {
            $category = new CategoryFile($file);
            if ($parse)
            {
                $category->parse();
            }
            $categories[] = $category;
        }
        return $categories;
    }

    /**
     * Load all the sections from the file system
     */
    public function loadSections()
    {
        $path = Config::get('app.recipe_path').'/sections/*.md';
        $files = File::glob($path);
        $sections = array();
        foreach ($files as $file)
        {
            $section = new SectionFile($file);
            $section->parse();
            $sections[] = $section;
        }
        //usort($sections, 'Repository::sectionCompare');
        return $sections;
    }

}