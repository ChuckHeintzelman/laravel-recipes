---
Title:    Changing Your Password Reminder Table
Topics:   authentication, configuration
Code:     -
Id:       78
Position: 12
---

{problem}
You want to use a different password reminder table.

You know Laravel is set up to use the `password_reminders` table by default, but you want a different table for your application.
{/problem}

{solution}
Edit your `app/config/auth.php` file.

{php}
    'reminder' => array(
        'table' => 'password_reminders',
    ),
{/php}

Change the table value to the table name you wish to use.
{/solution}

{discussion}
Don't forget to update your migrations.

If you're using artisan to create the table (see [[Creating a Migration for Password Reminders]]), make sure you update your migration.

Or you could create a migration for your table from scratch. See [[Creating a New Migration]].
{/discussion}
