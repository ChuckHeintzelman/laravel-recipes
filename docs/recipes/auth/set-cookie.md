---
Title:    Setting the Cookie Jar Used for Authentication
Topics:   -
Code:     Auth::setCookieJar()
Id:       226
Position: 31
---

{problem}
You want to use a different cookie creator for authentication.
{/problem}

{solution}
Use the `Auth::setCookieJar()` method.

{php}
Auth::setCookieJar($cookie_jar);
{/php}

The cookie jar must be derived from `Illuminate\Cookie\CookieJar`.
{/solution}

{discussion}
This is an advanced topic.

Most of the time the standard cookie handler created by Laravel works just fine. The cookie jar the `Auth` facade uses is the same one the `Cookie` facade uses.

But, if you need to use a different cookie provider this method is available. Make sure you call this method before the authentication routines are accessed. Either a service provider or in `app/start/global.php` is a good location.
{/discussion}
