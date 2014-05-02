---
Title:    Stopping Injecting Content into a Section and Overwriting
Topics:   -
Code:     @overwrite
Id:       244
Position: 16
---

{problem}
You want to stop injecting content into a Blade section.

And you want the content overwrite to any previous section of the same name.
{/problem}

{solution}
Use the Blade `@overwrite` command.

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

But if you change the second `@stop` to an `@overwrite`.

{html}
@section('test')
   one
@stop
@section('test')
   two
@overwrite
@yield('test')
{/html}

Then the following is output.

{html}
two
{/html}
{/solution}

{discussion}
The `@overwrite` command is one of the four ways to end a section.

The other three commands are:

1. `@stop` - [[Stopping Injecting Content Into a Section]].
2. `@show` - [[Yielding the Current Section in a Blade Template]].
3. `@append` - [[Stopping Injecting Content into a Section and Appending It]].
{/discussion}
