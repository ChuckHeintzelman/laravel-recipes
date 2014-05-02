---
Title:    Yielding the Current Section in a Blade Template
Topics:   -
Code:     @show
Id:       240
Position: 12
---

{problem}
You want to yield the contents of the section you're currently in.
{/problem}

{solution}
Use the Blade `@show` command.

This ends the current section and yields it. Yielding means this is the point the content of the section will be output.

{html}
@section('one')
  Something here
  But we'll end it, so it won't output
@stop

@section('two')
  Something else
@show
{/html}

The HTML output from above would be.

{html}
Something else
{/html}
{/solution}

{discussion}
You can think of `@show` as a `@stop` followed by a `@yield('section')`.
{/discussion}
