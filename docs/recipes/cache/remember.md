---
Title:    Retrieving an Item from the Cache or Storing a Default
Topics:   cache
Code:     Cache::put(), Cache::remember()
Id:       268
Position: 17
---

{problem}
You want to retrieve an item from the cache.

But, if it doesn't exist you want to store the value in the cache.
{/problem}

{solution}
Use the `Cache::remember()` value.

{php}
$value = Cache::remember($key, $minutes, function()
{
    // fetch value from db or some other logic
    return $value;
});
{/php}

If the item exists in the cache, it's returned immediately. But if it doesn't exist then the function is executed and the return value of the function is cached the specified minutes. In the later case this value is also returned.
{/solution}

{discussion}
The `Cache::remember()` method is a nice all-in-one shortcut.

It implements a workflow similar to the one described in the discussion of [[Storing an Item in the Cache]]. The function won't be executed unless the value isn't yet in the cache.
{/discussion}
