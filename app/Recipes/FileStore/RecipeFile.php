<?php namespace Recipes\FileStore;

class RecipeFile extends MarkdownFile
{
    protected $my_topics;   // Array of topic strings
    protected $my_code;     // Array of code strings
    protected $problem;     // The problem portion of the markdown
    protected $solution;    // The solution portion of the markdown
    protected $discussion;  // The discussion portion of the markdown

    /**
     * Constructor
     */
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    /**
     * Has anything in the recipe changed?
     */
    public function hasChanged(array $data, $category_slug, $outputter)
    {
        $file = $this->filename(false);
        if ($this->id !== $data['id'])
        {
            if ($outputter) $outputter->comment("Id in $file changed.");
            return true;
        }
        if ($this->slug() != $category_slug)
        {
            if ($outputter) $outputter->comment("$file moved to new Category.");
            return true;
        }
        if ($this->title !== $data['title'])
        {
            if ($outputter) $outputter->comment("Title in $file changed.");
            return true;
        }
        if ($this->problem !== $data['problem'])
        {
            if ($outputter) $outputter->comment("{problem} in $file changed.");
            return true;
        }
        if ($this->solution !== $data['solution'])
        {
            if ($outputter) $outputter->comment("{solution} in $file changed.");
            return true;
        }
        if ($this->discussion !== $data['discussion'])
        {
            if ($outputter) $outputter->comment("{discussion} in $file changed.");
            return true;
        }
        if ($this->position !== $data['position'])
        {
            if ($outputter) $outputter->comment("Position in $file changed.");
            return true;
        }
        if ($this->arrayCheck('topics', $this->my_topics, $data['topics']))
        {
            if ($outputter) $outputter->comment("A topic in $file changed.");
            return true;
        }
        if ($this->arrayCheck('codes', $this->my_code, $data['codes']))
        {
            if ($outputter) $outputter->comment("A code in $file changed.");
            return true;
        }
        return false;
    }

    /**
     * Check two arrays
     */
    private function arrayCheck($area, $array1, $array2)
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
                    $msg = "Case mismatch ($item1 != $item2) in '$this->title'";
                    throw new \Exception($msg);
                }
                return true;
            }
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
     * Return topics as array
     */
    public function topicsArray()
    {
        return $this->my_topics;
    }

    /**
     * Return codes as array
     */
    public function codesArray()
    {
        return $this->my_code;
    }

    /**
     * Read and parse file
     */
    public function parse()
    {
        parent::parse();

        if (is_null($this->title))
        {
            throw $this->exception('No Title in header');
        }
        $this->parseTopicsCode('topics');
        $this->parseTopicsCode('code');
        if (is_null($this->code))
        {
            throw $this->exception('No Code in header');
        }
        $this->parseSnippet('problem');
        $this->parseSnippet('solution');
        $this->parseSnippet('discussion');

        if (trim($this->markdown) !== '')
        {
            throw $this->exception('Extra markdown outside sections');
        }
    }

    public function problem()
    {
        return $this->problem;
    }

    public function solution()
    {
        return $this->solution;
    }

    public function discussion()
    {
        return $this->discussion;
    }

    /**
     * Parse the topics or code section
     */
    protected function parseTopicsCode($type)
    {
        $uctype = ucfirst($type);
        if (is_null($this->{$type}))
        {
            throw $this->exception("No $uctype in header");
        }
        $value = $this->{$type};
        $array = [];
        foreach (explode(',', $value) as $item)
        {
            $item = trim($item);
            if ($item === '-')
                continue;
            if ($item === '')
            {
                throw $this->exception("$uctype has empty item");
            }
            $litem = strtolower($item);
            if (array_key_exists($litem, $array))
            {
                throw $this->exception("$uctype '$item' in multiple times");
            }
            $array[$litem] = $item;
        }
        $field = 'my_'.$type;
        $this->{$field} = array_values($array);
    }

    /**
     * Parse a snippet section out
     */
    protected function parseSnippet($name)
    {
        $lines = explode("\n", $this->markdown);
        $num_lines = count($lines);
        $start_line = false;
        $end_line = false;
        $snippet = array();
        for ($i = 0; $i < $num_lines; $i++)
        {
            $line = $lines[$i];
            if (starts_with($line, '{'.$name.'}'))
            {
                if ($start_line !== false)
                {
                    throw $this->exception("Multiple \{$name\} sections");
                }
                $start_line = $i;
                $lines[$i] = '';
            }
            else if (starts_with($line, '{/'.$name.'}'))
            {
                if ($start_line === false)
                {
                    $msg = sprintf('Found {/%s} before {%s}', $name, $name);
                    throw $this->exception($msg);
                }
                $end_line = $i;
                $lines[$i] = '';
                break;
            }
            else if ($start_line !== false)
            {
                $snippet[] = $line;
                $lines[$i] = '';
            }
        }
        if ($start_line === false)
        {
            throw $this->exception('No {'.$name.'} found');
        }
        if ($end_line === false)
        {
            throw $this->exception('No {/'.$name.'} found');
        }
        $this->{$name} = join("\n", $snippet);
        $this->markdown = join("\n", $lines);
    }

    public function unparse()
    {
        // Update topics and codes
        foreach (['topics', 'code'] as $field)
        {
            $array = $this->{"my_$field"};
            natcasesort($array);
            if (count($array) == 0)
                $this->attributes[$field] = '-';
            else
                $this->attributes[$field] = join(', ', $array);
        }

        $content = parent::unparse();

        foreach (['problem', 'solution', 'discussion'] as $type)
        {
            $content .= "\n{".$type."}\n" . trim($this->{$type});
            $content .= "\n{/".$type."}\n";
        }

        return $content;
    }
}