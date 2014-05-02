---
Title:    Determining if a Translation Exists
Topics:   localization
Code:     Lang::has()
Id:       251
Position: 2
---

{problem}
You want to determine if a translation exists for a particular key.
{/problem}

{solution}
Use the `Lang::has()` method.

To check if a translation exists for the current locale pass a single argument to the method. The argument is the _key_ you're checking.

{php}
if (Lang::has('message.welcome'))
{
    echo "The welcome message translation exists for the current locale";
}
{/php}
{/solution}

{discussion}
You can specify the locale to check with the second argument.

{php}
if (Lang::has('message.welcome', 'es'))
{
    echo "The welcome message translation exists for Spanish";
}
{/php}

If the second argument isn't used then the current locale is used.
{/discussion}
