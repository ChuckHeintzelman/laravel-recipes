---
Title:    Performing a Stateless HTTP Basic Login
Topics:   -
Code:     Auth::basic(), Auth::onceBasic()
Id:       218
Position: 23
---

{problem}
You want to authenticate the user using HTTP basic authentication.

But you don't want cookies or the session to be used.
{/problem}

{solution}
Use the `Auth::onceBasic()` method.

This operates just like `Auth::basic()` but instead of _"logging in"_ the user is available for the current request only.

You can use it without any arguments and it will try matching the HTTP auth user to the email.

{php}
$result = Auth::onceBasic();
if ($result)
{
    throw new Exception('invalid credentials');
}
{/php}

If the _user_ field is something other than `'email'` you can specify it with the first argument.

{php}
$result = Auth::onceBasic('username');
if ($result)
{
    throw new Exception('invalid credentials');
}
{/php}

You can even pass the actual request you want to use. Normally, it uses the current request.

{php}
$result = Auth::onceBasic('email', $request);
{/php}

Regardless of the method you use, the method returns a Response which you can pass back to the user for a _401 Invalid Credentials_ error.
{/solution}

{discussion}
This is ideal to set up a filter for API authentication.

Here's a sample `auth.api` filter.

{php}
Route::filter('auth.api', function()
{
  return Auth::onceBasic();
});
{/php}

By adding this filter to REST API routes, the request will return immediately with a _401 Invalid Credentials_ error when not authenticated, but will not store authentication details in a cookie or the session.
{/discussion}
