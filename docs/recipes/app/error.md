---
Title:    Registering an Error Handler
Topics:   -
Code:     App::error()
Id:       204
Position: 22
---

{problem}
You want to add your own error handler.
{/problem}

{solution}
Register it with the `App::error()` method.

{php}
App::error(function($exception)
{
    die('ERROR: '.$exception->getMessage());
});
{/php}

The code above pushes the error handler to the top of the stack. Meaning it will have the first chance at processing the exception. You'll want to set it up some place early in the request lifecycle (such as `app/start/global.php`).

You can type-hint the exception to only handle a particular type of exception.

{php}
App::error(function(RuntimeException $exception)
{
    return View::make('error', compact('exception'));
});
{/php}
{/solution}

{discussion}
To finish error processing return a value from your handler.

This will return the value as a response to the user. If you don't return a value then the next error handler will be called. Not returning a value is handy for some functions, such as logging.
{/discussion}
