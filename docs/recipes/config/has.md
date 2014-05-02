---
Title:    Determining If a Configuration Value Exists
Topics:   configuration
Code:     Config::get(), Config::has(), microtime()
Id:       7
Position: 1
---

{problem}
You want to see if a configuration value exists.

You know you can use a _default_ parameter to the `Config::get()` method, but you want to be able to determine if the configuration key is even present in your application's config.
{/problem}

{solution}
Use `Config::has()`

{php}
if (Config::has('app.mykey'))
{
    echo "Yea! 'mykey' is in config/app.php\n";
}
{/php}
{/solution}

{discussion}
It's interesting how this is implemented.

The `Config::has()` method actually uses the `Config::get()` method with a default value of the current `microtime()`. It's only two lines of code.

{php}
$default = microtime(true);
return $this->get($key, $default) !== $default;
{/php}
{/discussion}
