<?php namespace Recipes\FileStore;

use File;

class SectionFile extends MarkdownFile
{
    protected $my_cats;     // Array of category slugs

    /**
     * Has anything in the recipe changed?
     */
    public function hasChanged(array $data, array $cat_slugs, $outputter)
    {
        $file = $this->filename(false);
        if ($this->id != $data['id'])
        {
            if ($outputter) $outputter->comment("Id in $file changed.");
            return true;
        }
        if ($this->name !== $data['name'])
        {
            if ($outputter) $outputter->comment("Name in $file changed.");
            return true;
        }
        if ($this->description !== $data['description'])
        {
            if ($outputter) $outputter->comment("Description in $file changed.");
            return true;
        }
        if ($this->position != $data['position'])
        {
            if ($outputter) $outputter->comment("Position in $file changed.");
            return true;
        }
        if ($this->arrayCheck($this->my_cats, $cat_slugs))
        {
            if ($outputter) $outputter->comment("A category in $file changed.");
            return true;
        }
        return false;
    }

    /**
     * Check two arrays
     */
    private function arrayCheck($array1, $array2)
    {
        $num_items = count($array1);
        if ($num_items != count($array2)) return true;

        sort($array1);
        sort($array2);

        for ($i = 0; $i < $num_items; $i++)
        {
            $item1 = array_shift($array1);
            $item2 = array_shift($array2);
            if ($item1 != $item2)
            {
                if (strtolower($item1) == strtolower($item2))
                {
                    $msg = "Case mismatch ($item1 != $item2) in '$this->name'";
                    throw new \Exception($msg);
                }
                return true;
            }
        }
        return false;
    }

    /**
     * Read and parse file
     */
    public function parse()
    {
        parent::parse();

        if (is_null($this->name))
        {
            throw $this->exception('No Title in header');
        }
        if (is_null($this->description))
        {
            throw $this->exception('No Description in header');
        }
        if (is_null($this->categories))
        {
            throw $this->exception('No Categories in header');
        }

        // Clean up category slugs
        $array = [];
        foreach (explode(',', $this->categories) as $item)
        {
            $item = trim($item);
            if ($item === '-')
                continue;
            if ($item === '')
            {
                throw $this->exception("Categories has empty item");
            }
            $litem = strtolower($item);
            if (array_key_exists($litem, $array))
            {
                throw $this->exception("Categories '$item' in multiple times");
            }
            $array[$litem] = $item;
        }
        $this->my_cats = array_values($array);
    }

    public function unparse()
    {
        // Update categories
        $array = $this->my_cats;
        natcasesort($array);
        if (count($array) == 0)
            $this->attributes['categories'] = '-';
        else
            $this->attributes['categories'] = join(', ', $array);

        return parent::unparse();
    }

    /**
     * Return categories as array
     */
    public function catsArray()
    {
        return $this->my_cats;
    }

}
