<?php namespace Recipes\Controllers;

use App;
use DB;
use PageCache;
use Recipe;
use Recipes\Presenters\RecipePresenter;
use Topic;
use View;
use Str;
use Redirect;

/**
 * PageController is a skinny controller that simply returns the appropriate
 * view. If data is attached to the view, it is usually handled by the
 * appropriate view composer.
 */
class PageController extends \Controller
{
    public function home()
    {
        return View::make('home');
    }
    public function contents()
    {
        return View::make('contents');
    }
    public function faq()
    {
        return View::make('faq');
    }
    public function topics()
    {
        return View::make('topics');
    }
    public function codes()
    {
        return View::make('codes');
    }
    public function category($category)
    {
        $recipes = $category->recipes->sort(function($a, $b)
        {
            return $a->position - $b->position;
        });
        return View::make('category', compact('category', 'recipes'));
    }
    public function topic($topic)
    {
        $recipes = $topic->recipes->sort(function($a, $b)
        {
            return strcasecmp($a->title, $b->title);
        });
        return View::make('topic', compact('topic', 'recipes'));
    }
    public function code($code)
    {
        $recipes = $code->recipes->sort(function($a, $b)
        {
            return strcasecmp($a->title, $b->title);
        });
        return View::make('code', compact('code', 'recipes'));
    }

    /**
     * When displaying a recipe, we manually do the cache processing.
     */
    public function recipe($id, $slug = '')
    {
        // Increment view after response
        App::after(function() use($id)
        {
            DB::table('recipes')->whereId($id)->increment('views');
        });

        $recipe = Recipe::findOrFail($id);

        $slugTitle = Str::slug($recipe->title);

        // Enforce title slugs
        if ($slug != $slugTitle)
        {
            return Redirect::to('recipes/'.$id.'/'.$slugTitle, 301);
        }

        // Return if cached
        $path = 'recipes/'.$id.'/'.$slugTitle;
        if (($content = PageCache::get($path)) !== null)
        {
            return $content;
        }

        $category = $recipe->category;
        $recipe_id = $recipe->id;
        $recipe_title = json_encode('Laravel Recipes - '.$recipe->title);
        $recipe = new RecipePresenter($recipe);
        $view = View::make('recipe', compact('recipe', 'recipe_id', 'recipe_title', 'category'));

        if (($content = PageCache::set($path, $view->render())))
        {
            return $content;
        }

        return $view;
    }
}
