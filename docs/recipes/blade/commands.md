---
Title:    Knowing All the Blade Template Commands
Topics:   -
Code:     -
Id:       248
Position: 22
---

{problem}
You want a handy reference of all the Blade template commands.
{/problem}

{solution}
Here's the list

* `{{ $var }}` - Echo content
* `{{ $var or 'default' }}` - Echo content with a default value
* `{{{ $var }}}` - Echo escaped content
* `{{-- Comment --}}` - A Blade comment
* `@extends('layout')` - Extends a template with a layout
* `@if(condition)` - Starts an **if** block
* `@else` - Starts an **else** block
* `@elseif(condition)` - Start a **elseif** block
* `@endif` - Ends a **if** block
* `@foreach($list as $key => $val)` - Starts a **foreach** block
* `@endforeach` - Ends a **foreach** block
* `@for($i = 0; $i < 10; $i++)` - Starts a **for** block
* `@endfor` - Ends a **for** block
* `@while(condition)` - Starts a **while** block
* `@endwhile` - Ends a **while** block
* `@unless(condition)` - Starts an **unless** block
* `@endunless` - Ends an **unless** block
* `@include(file)` - Includes another template
* `@include(file, ['var' => $val,...])` - Includes a template, passing new variables.
* `@each('file',$list,'item')` - Renders a template on a collection
* `@each('file',$list,'item','empty')` - Renders a template on a collection or a different template if collection is empty.
* `@yield('section')` - Yields content of a section.
* `@show` - Ends section and yields its content
* `@lang('message')` - Outputs message from translation table
* `@choice('message', $count)` - Outputs message with language pluralization
* `@section('name')` - Starts a section
* `@stop` - Ends section
* `@endsection` - Ends section
* `@append` - Ends section and appends it to existing of section of same name
* `@overwrite` - Ends section, overwriting previous section of same name
{/solution}

{discussion}
See also the [Laravel Cheat Sheet](http://cheats.jesse-obrien.ca/)
{/discussion}
