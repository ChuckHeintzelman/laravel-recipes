---
Title:    Rolling Back the Last Database Migration
Topics:   artisan, migrations
Code:     -
Id:       66
Position: 14
---

{problem}
You want to "undo" your last database migration.
{/problem}

{solution}
Use the `php artisan migrate:rollback` command.

{php}
$ php artisan migrate:rollback
{/php}

The command will list the migrations which have been undone.

To see what rollback will do, use the `--pretend` option.

{php}
$ php artisan migrate:rollback --pretend
{/php}

You can also specify a database connection other than the default one.

{php}
$ php artisan migrate:rollback --pretend --database=other-one
{/php}
{/solution}

{discussion}
This command will undo the last "set" of migrations.

If the previous time you ran `php artisan migrate` ended up performing three different migrations, then `php artisan migrate:rollback` will undo those three migrations.

This encourages small, incremental changes to your database.
{/discussion}
