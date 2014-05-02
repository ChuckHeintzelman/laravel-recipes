---
Title:    Decrementing the Value of an Item in the Cache
Topics:   cache
Code:     Config::decrement()
Id:       274
Position: 22
---

{problem}
You want to decrement a value in the cache.
{/problem}

{solution}
Use `Cache::decrement()`

{php}
$value = Cache::decrement('key');
{/php}

If the value of `key` is 10, then the first time this is called `$value` will be 9, the next call it will return 8, and so forth.

You can also pass a value to decrement.

{php}
$value = Cache::decrement('key', 50);
{/php}
{/solution}

{discussion}
Doesn't work with File or Database caches.
{/discussion}
