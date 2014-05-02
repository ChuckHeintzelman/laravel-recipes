---
Title:    Manually Logging a User In
Topics:   -
Code:     Auth::attempt(), Auth::login()
Id:       221
Position: 26
---

{problem}
You want to manually log a user in.
{/problem}

{solution}
Use the `Auth::login()` method.

This logs the user into the current session, bypassing any authentication.

{php}
$user = User::find($user_id);
Auth::login($user);
{/php}

You can also specify `true` as the second parameter to set the "remember me" cookie.

{php}
Auth::login($user, true);
{/php}
{/solution}

{discussion}
The `Auth::attempt()` method does this automatically.

In face, if the authentication is successful, `Auth::attempt()` will call `Auth::login()` internally.

But, if you need to bypass authentication altogether, this is a great method to use. It's especially useful when testing: just create a temporary route to log a user in using this method.

This will fire the `auth.login` event.
{/discussion}
