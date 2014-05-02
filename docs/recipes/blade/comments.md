---
Title:    Using Comments in Blade Templates
Topics:   Blade
Code:     -
Id:       86
Position: 6
---

{problem}
You want to comment your Blade code.

But you don't want the comments to appear in the resulting HTML code.
{/problem}

{solution}
Use Blade style comments.

Comments in blade begin with `{{--` and end with `--}}`. They can span multiple lines.

{html}
<html>
{{-- ----------------------------------------------------------------------
  -- Here's a big long comment block
  -- ----------------------------------------------------------------------
  --
  -- I want to document what this template does. Right now it only shows
  -- comments, but who knows? Maybe in the future it will do something else.
  --
  --}

  <body>
    {{-- of course, you can have single line comments too --}}
    Hey, punk.
  </body>
</html>
{/html}
{/solution}

{discussion}
Don't put PHP comments in your Blade comments.

Because Blade actually turns the `{{--` and `--}}` constructs into `/*` and `*/`. This means if you had the following comment, the text **"in your comment */"** would be output.

{text}
{{-- Don't put the closing PHP comment */ in your comment --}}
{/text}
{/discussion}
