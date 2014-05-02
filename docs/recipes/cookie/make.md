---
Title:    Creating a new Cookie
Topics:   cookies
Code:     Cookie::make()
Id:       48
Position: 1
---

{problem}
You want to create a cookie.
{/problem}

{solution}
Use `Cookie::make()`

You can use this method to generate a new cookie. Keep in mind, this does not send a cookie to the user, it simply creates a cookie object.

To create a simple cookie, which will expire at the end of the user's session.

{php}
$cookie = Cookie::make($name, $value);
{/php}

To create a cookie that won't expire for 60 minutes, add a third parameters.

{php}
$cookie = Cookie::make($name, $value, 60);
{/php}

Of course, you can pass all the normal cookie parameters.

{php}
$cookie = Cookie::make($name, $value, $minutes, $path, $domain,
                       $secure, $httpOnly);
{/php}
{/solution}

{discussion}
What should you do with the cookie?

Well, normally, you'd send it the user. Additional recipes coming for this.
{/discussion}
