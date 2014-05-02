---
Title:    Getting a List of All Files in a Directory
Topics:   file system
Code:     File::files()
Id:       144
Position: 20
---

{problem}
You want to pull a list of all files in a directory.
{/problem}

{solution}
Use the `File::files()` method.

{php}
$files = File::files();
{/php}
{/solution}

{discussion}
This method always returns an array.

The array only contains files, no directories.

If no files are found in the directory, or the directory doesn't exist, an empty array is returned.
{/discussion}
