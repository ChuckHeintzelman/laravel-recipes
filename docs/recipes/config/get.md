---
Title:    Retrieving a Specific Configuration Value
Topics:   configuration
Code:     Config::get()
Id:       9
Position: 3
---

{problem}
You want to access a configuration option.
{/problem}

{solution}
Use `Config::get()`.

To retrieve a specific configuration value.

{php}
$db_charset = Config::get('database.connections.mysql.charset');
{/php}

If the value doesn't exist, you can provide a default.

{php}
$default = Config::get('non.existant.config.key', 'I am default');
{/php}
{/solution}

{discussion}
Laravel caches configuration values within your request.

The first time you retrieve a value within a configuration group, the entire group's configuration values are loaded and merged with any environment specific overrides (see [[Environment Specific Configurations]]). These values remain within the current request until it terminates.

This means the next time you retrieve a configuration value for the group there's no need to load the value from the file system. The requested value  is quickly returned.
{/discussion}
