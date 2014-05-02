---
Title:    Using Your Own Cache Driver
Topics:   cache
Code:     Cache::extend()
Id:       262
Position: 6
---

{problem}
None of the built-in cache drivers fit your needs.
{/problem}

{solution}
Extend Laravel and create your own cache driver.

#### Step 1 - Implement Illuminate\Cache\StoreInterface

First you must create a class to handle the cache methods. We'll create a dummy cache driver below which will never cache anything.

{php}
<?php namespace MyApp\Extensions;

use Illuminate\Cache\StoreInterface;

class DummyCacheStore implements StoreInterface {

    /**
     * A string that should be prepended to keys.
     *
     * @var string
     */
    protected $prefix;

    /**
     * Create a new Dummy cache store.
     *
     * @param  string  $prefix
     * @return void
     */
    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key)
    {
        return null;    // never retrieve an item
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  int     $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        // do nothing
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     *
     * @throws \LogicException
     */
    public function increment($key, $value = 1)
    {
        throw new \LogicException("Not supported by this driver.");
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     *
     * @throws \LogicException
     */
    public function decrement($key, $value = 1)
    {
        throw new \LogicException("Not supported by this driver.");
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value)
    {
        // do nothing
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return void
     */
    public function forget($key)
    {
        // do nothing
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function flush()
    {
        // do nothing
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }
}
?>
{/php}

#### Step 2 - Extend the Cache component

In a service provider or in `app/start/global.php` add the following line.

{php}
Cache::extend('dummy', function($app)
{
    $store = new MyApp\Extensions\DummyCacheStore;
    return new Illuminate\Cache\Repository($store);
});
{/php}

#### Step 3 - Change the cache driver.

Edit `app/config/cache.php` and change the driver.

{php}
    'driver' => 'dummy',
{/php}
{/solution}

{discussion}
Even though this example does nothing, it provides all needed components.

You can use this class as the skeleton of your own cache driver.
{/discussion}
