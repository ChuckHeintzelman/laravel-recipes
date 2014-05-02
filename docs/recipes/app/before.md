---
Title:    Registering a Before Application Filter
Topics:   filters
Code:     App::before()
Id:       53
Position: 6
---

{problem}
You want to do work immediately before every request in your application.
{/problem}

{solution}
Register a "before" application filter.

{php}
App::before(function($request)
{
    if ($request->ajax())
    {
        // Returning a value will short-circut the life cycle and
        // keep any requests from being processed further
        return Response::json(['error' => 'AJAX not allowed']);
    }
    // No return value allows processing to continue as normal
});
{/php}
{/solution}

{discussion}
You can movidy the request in application before filters.

The `$request` object is an `Illuminate\Http\Request`.

A common place to put "before" application filters is in the `app/filters.php` file.

Be sure to understand exactly when application before filters are called. See the **Calls app before filters** in the Running Steps section of [[Understanding the Request Lifecycle]] for details.
{/discussion}
