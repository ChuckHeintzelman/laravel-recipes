---
Title:    Generating a Link to a CSS File
Topics:   html
Code:     HTML::style()
Id:       184
Position: 4
---

{problem}
You want to add a link to a CSS file in your Blade template.
{/problem}

{solution}
Use the `HTML::style()` method.

You can just pass the path to the style sheet.

{html}
{{ HTML::style('css/style.css') }}
{/html}

This will add the following HTML.

{html}
<link media="all" type="text/css" rel="stylesheet"
  href="http://your.url/css/style.css">
{/html}

If the file path you pass isn't a complete URL, Laravel will use your application's URL to build a complete URL.

You can pass additional attributes in an array as the second argument. This also allows you to override the default attributes

{html}
{{ HTML::style('css/style.css', array('media' => 'print')) }}
{/html}

Now the media is `"print"` instead of the default `"all"`.

{html}
<link media="print" type="text/css" rel="stylesheet"
  href="http://your.url/css/style.css">
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
