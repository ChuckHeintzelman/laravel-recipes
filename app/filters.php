<?php

/*
|--------------------------------------------------------------------------
| Cache Before Filter
|--------------------------------------------------------------------------
|
| Checks if the web page is cached, if so returns it.
|
*/
Route::filter('cache_get', function($route, $request)
{
    if (($content = PageCache::get($request->path())) !== null)
    {
        return $content;
    }
});

/*
|--------------------------------------------------------------------------
| Cache After Filter
|--------------------------------------------------------------------------
|
| Saves the response in the cache for next time
|
*/
Route::filter('cache_set', function($route, $request, $response = null)
{
    if ($response instanceof Illuminate\Http\Response)
    {
        if (($content = PageCache::set($request->path(), $response->getContent())))
        {
            $response->setContent($content);
        }
    }
});
