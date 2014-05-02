---
Title:    Setting Up the File Cache Driver
Topics:   configuration
Code:     Cache::decrement(), Cache::increment()
Id:       37
Position: 1
---

{problem}
You want to use the File driver for the Laravel Cache.

You know other caches are more efficient than using the file system, but you want to get going quickly.
{/problem}

{solution}
It should be pre-configured.

Laravel's default configuration uses the file cache driver. You can check the configuration by examining `app/config/cache.php`.  Look for the **driver** setting. It should look like what's below.

{php}
'driver' => 'file',
{/php}

If the setting is anything other than **file**, you can change it here. Or, if you're using [[Environment Specific Configurations]], you'll want to change this setting in your `app/config/{envname}/cache.php` file.
{/solution}

{discussion}
The file cache driver has some limitations.

Specifically, you cannot use the `Cache::increment()` and `Cache::decrement()` methods. And Cache Sections are not supported.
{/discussion}
