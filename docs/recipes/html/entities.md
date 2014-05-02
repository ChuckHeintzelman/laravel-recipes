---
Title:    Converting a HTML String to Entities
Topics:   html
Code:     e(), HTML::entities(), htmlentities()
Id:       122
Position: 1
---

{problem}
You want to _"escape"_ html in your web page output.

You know you can use the PHP `htmlentities()` method, but want to do it the Laravel way.
{/problem}

{solution}
Use the `HTML::entities()` method.

{php}
echo HTML::entities('<h1>Title example</h1>');
{/php}

The above will convert the less than symbols to &amp;lt; and the greater than symbols to &amp;gt;

You can also use the helper function `e()`.

{php}
echo e('<h1>Title example</h1>');
{/php}

The above will produce the same output as the longer `HTML::entities()` method.
{/solution}

{discussion}
This method actually calls `htmlentities()`.

Specifically it calls `htmlentities($your_string, ENT_QUOTES, 'UTF-8', false)`.

This will convert quotes (both single and double), use UTF-8 as the character encoding and won't convert entities in the string already converted.
{/discussion}
