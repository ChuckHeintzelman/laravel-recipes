---
Title:    Getting a Translation Using Pluralization Rules
Topics:   localization
Code:     Lang::choice(), Lang:get()
Id:       252
Position: 3
---

{problem}
You want to retrieve a translation string that is different depending on a count.
{/problem}

{solution}
Use the `Lang::choice()` method.

In addition to the key you must also pass the number.

{php}
echo Lang::choice('message.items', 1);
{/php}

Your language file should have at least two messages for the key, separated by the pipe (|) character.

{php}
'items' => "There's just one item|You've got multiple items",
{/php}

Like the `Lang::get()` method, you can specify place holders with an additional array argument.

{php}
echo Lang::choice('message.items', 3, ['type' => 'widget']);
{/php}

This would replace any `:type` in the string with the word `widget`. Note that the `:count` placeholder is automatically set.

Adding a fourth argument allows you to specify the locale instead of using the default locale.

{php}
echo Lange::choice('message.items', 2, [], 'es');
{/php}
{/solution}

{discussion}
You can have more than two messages based on the count.

The default is two: the first message when the count is 1, the second when the count is anything other than 1, but the following translation has three different messages.

{php}
'items' => "{0} There's none|[1,3] Just a few|[4,Inf] A bunch",
{/php}
{/discussion}
