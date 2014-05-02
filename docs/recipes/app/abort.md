---
Title:    Throwing HttpExceptions
Topics:   -
Code:     App::abort(), App::missing()
Id:       202
Position: 20
---

{problem}
You want to abort your application.

You want to return a non-200 status code back to the user indicating the request was not successful.
{/problem}

{solution}
Use the `App::abort()` method.

When something's not found use a 404 code.

{php}
App::abort(404);
{/php}

This halts your current processing by throwing a `NotFoundException`, specifically a `Symfony\Component\HttpKernel\Exception\NotFoundHttpException` exception.

You can also provide a message, specifying what wasn't found.

{php}
App::abort(404, 'User not found');
{/php}

For other HTTP Exceptions you'll normally throw a code in the 400 range for client errors and in the 500 range for server errors. See the [List of HTTP Status Codes](http://en.wikipedia.org/wiki/List_of_HTTP_status_codes).

Here's a few examples.

{php}
// Unauthorized
App::abort(401, 'Not authenticated');

// Forbidden
App::abort(403, 'Access denied');

// Internal Server Error
App::abort(500, 'Something bad happened');

// Not implemented
App::abort(501, 'Feature not implemented');
{/php}

For non-404 errors you can also specify additional headers the response should return.

{php}
App::abort(401, 'Not authenticated', ['WWW-Authenticate' => 'Basic']);
{/php}

Non-404 status codes will throw a `HttpException`. Specifically, a `Symfony\Component\HttpKernel\Exception\HttpException`.
{/solution}

{discussion}
Your application can trap these exceptions.

See [[Registering a 404 Error Handler]].
{/discussion}
