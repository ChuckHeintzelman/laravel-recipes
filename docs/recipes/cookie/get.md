---
Title:    Retrieving a Cookie from the Request
Topics:   cookies
Code:     Cookie::get(), Request::cookie()
Id:       49
Position: 2
---

{problem}
You want to check a cookie value sent to your application.

You know you could use the PHP `$_COOKIE` superglobal, but want to do it the Laravel way.
{/problem}

{solution}
Use `Cookie::get()`.

{php}
// $val will be null if cookie not present
$val = Cookie::get('COOKIE_NAME');

// Or you can pass a default, if not present
$name = Cookie::get('NAME', 'Unknown');
echo "Hello $name";
{/php}
{/solution}

{discussion}
This is basically the same as `Request::cookie()`.

In fact, the `Cookie::get()` method is actually a wrapper over `Request::cookie()`.
{/discussion}
