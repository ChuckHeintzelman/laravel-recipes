---
Title:    Starting to Inject Content into a Blade Section
Topics:   -
Code:     @section
Id:       241
Position: 13
---

{problem}
You want to start section to your Blade template.
{/problem}

{solution}
Use the `@section` blade command.

This will start injecting content into the section. This will continue until a `@stop`, `@show`, `@overwrite` or `@append` statement is reached.

For example, the following block won't output anything, but will track `I Am Legend` under the `movies` section.

{html}
@section('movies')
    I Am Legend
@stop
{/html}

Alternatively, you could use the following syntax to achieve the same thing.

{html}
@section('movies', 'I Am Legend')
{/html}

_There's no need to end the section with `@stop` when you provide the content with the second argument._

Later, a `@yield('movies')` would output the contents of the `movies` section.

{html}
@yield('movies')
{/html}
{/solution}

{discussion}
Sections always begin with `@section`.

And, except for the syntax where you provide the content as the second argument, a `@section` must always end one of five ways.

1. With a `@stop` command. See [[Stopping Injecting Content Into a Section]].
2. With a `@endsection` command, which is an alias for `@stop`.
3. With a `@show` command. See [[Yielding the Current Section in a Blade Template]].
4. With a `@append` command. See [[Stopping Injecting Content into a Section and Appending It]].
5. With a `@overwrite` command. See [[Stopping Injecting Content into a Section and Overwriting]].
{/discussion}
