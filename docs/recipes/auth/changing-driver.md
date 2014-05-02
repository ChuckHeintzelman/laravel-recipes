---
Title:    Changing Your Authentication Driver
Topics:   authentication, configuration
Code:     config/auth.php
Id:       10
Position: 7
---

{problem}
You don't want to use the Eloquent authentication driver.

You want to use Laravel's built in `Auth` package, but don't want to use the default driver.
{/problem}

{solution}
Switch to the **database** authentication driver.

Edit `app/config/auth.php` and change the driver.

{php}
  	'driver' => 'database',
{/php}

If you're using a different table than **users** then see [[Changing Your Authentication Table]].
{/solution}

{discussion}
Out of the box you have two choices.

Laravel only provides an **eloquent** option and a **database** option out of the box. You can create your own driver though. See [[Using Your Own Authentication Driver]] for details.
{/discussion}
