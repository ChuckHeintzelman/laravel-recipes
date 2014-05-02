---
Title:    Copying a File to a New Location
Topics:   file system
Code:     copy(), File::copy()
Id:       135
Position: 11
---

{problem}
You want to copy a file to a different location.

You know you can use PHP's `copy()` function, but want to use Laravel's `File` facade.
{/problem}

{solution}
Use the `File::copy()` method.

{php}
if ( ! File::copy($file, $dest))
{
    die("Couldn't copy file");
}
{/php}
{/solution}

{discussion}
This is a wrapper on PHP's `copy()` function.
{/discussion}
