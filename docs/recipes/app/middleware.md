---
Title:    Registering HttpKernel Middleware
Topics:   middleware
Code:     App::middleware()
Id:       111
Position: 12
---

{problem}
You want to modify some aspect of the request or response at a low level.

You know you could use before filters or after filters, but the function you want to perform is global across your entire application and it's at a low level.
{/problem}

{solution}
Use the `App::middleware()` method.

First you must register your middleware. We'll call the class `MyApp\Middleware` in this example.

{php}
App::middleware('MyApp\Middleware');
{/php}

Then you must have the class `MyApp\Middleware` in your application to handle things.

If your class takes additional construction arguments, you can specify those arguments when you register the middleware.

{php}
// 1 arg
App::middleware('MyApp\Middleware', array($arg1));

// 2+ args
App::middleware('MyApp\Middleware', array($arg1, $arg2));
{/php}
{/solution}

{discussion}
It's important to know where the middleware processing occurs. See [[Understanding the Request Lifecycle]].

Here are some other recipes for middleware:

* [[Understanding What Middleware Is]]
* [[Creating a Simple Middleware Class]]
{/discussion}
