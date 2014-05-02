---
Title:    Storing an Item in the Cache Forever
Topics:   cache
Code:     Cache::flush(), Cache::forever()
Id:       269
Position: 18
---

{problem}
You want to store an item in the cache indefintely.
{/problem}

{solution}
Use the `Cache::forever()` method.

This will permanently store the item.

{php}
Cache::forever($key, $value);
{/php}
{/solution}

{discussion}
Clearing the cache will remove permanent items.

If you issue `artisan cache:clear` or call `Cache::flush()` then all items, including those stored with `Cache::forever()` will be removed.
{/discussion}
