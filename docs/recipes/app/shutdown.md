---
Title:    Calling the Registered Shutdown Callbacks
Topics:   callbacks
Code:     App::shutdown()
Id:       56
Position: 9
---

{problem}
You want to call any registered shutdown functions directly.

You're exiting your Laravel application in a non-standard way, and want to call any shutdown callbacks that have been registered with your application.
{/problem}

{solution}
Use `App::shutdown()`

You can call `App::shutdown()` without any arguments to automatically call what's registered.

{php}
// Call registered callbacks
App::shutdown();
{/php}
{/solution}

{discussion}
This is non-standard.

Calling this method directly is not part of the standard request lifecycle.

Also, note that calling `App::shutdown()` does not actually exit your application, it only calls the registered shutdown callbacks.
{/discussion}
