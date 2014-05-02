---
Title:    Creating the Migration Repository
Topics:   artisan, migrations
Code:     -
Id:       63
Position: 11
---

{problem}
You want to create the migration repository.

You know the migration repository holds a list of all your database migrations. Since you're ready to create some migrations you want to start by creating the repository.
{/problem}

{solution}
Use the `php artisan migrate:install` command.

{php}
$ php artisan migrate:install
{/php}
{/solution}

{discussion}
You don't really need to do this.

Laravel automatically creates the migration repository as needed. But if you want to check that it's created correctly, which is a good test that your database is configured right, then use the command.
{/discussion}
