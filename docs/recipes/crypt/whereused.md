---
Title:    Understanding Where Laravel Uses Encryption
Topics:   cookies, encryption
Code:     -
Id:       110
Position: 6
---

{problem}
You want to understand where and when Laravel uses encryption.
{/problem}

{solution}
There's only three places Laravel uses the Crypt package.

1. Caches. Specifically if you're using the Database Cache driver then values
   placed in the cache are encrypted prior to saving and decrypted when loaded.
2. Cookies. Cookie values are always sent to the user encrypted. When the
   request loads, all cookie values are decrypted.
3. Queues. Specifically if you're using the iron queue driver then values are
   stored in the queue encrypted and decrypted once retrieved.
{/solution}

{discussion}
See also [[Understanding the Request Lifecycle]].

Keep in mind that cookies are handled as middleware.
{/discussion}
