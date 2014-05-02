---
Title:    Rolling Back All Database Migrations
Topics:   artisan, migrations
Code:     -
Id:       67
Position: 15
---

{problem}
You want to undo all database migrations.

You want a clean database, with no tables in it.
{/problem}

{solution}
Use the `php artisan migrate:reset`.

{php}
$ php artisan migrate:reset
{/php}

You can use the `--pretend` option to see what would happen without affecting any data.

{php}
$ php artsian migrate:reset --pretend
{/php}
{/solution}

{discussion}
This is like calling `migrate:rollback` over and over again.

In fact, you could repeatedly call `php artisan migrate:rollback` and there's nothing left to rollback.

The only table left in your database when this command completes is the `migrations` table and it will be empty.
{/discussion}
