---
Title:    Creating a Reminders Controller
Topics:   artisan, authentication, password reminders
Code:     -
Id:       73
Position: 21
---

{problem}
You want to create the code to implement password reminders.
{/problem}

{solution}
Use the `php artisan auth:reminders-controller` command.

{php}
$ php artisan auth:reminders-controller
{/php}

This creates a file in your `app/controllers` directory which contains handlers for the following routes:

* GET /password/remind - Display the password reminder view
* POST /password/remind - Handles a POST request to remind user of password.
* GET /password/reset/{token} - Display the password reset view for a token
* POST /password/reset - Handles the request to reset user's password

Here's the file `controllers/RemindersController.php` which was created using this method.

{php}
<?php

class RemindersController extends Controller {

  /**
   * Display the password reminder view.
   *
   * @return Response
   */
  public function getRemind()
  {
    return View::make('password.remind');
  }

  /**
   * Handle a POST request to remind a user of their password.
   *
   * @return Response
   */
  public function postRemind()
  {
    switch (Password::remind(Input::only('email')))
    {
      case Password::INVALID_USER:
        return Redirect::back()->with('error', Lang::get($reason));

      case Password::REMINDER_SENT:
        return Redirect::back()->with('status', Lang::get($reason));
    }
  }

  /**
   * Display the password reset view for the given token.
   *
   * @param  string  $token
   * @return Response
   */
  public function getReset($token = null)
  {
    if (is_null($token)) App::abort(404);

    return View::make('password.reset')->with('token', $token);
  }

  /**
   * Handle a POST request to reset a user's password.
   *
   * @return Response
   */
  public function postReset()
  {
    $credentials = Input::only(
      'email', 'password', 'password_confirmation', 'token'
    );

    $response = Password::reset($credentials, function($user, $password)
    {
      $user->password = Hash::make($password);

      $user->save();
    });

    switch ($response)
    {
      case Password::INVALID_PASSWORD:
      case Password::INVALID_TOKEN:
      case Password::INVALID_USER:
        return Redirect::back()->with('error', Lang::get($response));

      case Password::PASSWORD_RESET:
        return Redirect::to('/');
    }
  }
}
?>
{/php}

You only need to add one line to your `app/routes.php` file to set up routing for this controller.

{php}
Route::controller('password', 'RemindersController');
{/php}
{/solution}

{discussion}
You should modify this.

Using the `php artisan auth:reminders-controller` is a good place to start, but you'll probably want to make some modifications specific to your application.

If you're using namespaces then move the controller elsewhere, edit it as appropriate, and edit your routes.

#### Changing to a RESTful implementation

One suggestion is to change from using a Controller routing, to a more RESTful way of handling things. To do this:

* Change the `getRemind()` method to `index()`.
* Change the `postRemind()` method to `store()`.
* Change the `getReset()` method to `show()`.
* Change the `postReset()` method to `update()`.

You'll also have to update your views accordingly. Then your `app/routes.php` file should contain.

{php}
Route::resource('password', 'RemindersController', array(
    'only' => array('index', 'store', 'show', 'update')
));
{/php}
{/discussion}
