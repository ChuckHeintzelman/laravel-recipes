---
Title:    Extending Blade Templates
Topics:   extension
Code:     Blade::extend()
Id:       238
Position: 5
---

{problem}
You want to extend your Blade templates with new functions.
{/problem}

{solution}
Use the `Blade::extend()` method.

Let's say you want to add a `@break` command in your blade template. You'd implement it with code similar to the following.

{php}
Blade::extend(function($value)
{
    return preg_replace('/(\s*)@break(\s*)/', '$1<?php break; ?>$2', $value);
});
{/php}

Then in your blade template you could use the break like so.

{html}
@foreach ($value_array as $value)
    @if ($value == 'end')
        @break;
    @endif
    {{ $value }}<br>
@endforeach
{/html}

This snippet of code would output a list of values, but stop as soon as a value equals the word `end`.
{/solution}

{discussion}
Where should you add your Blade template extensions?

Anywhere before your view executes. Service providers are a great place. You could always add them in `app/start/global.php` or another helper file. See [[Creating a Helpers File]].

{tip}
Be sure and clear your views after implementing a new Blade command. Just delete the files from `app/storage/views`. Blade templates are smart enough to recompile templates when they change, but not when you extend Blade templates. Thus the first time you use the extension you've created it's a good idea to clear the views.
{/tip}
{/discussion}
