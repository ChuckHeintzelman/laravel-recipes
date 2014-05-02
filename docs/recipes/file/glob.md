---
Title:    Finding Files Matching a Pattern
Topics:   file system
Code:     File::glob(), glob()
Id:       143
Position: 19
---

{problem}
You want to find files matching a pattern.
{/problem}

{solution}
Use the `File::glob()` method.

{php}
$log_files = File::glob('/test/*.log');
if ($log_files === false)
{
    die("An error occurred.");
}
{/php}

You can also pass flags to the method.

{php}
$dir_list = File::glob('/test/*', GLOB_ONLYDIR);
if ($dir_files === false)
{
    die("An error occurred.");
}
{/php}

Valid flags are:

* `GLOB_MARK` - Adds a slash to each directory returned
* `GLOB_NOSORT` - Return files as they appear in the directory (no sorting)
* `GLOB_NOCHECK` - Return the search pattern if no files matching it were found
* `GLOB_NOESCAPE` - Backslashes do not quote meta-characters
* `GLOB_BRACE` - Expands {a,b,c} to match 'a', 'b', or 'c'
* `GLOB_ONLYDIR` - Return only directory entries which match the pattern
* `GLOB_ERR` - Stop on read errors (like unreadable directories), by default
   errors are ignored.

Returns an empty array if no files are matched or a `false` on error.

Note that on some systems there's no difference between an empty match and an error.
{/solution}

{discussion}
This is a wrapper on the PHP `glob()` function.
{/discussion}
