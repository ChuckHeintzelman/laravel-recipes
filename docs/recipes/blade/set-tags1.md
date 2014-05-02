---
Title:    Setting the Content Tags Blade Uses
Topics:   -
Code:     Blade::setContentTags()
Id:       246
Position: 18
---

{problem}
You want to use different content tags in your Blade template.

You know that blade uses `{{` and `}}` to specify content to be output, but this conflicts with Mustache or some other library you're using.
{/problem}

{solution}
Use the `Blade::setContentTags()` method.

Let's say you want to use `[%` and `%]` for your tags. First call the method.

{php}
Blade::setContentTags('[%', '%]');
{/php}

Then your template can contain code like.

{html}
The value of $variable is [% $variable %].
{/html}

You can also pass a second argument as `true` to indicate you're setting the tags to escape content.

{php}
Blade::setContentTags('[-%', '%-]', true);
{/php}

Then instad of using `{{{` and `}}}` you can use `[-%` and `%-]`.

{html}
The value of $variable is [-% $variable %-].
{/html}
{/solution}

{discussion}
You must call `Blade::setContentTags()` before using a view.

The two best places to call this are in a service provider or in `app/start/global.php`.
{/discussion}
