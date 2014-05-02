---
Title:    Determining if a File or Directory is a Writable
Topics:   file system
Code:     File::isWritable(), is_writable()
Id:       141
Position: 17
---

{problem}
You want to check if your application has write access.

Specifically, you want to check write access on a file or directory.
{/problem}

{solution}
Use the `File::isWritable()` method.

{php}
if (File::isWritable($filename))
{
    echo "Yes. $filename is writable.";
}
if (File::isWritable($dirname))
{
    echo "Yes. $dirname is writable.";
}
{/php}

If the file or directory exists and is writable `true` is returned. Otherwise `false` is returned.
{/solution}

{discussion}
This is a simple wrapper on the PHP `is_writable()` function.
{/discussion}
