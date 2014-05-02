---
Title:    Creating a Text Input Field
Topics:   forms
Code:     Form::input(), Form::model(), Form::text()
Id:       155
Position: 6
---

{problem}
You want to create a text input field for your form.

You know you could use the `<input type="text"...>` format but you want to use the `Form` facade.
{/problem}

{solution}
Use the `Form::text()` method.

Usually, this is used in Blade templates.

The simplest form of this method is to only pass the name.

{html}
{{ Form::text('first_name') }}
{/html}

This creates a very simple element which looks like the following.

{html}
<input name="first_name" type="text">
{/html}

You can also pass an additional _value_ option.

{html}
{{ Form::text('first_name', 'Chuck') }}
{/html}

Producing the following.

{html}
<input name="first_name" type="text" value="Chuck">
{/html}

To add other attributes, pass a third argument to the method. This third argument must be an array.

{html}
{{ Form::text('first_name', 'Chuck', array('class' => 'field')) }}
{/html}

Now the input has a class attribute.

{html}
<input class="field" name="first_name" type="text" value="Chuck">
{/html}
{/solution}

{discussion}
This method uses the `Form::input()` method, passing `"text"` as the type.

Also, please note that the value will first come from Flash Session Input, only secondly will the value argument be used. This means if your previous request was this form it will automatically display the value the user last entered.

**NOTE** If you've bound the form to a model using `Form::model()`, then the order of precedence for determining which value to display is different. See [[Creating a New Model Based Form]] for details.
{/discussion}
