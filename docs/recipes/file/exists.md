---
Title:    Determining If a File Exists
Topics:   file system
Code:     File::exists()
Id:       123
Position: 1
---

{problem}
You want to see if a file exists.

You know you can use the PHP `file_exists()` method, but want to do it the Laravel way.
{/problem}

{solution}
Use the `File::exists()` method.

{php}
if (File::exists($myfile))
{
    echo "Yup. It exists.";
}
{/php}
{/solution}

{discussion}
This method actually calls `file_exists()`.

But it does allow better testing because using the facade allows you to easily mock the method when needed.
{/discussion}
