---
Title:    Requiring a File Once
Topics:   file system
Code:     File::requireOnce()
Id:       129
Position: 5
---

{problem}
You want to require a file one time only.

You know you can use PHP's `require_once` statement, but want to do it the Laravel way.
{/problem}

{solution}
Use the `File::require_once()` method.

{php}
File::requireOnce($some_php_file);
{/php}
{/solution}

{discussion}
This is a wrapper over `require_once`.

And just like `require_once` a fatal error will occur if the file is missing.
{/discussion}
