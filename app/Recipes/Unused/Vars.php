<?php namespace Recipes\Models;

class Vars extends \Eloquent
{
    protected $primaryKey = 'key';

    /**
     * Store a php value in the vars table
     */
    public static function put($key, $value)
    {
        $encoded = json_encode($value);
        $row = static::find($key);
        if (is_null($row))
        {
            $row = new static;
            $row->key = $key;
            $row->value = $encoded;
        }
        else
        {
            $row->value = $encoded;
        }
        $row->save();
    }

    /**
     * Return a PHP value from the vars table
     */
    public static function get($key, $default = null)
    {
        $row = static::find($key);
        if (is_null($row))
        {
            return $default;
        }
        return json_decode($row->value, true);
    }
}