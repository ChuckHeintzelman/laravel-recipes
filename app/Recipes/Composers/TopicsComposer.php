<?php namespace Recipes\Composers;

use DB;
use Recipe;
use Topic;

class TopicsComposer
{

    public function compose($view)
    {
        $recipes = Recipe::lists('title', 'id');
        $topics = Topic::orderBy('name')->lists('name', 'id');
        foreach ($topics as $id => $name)
        {
            $topics[$id] = ['name' => $name, 'recipes' => []];
        }
        foreach (DB::table('recipe_topic')->get() as $row)
        {
            $topics[$row->topic_id]['recipes'][] = $row->recipe_id;
        }

        // Sort the entries
        foreach ($topics as $id => $info)
        {
            $sort = [];
            foreach ($topics[$id]['recipes'] as $recipe_id)
            {
                $sort[$recipe_id] = $recipes[$recipe_id];
            }
            natcasesort($sort);
            $topics[$id]['recipes'] = array_keys($sort);
        }

        // Split into three columns
        $columns = index3way($topics, 'recipes');

        $view->with('recipes', $recipes);
        $view->with('columns', $columns);
    }
}