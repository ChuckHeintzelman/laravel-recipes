---
Title:    Using @while Control structures in Blade
Topics:   Blade
Code:     @endwhile, @while
Id:       89
Position: 9
---

{problem}
You want to loop in your Blade template until a condition is met.
{/problem}

{solution}
Use the `@while` control structure.

{html}
<html>
<body>
  <p>An array of strings.</p>
  <ul>
    @while ($item = array_pop($items))
      <li>{{{ $item }}</li>
    @endforeach
  </ul>
</body>
</html>
{/html}
{/solution}

{discussion}
todo
{/discussion}
