---
Title:    Determine if the User Was Authenticated Via the Remember Cookie
Topics:   authentication
Code:     Auth::viaRemember()
Id:       83
Position: 17
---

{problem}
You want to know how the user was authenticated.

You know there's only two possibilities. Either they were already logged into the existing session or they were automatically logged in with the "remember me" cookie.
{/problem}

{solution}
Use the `Auth::viaRemember()` method.

{php}
if (Auth::viaRemember())
{
    echo "Aha, you logged in with the remember me cookie.";
}
else
{
    echo "You were already logged in for this request.";
}
{/php}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
