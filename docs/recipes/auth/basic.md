---
Title:    Attempting to Authenticate Using Basic Auth
Topics:   -
Code:     Auth::basic()
Id:       217
Position: 22
---

{problem}
You want to authenticate the user using HTTP basic authentication.
{/problem}

{solution}
Use the `Auth::basic()` method.

You can use it without any arguments and it will try matching the HTTP auth user to the email.

{php}
$result = Auth::basic();
if ($result)
{
    throw new Exception('invalid credentials');
}
{/php}

If the _user_ field is something other than `'email'` you can specify it with the first argument.

{php}
$result = Auth::basic('username');
if ($result)
{
    throw new Exception('invalid credentials');
}
{/php}

You can even pass the actual request you want to use. Normally, it uses the current request.

{php}
$result = Auth::basic('email', $request);
{/php}

Regardless of the method you use, the method returns a Response which you can pass back to the user for a _401 Invalid Credentials_ error.
{/solution}

{discussion}
The validation will fire an `auth.attempt` event with the credentials.

If the authentication is successful then a `auth.login` event will fire.

The `Auth::basic()` method is used by the default `auth.basic` filter Laravel provides.
{/discussion}
