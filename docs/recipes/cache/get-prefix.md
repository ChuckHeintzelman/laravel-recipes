---
Title:    Getting the Cache Prefix Value
Topics:   cache
Code:     Cache::getPrefix(), Config::get()
Id:       264
Position: 13
---

{problem}
You want to see what the cache "prefix" is.

You know the cache prefix is something added to the beginning of every cache key your application uses. You want to check what this value is.
{/problem}

{solution}
Use the `Cache::getPrefix()` method.

{php}
$prefix = Cache::getPrefix();
{/php}

This will be the same as pulling the value directly from configuration.

{php}
$prefix = Config::get('cache.prefix');
{/php}

You can set this value in `app/config/cache.php` with the `'prefix'` key.

{php}
'prefix' => 'my-app',
{/php}
{/solution}

{discussion}
Using the prefix allows sharing caches.

This is especially important with drives such as `Memcached` or `Redis`. You want your cache keys to be unique. Since it's likely other applications could also use these types of caching backends, prefixing your cache keys with an application specific value makes sense.

{warn}
Do not confuse `Cache::getPrefix()` with the cache driver's `getPrefix()` method.
{/warn}

Although, the two methods are named the same, `Cache::getPrefix()` always returns the configuration value. `Cache::driver()->getPrefix()` always returns the value the driver was constructed with.
{/discussion}
