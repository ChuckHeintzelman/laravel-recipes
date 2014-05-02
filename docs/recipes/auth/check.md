---
Title:    Determining if the Current User is Authenticated
Topics:   authentication
Code:     Auth::check()
Id:       80
Position: 14
---

{problem}
You want to see if a user is logged in.

You know Laravel automatically keeps the authenticated user in the session. You want to check if the current request has a user logged in and authenticated.
{/problem}

{solution}
Use `Auth::check()`.

The `Auth::check()` method returns true or false.

{php}
if (Auth::check())
{
    echo "Yay! You're logged in.";
}
{/php}
{/solution}

{discussion}
Several things happen behind the scenes when you do this.

First Laravel checks if the current session has the id of a user. If so, then an attempt is made to retrieve the user from the database.

If that fails, then Laravel checks for the "remember me" cookie. If that's present then once again an attempt is made to retrieve the user from the database.

Only if a valid user is retrieved from the database is `true` returned.

#### The 'guest' filter uses this method

Laravel provides a default implementation of the **guest** filter in `app/filters.php`.

{php}
Route::filter('guest', function()
{
    if (Auth::check()) return Redirect::to('/');
});
{/php}

This default implementation is used when you want to add a filter to a route that is only accessible by guests (aka users who are not logged in). If a user _is_ logged in then they are redirected to the home page.
{/discussion}
