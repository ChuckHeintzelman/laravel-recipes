---
Title:    Determining if an Item Exists in the Cache
Topics:   cache
Code:     Config::has()
Id:       102
Position: 10
---

{problem}
You want to see if a cached value exists.
{/problem}

{solution}
Use `Cache::has()`

{php}
if (Cache::has('mykey'))
{
    echo "Yea! 'mykey' is cached!";
}
{/php}
{/solution}

{discussion}
Doesn't work with null items.

If you cache a null value, the `Cache::has()` method returns false.

{php}
Cache::put('test-null', null, 10);
if ( ! Cache::has('test-null'))
{
    echo "This line will always be output.";
}
{/php}
{/discussion}
