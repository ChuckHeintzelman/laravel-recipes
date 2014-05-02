---
Title:    Hashing a Value
Topics:   -
Code:     Hash::make()
Id:       125
Position: 1
---

{problem}
You want to create a hash of a string.
{/problem}

{solution}
Use the `Hash::make()` method.

{php}
$hashed_password = Hash::make($plaintext_password);
{/php}
{/solution}

{discussion}
Hashing uses the Blowfish algorithm.

See [The bcrypt Wikipedia article](http://en.wikipedia.org/wiki/Bcrypt).

You can also specify the cost parameter for hashing. This is a base-2 logarithm of the times the hashing routine is iterated.

{php}
$hashed = Hash::make($plaintext, array('rounds' => 10));
{/php}

This will change the the cost parameter from the default of 8 to 10.
{/discussion}
