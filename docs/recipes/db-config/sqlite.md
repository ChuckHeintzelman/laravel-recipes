---
Title:    Setting up the SQLite Database Driver
Topics:   configuration, SQLite
Code:     -
Id:       118
Position: 2
---

{problem}
You want to use SQLite as your database.

You know SQLite is a "server-less" database and don't want to bother with setting up a database server.
{/problem}

{solution}
Edit the `app/config/database.php` configuration.

{php-lines}
<?php
return array(
    'default' => 'sqlite',
    'connections' => array(
        'sqlite' => array(
            'driver'   => 'sqlite',
            'database' => __DIR__.'/../database/production.sqlite',
            'prefix'   => '',
        ),
    ),
);
?>
{/php}
{/solution}

{discussion}
You must have the PHP Driver installed. See [[Installing SQLite]] for setting up the PHP driver.

In the above configuration example, line #7 points to your database. You may want to change this to your `app/storage` directory.

{php}
'database' => app_path() . '/storage/production.sqlite',
{/php}

Or even create a folder within the storage directory.

{bash}
$ mkdir app/storage/databases
{/bash}

Be sure to update your configuration to the new location.

{php}
'database' => app_path() . '/storage/databases/production.sqlite',
{/php}
{/discussion}
