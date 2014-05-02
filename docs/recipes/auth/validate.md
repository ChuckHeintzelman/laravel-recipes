---
Title:    Validating a User's Credentials
Topics:   -
Code:     Auth::validate()
Id:       216
Position: 21
---

{problem}
You want to validate a user's credentials, but you don't want to log the user in.
{/problem}

{solution}
Use the `Auth::validate()` method.

The method takes an array containing the user's credentials.

{php}
$credentials = [
    'username' => 'mylogin',
    'password' => 'mypass',
];
$valid = Auth::validate($credentials);
if ( ! $valid)
{
    throw new Exception('Invalid credentials');
}
{/php}
{/solution}

{discussion}
The validation will fire an `auth.attempt` event with the credentials.
{/discussion}
