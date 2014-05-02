---
Title:    Optimizing the Framework for Better Performance
Topics:   artisan
Code:     -
Id:       60
Position: 8
---

{problem}
You want your application to run as quickly as possible.
{/problem}

{solution}
Use the `php artisan optimize' command.

{php}
$ php artisan optimize
{/php}

This will generate an optimized class loader.

If you're testing and `Config::get('app.debug')` is true, then you must use the `--force` option to force the class loader to be created.

{php}
$ php artisan optimize --force
{/php}
{/solution}

{discussion}
Add your own classes to be preloaded.

If your application has classes that are frequently used, you can add your own classes to the optimization process.

Just edit `app/config/compiled.php` and add the filenames of your own classes in.

{php}
<?php
return array(
    'app\MyApp\Respostitory\PeopleInterface.php',
    'app\MyApp\Reposititory\DatabasePeople.php',
    'app\MyApp\Controllers\HomeController.php',
);
?>
{/php}

Optimization creates a single file (`bootstrap/compiled.php`) containing all the classes with the comments removed.

#### One caveat about adding your own classes

If you're using namespaces, be sure and `use` any classes at the top of your files. Failure to do so can generate errors.

For instance, let's say you have a controller class you're putting in the compiled list for optimizaton.

{php}
<?php namespace MyApp\Controllers;

class HomeController extends \Controller {
    ...
}
?>
{/php}

This file will generate an error. This is because of multiple namespaces in the single, optimized file. If you add `use Controller;` then there won't be an issue.

{php}
<?php namespace MyApp\Controllers;

use Controller;

class HomeController extends Controller {
    ...
}
?>
{/php}

Notice the differences?
{/discussion}
