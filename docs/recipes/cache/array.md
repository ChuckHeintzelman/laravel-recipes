---
Title:    Setting up the Array Cache Driver
Topics:   cache, configuration
Code:     -
Id:       97
Position: 6
---

{problem}
You want to disable caching.

You don't want to go through your code and change all the places the cache is used, but you don't want any cached values to be retained between requests.
{/problem}

{solution}
Use the Array cache driver.

Edit `app/config/cache.php` and change the driver to `'array'`.

{php}
    'driver' => 'array',
{/php}
{/solution}

{discussion}
This is what the testing configuration does.

Laravel provides a `app/config/test/cache.php` file which overrides the default cache setting to use the array driver.

The array driver simply stores any cached values in an internal array. The values are not retained between requests.

{warn}
Cached values are available within the same request. If you have a `Cache::put('mykey')` at one place in your code and later, in the same request, have `Cache::get('mykey')` the value will be available.
{/warn}
{/discussion}
