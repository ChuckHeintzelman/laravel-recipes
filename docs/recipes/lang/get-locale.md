---
Title:    Getting the Default Locale Being Used
Topics:   localization
Code:     App::getLocale(), Lang::getLocale(), Lang::locale(),
          Lang::setLocale()
Id:       253
Position: 4
---

{problem}
You want to get the currently used default locale.
{/problem}

{solution}
Use the `Lang::getLocale()` method.

Or the alias, `Lang::locale()`.

This returns the current default locale the translator is using.

{php}
echo Lang::getLocale();
{/php}
{/solution}

{discussion}
Differences between `Lang::getLocale()` and `App::getLocale()`.

The `Lang::getLocale()` method returns the default locale for the currently loaded translator. `App::getLocale()` returns the default locale for the currently loaded configuration.

The translator is initialized when the `Lang` facade is first used. This is when it sets its default locale from the currently loaded configuration.

Most of the time these values will be identical. But if you call `Lang::setLocale()` it will change the translator's locale without affecting the loaded configuration value. This is the one case the values could be different.
{/discussion}
