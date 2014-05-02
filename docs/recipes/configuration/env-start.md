---
Title:    Using Environment Specific Start Files
Topics:   artisan, configuration, environment
Code:     -
Id:       29
Position: 6
---

{problem}
You have startup code that should only execute in a specific environment.

You understand how to configure different environments, but you need execute special code depending on your environment.
{/problem}

{solution}
Create an environment specific start file.

Let's say your machine is configured where the environment equals `foo`. If you create `app/start/foo.php` with the following content.

{php}
<?php
die("I'm in app/start/foo.php");
?>
{/php}

Then every request will die with that message. Every request where Laravel determines your environment is `foo`, that is.

First Laravel will load `app/start/global.php`. Then, if your environment is `foo`, Laravel will see if `app/start/foo.php` exists and execute it if it does.
{/solution}

{discussion}
About the other start files.

Laravel provides an empty `app/start/local.php` anticpating you'll have a local environment.

The `app/start/artisan.php` file is only loaded when `artisan` runs. Typically, it contains initialization code for console commands your application provides.

If you want additional code loaded when unit testing, create an `app/start/testing.php` file with the code.

#### When are these files loaded?

The point in the request lifecycle these files are loaded are after the framework is booted. See **Calls booted callbacks** in The Booting Steps portion of [[Understanding the Request Lifecycle]].
{/discussion}
