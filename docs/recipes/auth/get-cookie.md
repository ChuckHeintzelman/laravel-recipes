---
Title:    Getting the Cookie Jar Used for Authentication
Topics:   -
Code:     Auth::getCookieJar()
Id:       225
Position: 30
---

{problem}
You want to access the cookie creator used by authentication.
{/problem}

{solution}
Use the `Auth::getCookieJar()` method.

{php}
$cookies = Auth::getCookieJar();
{/php}

Note if authentication isn't using cookies a `RuntimeException` will be thrown.
{/solution}

{discussion}
Usually you can just access the `Cookie` facade.

By default Laravel uses the same cookie driver for both the `Cookie` facade and the `Auth` facade. This means unless your application is explicitly setting the cookie jar, it's easier to use the `Cookie` facade when dealing with cookies.
{/discussion}
