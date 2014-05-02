---
Title:    Changing the Default Request Class
Topics:   -
Code:     App::requestClass()
Id:       210
Position: 4
---

{problem}
You want to use a special Request class for your application.
{/problem}

{solution}
Use the `Application::requestClass()` early in the request lifecycle.

Since one of the very first thing Laravel does when it boots is create the `Application` class, and the first thing the `Application` does is create a new instance of the Request class, you must make changes before this occurs.

#### Step 1 - Create your class

You must extend the class from `\Illuminate\Http\Request`.

{php}
<?php namespace MyApp;

class Request extends \Illuminate\Http\Request {
    // add your methods here
}
?>
{/php}

#### Step 2 - Modify `bootstrap/start.php`

At the very top, before the `$app = new Illuminate\Foundation\Application;` line, add the following code.

{php}
use Illuminate\Foundation\Application;

Application::requestClass('MyApp\Request');
{/php}

That's it. Now when the `Application` gets constructed it will use your class instead of the default `Illuminate\Http\Request` request.
{/solution}

{discussion}
This same method returns the request class.

If you don't pass any arguments to `Application::requestClass()` it won't set the request class, but it returns the class name used to create the request.

See [[Getting the Default Request Class]].

Because setting the class occurs so early in the request lifecycle, you cannot yet use the `App` facade.
{/discussion}
