---
Title:    Understanding What Middleware Is
Topics:   middleware
Code:     -
Id:       113
Position: 1
---

{problem}
You've heard about Laravel's middleware, but don't understand it.
{/problem}

{solution}
It's pretty easy really.

Each middleware class is constructed with a reference to the middleware below it and must implement the `handle()` method. This creates a _stack_ of middleware.

{text}
+---------------------+
| Your middleware     |
+---------------------+
| Session middleware  |
+---------------------+
| Cookie middleware   |
+---------------------+
| Laravel application |
+---------------------+
{/text}

The `handle()` method your middleware implements will receive the Request. Your `handle()` implementation must do four things:

1. Modify the Request if needed.
2. Call the middleware below it, receiving the Response.
3. Modify the Response if needed.
4. Returns the Response.

The whole process operates a bit like Russian Nested Dolls. The Laravel application is that tiny, innermost doll.

When the Laravel application's `handle()` method is called, it will boot the application, dispatch the request and return the response.
{/solution}

{discussion}
Don't forget you can also shutdown your middleware.

If your middleware class implements `TerminableInterface` then when the application shuts down your middleware's `terminate()` method will be called.
{/discussion}
