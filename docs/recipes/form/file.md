---
Title:    Creating a File Input Field
Topics:   forms
Code:     Form::file(), Form::input(), Form::model()
Id:       160
Position: 10
---

{problem}
You want to create an file input field for file uploads.

You know you could use the `<input type="file"...>` format but you want to do it the Laravel way.
{/problem}

{solution}
Use the `Form::file()` method.

Usually, this is used in Blade templates.

The simplest form of this method is to only pass the name.

{html}
{{ Form::file('thefile') }}
{/html}

This creates a very simple element which looks like the following.

{html}
<input name="thefile" type="file">
{/html}

To add other attributes, pass a second argument to the method. This second argument must be an array.

{html}
{{ Form::file('thefile', ['class' => 'field']) }}
{/html}

Now the input has a class attribute.

{html}
<input class="field" name="thefile" type="file">
{/html}
{/solution}

{discussion}
This method wraps the `Form::input()` method, passing `"file"` as the type.
{/discussion}
