---
Title:    Running PHP's Built-in Web Server
Topics:   artisan
Code:     -
Id:       282
Position: 29
---

{problem}
You want to quickly test your Laravel application.

But you don't want to set up a web server.
{/problem}

{solution}
Use the `php artisan serve` command.

{bash}
$ php artisan serve
Laravel development server started on http://localhost:8000
{/bash}

Now you can point your browser to `http://localhost:8000` and see your application.

Press `Ctrl-C` to stop the server.
{/solution}

{discussion}
Use the `--port` option to specify a different port.

If you want a port other than default, just specify it.

{bash}
$ php artisan serve --port=8080
Laravel development server started on http://localhost:8080
{/bash}
{/discussion}
