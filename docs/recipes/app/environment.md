---
Title:    Checking Your Environment
Topics:   environment
Code:     App::environment(), App::isLocal(), App::runningUnitTests()
Id:       1
Position: 1
---

{problem}
You need to know the environment.

You've reached a point in your application where it would be handy to know what your environment is, but aren't sure the best way to determine this.
{/problem}

{solution}
There are several

If you're specifically checking for **local** or **testing** you can do the following.

{php}
if (App::isLocal())
{
    echo "environment=local\n";
}
elseif (App::runningUnitTests())
{
    echo "environment=testing\n";
}
{/php}

Otherwise, you can check against a list or check the environment individually.

{php}
if (App::environment('production', 'staging'))
{
    echo "I'm on production or staging\n";
}
else
{
    echo "environment=", App::environment(), "\n";
}
{/php}
{/solution}

{discussion}
The environment setting is bound to `'env'` in the IoC container.

{php}
echo app('env');
{/php}

See [[Environment Specific Configurations]] for details on setting the environment.
{/discussion}
