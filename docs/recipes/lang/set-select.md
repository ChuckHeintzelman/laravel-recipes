---
Title:    Setting the Translation Message Selector
Topics:   -
Code:     Lang::setSelector()
Id:       260
Position: 9
---

{problem}
You want to change how the message selector logic works.
{/problem}

{solution}
Use the `Lang::setSelector()` to set your own message selector.

{php}
$selector = new MyMessageSelector;
Lang::setSelector($selector);
{/php}

The message select is what handles pulling the correct message from a pipe (|) delimited string based on a number, locale, and the pluralizaion rules in the message itself.

Your class must extend the `Symfony\Component\Translation\MessageSelector` class. It should then override the `choose()` method to implement your custom logic.

See also the [[Getting the Translation Message Selector]] recipe.
{/solution}

{discussion}
Where to call this method?

It should be called earlier than the `Lang` facade is used. Since this is very low level coding, the best place is a service provider.
{/discussion}
