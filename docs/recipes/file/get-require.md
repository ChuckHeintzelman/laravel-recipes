---
Title:    Getting the Return Value of a File.
Topics:   file system
Code:     File::get(), File::getRequire()
Id:       128
Position: 4
---

{problem}
You want to get the return value of a file.

You have a PHP file that returns the value and want to execute the file and capture the return value.
{/problem}

{solution}
Use the `File::getRequire()` method.


{php}
<?php
// file1.php - returns an array
return array(
    'key1' => 'value1',
    'key2' => 'value2',
);
?>

// Fetching the array of the file above
$value = File::getRequire('file1.php');
{/php}
{/solution}

{discussion}
If the file isn't found an exception is returned.

Just like `File::get()` a `Illuminate\Filesystem\FileNotFoundException` exception is returned if the file is missing.

It's a good idea to wrap this in a try/catch block unless you are certain the file exists.
{/discussion}
