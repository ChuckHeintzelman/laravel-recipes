---
Title:    Creating a Password Input Field
Topics:   forms
Code:     Form::input(), Form::password()
Id:       156
Position: 6
---

{problem}
You want to create a password input field for your form.

You know you could use the `<input type="password"...>` format but you want to use the `Form` facade.
{/problem}

{solution}
Use the `Form::password()` method.

Usually, this is used in Blade templates.

The simplest way to use this method is to only pass the name.

{html}
{{ Form::password('secret') }}
{/html}

This creates a very simple element which looks like the following.

{html}
<input name="secret" type="password" value="">
{/html}

To add other attributes, pass a second argument to the method. This second argument must be an array.

{html}
{{ Form::password('secret', array('class' => 'field')) }}
{/html}

Now the password field has a class attribute.

{html}
<input class="field" name="secret" type="password" value="">
{/html}
{/solution}

{discussion}
This method uses the `Form::input()` method, passing `"password"` as the type.
{/discussion}
