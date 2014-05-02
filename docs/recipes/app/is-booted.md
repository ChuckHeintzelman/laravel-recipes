---
Title:    Checking if the Application is Booted
Topics:   -
Code:     App::isBooted()
Id:       57
Position: 10
---

{problem}
You want to know if your application is booted.
{/problem}

{solution}
Use the `App::isBooted()` method.

{php}
// Usually in a service provider
if (App::isBooted())
{
    // Take action when booted
}
{/php}
{/solution}

{discussion}
Booting occurs at a low level.

Your application is "booted" before the request is even dispatched. It is booted before `app/start/global.php` or `app/routes.php` or `app/filters.php` is loaded. _(These files are loaded within a "booted" callback.)_

Booting the application occurs internally and consists of three steps:

1. Call any registered "booting" callbacks.
2. Flag the application as booted.
3. Call any registered "booted" callbacks.

Therefore, the most likely places you'll use `App::isBooted()` are within any registered "booting" or "booted" callbacks. Or within a service provider.
{/discussion}
