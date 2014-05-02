---
Title:    Creating a Radio Button Input Field
Topics:   forms
Code:     Form::radio()
Id:       168
Position: 18
---

{problem}
You want to create a radio button field for your Blade template.
{/problem}

{solution}
Use the `Form::radio()` method.

You're only required to use the first argument, name.

{html}
{{ Form::radio('single') }}
{/html}

This produces the following HTML.

{html}
<input name="single" type="radio" value="single">
{/html}

But, radio buttons make the most sense when you have several with the same name, but different values. Specify the value with the second argument.

{html}
{{ Form::radio('sex', 'male') }}<br>
{{ Form::radio('sex', 'female') }}
{/html}

Now the value will either be 'male' or 'female'.

{html}
<input name="sex" type="radio" value="male"><br>
<input name="sex" type="radio" value="female">
{/html}

If you want to default the value as checked, pass `true` as the third argument.

{html}
{{ Form::radio('sex', 'male') }}<br>
{{ Form::radio('sex', 'female', true) }}
{/html}

This adds the `checked` attribute to second radio button.

{html}
<input name="sex" type="radio" value="male"><br>
<input checked="checked" name="sex" type="radio" value="female">
{/html}

Finally, you can add additional attributes to the input field with the fourth argument.

{html}
{{ Form::radio('example', 1, true, ['class' => 'field']) }}
{/html}

Now the field has the class attribute.

{html}
<input class="field" checked="checked" name="example" type="radio" value="1">
{/html}
{/solution}

{discussion}
The appropriate radio button will automatically get checked based on any flash data.

If you redisplay the form because of errors, your radio button fields will retain what the user had previously.

Also, if you've bound a model to the form, it will pull the value from the model's data. See [[Creating a New Model Based Form]].
{/discussion}
