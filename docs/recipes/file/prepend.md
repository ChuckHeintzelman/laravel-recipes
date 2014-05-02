---
Title:    Prepending to a File
Topics:   file system
Code:     File::prepend()
Id:       131
Position: 7
---

{problem}
You want to write content to the _beginning_ of a file.
{/problem}

{solution}
Use the `File::prepend()` method.

{php}
$bytesWritten = File::prepend($filename, $content);
if ($bytesWritten === false)
{
    die("Couldn't write to the file.");
}
{/php}

This will add the content to the beginning of existing files. If the file doesn't exist then the entire contents will be `$content`.
{/solution}

{discussion}
Watch the return value.

If there's a problem writing to the file `false` is returned.
{/discussion}
