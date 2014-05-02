---
Title:    Recursively Deleting a Directory
Topics:   file system
Code:     File::deleteDirectory(), File::exists()
Id:       149
Position: 25
---

{problem}
You want to delete the contents of a directory.

You want to delete everything recursively, all files and subdirectories.
{/problem}

{solution}
Use the `File::deleteDirectory()` method.

{php}
$success = File::deleteDirectory($directory);
{/php}

The method will return `false` if the directory doesn't exist. Otherwise it returns `true` when complete.

If you want to preserve the top level directory, pass a second argument.

{php}
$success = File::deleteDirectory($directory, true);
{/php}

This will keep `$directory` itself from being removed.
{/solution}

{discussion}
This method can quietly fail.

If there's an issue deleting one of the files, this method has the potential of failing quietly. It can return `true` even if one or more files are not actually deleted.

If you're not preserving the top level directory, you can always perform a quick `File::exists()` check on the directory to verify everything's been deleted.
{/discussion}
