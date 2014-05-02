---
Title:    Getting the Select Option for a Value
Topics:   forms
Code:     Form::getSelectOption()
Id:       180
Position: 29
---

{problem}
You want to easily get the `<option>` HTML for an option in a select.
{/problem}

{solution}
Use the `Form::getSelectOption()` method.

You must supply this method three arguments:

1. `$display` - The display value for the option.
2. `$value` - The value of the option.
3. `$selected` - The value of the selected option.

{php}
$html = Form::getSelectOption('My Option', 1, 3);
{/php}

`$html` will equal `<option value="1">My Option</option>` in this example.

If the `$value` argument is an array, an option group will be returned.
{/solution}

{discussion}
This is useful in Form macros.

If you have a macro supplying a type of select box, this can be a handy method to call to build up your options.
{/discussion}
