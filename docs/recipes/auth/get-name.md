---
Title:    Getting the Cookie Name Used for Authentication
Topics:   -
Code:     Auth::getName()
Id:       228
Position: 33
---

{problem}
You want to know the name of the cookie used for authentication.
{/problem}

{solution}
Use the `Auth::getName()` method.

{php}
$cookie_name = Auth::getName();
{/php}
{/solution}

{discussion}
This is a long name beginning with the word 'login_'.

Most often, it's something like `login_82e5d2c56bdd0811318f0cf078b78bfc`.
{/discussion}
