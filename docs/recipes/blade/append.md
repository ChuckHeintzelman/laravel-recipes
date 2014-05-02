---
Title:    Stopping Injecting Content into a Section and Appending It
Topics:   -
Code:     @append
Id:       243
Position: 15
---

{problem}
You want to stop injecting content into a Blade section.

And you want the content appended to any previous section of the same name.
{/problem}

{solution}
Use the Blade `@append` command.

{html}
@section('test')
   one
@stop
@section('test')
   two
@stop
@yield('test')
{/html}

The above Blade template will output the following.

{html}
one
{/html}

But if you change the second `@stop` to an `@append`.

{html}
@section('test')
   one
@stop
@section('test')
   two
@append
@yield('test')
{/html}

Then the following is output.

{html}
one
two
{/html}
{/solution}

{discussion}
You may want to use the `@parent` command.

If you want to use the content of the previous section within your section, then see the [[Pulling in the Content of a Parent Section in Blade]] recipe.
{/discussion}
