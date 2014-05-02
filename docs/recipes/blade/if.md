---
Title:    Using @if Control Structures in Blade
Topics:   Blade
Code:     @else, @elseif, @endif, @if
Id:       84
Position: 4
---

{problem}
You need conditional logic in a Blade template.
{/problem}

{solution}
Use the `@if` control structure.

{html}
@if ($age < 6)
    Get outta here kid.
@elseif ($age < 21)
    You can't buy booze in the United States.
    Ha ha.
@else
    Buy me a drink?
@endif
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
