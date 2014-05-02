---
Title:    Adding a New Namespace to the Message Loader
Topics:   localization
Code:     Lang::addNamespace()
Id:       258
Position: 7
---

{problem}
You want to add a new set of namespaced messages to your translator.
{/problem}

{solution}
Use the `Lang::addNamespace()` method.

{php}
$namespace = 'custom';
$path = app_path().'/storage/custom-messages';
Lang::addNamespace($namespace, $path);
{/php}

Now, assuming you had an `error.php` file in `app/storage/custom-messages/en` with the key `'test'`, then the following key would work.

{php}
echo Lang::get('custom::error.test');
{/php}
{/solution}

{discussion}
This method allows packages to have their own language files.

Most often a package will have a service provider, which will call an internal `package()` method in the service provider to register all the namespaces the package uses. The language files are just one of those registrations.

But if the package has no configuration or views, it may call this method directly. Most likely, if it's calling this method directly it's calling it at a low level using the `$this->app['translator']->addNamespace(...)` syntax.
{/discussion}
