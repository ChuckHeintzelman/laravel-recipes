---
Title:    Interacting With Your Application
Topics:   artisan
Code:     -
Id:       280
Position: 27
---

{problem}
You want an easy way to interact with your application.
{/problem}

{solution}
Use the `php artisan tinker` command.

This command provides a REPL (Read-Eval-Print Loop) for PHP with your application's settings already loaded.

{text}
$ php artisan tinker
[1] > echo Config::get('app.url');
http:://your.app.url
[2] > exit;
{/text}

You can access the database, use models, etc.

{text}
$ php artisan tinker
[1] > $user = User::find(1);
->object(User)(
  'incrementing' => true,
  'timestamps' => true,
  'exists' => true
)
[2] > echo $user->name;
Chuck
[3] > exit;
{/text}
{/solution}

{discussion}
The tinker command uses _Boris_.

_Boris_ is a robust, little REPL for PHP. Check out their web page at [github.com/d11wtq/boris](https://github.com/d11wtq/boris).

{tip}
If the tinker command doesn't work for you, it is very likely the `disable_functions` setting in your `php.ini` contains the needed `pcntl_()` functions. Put a comment before this line in your `php.ini` and that should allow tinker to work.
{/tip}
{/discussion}
