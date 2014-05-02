---
Title:    Setting the Event Dispatcher for Authentication
Topics:   -
Code:     Auth::setDispatcher()
Id:       232
Position: 37
---

{problem}
You want to use a different event dispatcher for authentication.
{/problem}

{solution}
Use the `Auth::setDispatcher()` method.

{php}
Auth::setDispatcher($events);
{/php}

The dispatcher must be derived from `Illuminate\Events\Dispatcher`.
{/solution}

{discussion}
This is an advanced topic.

Most of the time the standard event dispatcher created by Laravel works just fine. The dispatcher the `Auth` facade uses is the same one the `Event` facade uses.

But, if you need to use a dispatcher this method is available. Make sure you call this method before the authentication routines are accessed. Either a service provider or in `app/start/global.php` is a good location.
{/discussion}
