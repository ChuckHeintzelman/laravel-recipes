---
Title:    Generating a HTML Link to a Controller Action
Topics:   html
Code:     HTML::linkAction()
Id:       191
Position: 11
---

{problem}
You want to generate a link to a specific controller action.
{/problem}

{solution}
Use the `HTML::linkAction()` method.

Note that the controller and action you specify must exist _AND_ there must be a reference to it somewhere in your `app/routes.php` file.

The simplest form is a single argument, the `controller@action`.

{html}
{{ HTML::linkAction('Home@index') }}
{/html}

This could produce something like.

{html}
<a href="http://your.url/index">http://your.url/index</a>
{/html}

You can specify the title as the second argument.

{html}
{{ HTML::linkAction('Home@index', 'Home') }}
{/html}

Which produces the following.

{html}
<a href="http://your.url/index">Home</a>
{/html}

If the controller action method takes arguments, you can specify them in the third parameter, as a simple array.

{html}
{{ HTML::linkAction('ItemController@show', 'Show Item #3', array(3)) }}
{/html}

The HTML would look like below (depending on your routes).

{html}
<a href="http://your.url/items/3">Show Item #3</a>
{/html}

And, if additional attributes are needed use the fourth parameter.

{html}
{{ HTML::linkAction('Home@index', 'Home', array(), array('class' => 'btn')) }}
{/html}

Now the anchor has a class attribute.

{html}
<a href="http://your.url/index" class="btn">Home</a>
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
