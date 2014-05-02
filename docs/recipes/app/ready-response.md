---
Title:    Determining if the Application is Ready for Responses
Topics:   -
Code:     App::isBooted(), App::readyForResponses()
Id:       201
Position: 19
---

{problem}
You want to know if your application is ready for responses.
{/problem}

{solution}
Use the `App::readyForResponses()` method.

{php}
// In a service provider
if (App::readyForResponses())
{
    // Take action when booted
}
{/php}
{/solution}

{discussion}
This is an alias to `App::isBooted()`.

See [[Checking if the Application is Booted]].

Since the application is ready for a response as soon as it's booted, and the application isn't booted until all the service providers are loaded, then any normal code in your application (`app/start/global.php`, controllers, routes, views) will always return a `true` result from this method.

The only place that makes sense to call this is in service providers.
{/discussion}
