---
Title:    Creating a New Migration
Topics:   artisan, migrations
Code:     -
Id:       64
Position: 12
---

{problem}
You want to create a new database migration.

You understand that migrations are sort of a version control for your database and are ready to use them.
{/problem}

{solution}
Use the `php artisan migrate:make` command.

This command creates a skeleton migration template for you in the `app/database/migrations` directory. After issuing the command you can edit the newly created file and add any needed specifics. _(Such as additional fields, indexes, etc.)_

To create a new table, use the `--create` option.

{php}
$ php artisan migrate:make --create=users create_users_table
{/php}

To update an existing table, use the `--table` option.

{php}
$ php artisan migrate:make --table=users add_name_to_users
{/php}

If you want your migrations stored in a location other than `app/database/migrations` you can use the `--path` option to the command.
{/solution}

{discussion}
Migrations are powerful.

Using migrations will provide a history how your application's database has changed and grown over time.
{/discussion}
