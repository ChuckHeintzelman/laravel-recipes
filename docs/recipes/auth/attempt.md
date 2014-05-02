---
Title:    Attempting to Authenticate with Credentials
Topics:   -
Code:     Auth::attempt()
Id:       219
Position: 24
---

{problem}
You want to log a user on with code.

Instead of the normal way using filters, you need to validate a user's credentials and optionally log them in.
{/problem}

{solution}
Use the `Auth::attempt()` method.

You must provide the credentials.

{php}
$success = Auth::attempt(['username' => 'me', 'password' => 'pass']);
{/php}

This will attempt to log the user on using `username = 'me' and 'password' == Hash::make('pass')`. If successful, `true` is returned and the user is logged in.

The second argument specifies whether or not to set the "remember me" cookie. The default value of this second argument is `false`.

{php}
$success = Auth::attempt($credentials, true);
{/php}

Now, if `$success` return `true`, the remember me cookie will be set.

If you only want to validate and not log the user in, you can pass a third option. The default for this third option is `true`.

{php}
$success = Auth::attempt($credentials, false, false);
{/php}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
