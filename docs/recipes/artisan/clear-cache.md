---
Title:    Clearing the Application Cache
Topics:   artisan, cache
Code:     Cache::flush()
Id:       104
Position: 23
---

{problem}
You want to clear your application cache.
{/problem}

{solution}
Use the `php artisan cache:clear' command.

{php}
$ php artisan cache:clear
{/php}
{/solution}

{discussion}
This does two things.

1. `Cache::flush()` is called to empty the cache.
2. The `app/storage/meta/services.json` file is erased. This file is created
   as Laravel tries to optimize the loading of the service providers your
   application uses.

_Please note that since this command deletes a file from the local file system, if you have multiple servers running your application you must execute it on each server._
{/discussion}
