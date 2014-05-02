---
Title:    Creating a Checkbox Input Field
Topics:   forms
Code:     Form::checkbox()
Id:       167
Position: 17
---

{problem}
You want to create a checkbox field for your Blade template.
{/problem}

{solution}
Use the `Form::checkbox()` method.

You're only required to use the first argument, name.

{html}
{{ Form::checkbox('agree') }}
{/html}

This produces the following HTML.

{html}
<input name="agree" type="checkbox" value="1">
{/html}

You can specify the value with a second argument.

{html}
{{ Form::checkbox('agree', 'yes') }}
{/html}

Now the value, if checked, will be "yes".

{html}
<input name="agree" type="checkbox" value="yes">
{/html}

If you want to default the value as checked, pass `true` as the third argument.

{html}
{{ Form::checkbox('agree', 1, true) }}
{/html}

This adds the `checked` attribute.

{html}
<input checked="checked" name="agree" type="checkbox" value="1">
{/html}

Finally, you can add additional attributes to the input field with the fourth argument.

{html}
{{ Form::checkbox('agree', 1, null, ['class' => 'field']) }}
{/html}

Now the field has the class attribute.

{html}
<input class="field" name="agree" type="checkbox" value="1">
{/html}
{/solution}

{discussion}
The checkbox will automatically get checked based on any flash data.

If you redisplay the form because of errors, your checkbox will retain what the user had previously.

Also, if you've bound a model to the form, it will pull the value from the model's data. See [[Creating a New Model Based Form]].
{/discussion}
