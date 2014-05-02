<?php namespace Recipes;

class Topic extends \Eloquent
{
    public function recipes()
    {
        return $this->belongsToMany('Recipe');
    }

    /**
     * Given a list of topic names, return the list of topic ids
     */
    public static function idsFromNames(array $names)
    {
        $ids = [];
        foreach ($names as $name)
        {
            $topic = static::whereName($name)->first();
            if ( ! $topic)
            {
                $topic = new Topic;
                $topic->name = $name;
                $topic->save();
            }
            $ids[] = $topic->id;
        }
        return $ids;
    }
}