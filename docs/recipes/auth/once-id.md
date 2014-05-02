---
Title:    Logging in a User by ID Without Sessions or Cookies
Topics:   -
Code:     Auth::onceUsingId()
Id:       223
Position: 28
---

{problem}
You want to log a user in by the user id.

But, you want them only available in the current request.
{/problem}

{solution}
Use the `Auth::onceUsingId()` method.

{php}
$success = Auth::onceUsingId($user_id);
if ( ! $success)
{
    throw new Exception('failed!');
}
{/php}
{/solution}

{discussion}
This is similar to `Auth::once()`.

But it doesn't do the authentication. You pass the `$user_id` and if the id is valid, the user is logged in for the current session.

See also [[Logging a User In Without Sessions or Cookies]].
{/discussion}
