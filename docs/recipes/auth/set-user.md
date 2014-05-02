---
Title:    Setting the Currently Authenticated User
Topics:   -
Code:     Auth::setUser()
Id:       230
Position: 35
---

{problem}
You want to set the user for the current request.
{/problem}

{solution}
Use the `Auth::setUser()` method.

{php}
$user = User::find($user_id);
Auth::setUser($user);
{/php}
{/solution}

{discussion}
This method does not log the user in.

It simply sets the user for the current request without any sort of authentication.
{/discussion}
