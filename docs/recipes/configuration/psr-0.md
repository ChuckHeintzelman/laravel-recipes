---
Title:    Using a PSR-0 Directory Structure
Topics:   configuration, psr-0
Code:     -
Id:       46
Position: 9
---

{problem}
You have too much code in `app/models` and `app/controllers`.

Your application is growing and there's too many files in the few directories Laravel initially provides.
{/problem}

{solution}
Use a PSR-0 directory structure.

First edit `composer.json` and update the autoload section.

{javascript}
{
    "autoload": {
        "psr-0": {
            "MyApp": "app/"
        },
        "classmap": [
            "app/commands",
            "app/database/migrations"
            "app/database/seeds",
            "app/tests/TestCase.php"
        ]
    }
}
{/javascript}

Here you should remove any directories you will no longer be using from the `"classmap"` section and add the `"psr-0"` section specifying your application name.

Then regenerate the autoload files.

{bash}
$ composer dump-auto
{/bash}

That's it, now you can use namespaces and build a hierarchy of classes.
{/solution}

{discussion}
An example class.

Let's say you have a controller for the above app to handle miscellaneous pages. You might have a file in `app/MyApp/Controllers` named `MiscController.php`. This file would look something like.

{php-lines}
<?php namespace MyApp\Controllers;

class MiscController extends \Controller {
    // methods go here
}
?>
{/php}

Line 1

: Here you're establishing the namespace.

Line 3

: And you're naming the class `MiscController`. You'll be able to access this class anywhere in your application using the full `MyApp\Commands\MiscController` namespace.

The nice thing about PSR-0 is the question "Where do I put my code?" becomes "How do I want to organize my classes?"
{/discussion}
