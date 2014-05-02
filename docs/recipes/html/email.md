---
Title:    Obfuscating an Email Address
Topics:   html
Code:     HTML::email(), HTML::obfuscate()
Id:       193
Position: 13
---

{problem}
You want to obfuscate an e-mail address to prevent spam-bots from sniffing it.
{/problem}

{solution}
Use the `HTML::email()` method.

This method takes one argument, the email address.

{php}
$email = HTML::email('me@local.com');
{/php}

Now `$email` will display correctly in browsers, but it will randomly contain characters that make it hard to read.

{html}
Email is <b>&amp;#x6d;e&amp;#x40;l&amp;#111;ca&amp;#x6c;.c&amp;#x6f;m</b>
{/html}
{/solution}

{discussion}
This method uses the `HTML::obfuscate()` method to obfuscate the email address.

See [[Obfuscating a String]].
{/discussion}
