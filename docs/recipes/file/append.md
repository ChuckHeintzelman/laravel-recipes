---
Title:    Appending to a File
Topics:   file system
Code:     File::append()
Id:       132
Position: 8
---

{problem}
You want to write content to the _end_ of a file.
{/problem}

{solution}
Use the `File::append()` method.

{php}
$bytesWritten = File::append($filename, $content);
if ($bytesWritten === false)
{
    die("Couldn't write to the file.");
}
{/php}

This will add the content to the end of existing files. If the file doesn't exist then the entire contents will be `$content`.
{/solution}

{discussion}
Watch the return value.

If there's a problem writing to the file `false` is returned.
{/discussion}
