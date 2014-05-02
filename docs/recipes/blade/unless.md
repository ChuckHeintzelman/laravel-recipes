---
Title:    Using the @unless Control Structure in Blade
Topics:   Blade
Code:     @endunless, @unless
Id:       85
Position: 5
---

{problem}
You need conditional logic in a Blade template.

You want to output html within the template when a condition is false. Yes, you know you can do `@if ( ! condition)`, but are curious if there's a more elegant way.
{/problem}

{solution}
Use the `@unless` control structure.

{html}
@unless ($age >= 18)
    You can't vote.
@endunless
{/html}
{/solution}

{discussion}
Pretty simple.

What Blade does internally is change your `@unless(condition)` into a `if ( ! condition)`.
{/discussion}
