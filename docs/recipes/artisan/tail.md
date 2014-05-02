---
Title:    Tailing a Log File on a Remote Server
Topics:   artisan
Code:     -
Id:       281
Position: 28
---

{problem}
You want to see the contents of your application's log file.

You'd like to view the log in real-time, seeing new entries as they occur.
{/problem}

{solution}
Use the `php artisan tail` command.

Using the command by itself will display the contents of `app/storage/logs/laravel.log` in your local application.

{bash}
$ php artisan tail
...
log contents
...
{/bash}

Press `Ctrl+C` to exit the log tail.

If you set up a remote connection in `app/config/remote.php`, you can use the tail command to view the log file on the remote machine.

{bash}
$ php artisan tail remote-name
...
log contents
...
{/bash}

Press `Ctrl+C` to exit the log tail.
{/solution}

{discussion}
For non-standard log files use the `--path` option.

{bash}
$ php artisan tail --path=/full/path/to/log.file
{/bash}
{/discussion}
