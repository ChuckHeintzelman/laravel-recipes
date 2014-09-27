<?php

Route::model('category', 'Recipes\Category');
Route::model('topic', 'Recipes\Topic');
Route::model('code', 'Recipes\Code');

// Cachable pages
Route::group(['before' => 'cache_get', 'after' => 'cache_set'], function()
{
    Route::get('/', 'PageController@home');
    Route::get('contents', 'PageController@contents');
    Route::get('faq', 'PageController@faq');
    Route::get('topics', 'PageController@topics');
    Route::get('codes', 'PageController@codes');
    Route::get('categories/{category}', 'PageController@category');
    Route::get('topics/{topic}', 'PageController@topic');
    Route::get('codes/{code}', 'PageController@code');
});

// Recipe pages are cachable, but the controller method handles it
Route::get('recipes/{recipe}/{slug?}', 'PageController@recipe');

// Search function isn't cachable
Route::get('search', [
    'as' => 'search',
    'uses' => 'Recipes\Controllers\SearchController@go',
]);
Route::get('search/terms', [
    'as' => 'search.terms',
    'uses' => 'Recipes\Controllers\SearchController@terms',
]);
