---
Title:    Creating a Migration for Sessions
Topics:   artisan
Code:     -
Id:       70
Position: 18
---

{problem}
You need to create the table to store database sessions.
{/problem}

{solution}
Use the `php artisan session:table` command.

{php}
$ php artisan session:table
{/php}

Note that this only creates the migration, you'll still need to run the migration.

{php}
$ php artisan migrate
{/php}
{/solution}

{discussion}
This is only needed if you use database sessions.

If you change the driver in `app/config/session.php` to `database`, then you'll need to create the table to store your sessions in. This command accomplishes that.
{/discussion}
