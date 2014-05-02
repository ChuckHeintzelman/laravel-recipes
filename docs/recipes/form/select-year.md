---
Title:    Creating a Select Year Field
Topics:   form
Code:     Form::selectYear
Id:       165
Position: 15
---

{problem}
You want a select box with a range of years.
{/problem}

{solution}
Use the `Form::selectYear()` method.

Just specify the start and end years.

{html}
{{ Form::selectYear('year', 2013, 2015) }}
{/html}

This produces three options.

{html}
<select name="year">
  <option value="2013">2013</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
</select>
{/html}

Add a fourth option for the default value and a fifth option for any additional attributes for the select field.

{html}
{{ Form::selectYear('year', 2013, 2015, 2014, ['class' => 'field']) }}
{/html}

Now year 2014 is selected and the select field has a class attribute.

{html}
<select class="field" name="year">
  <option value="2013">2013</option>
  <option value="2014" selected="selected">2014</option>
  <option value="2015">2015</option>
</select>
{/html}
{/solution}

{discussion}
This is actually a simple wrapper over the `Form::selectRange()` method.

It operates exactly as `Form::selectRange()` does. The primary purpose for using it is to have your code be slightly easier to understand. Seeing a `Form::selectYear()` makes it readily apparent what you're doing, but a `Form::selectRange()` means you have to think _"Okay, what type of range is being selected?"_
{/discussion}
