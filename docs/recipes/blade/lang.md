---
Title:    Outputting a Translation in a Blade Template
Topics:   -
Code:     @lang, Lang::get()
Id:       250
Position: 20
---

{problem}
You want to use translations in your Blade template.
{/problem}

{solution}
Use the Blade `@lang` command.

For example:

{html}
@lang('messages.welcome')
{/html}

Assuming there's a `welcome` key in the `messages.php` for the current locale, the above would output the translated message.

If there is no translated message then `messages.welcome` would be output.

If your message has a placeholder, you can pass a second parameter with an array of placeholders.

{html}
@lang('messages.welcome', ['name' => $name])
{/html}
{/solution}

{discussion}
This Blade command uses the `Lang::get()` method.

See [[Getting the Translation for a Key]] for details about this method.
{/discussion}
