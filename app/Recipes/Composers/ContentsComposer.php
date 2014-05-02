<?php namespace Recipes\Composers;

use Category;
use Recipe;
use Section;

class ContentsComposer
{

    public function compose($view)
    {
        $parts = array();
        $sections = Section::orderBy('position')->get();
        foreach ($sections as $section)
        {
            $row = [
                'name' => $section->name,
                'description' => $section->description,
                'categories' => [],
            ];
            $categories = Category::whereSectionId($section->id)
                ->orderBy('position')
                ->get();
            foreach ($categories as $category)
            {
                $cat = [
                    'name' => $category->name,
                    'description' => $category->description,
                    'recipes' => [],
                ];
                $recipes = Recipe::whereCategoryId($category->id)
                    ->orderBy('position')
                    ->get();
                foreach ($recipes as $recipe)
                {
                    $url = '/recipes/'.$recipe->id;
                    $cat['recipes'][$url] = $recipe->title;
                }
                $row['categories'][] = $cat;
            }
            $parts[] = $row;
        }

        $view->with('parts', $parts);
    }
}