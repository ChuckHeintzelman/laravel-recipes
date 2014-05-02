---
Title:    Creating a Laravel Project
Topics:   Composer
Code:     -
Id:       30
Position: 1
---

{problem}
You're ready to begin coding in Laravel.

You want to start a new Laravel project and don't know how to set things up for your new project.
{/problem}

{solution}
Use Composer to create a project.

{bash}
laravel:~$ composer create-project laravel/laravel myapp
{/bash}

This will take a few minutes to run, when finished an empty project will be created in the `myapp` directory.
{/solution}

{discussion}
This single Composer command does a lot.

The `create-project` command will create the standard Laravel directory structure with default files. It will automatically build the `composer.json` file, and then will download and install all the dependencies.

The directory structure created is as follows:

{text}
myapp : project directory
|- app : application directory
|---- commands : console commands
|---- config : configuration files
|---- controllers : where controllers go
|---- database : database stuff
|------- migrations : where migrations are stored
|------- seeds : where seeding logging is stored
|---- lang : language translations
|---- models : where models are stored
|---- start : application startup files
|---- storage : directories for disk storage
|------- cache : where cached data is stored
|------- logs : where logs are stored
|------- meta : meta information storage
|------- session : session storage area
|------- views : storage of assembled blade templates
|---- tests : unit tests
|---- views : blade templates
|- bootstrap : framework bootstrap files
|- public : document root for web applications
|- vendor : composer installed dependencies
{/text}
{/discussion}
