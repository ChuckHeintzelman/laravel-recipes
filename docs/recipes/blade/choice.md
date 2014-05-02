---
Title:    Outputting a Translation With Pluralization in a Blade Template
Topics:   localization
Code:     @choice, Lang::choice()
Id:       255
Position: 21
---

{problem}
You want to use a translation with pluralization rules in your Blade template.
{/problem}

{solution}
Use the Blade `@choice` command.

For example:

{html}
@choice('messages.items', 1)
{/html}

This would output the message from your `messages.php` language file using the `items` key when the count is 1.

If your message has placeholders, you can specify them with an additional array argument.

{html}
@choice('message.items', 3, ['type' => 'widget']);
{/html}

This would replace any `:type` in the message with the word `widget`. Note that the `:count` placeholder is automatically set.
{/solution}

{discussion}
See the `Lang::choice()` method.

The recipe [[Getting a Translation Using Pluralization Rules]] provides more details how the `Lang::choice()` method works. The Blade `@choice` command uses the `Lang::choice()` command.
{/discussion}
