---
Title:    Registering a "Last Chance" Error Handler
Topics:   -
Code:     App::error(), App::pushError()
Id:       205
Position: 23
---

{problem}
You want to handle errors _ONLY_ if nothing else handles them.
{/problem}

{solution}
Use the `App::pushError()` method.

This will add your handler to the bottom of the stack instead of the top of the stack.

{php}
App::pushError(function($exception)
{
    die('ERROR: '.$exception->getMessage());
});
{/php}
{/solution}

{discussion}
This is exactly like `App::error()`.

Except the handler is placed on the bottom of the stack instead of the top. See [[Registering an Error Handler]].
{/discussion}
