---
Title:    Setting up the XCache Cache Driver
Topics:   cache, configuration, XCache
Code:     -
Id:       100
Position: 8
---

{problem}
You want to speed up Laravel's cache.

You know by default Laravel uses the file cache driver. You want to use a speedier cache.
{/problem}

{solution}
Use the XCache cache driver.

Edit `app/config/cache.php` and change the driver to `'xcache'`.

{php}
    'driver' => 'xcache',
{/php}
{/solution}

{discussion}
To use the cache driver make sure XCache is installed and set up first. See the [[Installing XCache]] recipe for details.

{warn}
You must change the `xcache.var_size` setting as described in the [[Installing XCache]] recipe for XCache to work with Laravel.
{/warn}
{/discussion}
