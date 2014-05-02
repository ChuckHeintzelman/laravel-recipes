---
Title:    Using @for Control Structures in Blade
Topics:   Blade
Code:     @endfor, @for
Id:       87
Position: 7
---

{problem}
You want to use loops in your Blade template.
{/problem}

{solution}
Use the `@for` control structure.

{html}
<html>
<body>
  <p>I can count to 10.</p>
  @for ($i = 1; $i <= 10; $i++)
    <p>{{ $i }}</p>
  @endfor
</body>
</html>
{/html}
{/solution}

{discussion}
It's just like PHP's `for` statement.

But prettier without that ugly `<?php` tag before it.
{/discussion}
