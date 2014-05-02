---
Title:    Getting the Authentication Request Instance
Topics:   -
Code:     Auth::getRequest()
Id:       233
Position: 38
---

{problem}
You want to access the request instance used by authentication.
{/problem}

{solution}
Use the `Auth::getRequest()` method.

{php}
$request = Auth::getRequest();
{/php}
{/solution}

{discussion}
Usually you can just access the `Request` facade.

By default Laravel uses the same request for both the `Request` facade and the `Auth` facade. This means unless your application is explicitly setting the request, it's easier to use the `Request` facade.
{/discussion}
