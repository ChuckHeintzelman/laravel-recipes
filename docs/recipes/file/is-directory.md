---
Title:    Determining if a Path is a Directory
Topics:   file system
Code:     File::isDirectory(), is_dir()
Id:       140
Position: 16
---

{problem}
You want to check if a filepath is a directory.
{/problem}

{solution}
Use the `File::isDirectory()` method.

{php}
if (File::isDirectory($filename))
{
    echo "Yes. It's a directory.";
}
{/php}

If the path exists and is a directory `true` is returned. Otherwise `false` is returned.
{/solution}

{discussion}
This is a simple wrapper on the PHP `is_dir()` function.
{/discussion}
