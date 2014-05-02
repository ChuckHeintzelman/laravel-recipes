---
Title:    Setting the Encryption Mode
Topics:   encryption
Code:     Config::setMode()
Id:       109
Position: 5
---

{problem}
You want to change the encryption mode.
{/problem}

{solution}
Use `Crypt::setMode()`.

{php}
Crypt::setMode($mode);
{/php}
{/solution}

{discussion}
This encryption mode will be used for subsequent `Crypt::encrypt()` and `Crypt::decrypt()` calls.

But only in the current request.

Here's a list of some cipher modes:

* **"ecb"** - Electronic codebook. Suitable for random data, such as encrypting other keys.
* **"cbc"** - Cipher Block Chaining. Especially suitable for encrypting files.
* **"cfb"** - Cipher Feedback. The best mode for encrypting byte streams where single bytes must be encrypted.
* **"ofb"** - Output feedback (8bit). Not recommended because it's insecure (only operates in 8bit mode).
* **"nofb"** - Output feedback (nbit). Similar to "ofb" but more secure because it operates on the block size of the algorithm.
* **"stream"** - An extra mode for stream algorithms like "WAKE" or "RC4".

By default Laravel automatically uses the mode `cbc`.
{/discussion}
