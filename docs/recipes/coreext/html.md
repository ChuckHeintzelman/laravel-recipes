---
Title:    Creating HTML Macros
Topics:   html
Code:     HTML::attributes(), HTML::decode(), HTML::email(),
          HTML::entities(), HTML::image(), HTML::link(), HTML::linkAction(),
          HTML::linkAsset(), HTML::linkRoute(), HTML::linkSecureAsset(),
          HTML::macro(), HTML::mailto(), HTML::obfuscate(), HTML::ol(),
          HTML::script(), HTML::secureLink(), HTML::style(), HTML::ul()
Id:       181
Position: 3
---

{problem}
You'd like to extend the `HTML` facade with additional functionality.
{/problem}

{solution}
Use the `HTML::macro()` method.

`HTML::macro()` allows you to extend the `HTML` facade with your own methods.

First you register a macro, then later you can access the macro as you would any of the `HTML` methods.

Let's say you add the following code to your `app/start/global.php` file.

{php}
HTML::macro('sumthin', function()
{
    return '<sumthin>default</sumthin>';
});
{/php}

Then later, in a Blade template, you can access it.

{html}
{{ HTML::sumthin() }}
{/html}

This would output the following.

{html}
<sumthin>default</sumthin>
{/html}

#### Add macros that take arguments

Let's update the `sumthin` macro to take three arguments. First the implementation.

{php}
HTML::macro('sumthin', function($value, $count = 10, $start = 1)
{
    $build = array();
    while ($count > 0)
    {
        $build[] = sprintf('<sumthin index="%s">%s</sumthin>',
          $start, $value);
        $start += 1;
        $count -= 1;
    }
    return join("\n", $build);
});
{/php}

Now `HTML::sumthin()` has one required argument and two optional ones. If you don't pass the required argument, Laravel will generate an error.

Use it in a template.

{html}
{{ HTML::sumthin('test', 5) }}
{/html}

The output would be.

{html}
<sumthin index="1">test</sumthin>
<sumthin index="2">test</sumthin>
<sumthin index="3">test</sumthin>
<sumthin index="4">test</sumthin>
<sumthin index="5">test</sumthin>
{/html}
{/solution}

{discussion}
Examine the source code.

If you look at `HtmlBuilder.php` in your `vendor/laravel/src/Illuminate\Html` directory you can see several undocumented public methods of the `HTML` facade that you can use in your macros.

Your macro code doesn't have access to `$this`, but you can call any of the following handy methods:

* `HTML::entities()` - See [[Converting a HTML String to Entities]].
* `HTML::decode()` - See [[Decoding HTML Entities to a String]].
* `HTML::script()` - See [[Generating a Link to a Javascript File]].
* `HTML::style()` - See [[Generating a Link to a CSS File]].
* `HTML::image()` - See [[Generating an HTML Image Element]].
* `HTML::link()` - See [[Generating a HTML Link]].
* `HTML::secureLink()` - See [[Generating a Secure HTML Link]].
* `HTML::linkAsset()` - See [[Generating a HTML Link to an Asset]].
* `HTML::linkSecureAsset()` - See [[Generating a Secure HTML Link to an Asset]].
* `HTML::linkRoute()` - See [[Generating a HTML Link to a Named Route]].
* `HTML::linkAction()` - See [[Generating a HTML Link to a Controller Action]].
* `HTML::mailto()` - See [[Generating a HTML Link to an Email Address]].
* `HTML::email()` - See [[Obfuscating an Email Address]].
* `HTML::ol()` - See [[Generating an Ordered List of Items]].
* `HTML::ul()` - See [[Generating an Unordered List of Items]].
* `HTML::attributes()` - See [[Bulding an HTML Attribute String From an Array]].
* `HTML::obfuscate()` - See [[Obfuscating a String]].

You even can call other macros from your macro.
{/discussion}
