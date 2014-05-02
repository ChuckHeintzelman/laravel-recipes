---
Title:    Getting a File's Last Modification Time
Topics:   file system
Code:     File::lastModified()
Id:       139
Position: 15
---

{problem}
You need to know the last time a file was modified.
{/problem}

{solution}
Use the `File::lastModified()` method.

{php}
$timestamp = File::lastModified($filename);
if ($timestamp === false)
{
    die("Failure getting the time");
}
{/php}

The value returned is a Unix timestamp.
{/solution}

{discussion}
If there's an error, a warning message is emitted.

It's a good idea to make sure the file exists before getting the modification time. See [[Determining If a File Exists]].
{/discussion}
