---
Title:    Outputting the Content of a Blade Section
Topics:   Blade
Code:     @yield
Id:       35
Position: 2
---

{problem}
You want to output a section in your Blade template.
{/problem}

{solution}
Use the Blade `@yield` command.

Consider the following Blade template.

{html}
@section('bottom')
  This is the bottom
@stop
@section('top')
  This is the top
@stop
@yield('top')
@yield('bottom')
{/html}

The output would be the follwoing.

{html}
This is the top
This is the bottom
{/html}

You can also specify the default value with `@yield`.

Imagine having the simple layout presented below. _(See [[Using Blade Layouts to Extend Templates]].)_

{html}
<html>
  <body>
    <div class="container">
      @yield('content','No content')
    </div>
  </body>
</html>
{/html}

When a view without a `@section('content')` _extends_ this layout, the output will be similar to what's below.

{html}
<html>
  <body>
    <div class="container">
      No content
    </div>
  </body>
</html>
{/html}
{/solution}

{discussion}
Using default values on @yield is a good way to note when content is missing.

What if you had the line below in your layout?

{html}
@yield('content', '<span style="background:red">MISSING CONTENT</span>')
{/html}

Then whenever the content is not provided it will be very apparent with a big red block saying **MISSING CONTENT**.
{/discussion}
