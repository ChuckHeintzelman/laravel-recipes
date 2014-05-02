---
Title:    Creating a Month Selection Field
Topics:   form
Code:     Form::selectMonth
Id:       166
Position: 16
---

{problem}
You want a select box with the 12 months listed.
{/problem}

{solution}
Use the `Form::selectMonth()` method.

You can just call it with the field name.

{html}
{{ Form::selectMonth('month') }}
{/html}

This produces twelve options.

{html}
<select name="month">
  <option value="1">January</option>
  <option value="2">February</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
{/html}
{/solution}

{discussion}
Use a second option to specify the default month. A third option will apply additional attributes to the select field.

{html}
{{ Form::selectMonth('month', 7, ['class' => 'field']) }}
{/html}

This produces the list of months with July selected and the select field has a class attributes.

{html}
<select class="field" name="month">
  <option value="1">January</option>
  <option value="2">February</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7" selected="selected">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
{/html}
{/discussion}
