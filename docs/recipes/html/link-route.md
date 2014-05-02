---
Title:    Generating a HTML Link to a Named Route
Topics:   html
Code:     HTML::linkRoute()
Id:       190
Position: 10
---

{problem}
You want to generate a link to one of your routes.
{/problem}

{solution}
Use the `HTML::linkRoute()` method.

The only required argument is the first one, the name of the route.

{html}
{{ HTML::linkRoute('login') }}
{/html}

Depending on your `app/routes.php` file, this may output something like.

{html}
<a href="http://your.url/user/login">http://your.url/user/login</a>
{/html}

{warn}
If you don't have a route with the name specified, an error will get generated.
{/warn}

You can pass a second argument to specify the title to display.

{html}
{{ HTML::linkRoute('login', 'Sign In') }}
{/html}

This produces something similar to the following (based on routes.php).

{html}
<a href="http://your.url/user/login">Sign In</a>
{/html}

If you're route takes parameters, then you must pass a third argument.

{html}
{{ HTML::linkRoute('items.show', 'Show item #4', array(4)) }}
{/html}

The output could look something like below.

{html}
<a href="http://your.url/items/4">Show item #4</a>
{/html}

You can specify an array as the fourth parameter. This array should contain any additional attributes to apply to the anchor tag.

{html}
{{ HTML::linkRoute('login', 'Sign In', array(), array('class' => 'btn')) }}
{/html}

Now the anchor tag has a class attribute.

{html}
<a href="http://your.url/user/login" class="btn">Sign In</a>
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
