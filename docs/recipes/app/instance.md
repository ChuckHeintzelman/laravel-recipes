---
Title:    Storing a Value in the IoC Container
Topics:   IoC container
Code:     app(), App::instance(), App::make()
Id:       3
Position: 3
---

{problem}
You want to store a value in the IoC container

You understand the IoC container is an integral part of Laravel's core and would like to store a value in it, making the value available to another area of your application.
{/problem}

{solution}
Use `App::instance()`

{php}
$is_evening = (date('G') > 18) ? true : false;
App::instance('myapp.evening', $is_evening);
{/php}

You can later access your value with `App::make('myapp.evening')` or even `app('myapp.evening')`.
{/solution}

{discussion}
The IoC container is more than a dependency resolver

Of course, resolving dependencies is where the IoC container shines, but you can store anything in it.

Be careful your key doesn't conflict with one of Laravel's built-in keys. Don't use values such as 'view', 'log', or 'event'. There's a long list of values not to use, here's just a partial list:

_view, exception.plain, env, exception, encrypter, view.engine.resolver, events, files, session.store, db, whoops.handler, redirect, router, url, command.workbench, cookie, package.creator, exception.debug, whoops, view.finder, db.factory, session_

It's probably best to have all your application keys begin with something specific to your application, such as **`'myapp.'`**.
{/discussion}
