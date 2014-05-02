---
Title:    Retrieving All the Configuration Items
Topics:   configuration
Code:     Config::get(), Config::getItems()
Id:       40
Position: 5
---

{problem}
You want to see all your configuration items.

You suspect something isn't configured correctly and want to get a list of all configuration items.
{/problem}

{solution}
Use `Config::getItems()`

This method will return a multi-dimensional array of all **loaded** configuration settings.

{php}
// Dump all loaded configuration items
var_dump(Config::getItems())
{/php}

If you want to see the configuration settings for a particular group, use `Config::get('groupname')`.

{php}
// Dump all the database settings
var_dump(Config::get('database'));
{/php}
{/solution}

{discussion}
Remember `Config::getItems()` only outputs loaded items.

If your request never accessed a queue configuration option, then the entire _queue_ group will be missing from the array.

To remedy this, you simply need to access a single option in the group.

{php}
Config::get('queue.driver');

// Now the queue group will also be in the output
var_dump(Config::getItems());
{/php}
{/discussion}
