---
Title:    Calling a Static Method on the Default Request Class
Topics:   -
Code:     App::onRequest()
Id:       212
Position: 29
---

{problem}
You want to call a static method on the request class.

But, in case the default class was overridden you want to make sure you're calling the correct class.
{/problem}

{solution}
Use the `App::onRequest()` method.

This method takes two arguments, the method name, and an array of parameters for the method. If the method you wish to call takes no arguments, you can omit the array of parameters.

{php}
$request = App::onRequest('createFromGlobals');
{/php}

See also [[Changing the Default Request Class]].
{/solution}

{discussion}
What are the available methods you can call?

Here's a quick list of what's provided at the time of this writing:

* `createFromBase(SymfonyRequest $request)` - Create an Illuminate request from a Symfony instance.
* `createFromGlobals()` - Creates a new request with values from PHP's super globals.
* `create($uri, $method, $parameters, $cookies, $files, $server, $content)` - Creates a Request based on a given URI and configuration.
* `setFactory($callable)` - Sets a callable able to create a Request instance.
* `setTrustedProxies(array $proxies)` - Sets a list of trusted proxies.
* `getTrustedProxies()` - Gets the list of trusted proxies.
* `setTrustedHosts(array $hostPatterns)` - Sets a list of trusted host patterns.
* `getTrustedHosts()` - Gets the list of trusted host patterns.
* `setTrustedHeaderName($key, $value)` - Sets the name for trusted headers.
* `getTrustedHeaderName($key)` - Get the trusted proxy header name.
* `normalizeQueryString($qs)` - Normalize a query string.
* `enableHttpMethodParameterOverride()` - Enables support for the _method request parameter to determine the intended HTTP method.
* `getHttpMethodParameterOverride()` - Checks whether support for the _method request parameter is enabled.

And if you're overriding the default request class, any public static methods in your class can also be called with `App::onRequest()`.

Keep in mind this list was taken directly from the source code and can change at any point. For a definitive list you should consult the source code yourself.
{/discussion}
