---
Title:    Displaying a Variable in a Blade Template
Topics:   Blade
Code:     -
Id:       36
Position: 3
---

{problem}
You want to echo the contents of a variable on a web page.

Instead of using `<?php echo $variable; ?>`, you're using Blade templates and want to know the Blade way of doing it.
{/problem}

{solution}
Use the curly brace syntax to display the variable.

#### Simple Syntax

Two curly braces use the *Echo* syntax in a Blade template.

Example:

{html}
<html>
  <body>
    Hello {{ $name }}
  </body>
</html>
{/html}

If `$name = 'Chuck'` the above will output **Hello Chuck** in the body area.

#### Syntax for Escaping

If you want to escape a value when outputting it, use triple braces instead of double braces.

{html}
<html>
  <body>
    Hello {{{ $name }}}
  </body>
</html>
{/html}

This will run the output through `htmlentities()` before outputting it on the web page.

#### Syntax for Defaulting a Variable

If the variable doesn't exist, you can use the following technique.

{html}
<html>
  <body>
    Hello {{{ $name or 'No name' }}}
  </body>
</html>
{/html}

In this last example if the variable `$name` isn't set then **No name** will be output.

#### Syntax for Display the curly braces.

What if you want to display the curly braces around text? Just add the `@` symbol before the curly braces.

{html}
<html>
  <body>
    @{{ This is displayed WITH the braces on each side }}
  </body>
</html>
{/html}
{/solution}

{discussion}
This is pretty basic. No need to discuss.
{/discussion}
