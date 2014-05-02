---
Title:    Generating a HTML Link to an Asset
Topics:   html
Code:     HTML::link(), HTML::linkAsset()
Id:       188
Position: 8
---

{problem}
You want to create a link to one of your application's assets.

You could just use the anchor tag directly, but you're using a Blade template and want to do it the Laravel way.
{/problem}

{solution}
Use the `HTML::linkAsset()` method.

This method takes the exact arguments as `HTML::link()` (see [[Generating a HTML Link]]).
{/solution}

{discussion}
There's a small difference between links to web pages and links to assets.

Depending on your application's configuration, your web pages may have `index.php` at the start of the path. Assets never do.

When determining the URL for the asset, `HTML::linkAsset()` will strip away any `index.php` if it's there.
{/discussion}
