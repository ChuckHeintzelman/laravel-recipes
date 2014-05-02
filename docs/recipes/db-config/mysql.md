---
Title:    Setting up the MySQL Database Driver
Topics:   configuration
Code:     -
Id:       58
Position: 1
---

{problem}
You want to use MySQL as your database.

This seems to be a popular choice, so you want to use it yourself.
{/problem}

{solution}
Edit the `app/config/database.php` configuration.

{php-lines}
<?php
return array(
    'fetch' => PDO::FETCH_CLASS,
    'default' => 'mysql',
    'connections' => array(
        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'your-hostname',
            'database'  => 'your-dbname',
            'username'  => 'your-username',
            'password'  => 'your-password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),
);
?>
{/php}
{/solution}

{discussion}
Laravel sets up MySQL as the default.

On a fresh install, the default configuration is for MySQL.

Here's the important points about the above configuration file.

Line 4

: The name `mysql` can be anything, as long as it matches a key in the `connections[]` array.

Line 6

: Here's the start of the configuration for the connection named `mysql`.

Line 8

: The hostname of your database. Very likely this is `localhost`.

Line 9

: The name of the database. Keep in mind you need to create this database outside Laravel.

Line 10 and 11

: Supply the username and password used for accessing your database.

#### See also

The [[Installing MySQL]] recipe.
{/discussion}
