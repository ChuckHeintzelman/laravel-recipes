---
Title:    Generating a Secure HTML Link
Topics:   html
Code:     HTML::link(), HTML::secureLink()
Id:       187
Position: 7
---

{problem}
You want to generate a secure HTTPS link in your Blade template.
{/problem}

{solution}
Use the `HTML::secureLink()` method.

This only works correctly when you're _building_ URLs for your application. In other words, if you pass a fully formed URL to the method, it will use the fully formed URL.

You pass _paths_ to this method, not _URLs_.

If you only pass the path as the first argument it will create a link using the full URL as the title.

{html}
{{ HTML::secureLink('x') }}
{/html}

This produces the following HTML.

{html}
<a href="https://your.url/x">https://your.url/x</a>
{/html}

You can specify the title as the second argument.

{html}
{{ HTML::secureLink('a/b', 'A-B') }}
{/html}

The resulting HTML is below.

{html}
<a href="https://url.url/a/b">A-B</a>
{/html}

You can also pass an array of attributes as the third argument.

{html}
{{ HTML::secureLink('login', 'Sign In', array('class' => 'btn')) }}
{/html}

Now the anchor tag has a class attribute.

{html}
<a href="https://your.url/login" class="btn">Sign In</a>
{/html}
{/solution}

{discussion}
This method is a wrapper for `HTML::link()`.

But it always passes `true` as the fourth argument to `HTML::link()`.

See [[Generating a HTML Link]] for details.
{/discussion}
