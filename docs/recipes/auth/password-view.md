---
Title:    Changing the View For Password Reminders
Topics:   authentication, configuration
Code:     -
Id:       76
Position: 10
---

{problem}
You don't care for the default email sent users for password reminders.
{/problem}

{solution}
Change the email view.

You can edit the file `reminder.blade.php` in the `app/views/emails/auth` directory. This is what the password reminder component uses to build the email.

The default version is below.

{html}
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Password Reset</h2>

    <div>
      To reset your password, complete this form:
      {{ URL::to('password/reset', array($token)) }}.
    </div>
  </body>
</html>
{/html}

You can change the view itself, or change the location of the view by editing your `app/config/auth.php` file.

{php}
    'reminder' => array(
        'email' => 'emails.auth.reminder',
    ),
{/php}

Simply change the `reminder.email` setting to a different view name.
{/solution}

{discussion}
This is the only default view provided by Laravel.

But, if you followed the recipe for [[Creating a Reminders Controller]] then there are two more views you'll need to create.

`views/password/remind.blade.php`

: This view should be created to accept an email address. This will be the view your application should link to with a "Forgot Password?" type link.

`views/password/reset.blade.php`

: This view should be created for a user to change their password. The email the user recieves contains a link back to this form. The form must contain four fields: 'email', 'password', 'password_confirmation', and 'token'.
{/discussion}
