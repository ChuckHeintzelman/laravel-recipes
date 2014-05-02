---
Title:    Using @foreach Control Structures in Blade
Topics:   Blade
Code:     @endforeach, @foreach
Id:       88
Position: 8
---

{problem}
You want to loop through an array in your Blade template.
{/problem}

{solution}
Use the `@foreach` control structure.

{html}
<html>
<body>
  <p>A list of items.</p>
  <ul>
    @foreach ($items as $item)
      <li>{{{ $item }}</li>
    @endforeach
  </ul>
</body>
</html>
{/html}

Just like PHP, you can loop with the key.

{html}
<html>
<body>
  <p>A dictionary.</p>
  <dl>
    @foreach ($dict as $word => $meaning)
      <dt>{{{ $word }}}</dt>
      <dd>{{{ $meaning }}</dd>
    @endforeach
  </dl>
</body>
</html>
{/html}
{/solution}

{discussion}
Beware undefined variables.

Just like PHP, if either `$items` (in the first example) or `$dict` (in the second example) are not defined, a warning message will be output.
{/discussion}
