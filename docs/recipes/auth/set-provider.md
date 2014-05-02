---
Title:    Setting the Authentication User Provider
Topics:   -
Code:     Auth::setProvider()
Id:       236
Position: 41
---

{problem}
You want to use a different user provider for authentication.
{/problem}

{solution}
Use the `Auth::setProvider()` method.

{php}
Auth::setProvider($user_provider);
{/php}

The provider must implement `Illuminate\Auth\UserProviderInterface`.
{/solution}

{discussion}
This is an advanced topic.

Generally, the authentication driver you use will automatically set up the correct user provider.

But this method is available for customization. Make sure you call this method before the authentication routines are accessed. Either a service provider or in `app/start/global.php` is a good location.
{/discussion}
