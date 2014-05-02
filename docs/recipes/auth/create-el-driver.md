---
Title:    Creating an Instance of the Auth Eloquent Driver
Topics:   -
Code:     Auth::createEloquentDriver()
Id:       214
Position: 19
---

{problem}
You want to create an instance of the Eloquent driver.
{/problem}

{solution}
Use the `Auth::createEloquentDriver()` method.

{php}
$driver = Auth::createEloquentDriver();
{/php}

Once you have the `$driver` above you can call the standard `check()`, `guest()`, `user()`, etc. methods directly on the driver.
{/solution}

{discussion}
Generally, it's better to use the `Auth` facade.

This sets up the appropriate driver based on your configuration driver. But if your application is complex, you can instantiate the driver separately to have multiple authentication drivers active at one time.
{/discussion}
