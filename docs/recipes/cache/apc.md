---
Title:    Setting up the APC Cache Driver
Topics:   apc, cache, configuration
Code:     -
Id:       92
Position: 3
---

{problem}
You want to speed up Laravel's cache.

You know by default Laravel uses the file cache driver. You want to use a speedier cache.
{/problem}

{solution}
Use the APC cache driver.

Edit `app/config/cache.php` and change the driver to `'apc'`.

{php}
    'driver' => 'apc',
{/php}

That's it.
{/solution}

{discussion}
Make sure APC is installed first.

See the [[Installing APC]] recipe for details.

You can use the `apc.php` script that comes with APC to monitor your cache. Usually, this file is placed in the `/usr/share/doc/php5-apcu` directory. Copy the file to your public folder, then bring up `http://yourapp/apc.php` to view the cache statistics.
{/discussion}
