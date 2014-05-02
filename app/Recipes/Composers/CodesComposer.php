<?php namespace Recipes\Composers;

use Code;
use DB;
use Recipe;

class CodesComposer
{

    public function compose($view)
    {
        $recipes = Recipe::lists('title', 'id');
        $codes = Code::orderBy('name')->lists('name', 'id');
        foreach ($codes as $id => $name)
        {
            $codes[$id] = ['name' => $name, 'recipes' => []];
        }
        foreach (DB::table('code_recipe')->get() as $row)
        {
            $codes[$row->code_id]['recipes'][] = $row->recipe_id;
        }

        // Sort the entries
        foreach ($codes as $id => $info)
        {
            $sort = [];
            foreach ($codes[$id]['recipes'] as $recipe_id)
            {
                $sort[$recipe_id] = $recipes[$recipe_id];
            }
            natcasesort($sort);
            $codes[$id]['recipes'] = array_keys($sort);
        }

        // Split into three columns
        $columns = index3way($codes, 'recipes');

        $view->with('recipes', $recipes);
        $view->with('columns', $columns);
    }
}