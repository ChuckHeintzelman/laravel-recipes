---
Title:    Generating a HTML Link to an Email Address
Topics:   html
Code:     HTML::mailto(), HTML::obfuscate()
Id:       192
Position: 12
---

{problem}
You want to add a `mailto:` link to your Blade template.

You want the email address to be obfuscated so that screen scrapers won't easily be able to harvest the email address.
{/problem}

{solution}
Use the `HTML::mailto()` method.

The first argument to the method is the email address.

{html}
{{ HTML::mailto('a@b.c') }}
{/html}

This will create the mailto link and display the email address as the link text. Notice that Laravel automatically and randomly obfuscates the address. But the address will appear correctly in browsers.

{html}
<a href="ma&amp;#105;&amp;#x6c;&amp;#116;o&amp;#58;&amp;#97;&amp;#64; \
  &amp;#x62;.&amp;#99;">&amp;#97;&amp;#64;&amp;#x62;.&amp;#99;</a>
{/html}

_(Note backslash above is used to continue line for smaller screens.)_

If you pass a second argument, that becomes the link text.

{html}
{{ HTML::mailto('a@b.c', 'Email Me') }}
{/html}

That will produce something similar to below (the actual obfuscation will vary).

{html}
<a href="m&amp;#x61;i&amp;#108;&amp;#x74;&amp;#x6f;&amp;#x3a;&amp;#x61; \
  &amp;#x40;&amp;#98;&amp;#46;&amp;#x63;">Email Me</a>
{/html}

_(Backslash above is used to continue the line for smaller screens.)_


You can pass a third argument as an array of attributes to apply to the anchor tag.

{html}
{{ HTML::mailto('a@b.c', 'Email Me', array('class' => 'btn')) }}
{/html}

Now the anchor has a class attribute.

{html}
<a href="&amp;#109;&amp;#97;&amp;#105;&amp;#108;&amp;#x74;o&amp;#x3a; \
  &amp;#97;&amp;#64;b.&amp;#x63;" class="btn">Email Me</a>
{/html}
{/solution}

{discussion}
This method uses the `HTML::obfuscate()` method to obfuscate the email address.

See [[Obfuscating a String]].
{/discussion}
