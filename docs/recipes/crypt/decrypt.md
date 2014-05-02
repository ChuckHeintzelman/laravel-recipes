---
Title:    Decrypting a Value
Topics:   encryption
Code:     Config::get(), Crypt::encrypt(), Crypt::setKey()
Id:       106
Position: 2
---

{problem}
You want to decrypt a string.

You've encrypted a string and are ready to decrypt and use it.
{/problem}

{solution}
Use `Crypt::decrypt()`.

{php}
$value = Crypt::decrypt($encrypted);
{/php}
{/solution}

{discussion}
You must decrypt the value with the same key used to encrypt it.

Laravel's encryption routines use `Config::get('app.key')` for encryption. This happens internally. Since this value is different for every Laravel application then the application that encrypts a value must also decrypt the value.

Or ...

The application must call `Crypt::setKey()` prior to decrypting to match the key to the value used for encrypting.  See [[Setting the Encryption Key]].
{/discussion}
