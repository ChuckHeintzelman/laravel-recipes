---
Title:    Including a Blade Template within another Template
Topics:   Blade
Code:     @include
Id:       90
Position: 10
---

{problem}
You want to include one Blade template within another.

You combined some common HTML code into a single template and want to pull in the template within another template.
{/problem}

{solution}
Use the `@include` statement.

{html}
<html>
<body>
    @include('common-header')
    <h1>Page One</h1>
    <p>bla, bla, bla</p>
</body>
</html>
{/html}

When the above view is created it will look for `views/common-header.php` or `views/common-header.blade.php` and replace `@include('common-header')` with the contents of the file.

#### You can also specify variables

By default, any included templates inherit any variables the including template had available, but you can specify new ones.

Let's say you have `views/partials/item-display.blade.php` that looks like:
{html}
<div>
    Name: {{ $item->name }}<br>
    Description: {{{ $item->description }}}
</div>
{/html}

Then you could have a template include this _"partial"_, passing the `$item` variable.

{html}
<html>
<body>
  <h1>All the items:</h1>
  @foreach ($items as $foo)
    @include('partials.item-display', array('item' => $foo))
  @endforeach
</body>
{/html}
{/solution}

{discussion}
The `@include()` line must not span multiple lines.

Code like below will not operate correctly.

{php}
@include('my-partial-name', array(
    'value1' => 'abc',
    'value2' => $some_var,
    'value3' => date('Y-m-d'),
))
{/php}
{/discussion}
