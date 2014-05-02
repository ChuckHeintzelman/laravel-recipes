---
Title:    Registering a Shutdown Callback
Topics:   callbacks
Code:     App::shutdown()
Id:       55
Position: 8
---

{problem}
You want to execute code just before your application finishes.
{/problem}

{solution}
Register a Shutdown callback.

{php}
App::shutdown(function()
{
    // gets called right before app quits.
});
{/php}
{/solution}

{discussion}
Shutdown callbacks occur after the response has been sent to the user.

They occur during the shutdown process, right before the application exits. Typically they're used to close open services or do logging.
{/discussion}
