---
Title:    Moving a File to a New Location
Topics:   file system
Code:     File::move(), rename()
Id:       134
Position: 10
---

{problem}
You want to move a file to a different location.
{/problem}

{solution}
Use the `File::move()` method.

{php}
if ( ! File::move($oldfile, $newfile))
{
    die("Couldn't rename file");
}
{/php}
{/solution}

{discussion}
This is a wrapper on PHP's `rename()` function.

Use it to move files to different directories, to different drives, or to rename a file.
{/discussion}
