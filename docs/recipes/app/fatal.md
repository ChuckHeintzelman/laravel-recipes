---
Title:    Registering an Error Handler for Fatal Errors
Topics:   -
Code:     App::error(), App::fatal()
Id:       206
Position: 24
---

{problem}
You want to catch and handle fatal errors yourself.
{/problem}

{solution}
Register a handler with `App::fatal()`.

This will intercept `FatalErrorException` errors. The full namespace to this type of error is `Symfony\Component\Debug\Exception\FatalErrorException`.

{php}
App::fatal(function($exception)
{
    die('FATAL ERROR: '.$exception->getMessage());
});
{/php}
{/solution}

{discussion}
Fatal error exception handling is tricky.

When it doesn't work there's usually just a few reasons:

* `php.ini` does not have `display_startup_errors` on
* The error is occurring in part of Laravel's foundation code.
* The error is severe enough that error handling cannot run.

Fatal errors are those defined by PHP to be: `E_ERROR`, `E_CORE_ERROR`, `E_COMPILE_ERROR`,  or `E_PARSE`.

When your application terminates and there was an unhandled exception that caused the termination then Laravel throws a fatal error.
{/discussion}
