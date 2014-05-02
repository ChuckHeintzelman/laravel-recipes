---
Title:    Setting the Encryption Cypher
Topics:   encryption
Code:     Crypt::setCipher(), mcrypt_list_algorithms()
Id:       108
Position: 4
---

{problem}
You want to change the cipher the encryption component uses.
{/problem}

{solution}
Use `Crypt::setCipher()`.

{php}
Crypt::setCipher($new_cipher);
{/php}
{/solution}

{discussion}
The default cipher method is `rijndael-256`.

You can get a list of available ciphers with a call to `mcrypt_list_algorithms()`.

Here's a partial list:

* cast-128
* gost
* rijndael-128
* twofish
* arcfour
* cast-256
* loki97
* rijndael-192
* saferplus
* wake
* blowfish-compat
* des
* rijndael-256

This cipher will be used for subsequent `Crypt::encrypt()` and `Crypt::decrypt()` calls.

But only in the current request.
{/discussion}
