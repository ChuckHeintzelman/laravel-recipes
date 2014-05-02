---
Title:    Putting the Application in Maintenance Mode
Topics:   artisan
Code:     -
Id:       61
Position: 9
---

{problem}
You need to put your application in "maintenance" mode.

You're performing database updates, or other changes to your application and it'd be best if users couldn't access the system for a while.
{/problem}

{solution}
Use the `php artisan down` command.

This sets a flag on your application specifying it's in maintenance mode.

{php}
$ php artisan down
{/php}
{/solution}

{discussion}
Don't forget to handle maintenance mode.

See the [[Registering a Maintenance Mode Handler]] recipe.

What this command actually does is creates the empty file `app/storage/meta/down`. Existence of this file is the maintenance mode flag.

If your application runs on several machines in a web farm then you must use the `php artisan down` command on each machine.
{/discussion}
