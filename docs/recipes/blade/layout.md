---
Title:    Using Blade Layouts to Extend Templates
Topics:   Blade
Code:     @extend, @section, @show, @yield
Id:       34
Position: 1
---

{problem}
You find yourself duplicating common HTML on various pages.

Every HTML page has common elements for your web site. There are things like a navigation bar, a content area, a header and footer. You're tired of all the wasted time you spend duplicating work.
{/problem}

{solution}
Create and use a Blade layout.

### Step 1 - Create a Layout

Create `app/views/layouts/main.blade.php`

{html-lines}
<html>
  <head>
    {{-- Common Header Stuff Here --}}
  </head>
  <body>
    <div class="navigation">
      @section('navigation')
        <a href="/">Home</a>
        <a href="/contact">Contact</a>
      @show
    </div>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
{/html}

#### Step 2 - Extend Your View to Use the Layout

{html-lines}
@extends('layouts.main')

@section('content')
  <p>
    Here's your content
  </p>
@stop
{/html}

{tip}
`@extends` must always be the very first thing in a template when used.
{/tip}

#### Output

The HTML of the rendered view will appear something like below.

{html}
<html>
  <head>
  </head>
  <body>
    <div class="navigation">
        <a href="/">Home</a>
        <a href="/contact">Contact</a>
    </div>
    <div class="container">
  <p>
    Here's your content
  </p>
    </div>
  </body>
</html>
{/html}
{/solution}

{discussion}
Here's a breakdown of each file in the above examples.

#### The file in Step 1

Line 3

: This is where you'd stick your CSS, meta tags, etc.

Lines 7 - 10

: Here is a section named *navigation* that has some simple links.

Line 13

: Output the section named *content* here.


### The file in Step 2

Line 1

: This says to use the layout created in Step 1

Lines 4 - 6

: These lines will be output at the point the @yield exists in the layout file.
{/discussion}
