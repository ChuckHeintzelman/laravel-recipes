---
Title:    Accessing the Current User
Topics:   authentication
Code:     Auth::user()
Id:       82
Position: 16
---

{problem}
You want to access the current user.
{/problem}

{solution}
Use the `Auth::user()` method.

{php}
$user = Auth::user();
if ($user)
{
    echo "Hello $user->name";
}
{/php}
{/solution}

{discussion}
What does `Auth::user()` return?

The method returns one of three values.

`null` is always returned if there is no current user (aka no user logged in).

The other return value is based on your authentication configuration. If your driver is **eloquent** then the object return is the class specified by the the model setting.

See [[Changing Your Authentication Driver]] for information about the driver setting.

See [[Changing Your Authentication Model]] for information about the model setting.

If your authentication driver is **database** then the object returned is a generic user. Specifically it's the `Illuminate\Auth\GenericUser` class.
{/discussion}
