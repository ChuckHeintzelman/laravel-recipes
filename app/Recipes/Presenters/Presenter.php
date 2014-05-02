<?php namespace Recipes\Presenters;

class Presenter
{
    protected $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function __get($name)
    {
        if (method_exists($this, $name))
        {
            return $this->{$name}();
        }
        if (method_exists($this->resource, $name))
        {
            return $this->resource->{$name}();
        }
        return $this->resource->{$name};
    }
}