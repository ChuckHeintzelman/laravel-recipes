---
Title:    Creating a Select Range Field
Topics:   form
Code:     Form::selectRange
Id:       164
Position: 14
---

{problem}
You want a select box with a range of values.
{/problem}

{solution}
Use the `Form::selectRange()` method.

Just specify the start and end of the numeric range.

{html}
{{ Form::selectRange('number', 10, 15) }}
{/html}

This produces options 10, 11, 12, 13, 14, and 15.

{html}
<select name="number">
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
</select>
{/html}

Add a fourth option for the default value and a fifth option for any additional attributes for the select field.

{html}
{{ Form::selectRange('number', 10, 15, 13, ['class' => 'field']) }}
{/html}

Now #13 is selected and the select field has a class attribute.

{html}
<select class="field" name="number">
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13" selected="selected">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
</select>
{/html}
{/solution}

{discussion}
This calls `Form::select()` internally.

See [[Creating a Select Box Field]] for more details.
{/discussion}
