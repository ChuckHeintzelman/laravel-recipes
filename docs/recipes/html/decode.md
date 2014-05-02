---
Title:    Decoding HTML Entities to a String
Topics:   html
Code:     HTML::decode(), HTML::entities()
Id:       182
Position: 2
---

{problem}
You have a string encoded by `HTML::entities()` and want to decode it back to the original string.
{/problem}

{solution}
Use the `HTML::decode()` method.

This is the opposite of `HTML::entities()`. For example.

{php}
$string HTML::decode('&amp;lt;h1&amp;gt;Hello&amp;lt;/h1&amp;gt;');
{/php}

In this example `$string` will equal "&lt;h1&gt;Hello&lt;/h1&gt;";
{/solution}

{discussion}
This method wraps the PHP `html_entity_decode()` function.

Specifically it calls `html_entity_decode($value, ENT_QUOTES, 'UTF-8')`. These options compliment the ones passed to `htmlentities()` by the `HTML::entities()` method.
{/discussion}
