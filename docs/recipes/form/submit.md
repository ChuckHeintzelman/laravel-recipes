---
Title:    Creating a Submit Button
Topics:   forms
Code:     Form::submit()
Id:       171
Position: 21
---

{problem}
You want to create a submit button in your Blade template.
{/problem}

{solution}
Use the `Form::submit()` method.

You don't have to pass any arguments.

{html}
{{ Form::submit() }}
{/html}

The resulting HTML will be as follows.

{html}
<input type="submit">
{/html}

You can specify the value as the first argument.

{html}
{{ Form::submit('Save') }}
{/html}

Now the resulting HTML has a value.

{html}
<input type="submit" value="Save">
{/html}

Use the second argument to add additional attributes.

{html}
{{ Form::submit('Save', array('class' => 'btn')) }}
{/html}

And now resulting the submit button has a class.

{html}
<input class="btn" type="submit" value="Save">
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
