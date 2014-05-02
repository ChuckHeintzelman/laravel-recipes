---
Title:    Setting a Specific Configuration Value
Topics:   configuration
Code:     Config::get(), Config::set()
Id:       39
Position: 4
---

{problem}
You want to set a configuration option.

But you don't want this value to be stored as part of your permanent configuration.
{/problem}

{solution}
Use `Config::set()`

Let's say you want to set the session driver to use the array driver.

{php}
Config::set('session.driver', 'array');
{/php}

Now, for the remainer of the request, any time `Config::get('session.driver')` is called, the value `array` will be returned.
{/solution}

{discussion}
The only affects the current request.

If you want to change a configuration value permanently, so all future requests will retrieve the same value, you must edit the appropriate configuration file.
{/discussion}
