---
Title:    Changing the Password Reminder Expiration
Topics:   authentication, configuration
Code:     -
Id:       77
Position: 11
---

{problem}
You don't like the default password expiration of one hour.
{/problem}

{solution}
Edit your `app/config/auth.php` file.

{php}
    'reminder' => array(
        'expire' => 60,
    ),
{/php}

Change the value of 60 to your desired expiration.
{/solution}

{discussion}
The expiration time is a security feature.

This keeps tokens sent your users short-lived so there's less time for hackers to guess.
{/discussion}
