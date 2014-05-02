---
Title:    Logging the User Out of Your Application
Topics:   -
Code:     Auth::logout(), Event::listen(), Log::info()
Id:       224
Position: 29
---

{problem}
You want to log the user out.
{/problem}

{solution}
Use the `Auth::logout()` method.

{php}
Auth::logout();
{/php}

This will clear the user from memory and any session storage of the user will be cleared also.
{/solution}

{discussion}
This files the `auth.logout` event.

You can listen for it. Here's an example that logs when the user logs out.

{php}
Event::listen('auth.logout', function($user)
{
    $message = sprintf('User #%d logged out', $user->id);
    Log::info($message);
});
{/php}
{/discussion}
