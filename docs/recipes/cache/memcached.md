---
Title:    Setting up the Memcached Cache Driver
Topics:   cache, configuration, memcached
Code:     -
Id:       94
Position: 4
---

{problem}
You want to speed up Laravel's cache.

You know by default Laravel uses the file cache driver. You want to use a speedier cache.
{/problem}

{solution}
Use the Memcached cache driver.

Edit `app/config/cache.php` and change the driver to `'memcached'`.

{php}
    'driver' => 'memcached',
{/php}

If you have multiple memcached servers, or they're running on something other than the local machine, you'll have to edit the **memcached** section of `app/config/cache.php` also.

{php}
    'memcached' => array(
        array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
    ),
{/php}
{/solution}

{discussion}
Memcached is a free, high-performance, distributed memory object caching system.

To use the cache driver make sure Memcached is installed first. See the [[Installing Memcached]] recipe for details.
{/discussion}
