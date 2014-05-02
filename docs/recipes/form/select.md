---
Title:    Creating a Select Box Field
Topics:   forms
Code:     Form::select()
Id:       163
Position: 13
---

{problem}
You want to create a select box in a form template.

Instead of using the `<select>` tag you want to do it the Laravel way.
{/problem}

{solution}
Use the `Form::select()` method.

You can use a simple array.

{html}
{{ Form::select('age', ['Under 18', '19 to 30', 'Over 30']) }}
{/html}

This uses the numeric index of the array for option values.

{html}
<select name="age">
  <option value="0">Under 18</option>
  <option value="1">19 to 30</option>
  <option value="2">Over 30</option>
</select>
{/html}

Or you can use associative arrays.

{html}
{{ Form::select('age', [
   'young' => 'Under 18',
   'adult' => '19 to 30',
   'adult2' => 'Over 30']
) }}
{/html}

This will use the keys for the option values.

{html}
<select name="age">
  <option value="young">Under 18</option>
  <option value="adult">19 to 30</option>
  <option value="adult2">Over 30</option>
</select>
{/html}

Set the default option by passing a third argument.

{html}
{{ Form::select('number', [0, 1, 2], 2) }}
{/html}

This produces the following.

{html}
<select name="number">
  <option value="0">0</option>
  <option value="1">1</option>
  <option value="2" selected="selected">2</option>
</select>
{/html}

Add additional attributes with a fourth argument.

{html}
{{ Form::select('number', [1, 2, 3], null, ['class' => 'field']) }}
{/html}

Now the select field has the class attribute set.

{html}
<select class="field" name="number">
  <option value="0">1</option>
  <option value="1">2</option>
  <option value="2">3</option>
</select>
{/html}

_(Note: I added spaces and linefeeds in the example HTML output above for clarity.)_
{/solution}

{discussion}
You can also create select groups.

When the options argument contains an array with sub-arrays, then option groups are created.

{html}
{{ Form::select('feeling', array(
  'Happy' => array('Joyous', 'Glad', 'Ecstatic'),
  'Sad' => array('Bereaved', 'Pensive', 'Down'),
))}}
{/html}

This produces the following HTML.

{html}
<select name="feeling">
  <optgroup label="Happy">
    <option value="0">Joyous</option>
    <option value="1">Glad</option>
    <option value="2">Ecstatic</option>
  </optgroup>
  <optgroup label="Sad">
    <option value="0">Bereaved</option>
    <option value="1">Pensive</option>
    <option value="2">Down</option>
  </optgroup>
</select>
{/html}
{/discussion}
