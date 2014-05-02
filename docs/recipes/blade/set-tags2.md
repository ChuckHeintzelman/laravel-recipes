---
Title:    Setting the Escaped Content Tags Blade Uses
Topics:   -
Code:     Blade::setEscapedContentTags()
Id:       247
Position: 19
---

{problem}
You want to use different escaped content tags in your Blade template.

You know that blade uses `{{{` and `}}}` to specify content to be escaped and output, but you want to use something different.
{/problem}

{solution}
Use the `Blade::setEscapedContentTags()` method.

Let's say you want to use `[{{` and `}}]` for your tags. First call the method.

{php}
Blade::setContentTags('[{{', '}}]');
{/php}

Then your template can contain code like.

{html}
The value of $variable is [{{ $variable }}].
{/html}

`$variable` will pass through `HTML::entities()` before being output.
{/solution}

{discussion}
This actually calls `Blade::setContentTags()`.

It passes the third argument as `true`. See [[Setting the Content Tags Blade Uses]].
{/discussion}
