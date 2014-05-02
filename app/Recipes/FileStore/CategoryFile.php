<?php namespace Recipes\FileStore;

use File;

class CategoryFile extends MarkdownFile
{
    protected $recipes;

    /**
     * Constructor
     */
    public function __construct($filename)
    {
        parent::__construct($filename);
        $this->recipes = [];
        $this->recipes_loaded = null;
    }

    /**
     * Has the category file changed from what's in the DB
     */
    public function hasChanged(array $data, $outputter)
    {
        if ($this->id !== $data['id'])
        {
            if ($outputter) $outputter->comment("$this->name category's id changed.");
            return true;
        }
        if ($this->name != $data['name'])
        {
            if ($outputter) $outputter->comment("$this->name category's name changed.");
            return true;
        }
        if ($this->position != $data['position'])
        {
            if ($outputter) $outputter->comment("$this->name category's position changed.");
            return true;
        }
        if ($this->description != $data['description'])
        {
            if ($outputter) $outputter->comment("$this->name category's description changed.");
            return true;
        }
        return false;
    }

    /**
     * Return the slug for the category
     */
    public function slug()
    {
        return $this->dir_above;
    }

    /**
     * Read and parse file
     */
    public function parse()
    {
        parent::parse();
        if (is_null($this->name))
        {
            throw $this->exception('No Name in header');
        }
        if (is_null($this->description))
        {
            throw $this->exception('No Description in header');
        }

        // Load any recipes
        $path = str_replace('00-about', '*', $this->filename);
        $this->recipes = array();
        $files = File::glob($path);
        foreach ($files as $file)
        {
            $name = basename($file);
            if ($name !== '00-about.md')
                $this->recipes[] = new RecipeFile($file);
        }
        if (count($this->recipes) == 0)
        {
            throw $this->exception('No recipes for category');
        }
    }

    public function recipes()
    {
        return $this->recipes;
    }
}