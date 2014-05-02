---
Title:    Determining if a Path is a File
Topics:   file system
Code:     File::isFile(), is_file()
Id:       142
Position: 18
---

{problem}
You want to check if a file path is a file.
{/problem}

{solution}
Use the `File::isFile()` method.

{php}
if (File::isFile($filename))
{
    echo "Yep. It's a file.";
}
{/php}

If the file exists and is a regular file then `true` is returned. Otherwise `false` is returned.
{/solution}

{discussion}
This is a simple wrapper on the PHP `is_file()` function.
{/discussion}
