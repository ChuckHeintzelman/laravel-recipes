---
Title:    Getting the Application Bootstrap File
Topics:   -
Code:     App::getBootstrapFile()
Id:       198
Position: 16
---

{problem}
You want to know the application bootstrap file.
{/problem}

{solution}
Use the `App::getBootstrapFile()`.

This returns the full path to the bootstrap file.

{php}
echo App::getBootstrapFile();
{/php}

Will output something like.

{text}
/apps/example/vendor/laravel/framework/src/Illuminate/Foundation/start.php
{/text}
{/solution}

{discussion}
This is a low-level method.

You can see where this file is loaded in [[Understanding the Request Lifecycle]]. In **The Booting Steps**, it's the block right after "Starts Application" labeled "laravel/start.php".
{/discussion}
