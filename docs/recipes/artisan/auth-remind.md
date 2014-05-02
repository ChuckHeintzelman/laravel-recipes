---
Title:    Creating a Migration for Password Reminders
Topics:   artisan, authentication, password reminders
Code:     -
Id:       71
Position: 19
---

{problem}
You want to create a table to store password reminders.
{/problem}

{solution}
Use the `php artisan auth:reminders` command.

{php}
$ php artisan auth:reminders
{/php}

This creates a new migration which will create a `password_reminders` table.

After creating the migration, don't forget to run migrations to update your database with the new table.

{php}
$ php artisan migrate
{/php}
{/solution}

{discussion}
Laravel provides a skeleton for implementing password reminders.

You'll still need to fill in the details for your application. Creating the reminders table is only one of the steps.
{/discussion}
