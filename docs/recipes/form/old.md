---
Title:    Getting a Value From the Session's Old Input
Topics:   forms
Code:     Form::old()
Id:       176
Position: 25
---

{problem}
You're redisplaying a page and want to get a field's value from the previously displayed page.

In other words, you want to pull the value from the session's flashed data.
{/problem}

{solution}
Use the `Form::old()` method.

{php}
$value = Form::old('fieldname');
{/php}

If there was no previous value, `null` is returned.
{/solution}

{discussion}
Usually this is used in Form macros.

And the most common reason you need to redisplay the same form is because there was an input error and you now want to display the form with an error message.

But you want to keep any value that the user entered.

This allows you to fetch that value if there was one.

See also [[Getting the Value Attribute a Field Should Use]].
{/discussion}
