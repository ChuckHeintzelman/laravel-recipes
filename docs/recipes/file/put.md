---
Title:    Writing the Contents of a File
Topics:   file system
Code:     File::put()
Id:       130
Position: 6
---

{problem}
You want to create or replace a file's contents.
{/problem}

{solution}
Use the `File::put()` method.

{php}
$bytes_written = File::put($file, $contents);
if ($bytes_written === false)
{
    die("Error writing to file");
}
{/php}
{/solution}

{discussion}
This is a wrapper over PHP's `file_put_contents()`.
{/discussion}
