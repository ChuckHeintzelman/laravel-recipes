---
Title:    Registering a Maintenance Mode Handler
Topics:   -
Code:     App::down(), App::isDownForMaintenance()
Id:       121
Position: 15
---

{problem}
You want code to automatically execute when your application is down.

You know you can use the `App::isDownForMaintenance()` method, but you'd like your application to take appropriate action at the appropriate time when it's in maintenance mode.
{/problem}

{solution}
Register a handler with `App::down()`.

{php}
App::down(function()
{
    return Response::view('maintenance.mode', array(), 503);
});
{/php}

That snippet of code will output the `maintenance.mode` view with a HTTP status code of 503.
{/solution}

{discussion}
The first thing your application does after loading and booting is execute your down handler if needed.

Yo can see where this occurs in [[Understanding the Request Lifecycle]]. Look at the **Running Steps**.

See also [[Checking if the Application is Down for Maintenance]].
{/discussion}
