---
Title:    Changing Your Authentication Model
Topics:   authentication, configuration
Code:     config/auth.php, RemindableInterface, UserInterface
Id:       11
Position: 8
---

{problem}
You need the change the authentication model from the default `User`.

Your application is using namespaces or you want to use a differently named model for users.
{/problem}

{solution}
Edit `app/config/auth.php` to change the model.

{php}
  	'model' => 'MyApp\Models\User',
{/php}
{/solution}

{discussion}
Don't forget the required interfaces.

If you're using your own model it's important that your model implements Auth's `UserInterface`. If you're implementing the password reminder feature it should also implement `RemindableInterface`.

{php}
<?php namespace MyApp\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface
{
	...
}
{/php}
{/discussion}
