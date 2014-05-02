---
Title:    Setting the Request Instance for Authentication
Topics:   -
Code:     Auth::setRequest()
Id:       234
Position: 39
---

{problem}
You want to use a different request instance for authentication.
{/problem}

{solution}
Use the `Auth::setRequest()` method.

{php}
Auth::setRequest($request);
{/php}

The dispatcher must be derived from `\Symfony\Component\HttpFoundation\Request`.
{/solution}

{discussion}
This is most often used in testing.

Most of the time the standard request created by Laravel works just fine. The dispatcher the `Auth` facade uses is the same one the `Request` facade uses.

But, if you need to set a different request this method is available. Make sure you call this method before the authentication routines are accessed. Either a service provider or in `app/start/global.php` is a good location.
{/discussion}
