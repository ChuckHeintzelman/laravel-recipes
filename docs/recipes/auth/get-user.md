---
Title:    Getting the Currently Cached Authenticated User
Topics:   -
Code:     Auth::getUser(), Auth::user()
Id:       229
Position: 34
---

{problem}
You want to get the currently cached authenticated user.

But if there is no user cached, you do not want to attempt authentication.
{/problem}

{solution}
Use the `Auth::getUser()` method.

{php}
$user = Auth::getUser();
if ( ! $user)
{
    echo "No user is currently authenticated.";
}
{/php}
{/solution}

{discussion}
The `Auth::getUser()` and `Auth::user()` methods are slightly different.

That `Auth::user()` will attempt to authenticate a user from the session or the "remember me" cookie if there is not a user cached.

`Auth::getUser()` only returns a user if they've already been authenticated successfully.
{/discussion}
