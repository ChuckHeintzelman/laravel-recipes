---
Title:    Changing Your Authentication Table
Topics:   authentication, configuration
Code:     config/auth.php
Id:       12
Position: 9
---

{problem}
You want your application's users in a different table than **users**.

Your application is using **database** authentication and needs to use a different table than Laravel's default `users` table.
{/problem}

{solution}
Edit `app/config/auth.php` to change the table.

{php}
  	'table' => 'administrators',
{/php}
{/solution}

{discussion}
Don't forget the required columns.

Whatever the authentication table is set to, it must contain an `id` column, a `password` column, and some other column to authentication the user with. This other column is typically either `email` or `username`.
{/discussion}
