---
Title:    Pulling in the Content of a Parent Section in Blade
Topics:   -
Code:     @parent
Id:       245
Position: 17
---

{problem}
You want to merge in the content of a parent section in your Blade template.
{/problem}

{solution}
Use the Blade `@parent` command.

This will pull in the content of the previous section _of the same name_.

For example.

{html-lines}
@section('test')
  @parent
  Bottom
@stop

{{-- Later --}}
@section('test')
   Top
@show
{/html}

This would output the following.

{html}
Top
Bottom
{/html}
{/solution}

{discussion}
At first glance the above seems to get cause and effect backwards.

But it doesn't. The logic working through that code is:

Line 1

: Start capturing output. The section will be called `test`.

Line 2 - 3

: Capture the two lines `@parent` and `Bottom`.

Line 4

: Stop capturing output. There's no previous `test` section, so all we do is store these two lines.

Line 7

: Start capturing output. The section will be called `test`.

Line 8

: Capture the line `Top`

Line 9

: Stop capturing data. Since there's already a section named `test`, we'll replace any `@parent` in the previous section with our captured data. Now our `test` section contains two lines: `Top` and `Bottom`. Since this was a `@show` command we now yield the `test` section, outputting these two lines.

{tip}
When you use an `@extend` at the top of a Blade template, Blade will first load and process your existing template, then it will load and process the template specified with the `@extend` command.
{/tip}

If you think about it. How the `@extend` command and the `@parent` command work, compliment each other nicely.
{/discussion}
