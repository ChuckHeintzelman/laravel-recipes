---
Title:    Clearing Expired Password Reminders
Topics:   artisan, authentication, password reminders
Code:     -
Id:       72
Position: 20
---

{problem}
Your password reminders table is getting large.

Lots of records exist in the table.
{/problem}

{solution}
Use the `php artisan auth:clear-reminders` command.

This will clear out any expired tokens from the `password_reminders` table.

{php}
$ php artisan auth:clear-reminders
{/php}
{/solution}

{discussion}
Run this command periodically.

You may even want to have a cron job run this once a day or once a week.
{/discussion}
