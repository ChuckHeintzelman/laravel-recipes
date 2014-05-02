<?php namespace Recipes;

use Cache;
use Config;

class PageCache
{
    /**
     * Get a page out of the cache
     * @param string $path The path portion of the current url
     * @return null   The page wasn't found in the cache
     * @return string The HTML of the cached page
     */
    public static function get($path)
    {
        $content = Cache::get(pageSlug($path));
        if ($content)
        {
            return static::replaceTag($content, 'cached');
        }
    }

    /**
     * Set a page in the cache
     * @param string $path The path portion of the current url
     * @param string $content The HTML to stick in the cache
     * @return null Already cached, assume PageCache::get() retrieved already
     * @return string The HTML content to return
     */
    public static function set($path, $content)
    {
        $slug = pageSlug($path);
        if ( ! Cache::has($slug))
        {
            Cache::put($slug, $content, Config::get('cache.page-minutes'));
            return static::replaceTag($content, 'uncached');
        }
    }

    /**
     * Replace the <!--CACHETAG--> with the execution time
     */
    protected static function replaceTag($content, $label)
    {
        $secs = microtime(true) - LARAVEL_START;
        $tag = "$label ".number_format($secs * 1000, 2).'ms';
        return str_replace('<!--CACHETAG-->', $tag, $content);
    }
}