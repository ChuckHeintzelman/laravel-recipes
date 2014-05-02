---
Title:    Copying a Directory From One Location to Another
Topics:   file system
Code:     File::copyDirectory()
Id:       148
Position: 24
---

{problem}
You want to copy an entire directory to another location.

You want to copy it recursively, all files and subdirectories, to the new location.
{/problem}

{solution}
Use the `File::copyDirectory()` method.

{php}
$success = File::copyDirectory($sourceDir, $destinationDir);
{/php}

The method will return `true` if all files and subdirectories are successfully copied.

If the destination directory doesn't exist it will be created. It will be created recursively as needed.
{/solution}

{discussion}
There's an optional third argument.

Internally, the `File::copyDirectory()` method uses PHP's `FilesystemIterator` class to scan the files and directories to copy. The `FilesystemIterator` takes flags as a second parameters. You can pass a third argument to `File::copyDirectory()` which gets passed along to the `FilesystemIterator` constructor. By default, `File::copyDirectory()` uses the `SKIP_DOTS` constant.

_This means files beginning with dots are not copied._

{warn}
Be careful using this third option. The `File::copyDirectory()` method may not behave as expected unless you understand well how the `FilesystemIterator` is used for directory traversal.
{/warn}
{/discussion}
