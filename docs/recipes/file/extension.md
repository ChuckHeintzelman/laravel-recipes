---
Title:    Extracting a File Extension From a Path
Topics:   file system
Code:     File::extension()
Id:       136
Position: 12
---

{problem}
You want to quickly determine a file's extension.
{/problem}

{solution}
Use the `File::extension()` method.

{php}
$extension = File::extension($filename);
{/php}

If there is no extension, an empty string is returned. Otherwise, a string containing everything _after_ the last period in the filename is returned.
{/solution}

{discussion}
No discussion needed.
{/discussion}
