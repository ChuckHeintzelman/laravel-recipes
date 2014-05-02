---
Title:    Determining if No User is Logged In
Topics:   authentication
Code:     Auth::guest()
Id:       81
Position: 15
---

{problem}
You want to see if there is not a user logged in.

You know Laravel automatically keeps the authenticated user in the session. You want to check if the current request doesn't have a user logged in.
{/problem}

{solution}
Use `Auth::guest()`.

The `Auth::guest()` method returns true or false.

{php}
if (Auth::guest())
{
    echo "Bummer! You need to log in, dude.";
}
{/php}
{/solution}

{discussion}
`Auth::guest()` complements `Auth::check()`.

It is the exact opposite. In fact, here's how `Auth::guest()` is actually implemented.

{php}
    public function guest()
    {
        return ! $this->check();
    }
{/php}

See [[Determining if the Current User is Authenticated]].

#### The 'auth' filter uses this method

Laravel provides a default implementation of the **auth** filter in `app/filters.php`.

{php}
Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::guest('login');
});
{/php}

This default implementation is used when you want to add a filter to a route that ensures the route is only accessed by logged in users. Since `Auth::guest()` returns `true` if no user is logged on, then this implementation simply redirects the user to your application's login page.
{/discussion}
