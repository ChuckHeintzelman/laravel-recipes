---
Title:    Creating a Simple Service Provider
Topics:   service providers
Code:     -
Id:       75
Position: 1
---

{problem}
You want to create your own service provider, but don't know where to begin.
{/problem}

{solution}
Create the simplest possible service provider.

Then, add features to it.

First create a file for your service providers. If you're using a PSR-0 structure then you may put it some place like `app/MyApp/Providers`.

{php}
<?php namespace MyApp\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
?>
{/php}

Then add the class to the end of your `providers[]` array in `app/config/app.php`.

{php}
    'providers' => array(
        ...
        'MyApp\Providers\TestServiceProvider',
    ),
{/php}

That's it. A perfectly valid service provider.
{/solution}

{discussion}
This provider doesn't do anything.

Although, the `register()` method will be called by Laravel, nothing occurs. You could always throw an exception or output something to make sure it's loading as expected.

The point is, this is a very basic skeleton for a provider.
{/discussion}
