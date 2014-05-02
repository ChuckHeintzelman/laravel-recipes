---
Title:    Bringing the Application Out of Maintenance Mode
Topics:   artisan
Code:     -
Id:       62
Position: 10
---

{problem}
You need to bring your application out of "maintenance" mode.

You've been in maintenance mode and are ready to make your application live.
{/problem}

{solution}
Use the `php artisan up` command.

This clears a flag on your application specifying it's no longer in maintenance mode.

{php}
$ php artisan up
{/php}
{/solution}

{discussion}
This command deletes a file.

What this command actually does is delete the file `app/storage/meta/down`.
{/discussion}
