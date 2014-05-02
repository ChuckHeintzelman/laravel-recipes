---
Title:    Getting the Remember Me Cookie Name
Topics:   -
Code:     Auth::getRecallerName()
Id:       227
Position: 32
---

{problem}
You need to know the name for the "remember me" cookie.
{/problem}

{solution}
Use the `Auth::getRecallerName()` method.

{php}
$remember_name = Auth::getRecallerName();
{/php}
{/solution}

{discussion}
This is a long name beginning with the word 'remember_'.

Most often, it's something like `remember_82e5d2c56bdd0811318f0cf078b78bfc`.
{/discussion}
