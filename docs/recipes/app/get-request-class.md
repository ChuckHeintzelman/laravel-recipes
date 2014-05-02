---
Title:    Getting the Default Request Class
Topics:   -
Code:     App::requestClass()
Id:       209
Position: 27
---

{problem}
You want to see what the class is that Laravel uses to build the request.
{/problem}

{solution}
Use the `App::requestClass()` method.

{php}
echo "Request Class = ", App::requestClass();
{/php}
{/solution}

{discussion}
The same method is used for changing the default request class.

But you must call the method differently. See [[Changing the Default Request Class]].
{/discussion}
