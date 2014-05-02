---
Title:    Displaying Laravel's Change Log
Topics:   artisan
Code:     -
Id:       4
Position: 4
---

{problem}
You want to see what's changed in the Laravel framework.

You've recently upgraded and are curious about what are the new features available to you.
{/problem}

{solution}
Use the `php artisan changes` command.

{bash}
$ php artisan changes
{/bash}

You'll see a list of the latest documented changes. Something similar to:

{text}
Changes For Laravel 4.1.x
-------------------------
-> Added new SSH task runner tools.
-> Allow before and after validation rules to reference other fields.
-> Added splice method to Collection class.
-> Rebuild the routing layer for speed and efficiency.
-> Added morphToMany relation for polymorphic many-to-many relations.
-> Make Boris available from Tinker command when available.
-> Allow route names to be specified on resources.
-> Collection `push` now appends. New `prepend` method on collections.
-> Use environment for log file name.
-> Use 'bit' as storage type for boolean on SQL Server.
-> Added QueryException with better formatted error messages.
-> Added 'input' method to Router.
-> Laravel now generates a single laravel.log file instead of many files.
-> Support passing Carbon instances into Cache put style methods.
-> Now using Stack\Builder in Application::run.
-> Added 'whereNotBetween' support to the query builder.
-> Allow passing a view name to paginator's 'links' method.
-> Added new hasManyThrough relationship type.
-> Cloned Eloquent query builders now clone the underlying query builder.
-> Controller method is now passed to missingMethod as first parameter.
-> New @append Blade directive for appending content onto a section.
-> Session IDs are now automatically regenerated on login.
-> Improve Auth::once to get rid of redundant database call.
{/text}
{/solution}

{discussion}
You can also show changes for a previous version.

Let's say you want to see the change log for version 4.0

{bash}
$ php artisan changes 4.0.x
{/bash}

{text}
Changes For Laravel 4.0.x
-------------------------
-> Added implode method to query builder and Collection class.
-> Fixed bug that caused Model->push method to fail.
-> Make session cookie HttpOnly by default.
-> Added mail.pretend configuration option.
{/text}

Viewing the change log is a great way to see the documented changes, but there are many, many changes that don't appear in the change log.

Visit [GitHub](https://github.com/laravel/framework/commits/master) to see the complete revision history.
{/discussion}
