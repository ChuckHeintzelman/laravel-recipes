---
Title:    Resetting and Re-running All Migrations
Topics:   artisan, migrations
Code:     -
Id:       68
Position: 16
---

{problem}
You want to reset and re-run all your migrations.

Maybe you've made some database changes by hand. You want to get your database to the exact structure a fresh install would have.
{/problem}

{solution}
Use the `php artisan migrate:refresh` command.

{php}
$ php artisan migrate:refresh
{/php}

To reseed the database when complete, you can use the `--seed` option.

{php}
$ php artisan migrate:refresh --seed
{/php}
{/solution}

{discussion}
This command saves a few steps.

Instead of issuing ...

{php}
$ php artisan migrate:reset
$ php artisan migrate
{/php}

This one command combines both functions.

{tip}
**Something to keep in mind.** When you clear all your migrations and run migrations again this creates a new migration set. A subsequent `migrate:rollback` will rollback all migrations performed in this set.
{/tip}
{/discussion}
