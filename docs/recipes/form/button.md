---
Title:    Creating a Button Element
Topics:   forms
Code:     Form::button()
Id:       172
Position: 22
---

{problem}
You want to create a button element in your Blade template.
{/problem}

{solution}
Use the `Form::button()` method.

Specify the value as the first argument.

{html}
{{ Form::button('Hit Me') }}
{/html}

The HTML produced is very simple.

{html}
<button type="button">Hit Me</button>
{/html}

Use the second argument to add additional attributes.

{html}
{{ Form::button('Hit Me', array('class' => 'btn')) }}
{/html}

And now resulting the button has a class.

{html}
<button class="btn" type="button">Hit Me</button>
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
