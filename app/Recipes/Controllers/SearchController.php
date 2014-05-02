<?php namespace Recipes\Controllers;

use Code;
use Cache;
use Input;
use Recipe;
use Response;
use Redirect;
use Topic;

class SearchController extends \Controller
{
    /**
     * Redirect to a search page
     */
    public function go()
    {
        $s = Input::get('s');
        $parts = explode(':', $s);
        $type = array_shift($parts);
        $s = trim(join(':', $parts));
        switch ($type)
        {
            case 'Code':
                $code = Code::whereName($s)->first();
                if ($code)
                {
                    return Redirect::to('/codes/'.$code->id);
                }
                break;
            case 'Recipe':
                $recipe = Recipe::whereTitle($s)->first();
                if ($recipe)
                {
                    $url = '/recipes/' . $recipe->id;
                    return Redirect::to($url);
                }
                break;
            case 'Topic':
                $topic = Topic::whereName($s)->first();
                if ($topic)
                {
                    $url = '/topics/'.$topic->id;
                    return Redirect::to($url);
                }
                break;

        }
        return Redirect::back();
    }

    /**
     * Return Search Terms
     */
    public function terms()
    {
        $data = Cache::get('search-terms');
        if ( ! $data)
        {
            $data = $this->buildSearchTerms();
            Cache::put('search-terms', $data, 60);
        }
        return Response::json($data);
    }

    /**
     * Build the search terms
     */
    protected function buildSearchTerms()
    {
        $search_data = [];
        foreach (Code::orderBy('name')->lists('name') as $name)
        {
            $search_data[] = 'Code: '.$name;
        }
        foreach (Recipe::orderBy('title')->lists('title') as $title)
        {
            $search_data[] = 'Recipe: '.$title;
        }
        foreach (Topic::orderBy('name')->lists('name') as $name)
        {
            $search_data[] = 'Topic: '.$name;
        }
        return $search_data;
    }
}
