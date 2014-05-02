---
Title:    Understanding the Request Lifecycle
Topics:   -
Code:     -
Id:       52
Position: 4
---

{problem}
Where does your code fit?

You're ready to dig in and start writing Laravel code, but so many things are happening behind the scenes you aren't sure the best place to begin.
{/problem}

{solution}
Understand the Request Lifecycle.

By understanding the Request Lifecycle you'll be able to zero in to exactly where you need to focus for a given task.

![Standard Lifecycle](images/lifecycle.jpg)

The Standard Lifecycle is:

* A HTTP Request is _Routed_ to a _Controller_.
* The _Controller_ performs specific actions and sends data to a _View_.
* The _View_ formats the data appropriately, providing the HTTP Response.

There are many exceptions and variances to the above flow, but this gives you three basic places to start.

1. The Routing, in `app/routes.php`.
2. The Controller, in `app/controllers/` (or if you're using PSR-0, `app/Project/Controllers/`).
3. The View, in `app/views/`.

Some exceptions to the above are:

* Routes that return Views or Responses directly, bypassing Controller usage.
* Filters (in `app/filters.php`) which can occur before or after the route.
* Error and Exception handling.
* Responding to Events.
{/solution}

{discussion}
A deeper understanding of the Request Lifecycle exposes several other places you can write code.

The entire lifecycle of a request can be broken into three parts: Loading, Booting, and Running.

#### The Loading Steps

![Loading Steps](images/bootstrap1.jpg)

There's three main areas where your application can affect the Loading steps in the Request Lifecycle.

##### (1) Workbench

Workbenches allow you to develop and debug packages along side your application. See [[Creating a New Package Workbench]].

##### (2) Environment Detections

Your should modify `bootstrap/start.php` and add your application's environment detections.

See [[Environment Specific Configurations]]
and [[Detecting the Environment with a Closure]].

##### (3) Paths

You can modify `bootstrap/paths.php` to customize your installation. See [[Changing the Storage Path]].

#### The Booting Steps

![Booting Steps](images/bootstrap2.jpg)

There's 10 different areas your application can affect the Booting steps in the Request Lifecycle.

##### (1) Configuration

Your application's configuration affects both the Boot process and Running of Laravel. There's an entire section with Recipes in this book on configuration alone.

##### (2) Service Providers

Any Service Providers you've created or linked into your application are loaded early in the boot process. If your service provider is not deferred, its `register()` method is called at this time. See [[Creating a Simple Service Provider]].

##### (3) Registering the start files

Your three application startup files (#8, #9, and #10 below) are registered to be loaded when the application's "booted" event occurs.

##### (4) Handle middleware going down

Since middleware operates like Russian nested dolls, this is the point where the top middleware handles the request and calls the next level of middleware, which calls the next level, all the way down to the bottom (which is the application itself).

See [[Understanding What Middleware Is]].

##### (5) Booting service providers

Now the `boot()` method on any non-deferred service providers is called.

##### (6) Booting callbacks

Any callbacks registered with the `App::booting()` method are now called. See [[Registering Booting or Booted Callbacks]].

##### (7) Booted callbacks.

Now that the application is "booted", any registered callbacks registered with `App::booted()` are called. This includes the callback to load the three application startup files in step #3 above. See [[Registering Booting or Booted Callbacks]].

##### (8) Your application start script is called.

This is the `app/start/globals.php` file. This file contains initialization you want your application to always perform before any request is processed. Laravel provides sensible defaults for Logging, Exception trapping, and Maintenance mode handling. You can modify this file and put anything you need to always execute in it, but be sure to keep the inclusion of `app/filters.php`.

##### (9) app/start/{environment}.php

If you need initialization code to execute only in certain environments, you can place it in this file. See [[Using Environment Specific Start Files]].

##### (10) app/routes.php

Your application routes. This is one of the most common files you'll edit when setting up the application.

#### The Running Steps

![Running Steps](images/bootstrap3.jpg)

There's ten different areas where your application can affect the Running steps in the Request Lifecycle.

##### (1) Maintenance Mode

If you have a maintence mode listener registered and the application is in maintenance mode, then your listener is executed. See [[Registering a Maintenance Mode Handler]].

##### (2) App "before" filters

If you have any before filters registered with `App::before()`, they are called. See [[Registering Before Filters On a Controller]].

##### (3) Route/Controller "before" filters

If you have any before filters at the route or controller level, they are called.

##### (4) The action

Here's where a controller method or a route callback is called to handle the request.

##### (5) Route/Controller "after" filters

If you have any after filters at the route or controller level, they are called.

##### (6) App "after" filters.

If you have any after filters registered with `App::after()`, they are called. See [[Registering an After Application Filter]].

##### (7) Middleware response handling

This is the point where the middleware stack cascades the Response back up the chain. Any piece of middleware is free to modify the Response before returning it.

##### (8) Middleware shutdown

If you've provided any middleware that implements the `TerminableInterface`, then its `shutdown()` method is called.

##### (9) Finish callbacks

If you have any callbacks registered with `App::finish()`, they are called.

##### (10) Shutdown callbacks

Finally, if you have any callbacks registered with `App::shutdown()`, they are called.
{/discussion}
