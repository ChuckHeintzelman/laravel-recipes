---
Title:    Getting the Session Store Used for Authentication
Topics:   -
Code:     Auth::getSession()
Id:       237
Position: 42
---

{problem}
You want to access the session store used by authentication.
{/problem}

{solution}
Use the `Auth::getSession()` method.

{php}
$request = Auth::getSession();
{/php}
{/solution}

{discussion}
Usually you can just access the `Session` facade.

By default Laravel uses the same session store for both the `Session` facade and the `Auth` facade. This means unless your application is explicitly setting the session store, it's easier to use the `Session` facade.
{/discussion}
