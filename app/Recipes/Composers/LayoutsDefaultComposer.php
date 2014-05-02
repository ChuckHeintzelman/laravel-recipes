<?php namespace Recipes\Composers;

use Category;
use DB;
use Recipe;

class LayoutsDefaultComposer
{
    public function compose($view)
    {
        $counts = Recipe::select(DB::raw('count(*) as num_recipes, category_id'))
            ->groupBy('category_id')
            ->lists('num_recipes', 'category_id');
        $rows = Category::select(['id', 'name', 'slug'])
            ->orderBy('name')
            ->get();
        $categories = [];
        foreach ($rows as $row)
        {
            $categories[$row->id] = [
                'name'        => $row->name,
                'slug'        => $row->slug,
                'num_recipes' => $counts[$row->id],
            ];
        }

        $view->with(compact('categories'));
    }
}