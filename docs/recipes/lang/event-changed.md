---
Title:    Listening for Locale Changes
Topics:   -
Code:     App::setLocale(), Event::listen()
Id:       271
Position: 10
---

{problem}
You want to listen for locale changes within your application.
{/problem}

{solution}
Listen for the `locale.changed` event.

When fired, the event passes the new locale.

{php}
Event::listen('locale.changed', function($locale)
{
    echo "Locale changed to ", $locale;
});
{/php}
{/solution}

{discussion}
This event is fired when `App::setLocale()` is called.

See [[Setting the Default Locale]].
{/discussion}
