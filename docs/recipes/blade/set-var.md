---
Title:    Assigning a Variable in a Blade Template
Topics:   -
Code:     -
Id:       256
Position: 23
---

{problem}
You want to assign a variable in a Blade template.
{/problem}

{solution}
Blade does not provide a command to do this.

The idea is to cleanly separate logic from presentation. But in the case where it's more expedient to assign a variable in a template, here's a couple tricks.

You can always use the PHP tags.

{html}
<?php $var = 'test'; ?>
{{ $var }}
{/html}

Or, you can use a Blade comment with a special syntax.

{html}
{{--*/ $var = 'test' /*--}}
{{ $var }}
{/html}

This second method works because Blade comments get translated in the format below.

{php}
<?php /*COMMENT*/ ?>
{/php}

Thus, the above variable assignment gets translated to the following PHP code.

{php}
<?php /**/ $var = 'test' /**/ ?>
{/php}

See [[Using Comments in Blade Templates]].
{/solution}

{discussion}
You also extend Blade adding a new command, such as `@setvar`.

See the [[Extending Blade Templates]] recipe.
{/discussion}
