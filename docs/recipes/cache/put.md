---
Title:    Storing an Item in the Cache
Topics:   cache
Code:     Cache::get(), Cache::put()
Id:       266
Position: 15
---

{problem}
You want to store a value in the cache.
{/problem}

{solution}
Use the `Cache::put()` method.

{php}
Cache::put($key, $value, $minutes);
{/php}
{/solution}

{discussion}
Cache storage and retrieval usually follows the pattern below.

{php}
// 1. Pull the item from cache
$value = Cache::get($key);

// 2. Check if it was not found
if ($value === null)
{
    // 3. Figure the value manually
    $value = 'just something easy';

    // 4. Store it for a number of minutes
    $minutes = 30;
    Cache::put($key, $value, $minutes);
}
{/php}
{/discussion}
