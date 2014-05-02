---
Title:    Set the Current Application Locale
Topics:   -
Code:     App::setLocale()
Id:       208
Position: 26
---

{problem}
You want to change your application's locale.
{/problem}

{solution}
Use the `App::setLocale()` method.

{php}
// Change to Spanish
App::setLocale('es');
{/php}

Now the locale is `es` for the remainder of the request.

Remember: the next request the locale will be back to whatever the configuration specifies.
{/solution}

{discussion}
This does more than simply changing `app.locale` in the configuration.

It does three things:

1. Changes `app.locale` in the currently loaded configuration values.
2. Sets the locale of the translator.
3. Fires a `locale.changed` event which your application can listen for.
{/discussion}
