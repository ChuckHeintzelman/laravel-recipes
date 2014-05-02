<?php namespace Recipes;

class Category extends \Eloquent
{
    public function section()
    {
        return $this->belongsTo('Section');
    }

    public function recipes()
    {
        return $this->hasMany('Recipe');
    }

    /**
     * Synchronize all section ids by the slugs
     */
    public static function syncSections($section_id, array $slugs)
    {
        $ids_to_add = static::whereIn('slug', $slugs)
            ->where('section_id', '<>', $section_id)
            ->lists('id');
        $ids_to_del = static::whereNotIn('slug', $slugs)
            ->where('section_id', '=', $section_id)
            ->lists('id');
        if (count($ids_to_add))
        {
            static::whereIn('id', $ids_to_add)
                ->update(['section_id' => $section_id]);
        }
        if (count($ids_to_del))
        {
            static::whereIn('id', $ids_to_del)
                ->update(['section_id' => 0]);
        }
    }
}