---
Title:    Logging a User In Without Sessions or Cookies
Topics:   -
Code:     Auth::once()
Id:       215
Position: 20
---

{problem}
You want to log a user in without using cookies or the session.
{/problem}

{solution}
Use the `Auth::once()` method.

This method takes an array containing the user's credentials.

{php}
$logged_in = Auth::once(['username' => 'test', 'password' => 'test']);
if ( ! $logged_in)
{
    throw new Exception('not logged in');
}
{/php}
{/solution}

{discussion}
The user will remain _"logged in"_ only for the current request.

This is a handy method to use when testing.
{/discussion}
