---
Title:    Resolving Objects from the IoC Container
Topics:   IoC container
Code:     app(), App::bind(), App::instance(), App::make(), App::singleton()
Id:       44
Position: 5
---

{problem}
You have something stashed in the IoC container you want to retrieve.

You have a interface binding, an object, or even a piece of data in the IoC container and need to access it in your application.
{/problem}

{solution}
Use `App::make()`.

This is the complement `App::bind()`.

{php}
// Somewhere in your code
App::bind('myclass', function($app)
{
    return new MyCoolClass();
});

// Later
$myclass = App::make('myclass');
{/php}

It also complements `App::instance()`.

{php}
// Somewhere in your code
App::instance('mydata', $mydata);

// Later
$mydata = App::make('mydata');
{/php}

You can also retrieve singleton objects.

{php}
// Somewhere in your code
App::singleton('mysingleton', 'stdClass');

// Later
$var = App::make('mysingleton');
$var->test = '123';

// Even later
$var2 = App::make('mysingleton');
echo $var2->test;
{/php}
{/solution}

{discussion}
`App::make()` is sort of a swiss-army knife of type resolution.

You can construct classes, resolving dependencies automatically.

{php}
class Foo {
}
class Bar {
    protected $foo;
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }
}

// Construct Bar, automatically injecting a Foo instance
$bar = App::make('Bar');
{/php}

You can resolve interfaces which have been bound to the IoC container.

{php}
App::bind('SomeInterface', 'SomeClassImplementingSomeInterface');

$var = App::make('SomeInterface');
{/php}

Also, you can use `app()` as an alias to `App::make()`.

{php}
$obj = app('stdClass');
{/php}
{/discussion}
