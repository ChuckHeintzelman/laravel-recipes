---
Title:    Getting the Contents of a File
Topics:   file system
Code:     File::get()
Id:       126
Position: 2
---

{problem}
You want to load the contents of a file.
{/problem}

{solution}
Use the `File::get()` method.

{php}
$contents = File::get($filename);
{/php}
{/solution}

{discussion}
If the file isn't found an exception is returned.

Specifically, a `Illuminate\Filesystem\FileNotFoundException` exception is returned.

If you don't explicitly test if the file exists yourself, it's good practice to wrap the call in a try/catch block.

{php}
try
{
    $contents = File::get($filename);
}
catch (Illuminate\Filesystem\FileNotFoundException)
{
    die("The file doesn't exist");
}
{/php}
{/discussion}
