---
Title:    Manually Logging a User by ID
Topics:   -
Code:     Auth::login(), Auth::loginUsingId()
Id:       222
Position: 27
---

{problem}
You want to manually log a user in from their ID.
{/problem}

{solution}
Use the `Auth::loginUsingId()` method.

{php}
$user = Auth::loginUsingId($user_id);
if ( ! $user)
{
    throw new Exception('Error logging in');
}
{/php}

This will lookup the user from the `$user_id`, log them into the session, and return the user object. If `null` is returned, then you know the `$user_id` was invalid.

If you want the "remember me" cookie to be set, pass `true` as the second argument.

{php}
Auth::loginUsingId($user_id, true);
{/php}
{/solution}

{discussion}
This does basically the same thing as `Auth::login()`.

In fact, after this method looks up the user it calls `Auth::login()`. See [[Manually Logging a User In]] for more details.
{/discussion}
