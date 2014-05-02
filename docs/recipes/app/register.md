---
Title:    Registering a Service Provider With the Application
Topics:   service providers
Code:     App::register()
Id:       199
Position: 17
---

{problem}
You want to register a service provider with your application.
{/problem}

{solution}
Add a class name to the `providers[]` array in `app/config/app.php`.

This is the normal way to load service providers. You add the name to the end of the array in `app/config/app.php`.

{php}
'providers' => array(
    ...
    'MyApp\Providers\MyServiceProvider',
),
{/php}

Then, during the bootup portion of your application, Laravel will determine if the service provider is deferred. If not it will call your service provider's `register()` method and later, when the application boots, it will call your service provider's `boot()` method.
{/solution}

{discussion}
You can register service providers directly with `App::register()`.

This is a low level function.

You can call it with the name of your provider class, or an actual instance of the class.

{php}
App::register('MyApp\Providers\MyServiceProvider');

// or
$provider = new MyApp\Providers\MyServiceProvider;
App::register($provider);
{/php}

This will immediately call your provider's `register()` method and if the application has been booted it will call the `boot()` method.

Generally, the method of adding the provider to the `app/config/app.php` is a better technique of adding service providers because it keeps all your providers in one location, easily managed.
{/discussion}
