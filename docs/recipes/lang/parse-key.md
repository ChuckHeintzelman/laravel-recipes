---
Title:    Parsing a Language Key into its Components
Topics:   -
Code:     Lang::parseKey()
Id:       257
Position: 6
---

{problem}
You want to see how a language key expands into its components.
{/problem}

{solution}
Use the `Lang::parseKey()` method.

This method will return an array with three elements:

1. The first element is the key's namespace
2. The second is the key's group (aka file)
3. The third element is the actual item in the group

Consider the following PHP code.

{php}
print_r(Lang::parseKey('message.welcome'));
print_r(Lang::parseKey('message.two.part'));
print_r(Lang::parseKey('mypackage::message.two.part'));
{/php}

The above code would output the following.

{text}
Array
(
    [0] => *
    [1] => message
    [2] => welcome
)
Array
(
    [0] => *
    [1] => message
    [2] => two.part
)
Array
(
    [0] => mypackage
    [1] => message
    [2] => two.part
)
{/text}
{/solution}

{discussion}
This is a low-level method.

It's used internally by the `Lang` facade. But it is handy to know when debugging and trying to determine why a translation string isn't finding the message. Knowing how the key is broken apart helps track down where Laravel is looking for the translation.
{/discussion}
