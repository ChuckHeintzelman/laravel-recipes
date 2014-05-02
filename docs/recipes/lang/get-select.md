---
Title:    Getting the Translation Message Selector
Topics:   -
Code:     Lang::getSelector()
Id:       259
Position: 8
---

{problem}
You want to use the message selector logic the translation service is using.
{/problem}

{solution}
Use the `Lang::getSelector()` to retrieve the instance.

{php}
$selector = Lang::getSelector();

$result = $selector->choose('message.key', 3, 'en');
echo $result;
{/php}

Given a message with different plural translations separated by a pipe (|), the `$selector->choose()` method returns the correct portion of the message based on the given number, locale, and the pluralizaion rules in the message itself.

The class of the selector is `Symfony\Component\Translation\MessageSelector`.
{/solution}

{discussion}
Only in the rarest of cases will using this method be needed.
{/discussion}
