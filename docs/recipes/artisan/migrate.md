---
Title:    Running Database Migrations
Topics:   artisan, migrations
Code:     -
Id:       65
Position: 13
---

{problem}
You want to run your database migrations.
{/problem}

{solution}
Use the `php artisan migrate` command.

{php}
$ php artisan migrate
{/php}

You'll see a list of what migrations ran.

If you just want to see what _would_ happen if you were to migrate, use the `--pretend` option.

{php}
$ php artisan migrate --pretend
{/php}

This will show you everything that would happen to your data, but doesn't actually make any changes.
{/solution}

{discussion}
You can seed your database too.

Use the `--seed` option and your database will be seeded after the migrations occur. That is, if you have any seeds set up.

See [[Seeding Your Database]] recipe.
{/discussion}
