---
Title:    Getting All the Files Recursively From a Directory
Topics:   file system
Code:     File::allFiles(), SplFileInfo
Id:       145
Position: 21
---

{problem}
You want to fetch all the files recursively from your file system.
{/problem}

{solution}
Use the `File::allFiles()` method.

{php}
$files = File::allFiles($directory);
foreach ($files as $file)
{
    echo (string)$file, "\n";
}
{/php}
{/solution}

{discussion}
The method returns an array of `SplFileInfo` objects.

Specifically, it returns a `Symfony\Component\Finder\SplFileInfo` object which is derived from the basic PHP `SplFileInfo` class to add relative paths. Each object returned will represent a single file _(no directories are returned)_.

If the directory doesn't exist, an `InvalidArgumentException` will be thrown.
{/discussion}
