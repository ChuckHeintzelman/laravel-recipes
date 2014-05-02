---
Title:    Listing Your Routes
Topics:   artisan, routes
Code:     -
Id:       5
Position: 6
---

{problem}
You want a quick way to list your routes.

Yes, you know you can look at the `app/routes.php` file, but it'd be nice to see a clean, table-like list showing you all the routes.
{/problem}

{solution}
Use the `php artisan routes` command.

{bash}
$ php artisan routes
{/bash}

You will then see all of your routes, nicely displayed on your console.

Here's a partial list of routes running the [laravel-recipes](http://laravel-recipes.com) site _(edited to fit on small screens)_.
{text}
+---------------------------+-------------------------+----------------+
| URI                       | Action                  | Before Filters |
+---------------------------+-------------------------+----------------+
| GET /                     | PageController@home     | cache.get      |
| GET contents              | PageController@contents | cache.get      |
| GET faq                   | PageController@faq      | cache.get      |
| GET topics                | PageController@topics   | cache.get      |
| GET codes                 | PageController@codes    | cache.get      |
+---------------------------+-------------------------+----------------+
{/text}
{/solution}

{discussion}
You can also filter the list.

To filter and only show the routes beginning with **ho** try this.

{bash}
$ php artisan routes --name=ho
{/bash}

Or to filter the routes by path, you can use the `--path=` option.

{bash}
$ php artisan routes --path=c
{/bash}

This will display all your routes with paths beginning the letter **c**.
{/discussion}
