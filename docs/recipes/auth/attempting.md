---
Title:    Listening for Authentication Attempts
Topics:   -
Code:     Auth::attempting()
Id:       220
Position: 25
---

{problem}
You want to execute code whenever an authentication attempt is made.
{/problem}

{solution}
Use the `Auth::attempting()` method.

{php}
Auth::attempting(function($credentials, $remember, $login)
{
    // Log the attempt or some other such activity
});
{/php}

Note this fires when the attempt is made, whether or not the attempt would be successful.
{/solution}

{discussion}
Where should the code for listening for authentication attempts go?

If you have a helpers file for event listening, use that (see [[Creating a Helpers File]]).

Otherwise you can put the code in a service provider or `app/start/global.php`.
{/discussion}
