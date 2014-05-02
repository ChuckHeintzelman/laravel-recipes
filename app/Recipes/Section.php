<?php namespace Recipes;

class Section extends \Eloquent
{
    public function categories()
    {
        return $this->hasMany('Category');
    }
}