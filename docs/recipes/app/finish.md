---
Title:    Registering a Finish Callback
Topics:   -
Code:     App::finish()
Id:       200
Position: 18
---

{problem}
You want to have code execute after the request is sent to the user, but before the application terminates.
{/problem}

{solution}
Use the `App::finish()` method to register a finish callback.

{php}
App::finish(function($request, $response)
{
    // Use request and/or response to do logging or some after
    // main processing stuff
});
{/php}

**NOTE:** Although `$request` and `$response` are provided to the callback, modification of either of these will have no affect in the application.
{/solution}

{discussion}
Where do you register the callbacks?

You can put the `App::finish()` call in a service provider or even `app/start/global.php`. Since any callbacks are not called until late in the process the question _"Where to put them?"_ doesn't matter too much.

Look at [[Understanding the Request Lifecycle]]. The second to last step in the section labeled **The Running Steps** shows when this is called.
{/discussion}
