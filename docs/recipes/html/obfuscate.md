---
Title:    Obfuscating a String
Topics:   html
Code:     HTML::obfuscate()
Id:       197
Position: 17
---

{problem}
You want to prevent spam-bots from sniffing a string on your web page.
{/problem}

{solution}
Use the `HTML::obfuscate()` method.

This method randomly replaces characters in a string with HTML entities. This allows the string to appear correctly in web pages, but many screen scrapers will see the string as garbage.

This is used most frequently for email addresses. For example.

{html}
{{-- Blade template --}}
{{ HTML::obfuscate('me@gmail.com') }}
{/html}

The above would output something similar to below.

{html}
&amp;#x6d;&amp;#x65;&amp;#x40;&amp;#x67;&amp;#x6d;&amp;#97;i&amp;#x6c;. \
  &amp;#99;&amp;#x6f;&amp;#x6d;
{/html}
{/solution}

{discussion}
This is used by both `HTML::email()` and `HTML::mailto()`.

Those methods will obfuscate emails. See [[Obfuscating an Email Address]]
and [[Generating a HTML Link to an Email Address]].
{/discussion}
