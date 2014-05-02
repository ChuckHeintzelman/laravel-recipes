---
Title:    Creating a Directory
Topics:   file system
Code:     File::makeDirectory()
Id:       147
Position: 23
---

{problem}
You want to create a directory.
{/problem}

{solution}
Use the `File::makeDirectory()` method.

There's multiple arguments you can use.

You can create a directory using defaults.

{php}
$result = File::makeDirectory('/path/to/directory');
{/php}

This will return true if `directory` was able to be created in the `/path/to` directory. The file mode of the created directory is `0777`.

You can specify the mode.

{php}
$result = File::makeDirectory('/path/to/directory', 0775);
{/php}

This will return true if `directory` was able to be created in the `/path/to` directory. The file mode of the created directory will be `0775`.

You can also create the directories recursively.

{php}
$result = File::makeDirectory('/path/to/directory', 0775, true);
{/php}

This will attempt to create `/path` if it doesn't exist. Then `/path/to` if it doesn't exist. And finally `/path/to/directory` if it doesn't exist. If all created directories are successfully created then `true` will be returned.
{/solution}

{discussion}
There's also a seldom used 4th option.

{php}
$result = File::makeDirectory('/path/to/directory', 0775, true, true);
{/php}

This last option is `$force` and if true it will suppress any errors output on failure.
{/discussion}
