---
Title:    Encrypting a Value
Topics:   encryption
Code:     Config::get(), Crypt::encrypt(), Crypt::setKey()
Id:       105
Position: 1
---

{problem}
You want to encrypt a string.

You have private data and want to encrypt it for later decryption.
{/problem}

{solution}
Use `Crypt::encrypt()`.

{php}
$encrypted = Crypt::encrypt($value);
{/php}
{/solution}

{discussion}
You must later decrypt the value with the same key used to encrypt it.

Laravel's encryption routines use `Config::get('app.key')` for encryption. This happens internally. Since this value is different for every Laravel application then a value encrypted by the application should only be decrypt with the same application.

Or ...

The application can call `Crypt::setKey()` prior to encrypting. The same key must later be used to decrypt the value.  See [[Setting the Encryption Key]].
{/discussion}
