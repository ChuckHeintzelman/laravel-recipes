---
Title:    Creating a Helpers File
Topics:   configuration
Code:     -
Id:       50
Position: 10
---

{problem}
You have common functions you want available for every request.

But you don't want to dirty up `app\start\global.php` with a bunch of functions.
{/problem}

{solution}
Create a `helpers.php` file.

First create the file `app/helpers.php`.

{php}
<?php
// My common functions
function somethingOrOther()
{
	return (mt_rand(1,2) == 1) ? 'something' : 'other';
}
?>
{/php}

Then either load it at the bottom of `app\start\global.php` as follows.

{php}
// at the bottom of the file
require app_path().'/helpers.php';
{/php}

Or change your `composer.json` file and dump the autoloader.

{javascript}
{
	"autoload": {
		"files": [
			"app/helpers.php"
		]
	}
}
{/javascript}

{bash}
$ composer dump-auto
{/bash}
{/solution}

{discussion}
You can have multiple types of helpers.

The standard Laravel setup has `app/filters.php` and `app/routes.php` but you can create whatever your application needs.

Here are some suggestions.

* `app/helpers.php` - For general purpose functions.
* `app/composers.php` - To initialize all your View composers in one place.
* `app/listeners.php` - To set up all your event listeners in one place.
* `app/observers.php` - Or, if you like **observers** better than **listeners** use this filename for event listeners.

It's really up to you and the demands of your application.
{/discussion}
