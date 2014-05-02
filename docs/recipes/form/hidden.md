---
Title:    Creating a Hidden Input Field
Topics:   forms
Code:     Form::hidden(), Form::input(), Form::model()
Id:       157
Position: 7
---

{problem}
You want to create a hidden input field for your form.

You know you could use the `<input type="hidden"...>` format but you want to do it the Laravel way.
{/problem}

{solution}
Use the `Form::hidden()` method.

Usually, this is used in Blade templates.

Just pass the name and value to the method.

{html}
{{ Form::hidden('invisible', 'secret') }}
{/html}

This creates a very simple element which looks like the following.

{html}
<input name="invisible" type="hidden" value="secret">
{/html}

To add other attributes, pass a third argument to the method. This third argument must be an array.

{html}
{{ Form::hidden('invisible', 'secret', array('id' => 'invisible_id')) }}
{/html}

Now the input has an id attribute.

{html}
<input id="invisible_id" name="invisible" type="hidden" value="secret">
{/html}
{/solution}

{discussion}
This method uses the `Form::input()` method, passing `"hidden"` as the type.

**NOTE** If you've bound the form to a model using `Form::model()` and the model has the same named attribute, then the value will come from the model. See [[Creating a New Model Based Form]] for details.
{/discussion}
