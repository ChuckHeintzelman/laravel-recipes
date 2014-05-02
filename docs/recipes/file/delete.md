---
Title:    Deleting a File
Topics:   file system
Code:     File::delete(), File::exists(), unlink()
Id:       133
Position: 9
---

{problem}
You want to delete a file on the filesystem.

You know you could use PHP's `unlink()` method, but want to do it the Laravel way.
{/problem}

{solution}
Use the `File::delete()` method.

{php}
// Delete a single file
File::delete($filename);

// Delete multiple files
File::delete($file1, $file2, $file3);

// Delete an array of files
$files = array($file1, $file2);
File::delete($files);
{/php}
{/solution}

{discussion}
Errors are quietly ignored.

If there's a problem deleting the file, any error is silently ignored. If it's important that a file was deleted, check it's existence after deleting it with `File::exists()`.
{/discussion}
