---
Title:    Getting an Item from the Cache or Storing a Default Forever
Topics:   cache
Code:     Cache::rememberForever(), Cache::sear()
Id:       270
Position: 19
---

{problem}
You want to retrieve an item from the cache.

But, if it doesn't exist you want to store the value in the cache forever.
{/problem}

{solution}
Use the `Cache::rememberForever()` value.

{php}
$value = Cache::rememberForever($key, function()
{
    // fetch value from db or some other logic
    return $value;
});
{/php}

If the item exists in the cache, it's returned immediately. But if it doesn't exist then the function is executed and the return value of the function is cached forever. In the later case this value is also returned.
{/solution}

{discussion}
An alias to `Cache::rememberForever()` is `Cache::sear()`.

This method is similar to the `Cache::remember()` method except you don't specify the `$minutes` because if the value is stored, it's stored permanently.

See the [Retrieving an Item from the Cache or Storing a Default]] recipe.
{/discussion}
