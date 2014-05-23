---
Title:    Emptying a Directory of All Files and Folders
Topics:   file system
Code:     File::cleanDirectory(), File::deleteDirectory()
Id:       150
Position: 26
---

{problem}
You want to empty a directory completely of it's contents.

But you want to retain the directory itself.
{/problem}

{solution}
Use the `File::cleanDirectory()` method.

{php}
$success = File::cleanDirectory($directory);
{/php}

The method will return `false` if the directory doesn't exist. Otherwise it returns `true` when complete.
{/solution}

{discussion}
This is a wrapper on `File::deleteDirectory()`.

It operates just as `File::deleteDirectory()` does but it always retains the directory instead of deleting it.

See [[Recursively Deleting a Directory]] for more details.
{/discussion}
