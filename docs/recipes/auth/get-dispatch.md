---
Title:    Getting the Event Dispatcher for Authentication
Topics:   -
Code:     Auth::getDispatcher()
Id:       231
Position: 36
---

{problem}
You want to access the event dispatcher used by authentication.
{/problem}

{solution}
Use the `Auth::getDispatcher()` method.

{php}
$events = Auth::getDispatcher();
{/php}
{/solution}

{discussion}
Usually you can just access the `Event` facade.

By default Laravel uses the same event driver for both the `Event` facade and the `Auth` facade. This means unless your application is explicitly setting the event dispatcher, it's easier to use the `Event` facade.
{/discussion}
