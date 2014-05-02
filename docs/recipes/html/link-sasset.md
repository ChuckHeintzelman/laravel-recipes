---
Title:    Generating a Secure HTML Link to an Asset
Topics:   html
Code:     HTML::linkAsset(), HTML::linkSecureAsset(), HTML::secureLink()
Id:       189
Position: 9
---

{problem}
You want to use a HTTPS link to an asset within your Blade template.
{/problem}

{solution}
Use the `HTML::linkSecureAsset()` method.

This method takes the exact arguments as `HTML::secureLink()` (see [[Generating a Secure HTML Link]]).
{/solution}

{discussion}
There's a small difference between links to web pages and links to assets.

Depending on your application's configuration, your web pages may have `index.php` at the start of the path. Assets never do.

When determining the URL for the asset, `HTML::linkSecureAsset()` will strip away any `index.php` if it's there.

This method is a wrapper for `HTML::linkAsset()`, but it always passes `true` as the fourth argument to `HTML::linkAsset()`. See [[Generating a HTML Link to an Asset]] for details.
{/discussion}
