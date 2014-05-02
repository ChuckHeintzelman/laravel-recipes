---
Title:    Getting the Authentication User Provider
Topics:   -
Code:     Auth::getProvider()
Id:       235
Position: 40
---

{problem}
You want to access the user provider the authentication uses.
{/problem}

{solution}
Use the `Auth::getProvider()` method.

{php}
$provider = Auth::getProvider();
{/php}
{/solution}

{discussion}
The provider will be based on how your authentication is configured.

It'll be the provider for the driver you set up in the your `app/config/auth.php`. See [[Changing Your Authentication Driver]].

If you're using the `database` configuration driver, the provider will be `Illuminate\Auth\DatabaseUserProvider`. If you're using the `eloquent` configuration driver the provider will be `Illuminate\Auth\EloquentUserProvider`.

If you set up a custom authentication driver, the user provider will be whatever you set up.
{/discussion}
