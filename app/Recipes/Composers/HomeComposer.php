<?php namespace Recipes\Composers;

use Category;
use DB;
use Recipe;

/**
 * Supplies the view's data for the home page
 */
class HomeComposer
{
    const NUM_LATEST = 3;

    /**
     * Add variables needed to the 'home' view
     */
    public function compose($view)
    {
        $view->with('num_recipes', Recipe::count());
        $view->with('popular', $this->buildPopular());
        $view->with('latest_recipes', $this->buildLatestRecipes());
        $view->with('popular_recipes', $this->buildPopularRecipes());
    }

    /**
     * Build the popular array
     */
    protected function buildPopular()
    {
        // Pull the top 4 most popular categories
        $category_counts = Recipe::groupBy('category_id')
            ->select('category_id')
            ->addSelect(DB::raw('COUNT(*) AS n'))
            ->addSelect(DB::raw('SUM(views) AS v'))
            ->addSelect(DB::raw('SUM(views) / COUNT(*) AS avg'))
            ->having('n', '>=', 3)
            ->orderBy('avg', 'desc')
            ->take(4)
            ->get()
            ->lists('n', 'category_id');

        // And get the category data we'll need
        $rows = Category::select('id', 'slug', 'name')
            ->whereIn('id', array_keys($category_counts))
            ->get()
            ->toArray();
        $categories = [];
        foreach ($rows as $row)
        {
            $row['n'] = $category_counts[$row['id']];
            $categories[$row['id']] = $row;
        }

        // Now build the $popular[] array, there will be 4 elements, each an
        // array of rows. The first row of each group is category info
        // (n, slug, name), the following 3 rows in each group is the recipe
        // info (id, title)
        $popular = [];
        foreach ($categories as $id => $category)
        {
            $build = [[$category['n'], $category['slug'], $category['name']]];
            $recipes = Recipe::whereCategoryId($id)
                ->orderBy('views', 'desc')->take(3)->lists('title', 'id');
            foreach ($recipes as $recipe_id => $title)
            {
                $build[] = [$recipe_id, $title];
            }
            $popular[] = $build;
        }
        return $popular;
    }

    /**
     * Build the list of latest recipes
     */
    protected function buildLatestRecipes()
    {
        $fields = ['recipes.id', 'title', 'category_id',
            'categories.name as category_name', 'recipes.created_at'];
        return Recipe::select($fields)
            ->join('categories', 'recipes.category_id', '=', 'categories.id')
            ->latest('created_at')
            ->take(static::NUM_LATEST)
            ->get();
    }

    /**
     * Build the list of the popular recipes
     */
    protected function buildPopularRecipes()
    {
        $fields = ['recipes.id', 'title', 'category_id',
            'categories.name as category_name', 'views'];
        return Recipe::select($fields)
            ->join('categories', 'recipes.category_id', '=', 'categories.id')
            ->orderBy('views', 'desc')
            ->take(static::NUM_LATEST)
            ->get();
    }

}