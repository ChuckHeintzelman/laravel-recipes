---
Title:    Determining If a Configuration Group Exists
Topics:   configuration, environment
Code:     Config::hasGroup()
Id:       8
Position: 2
---

{problem}
You want to see if a configuration group exists.

You know Laravel organizes the configuration into groups and these groups are implemented as individual config files. For instance the `app/config/database.php` contains configuration for the _database_ group.

You want to see if the group even exists.
{/problem}

{solution}
Use `Config::hasGroup()`.

{php}
if (Config::hasGroup('session'))
{
	echo "I have a config/session.php file!";
}
{/php}
{/solution}

{discussion}
This only works for groups existing in the production environment.

In other words, if your environment is _local_ and you have a `app/config/local/shoes.php` file, but no top level `app/config/shoes.php` then the `Config::hasGroup("shoes")` statement will return `false`.
{/discussion}
