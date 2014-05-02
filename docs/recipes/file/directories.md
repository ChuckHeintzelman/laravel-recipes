---
Title:    Getting All the Directories in a Directory
Topics:   file system
Code:     File::directories()
Id:       146
Position: 22
---

{problem}
You want to get a list of all the directories with a directory.
{/problem}

{solution}
Use the `File::directories()` method.

{php}
$list = File::directories('/test');
echo "Test contains ", count($list), "directories.";
{/php}
{/solution}

{discussion}
The method returns an array of strings.

Each string is the full path to the subdirectories of the directory argument.

If the directory used as the argument contains no subdirectories an empty array is returned.

If the directory argument doesn't exist, an `InvalidArgumentException` will be thrown.
{/discussion}
