---
Title:    Stopping Injecting Content Into a Section
Topics:   -
Code:     @stop
Id:       242
Position: 14
---

{problem}
You're finished with a Blade section, but don't want to output it yet.
{/problem}

{solution}
Use the Blade `@stop` command to end the section.

{html}
@section('nav')
  <ul>
    <li><a href="#">link 1</a></li>
    <li><a href="#">link 2</a></li>
  </ul>
@stop
{/html}

Now your template will have a section named `nav` which you can output later with a `@yield` command.
{/solution}

{discussion}
Note that this doesn't append to existing sections.

If you want to append to an existing section, end the section with `@append`.

{warn}
The `@stop` command does not overwrite existing sections.
{/warn}

Imagine you had the following Blade template.

{html}
@section('test')
   one
@stop
@section('test')
   two
@stop
@yield('test')
{/html}

What would be output is.

{html}
one
{/html}

You can use the `@parent` comment to pull in the contents of the previous section. See the [[Pulling in the Content of a Parent Section in Blade]] recipe.
{/discussion}
