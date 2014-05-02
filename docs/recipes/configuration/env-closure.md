---
Title:    Detecting the Environment with a Closure
Topics:   configuration, environment
Code:     App::detectEnvironment()
Id:       28
Position: 5
---

{problem}
Determining your environment is complicated.

You need more flexibility than simply checking hostnames to determine the environment for your Laravel application.
{/problem}

{solution}
Use a Closure to determine your environment.

Edit `bootstrap/start.php` and use a Closure to do the detecting.

{php}
$env = $app->detectEnvironment(function()
{
	return getenv('_MY_ENVIRONMENT');
});
{/php}
{/solution}

{discussion}
There's multiple ways to detect your environment.

The `$app->detectEnvironment()` method can take either an array _(as illustrated in the [[Environment Specific Configurations]] recipe)_ or a `Closure`.

When an array of `'env' => array('hostnames')` is provided, if no match is found then the environment defaults to "production".

But if a `Closure` is provided then it must return something. There is no default.
{/discussion}
