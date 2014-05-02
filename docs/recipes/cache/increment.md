---
Title:    Incrementing the Value of an Item in the Cache
Topics:   cache
Code:     Config::increment()
Id:       273
Position: 21
---

{problem}
You want to increment a value in the cache.
{/problem}

{solution}
Use `Cache::increment()`

{php}
$value = Cache::increment('key');
{/php}

The first time this is called `$value` will be 1, the next call it will return 2, and so forth.

You can also pass a value to increment.

{php}
$value = Cache::increment('key', 50);
{/php}
{/solution}

{discussion}
Doesn't work with File or Database caches.
{/discussion}
