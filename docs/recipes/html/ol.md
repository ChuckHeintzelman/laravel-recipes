---
Title:    Generating an Ordered List of Items
Topics:   html
Code:     HTML::ol()
Id:       194
Position: 14
---

{problem}
You want an ordered list of items in your Blade template.
{/problem}

{solution}
Use the `HTML::ol()` method.

You simply pass the method a list of items. If you pass an associative array, only the array values are used.

{html}
{{ HTML::ol(array('a', 'b', 'c')) }}
{/html}

This produces a simple list.

{html}
<ol>
  <li>a</li>
  <li>b</li>
  <li>c</li>
</ol>
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
{{ HTML::ol($list) }}
{/html}

Then the following would be output.

{html}
<ol>
  <li>one</li>
  <li>two</li>
  <li><ol>
    <li>sub-one</li>
    <li>sub-two</li>
  </ol></li>
</ol>
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
{{ HTML::ol($list) }}
{/html}

Then the following would be output.

{html}
<ol>
  <li>one</li>
  <li>two</li>
  <li>three
    <ol>
      <li>sub-one</li>
      <li>sub-two</li>
    </ol>
  </li>
</ol>
{/html}

If you want attributes to apply to the list, use an array as the second argument to `HTML::ol()`.

{html}
{{ HTML::ol(array('a', 'b'), array('class' => 'mylist')) }}
{/html}

Now the list has a class attribute.

{html}
<ol class="mylist">
  <li>a</li>
  <li>b</li>
</ol>
{/html}
{/solution}

{discussion}
A couple of notes.

1. Any HTML entities in the list values are escaped.
2. The second argument, `$attributes`, will only apply to the top level list. If you have sublists, they won't contain any attributes.
{/discussion}
