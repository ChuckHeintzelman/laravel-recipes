---
Title:    Publishing a Package's Views to Your Application
Topics:   artisan
Code:     -
Id:       278
Position: 25
---

{problem}
You want to copy a third party's views to your application.
{/problem}

{solution}
Use the `php artisan view:publish` command.

{bash}
$ php artisan view:publish cool-package
{/bash}

This creates all needed configuration files in your `app/views/cool-package` directory.
{/solution}

{discussion}
For non-Laravel packages you may need to specify the path.

{bash}
$ php artisan view:publish cool-package --path=/package/view/dir
{/bash}
{/discussion}
