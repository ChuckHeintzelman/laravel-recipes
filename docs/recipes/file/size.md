---
Title:    Getting the Size of a File
Topics:   file system
Code:     File::size()
Id:       138
Position: 14
---

{problem}
You want to know what the size of a file is.
{/problem}

{solution}
Use the `File::size()` method.

{php}
$bytes = File::size($filename);
{/php}
{/solution}

{discussion}
Watch out for errors.

If you try to get the type of non-existent files or files you don't have access to, errors will occur.
{/discussion}
