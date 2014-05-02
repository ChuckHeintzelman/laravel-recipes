---
Title:    Generating a HTML Link
Topics:   html
Code:     HTML::link()
Id:       186
Position: 6
---

{problem}
You want to create a HTML link in your Blade template.

You know you can use HTML directly and use the anchor tag (`<a>...</a>`) but you want to use the `HTML` facade.
{/problem}

{solution}
Use the `HTML::link()` method.

If you only pass the URL as the first argument it will create a link using the URL as the title.

{html}
{{ HTML::link('http://test.com') }}
{/html}

This produces the following HTML.

{html}
<a href="http://test.com">http://test.com</a>
{/html}

You can add a second argument for the title.

{html}
{{ HTML::link('http://test.com', 'testing')}}
{/html}

Which will produce the following.

{html}
<a href="http://test.com">testing</a>
{/html}

The third argument, if used, must be an array. It allows you to assign other attributes to the tag.

{html}
{{ HTML::link('http://test.com', null, array('id' => 'linkid'))}}
{/html}

Now the anchor tag also has the id attribute. Notice also that the title is back to the URL because we passed `null` as the second argument.

{html}
<a href="http://test.com" id="linkid">http://test.com</a>
{/html}

A fourth option can be passed to make the URL secure. Note that this only works when the URL is automatically built (see the discussion below).

{html}
{{ HTML::link('/login', 'log in', array('id' => 'linkid'), true)}}
{/html}

This produces something like what's below.

{html}
<a href="https://your.url/login" id="linkid">log in</a>
{/html}
{/solution}

{discussion}
The URL portion will be completed as needed.

Laravel will automatically build the URL, using your application's URL as the base if an incomplete URL is passed.

Examples:

* you pass "test" for URL, it expands to "http://your.url/test"
* you pass "test.com" for URL (forgetting the scheme), it expands to "http://your.url/test.com"

The exception to this are URLs beginning with the pound symbol (#).

* you pass "#test" for URL, it stays "#test"

This allows for in-page links.
{/discussion}
