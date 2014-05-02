---
Title:    Generating a Link to a Javascript File
Topics:   html
Code:     HTML::script()
Id:       183
Position: 3
---

{problem}
You want your Blade template to load an external javascript file.

Instead of using `<script ...>` directly, you want to do this with the `HTML` facade.
{/problem}

{solution}
Use the `HTML::script()` method.

Just pass the path to the javascript file.

{html}
{{ HTML::script('js/functions.js') }}
{/html}

This produces the following HTML code.

{html}
<script src="http://your.url/js/functions.js"></script>
{/html}

If the file path you pass isn't a complete URL, Laravel will use your application's URL to build a complete URL.

You can pass additional attributes in an array as the second argument.

{html}
{{ HTML::script('js/functions.js', array('async' => 'async')) }}
{/html}

The attributes will be added to the script tag as the result below illustrates.

{html}
<script async="async" src="http://your.url/js/functions.js"></script>
{/html}
{/solution}

{discussion}
The `type` attribute of `<script>` tags is optional with HTML5.

But if your web page is still HTML 4.01, you should add the `"type" => "text/javascript"` to the attributes you pass this method.
{/discussion}
