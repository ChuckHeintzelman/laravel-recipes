---
Title:    Setting up the Redis Cache Driver
Topics:   cache, configuration, redis
Code:     -
Id:       96
Position: 5
---

{problem}
You want to speed up Laravel's cache.

You know by default Laravel uses the file cache driver. You want to use a speedier cache.
{/problem}

{solution}
Use the Redis cache driver.

Edit `app/config/cache.php` and change the driver to `'redis'`.

{php}
    'driver' => 'redis',
{/php}

If you have multiple redis servers, or they're running on something other than the local machine, you'll have to edit the **redis** section of `app/config/database.php` also.

{php}
    'redis' => array(
        'cluster' => false,
        'default' => array(
            'host'     => '127.0.0.1',
            'port'     => 6379,
            'database' => 0,
        ),
    ),
{/php}
{/solution}

{discussion}
Redis is a free, advanced key-value store.

To use the cache driver make sure Redis is installed first. See the [[Installing Redis]] recipe for details.
{/discussion}
