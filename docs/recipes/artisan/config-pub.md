---
Title:    Publishing a Package's Configuration to Your Application
Topics:   artisan
Code:     -
Id:       277
Position: 24
---

{problem}
You want to copy a third party's configuration to your application.
{/problem}

{solution}
Use the `php artisan config:publish` command.

{bash}
$ php artisan config:publish cool-package
{/bash}

This creates all needed configuration files in your `app/config/packages/cool-package` directory.

Often, this is a single file named `config.php`.
{/solution}

{discussion}
For non-Laravel packages you may need to specify the path.

{bash}
$ php artisan config:publish cool-package --path=/some/config/dir
{/bash}
{/discussion}
