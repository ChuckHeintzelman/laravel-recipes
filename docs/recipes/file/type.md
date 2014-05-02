---
Title:    Getting the Type of a File
Topics:   file system
Code:     File::type()
Id:       137
Position: 13
---

{problem}
You want to know what the type of a file is.
{/problem}

{solution}
Use the `File::type()` method.

{php}
echo File::type($filename);
{/php}

Usually this returns `"file"` or `"dir"`.
{/solution}

{discussion}
Watch out for errors.

If you try to get the type of non-existent files or files you don't have access to, errors will occur.
{/discussion}
