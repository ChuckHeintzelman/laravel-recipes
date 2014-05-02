---
Title:    Clearing the Compiled Class
Topics:   artisan
Code:     -
Id:       59
Position: 7
---

{problem}
You want to clear the compiled classes.

You know that Larvel can optimize class loading and want to clear any optimizations for testing.
{/problem}

{solution}
Use the `php artisan clear-compiled' command.

{php}
$ php artisan clear-compiled
{/php}
{/solution}

{discussion}
This deletes two files:

1. The `bootstrap/compiled.php` file. This file is created when you optimize classes.
2. The `app/storage/meta/services.json` file. This file is created as Laravel tries to optimize the loading of the service providers your application uses.

See also [[Optimizing the Framework for Better Performance]].
{/discussion}
