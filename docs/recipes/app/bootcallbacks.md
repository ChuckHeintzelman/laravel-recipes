---
Title:    Registering Booting or Booted Callbacks
Topics:   callbacks
Code:     App::booted(), App::booting()
Id:       103
Position: 11
---

{problem}
You want something to happen during the boot process.

You have a service provider you want to perform a specific task right before or right after the application is booted.
{/problem}

{solution}
Use `App::booting()` or `App::booted()`

{php}
App::booted(function($app)
{
    // Code to execute right before the app is booted.
});
App::booting(function($app)
{
    // Code to execute right after the app is booted.
})
{/php}
{/solution}

{discussion}
Understand where this happens in the request lifecycle.

1. First, all the service providers are booted.
2. Next, any `booting()` callbacks are called.
3. Finally, any `booted()` callbacks are called.

See [[Understanding the Request Lifecycle]].
{/discussion}
