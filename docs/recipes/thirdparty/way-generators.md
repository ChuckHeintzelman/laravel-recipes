---
Title:    Speeding up Development with Generators
Topics:   -
Code:     -
Id:       116
Position: 1
---

{problem}
You'd like to speed up your development workflow by using generators.
{/problem}

{solution}
Install [Laravel 4 Generators](https://github.com/JeffreyWay/Laravel-4-Generators) by Jeffrey Way.

#### Step 1 - Update composer.json

Edit your project's `composer.json` to require `way/generators`.

{javascript}
"require": {
    "laravel/framework": "4.0.*",
    "way/generators": "dev-master"
},
"minimum-stability": "dev"
{/javascript}

#### Step 2 - Update your project with composer.

{bash}
$ composer update
{/bash}

#### Step 3 - Add the service provider

Open `app/config/app.php` and adding the new line to the bottom of the providers array.

{text}
'Way\Generators\GeneratorsServiceProvider',
{/text}

Now, the artisan command will have a bunch of new *generate* commands for you to use.
{/solution}

{discussion}
Check out Laravel-4-Generators on [Github](https://github.com/JeffreyWay/Laravel-4-Generators). There's lot's of good information there.

Here's a synopsis of each new command.

* `php artisan generate:migration` - This expands the Laravel's built-in migration generator by allowing you to specify fields on the command line and automatically creating the schema for you.
* `php artisan generate:model` - This creates a boilerplate for an Eloquent model.
* `php artisan generate:controller` - This creates a boilerplate for a Controller.
* `php artisan generate:seed` - This generates a seed file for a table for you. All you need to do is add the data to seed.
* `php artisan generate:view` - This will create a boilerplate view for you.
* `php artisan generate:resource` - This is a powerful generator. It calls all the other generators to create everything needed for a resource.
* `php artisan generate:scaffold` - Like `generate:resource` but creates all of the boilerplate for listing, editing, creating, and viewing a resource.
* `php artisan generate:form` - This creates a form for you based on a model.
* `php artisan generate:test` - This creates a boilerplate unit test file for you.
* `php artisan generate:pivot` - This generates the schema for a pivot table between two related tables.
{/discussion}
