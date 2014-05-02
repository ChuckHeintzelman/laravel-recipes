---
Title:    Getting the Current Application Locale
Topics:   -
Code:     App::getLocale(), Config::get()
Id:       207
Position: 25
---

{problem}
You need to determine what locale your application is running in.
{/problem}

{solution}
Use the `App::getLocale()` method.

{php}
if (App::getLocale() == 'en')
{
    echo "It's English!";
}
{/php}
{/solution}

{discussion}
You can also fetch this directly from the configuration.

Use `Config::get('app.locale')`. The value should be the same.
{/discussion}
