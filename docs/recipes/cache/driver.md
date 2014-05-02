---
Title:    Getting a Cache Driver Instance
Topics:   cache
Code:     Cache::driver()
Id:       261
Position: 11
---

{problem}
You want to retrieve an instance of a cache driver.
{/problem}

{solution}
Use the `Cache::driver()` method.

Use the method without any arguments to return the default driver.

{php}
$driver = Cache::driver();
{/php}

If the default driver hasn't been created, it will be created before being returned.

You can also pass the name of the driver you wish to retrieve.

{php}
$driver = Cache::driver('apc');
{/php}

This will return the APC cache driver, creating it if needed.
{/solution}

{discussion}
There are eight built in cache drivers.

They are:

* The APC cache driver
* The array cache driver
* The database cache driver
* The file cache driver
* The Memcached cache driver
* The Redis cache driver
* The WinCache cache driver
* The XCache cache driver

You can also use this method to return a custom driver you've created. See [[Using Your Own Cache Driver]].
{/discussion}
