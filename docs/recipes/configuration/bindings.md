---
Title:    Where to Keep Your Application Bindings
Topics:   configuration, IoC container
Code:     -
Id:       51
Position: 11
---

{problem}
You want to keep your application bindings in a convenient place.

You're binding multiple things to the IoC container and aren't sure the best place to consolidate all these bindings.
{/problem}

{solution}
Create a helper style file.

Follow the same instructions as [[Creating a Helpers File]] and create a `app/bindings.php` file.

The contents could be something like.

{php}
<?php
// Interface bindings
App::bind('FooInterface', 'FooClass');
App::bind('BarInterface', 'BarClass');

// A closure
App::bind('FooBar', function()
{
	return new MyApp\Junk\SimpleFooBar();
});

// Singletons
App::singleton('MedicalDictionary', function()
{
	return new Dictionary('english-medical-terms');
});
?>
{/php}
{/solution}

{discussion}
Don't forget service providers.

Service providers are the most common place to bind elements to the IoC container. This makes sense, especially for package development.

{tip}
If you're creating an `app/bindings.php` helper file, it's a good idea to comment within the file all of your service provider bindings. Then you still have one place to check for all the bindings.
{/tip}

{warn}
Remember helper files are not loaded until the application is booted. See [[Understanding the Request Lifecycle]]. If you have bindings which are required by your own service providers, then you must create a service provider to bind the elements you'll need.
{/warn}
{/discussion}
