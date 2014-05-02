---
Title:    Checking if You're Running in the Console
Topics:   console, environment
Code:     App::runningInConsole(), php_sapi_name()
Id:       2
Position: 2
---

{problem}
You want to check if your application is running in the console.

You know you can check `php_sapi_name()` but would like to use the more elegant, Laravel way.
{/problem}

{solution}
Use `App::runningInConsole()`

{php}
if (App::runningInConsole())
{
	echo "I'm in the console, baby!";
}
{/php}
{/solution}

{discussion}
Laravel actually uses `php_sapi_name()` to implement this method.

If `php_sapi_name()` equals `'cli'` then your code is running in the console.
{/discussion}
