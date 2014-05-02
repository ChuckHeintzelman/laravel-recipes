---
Title:    Registering a 404 Error Handler
Topics:   -
Code:     App::missing()
Id:       203
Position: 21
---

{problem}
You want to trap any 404 errors you application generates.
{/problem}

{solution}
Use the `App::missing()` method.

You'll place this code somewhere in your startup code. Usually `app/start/global.php`.

{php}
App::missing(function($exception)
{
    return View::make('not-found')->withMessage($exception->getMessage());
});
{/php}
{/solution}

{discussion}
Return a `Response` with your handler to finish the processing.

In other words, if your missing handler returns anything, all further error handlers will be ignored and the response will be returned to the user.

Sometimes, such as error logging, you don't want your handler to return anything. You may want it to do a bit of processing and allow other handlers to continue as normal.
{/discussion}
