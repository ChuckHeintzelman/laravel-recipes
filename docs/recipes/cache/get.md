---
Title:    Retrieving an Item From the Cache
Topics:   cache
Code:     Cache::get()
Id:       265
Position: 14
---

{problem}
You want to retrieve an item from the cache.
{/problem}

{solution}
Use the `Cache::get()` method.

{php}
$value = Cache::get($key);
if ($value === null)
{
    echo "Value wasn't cached.";
}
{/php}

If the value isn't found (or has expired), then `Cache::get()` returns the default, which is a second argument defaulting to `null`.

{php}
$value = Cache::get($key, 'default-value');
echo $value;  // either retrieved value or 'default-value'
{/php}
{/solution}

{discussion}
Use caution when storing `null` values.

Since the default value to `Cache::get()` is `null`, unless you pass a different second argument there's not way to tell if the `null` return represents the cached value or the default.

In other words, the following code is true.

{php}
Cache::put('test1', null, 60);    // store null as test1
Cache::forget('test2');           // delete test2 if it exists

if (Cache::get('test1') == Cache::get('test2'))
{
    echo "This always prints";
}
{/php}
{/discussion}
