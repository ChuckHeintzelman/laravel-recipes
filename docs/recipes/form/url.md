---
Title:    Creating a URL Input Field
Topics:   forms
Code:     Form::input(), Form::model(), Form::url()
Id:       159
Position: 9
---

{problem}
You want to create an URL input field for your form.

You know you could use the `<input type="url"...>` format but you want to do it the Laravel way.
{/problem}

{solution}
Use the `Form::url()` method.

Usually, this is used in Blade templates.

The simplest form of this method is to only pass the name.

{html}
{{ Form::url('webpage') }}
{/html}

This creates a very simple element which looks like the following.

{html}
<input name="webpage" type="url">
{/html}

You can also pass an additional _value_ option.

{html}
{{ Form::url('webpage', 'http://a.com') }}
{/html}

Producing the following.

{html}
<input name="webpage" type="url" value="http://a.com">
{/html}

To add other attributes, pass a third argument to the method. This third argument must be an array.

{html}
{{ Form::url('webpage', 'http://a.com', ['class' => 'field']) }}
{/html}

Now the input has a class attribute.

{html}
<input class="field" name="webpage" type="url" value="http://a.com">
{/html}
{/solution}

{discussion}
This method uses the `Form::input()` method, passing `"url"` as the type.

Also, please note that the value will first come from Flash Session Input, only secondly will the value argument be used. This means if your previous request was this form it will automatically display the value the user last entered.

**NOTE:** If you've bound the form to a model using `Form::model()`, then the order of precedence for determining which value to display is different. See [[Creating a New Model Based Form]] for details.
{/discussion}
