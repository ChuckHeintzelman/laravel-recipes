---
Title:    Generating an Unordered List of Items
Topics:   html
Code:     HTML::ul()
Id:       195
Position: 15
---

{problem}
You want an unordered list of items in your Blade template.
{/problem}

{solution}
Use the `HTML::ul()` method.

You simply pass the method a list of items. If you pass an associative array, only the array values are used.

{html}
{{ HTML::ul(array('a', 'b', 'c'))}}
{/html}

This produces a simple list.

{html}
<ul>
  <li>a</li>
  <li>b</li>
  <li>c</li>
</ul>
{/html}

If any of the elements are arrays, then a sub-list is generated.

{php}
// PHP code to generate $list
$list = array(
  'one',
  'two',
  array(
    'sub-one',
    'sub-two',
  ),
);
return View::make('thebladeview', array('list' => $list));
{/php}

If the Blade template has the following:

{html}
{{ HTML::ul($list) }}
{/html}

Then the following would be output.

{html}
<ul>
  <li>one</li>
  <li>two</li>
  <li>
    <ul>
      <li>sub-one</li>
      <li>sub-two</li>
    </ul>
  </li>
</ul>
{/html}

If you want the sub-list to have a title, then have the array representing the sub-list have a key.

{php}
// PHP code to generate $list
$list = array(
  'one',
  'two',
  'three' => array(
    'sub-one',
    'sub-two',
  ),
);
return View::make('thebladeview', array('list' => $list));
{/php}

If the Blade template has the following:

{html}
{{ HTML::ul($list) }}
{/html}

Then the following would be output.

{html}
<ul>
  <li>one</li>
  <li>two</li>
  <li>three
    <ul>
      <li>sub-one</li>
      <li>sub-two</li>
    </ul>
  </li>
</ul>
{/html}

If you want attributes to apply to the list, use an array as the second argument to `HTML::ul()`.

{html}
{{ HTML::ul(array('a', 'b'), array('class' => 'mylist')) }}
{/html}

Now the list has a class attribute.

{html}
<ul class="mylist">
  <li>a</li>
  <li>b</li>
</ul>
{/html}
{/solution}

{discussion}
A couple of notes.

1. Any HTML entities in the list values are escaped.
2. The second argument, `$attributes`, will only apply to the top level list. If you have sublists, they won't contain any attributes.
{/discussion}
