---
Title:    Setting the Default Locale
Topics:   localization
Code:     Lang::setLocale()
Id:       254
Position: 5
---

{problem}
You want to change the default locale.
{/problem}

{solution}
Use the `Lang::setLocale()` method.

{php}
Lang::setLocale('es'); // switch to Spanish
{/php}
{/solution}

{discussion}
Difference between `App::setLocale()` and `Lang::setLocale()`.

`Lang::setLocale()` only changes the locale in the currently loaded translation service.

`App::setLocale()` changes the currently loaded configuration value and calls `Lang::setLocale()` to update the translation service. Also, `App::setLocale()` fires a `locale.changed` event.
{/discussion}
