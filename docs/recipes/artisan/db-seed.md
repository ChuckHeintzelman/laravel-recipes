---
Title:    Seeding Your Database
Topics:   artisan
Code:     -
Id:       69
Position: 17
---

{problem}
You want to seed your database.

You've already written your database seeds and now you want to tell Laravel to seed the database.
{/problem}

{solution}
Use the `php artisan db:seed` command.

{php}
$ php artisan db:seed
{/php}

If you're using a different class than default for the root seeder, you can use the `--class` option.

{php}
$ php artisan db:seed --class=MyDatabaseSeeder
{/php}
{/solution}

{discussion}
Seeding is usually done for testing.

It's a great way to generate a standard set of records on your development machine.
{/discussion}
