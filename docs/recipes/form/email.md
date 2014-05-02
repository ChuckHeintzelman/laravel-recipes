---
Title:    Creating an Email Input Field
Topics:   forms
Code:     Form::email(), Form::input(), Form::model()
Id:       158
Position: 8
---

{problem}
You want to create an email input field for your form.

You know you could use the `<input type="email"...>` format but you want to do it the Laravel way.
{/problem}

{solution}
Use the `Form::email()` method.

Usually, this is used in Blade templates.

The simplest form of this method is to only pass the name.

{html}
{{ Form::email('email_address') }}
{/html}

This creates a very simple element which looks like the following.

{html}
<input name="email_address" type="email">
{/html}

You can also pass an additional _value_ option.

{html}
{{ Form::text('email_address', 'noreply@gmail.com') }}
{/html}

Producing the following.

{html}
<input name="email_address" type="email" value="noreply@gmail.com">
{/html}

To add other attributes, pass a third argument to the method. This third argument must be an array.

{html}
{{ Form::email('email_address', 'noreply@gmail.com', ['class' => 'field']) }}
{/html}

Now the input has a class attribute.

{html}
<input class="field" name="email_address" type="email" \
  value="noreply@gmail.com">
{/html}

_(The backslash is used above to format output for small screens.)_
{/solution}

{discussion}
This method uses the `Form::input()` method, passing `"email"` as the type.

Also, please note that the value will first come from Flash Session Input, only secondly will the value argument be used. This means if your previous request was this form it will automatically display the value the user last entered.

**NOTE:** If you've bound the form to a model using `Form::model()`, then the order of precedence for determining which value to display is different. See [[Creating a New Model Based Form]] for details.
{/discussion}
