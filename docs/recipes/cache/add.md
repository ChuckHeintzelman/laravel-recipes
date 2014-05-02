---
Title:    Storing an Item in the Cache if it Doesn't Exist
Topics:   cache
Code:     Cache::add()
Id:       267
Position: 16
---

{problem}
You want to store an item in the cache.

But you only want to store it if the item doesn't already exist.
{/problem}

{solution}
Use the `Cache::add()` method.

{php}
$result = Cache::add($key, $value, $minutes);
if ($result)
{
    echo "$key stored for $minutes";
}
else
{
    echo "$key wasn't stored, already in cache";
}
{/php}

If the item was stored, `true` is returned. Otherwise `false` is returned.
{/solution}

{discussion}
A couple of notes about this method.

1. If `false` is returned, you should call `Cache::get()` to retrieve the item.
2. If the key exists in the cache and is `null`, the new value will **always** be stored and `true` returned.
{/discussion}
