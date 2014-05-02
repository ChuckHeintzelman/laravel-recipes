---
Title:    Setting the Encryption Key
Topics:   encryption
Code:     Config::get(), Crypt::decrypt(), Crypt::encrypt(), Crypt::setKey()
Id:       107
Position: 3
---

{problem}
You want to set your own encryption key.
{/problem}

{solution}
Use `Crypt::setKey()`.

{php}
Crypt::setKey($key);
{/php}
{/solution}

{discussion}
This key will be used for subsequent `Crypt::encrypt()` and `Crypt::decrypt()` calls.

But only in the current request.

By default Laravel automatically uses `Config::get('app.key')` as the key for encryption. If you change the key, any subsequent calls to `Crypt::decrypt()` will only only work for values that have been encrypted with the same key.
{/discussion}
