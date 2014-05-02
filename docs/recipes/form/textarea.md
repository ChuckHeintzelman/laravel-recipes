---
Title:    Creating a Textarea Input Field
Topics:   forms
Code:     Form::textarea()
Id:       162
Position: 12
---

{problem}
You want to add a textarea to your Blade template.
{/problem}

{solution}
Use the `Form::textarea()` method.

The simplest usage is to only pass a single argument, the name.

{html}
{{ Form::textarea('notes') }}
{/html}

This produces the following HTML.

{html}
<textarea name="notes" cols="50" rows="10"></textarea>
{/html}

_Notice the default **cols** and **rows**._

You can pass the value as the second argument.

{html}
{{ Form::textarea('notes', '3 < 4') }}
{/html}

The value will be escaped.

{html}
<textarea name="notes" cols="50" rows="10">3 &amp;lt; 4</textarea>
{/html}

Additional options can be passed as a third argument. This must be an array.

{html}
{{ Form::textarea('notes', null, ['class' => 'field']) }}
{/html}

This will add the class "field" to the text area.

{html}
<textarea class="field" name="notes" cols="50" rows="10"></textarea>
{/html}
{/solution}

{discussion}
You can use an undocumented "size" attribute.

If the text area has an attribute named "size" it should be in the format "30x5" where the first digit (20) represents the columns and the second digit represents the rows.

{html}
{{ Form::textarea('notes', null, ['size' => '30x5']) }}
{/html}

Will produce.

{html}
<textarea name="notes" cols="30" rows="5"></textarea>
{/html}
{/discussion}
