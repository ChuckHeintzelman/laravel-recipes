---
Title:    Creating a Reset Input Field
Topics:   forms
Code:     Form::reset()
Id:       169
Position: 19
---

{problem}
You want to create a reset button in your Blade template.
{/problem}

{solution}
Use the `Form::reset()` method.

You only need to supply the value as the first argument.

{html}
{{ Form::reset('Clear form') }}
{/html}

The HTML produced is.

{html}
<input type="reset" value="Clear form">
{/html}

If you want to add additional attributes, add a second argument with an array of attributes.

{html}
{{ Form::reset('Clear form', ['class' => 'form-button']) }}
{/html}

Now the output has a class attribute.

{html}
<input class="form-button" type="reset" value="Clear form">
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
