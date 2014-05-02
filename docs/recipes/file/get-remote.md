---
Title:    Getting the Contents of a Remote File
Topics:   -
Code:     File::getRemote()
Id:       127
Position: 3
---

{problem}
You want to load the contents of a remote file.
{/problem}

{solution}
Use the `File::getRemote()` method.

{php}
$contents = File::getRemote($url);
{/php}
{/solution}

{discussion}
If the file cannot be fetched, `false` is returned.

{php}
$contents = File::getRemote($url);
if ($contents === false)
{
    die("Couldn't fetch the file.");
}
{/php}
{/discussion}
