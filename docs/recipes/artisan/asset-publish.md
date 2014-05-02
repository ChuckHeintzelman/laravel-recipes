---
Title:    Publishing a Package's Assets to Your Public Directory
Topics:   artisan
Code:     -
Id:       279
Position: 26
---

{problem}
You want to copy a third party package's assets to your application.
{/problem}

{solution}
Use the `php artisan asset:publish` command.

{bash}
$ php artisan asset:publish cool-package
{/bash}

This copies the assets from the third party package into your application's `public/packages/cool-package` directory, making them available in the web space.
{/solution}

{discussion}
For non-Laravel packages you may need to specify the path.

{bash}
$ php artisan asset:publish cool-package --path=/package/dir
{/bash}

For workbench packages, you can simply specify the workbench name.

{bash}
$ php artisan asset:publish --bench=cool-package
{/bash}
{/discussion}
