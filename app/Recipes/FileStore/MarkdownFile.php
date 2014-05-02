<?php namespace Recipes\FileStore;

use File;

class MarkdownFile
{
    protected $filename;        // Full pathname to file
    protected $dir_above;       // directory name above file
    protected $basename;        // file.md
    protected $attributes;      // attributes from header
    protected $markdown;        // markdown text (file header)
    protected $is_parsed;

    /**
     * Constructor
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
        $dirs = explode('/', $filename);
        $this->basename = array_pop($dirs);
        $this->dir_above = array_pop($dirs);
        $this->attributes = [];
        $this->markdown = null;
        $this->repository = null;
    }

    /**
     * Read and parse file
     */
    public function parse()
    {
        if ( ! File::exists($this->filename))
        {
            throw new \RuntimeException("File not found [$this->filename]");
        }
        if ($this->is_parsed)
        {
            throw $this->exception('Already parsed');

        }
        $content = File::get($this->filename);
        $content = str_replace(["\r", "\r\n"], "\n", $content);
        if (starts_with($content, "---\n"))
        {
            $content = $this->parseHeader($content);
        }
        $this->markdown = $content;
        $this->is_parsed = true;
    }

    /**
     * Parse header section from file
     */
    protected function parseHeader($content)
    {
        // Pull out any header lines
        $lines = explode("\n", $content);
        $num_lines = count($lines);
        $lines[0] = '';
        $to_parse = [];
        for ($i = 1; $i < $num_lines; $i++)
        {
            $line = $lines[$i];
            if ($line === '---')
            {
                $lines[$i] = '';
                break;
            }
            if (strpos($line, "\t") !== false)
            {
                throw $this->exception('File cannot contain tabs');
            }
            $to_parse[] = $line;
            $lines[$i] = '';
        }
        $content = join("\n", $lines);

        // Parse the header
        $token = null;
        foreach ($to_parse as $line)
        {
            $line = rtrim($line);
            if (empty($line))
            {
                continue;
            }
            $first_space = (strpos($line, ' ') === false) ? 255 : strpos($line, ' ');
            $first_colon = strpos($line, ':') ? : 0;
            if ($first_colon !== false && $first_colon < $first_space)
            {
                $token = strtolower(substr($line, 0, $first_colon));
                $this->attributes[$token] = trim(substr($line, $first_colon + 1));
            }
            else if (is_null($token))
            {
                throw $this->exception('Bad header');
            }
            else
            {
                $this->attributes[$token] .= ' ' . trim($line);
            }
        }

        return $content;
    }

    /**
     * Return a new Exception to throw
     */
    protected function exception($msg)
    {
        $msg .= ' [' . $this->filename(false) . ']';
        return new \RuntimeException($msg);
    }

    /**
     * Return the filename
     * @param bool $full TRUE for full, FALSE for just directory above
     */
    public function filename($full = true)
    {
        if ($full)
        {
            return $this->filename;
        }
        return $this->dir_above.'/'.$this->basename;
    }

    public function __get($name)
    {
        if ( ! array_key_exists($name, $this->attributes))
        {
            return null;
        }
        return $this->attributes[$name];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    /**
     * Set the position
     */
    public function setPosition($position)
    {
        $this->attributes['position'] = $position;
    }


    public function unparse()
    {
        $lines = ['---'];
        $maxlen = max(array_map('strlen', array_keys($this->attributes))) + 1;
        foreach ($this->attributes as $key => $value)
        {
            $values = explode("\n", wordwrap($value, 76 - $maxlen));
            for ($i = 0; $i < count($values); $i++)
            {
                if ($i == 0)
                {
                    $line = ucfirst($key) . ':' . str_pad('', $maxlen - strlen($key));
                }
                else
                {
                    $line = str_pad('', $maxlen + 1);
                }
                $lines[] = $line.$values[$i];
            }
        }
        $lines[] = '---';
        return join("\n", $lines)."\n".trim($this->markdown);
    }

    public function writeFile()
    {
        $content = $this->unparse();
        //$backup = $this->filename.'.bak';
        //if (File::exists($backup))
        //{
        //    File::delete($backup);
        //}
        //File::move($this->filename, $backup);
        File::put($this->filename, $content);
    }
}