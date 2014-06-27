---
Title:    Using Your Own Authentication Driver
Topics:   extension
Code:     -
Id:       115
Position: 1
---

{problem}
Laravel's built-in authentication drivers don't fit your needs.
{/problem}

{solution}
Build your own and extend Laravel.

#### Step 1 - Implement UserProviderInterface

First you must create a class which will handle the authentication. We'll create a silly class which will randomly validate any credentials and 50% of the time return a dummy user.

{php}
<?php namespace MyApp\Extensions;

use Illuminate\Auth\GenericUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;

class DummyAuthProvider implements UserProviderInterface
{
  /**
   * Retrieve a user by their unique identifier.
   *
   * @param  mixed  $id
   * @return \Illuminate\Auth\UserInterface|null
   */
  public function retrieveById($id)
  {
    // 50% of the time return our dummy user
    if (mt_rand(1, 100) <= 50)
    {
        return $this->dummyUser();
    }

    // 50% of the time, fail
    return null;
  }

  /**
   * Retrieve a user by the given credentials.
   * DO NOT TEST PASSWORD HERE!
   *
   * @param  array  $credentials
   * @return \Illuminate\Auth\UserInterface|null
   */
  public function retrieveByCredentials(array $credentials)
  {
    // 50% of the time return our dummy user
    if (mt_rand(1, 100) <= 50)
    {
        return $this->dummyUser();
    }

    // 50% of the time, fail
    return null;
  }

  /**
   * Validate a user against the given credentials.
   *
   * @param  \Illuminate\Auth\UserInterface  $user
   * @param  array  $credentials
   * @return bool
   */
  public function validateCredentials(UserInterface $user, array $credentials)
  {
    // we'll assume if a user was retrieved, it's good
    return true;
  }

  /**
   * Return a generic fake user
   */
  protected function dummyUser()
  {
    $attributes = array(
        'id' = 123,
        'username' => 'chuckles',
        'password' => \Hash::make('SuperSecret'),
        'name' => 'Dummy User',
    );
    return new GenericUser($attributes);
  }

  /**
   * Needed by Laravel 4.1.26 and above
   */
  public function retrieveByToken($identifier, $token)
  {
    return new \Exception('not implemented');
  }

  /**
   * Needed by Laravel 4.1.26 and above
   */
  public function updateRememberToken(UserInterface $user, $token)
  {
    return new \Exception('not implemented');
  }
}
?>
{/php}

#### Step 2 - Extend the Auth component

In a service provider or in `app/start/global.php` add the following line.

{php}
Auth::extend('dummy', function($app)
{
    return new MyApp\Extensions\DummyAuthProvider;
});
{/php}

#### Step 3 - Change the auth driver.

Edit `app/config/auth.php` and change the driver.

{php}
    'driver' => 'dummy',
{/php}
{/solution}

{discussion}
Even though this example is silly, it contains all the components.

If you add an `auth` filter to any of your routes, 50% of the time a user will be authenticated.
{/discussion}
