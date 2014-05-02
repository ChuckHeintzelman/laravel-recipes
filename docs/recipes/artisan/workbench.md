---
Title:    Creating a New Package Workbench
Topics:   artisan, packages
Code:     -
Id:       74
Position: 22
---

{problem}
You want to create a package to share across your Laravel projects.
{/problem}

{solution}
Use the `php artisan workbench` command.

This will allow you to develop your package along side an application.

{php}
$ php artisan workbench yourname/packagename
{/php}

If you also want to create Laravel specific resources, use the `--resources` option.

{php}
$ php artisan workbench yourname/packagename --resources
{/php}
{/solution}

{discussion}
The Laravel workbench is a great way to work on packages.

Using the workbench provides a quicker workflow for package development.

When you create a new workbench, the following structure is created.

{text}
myapp : project directory
|- workbench : workbench directory
|---- yourname : vendor directory
|------- packagename : package root
|---------- src : Source directory
|------------- Yourname : Vendor name again
|---------------- Packagename : Package name again
|------------------- PackageServiceProvider.php - a skeleton
|---------- tests : Directory for unit testing
|---------- vendor : Your package's vendor directory
{/text}

If you use the `--resources` option then `config`, `controllers`, `lang`, `migrations`, and `views` will be also be created in the `src` directory.

Laravel's bootstrap will load any workbench packages automatically.

When you're finished developing your package, you can check everything below the `workbench` directory into a new Github repository, making it available for others to use.
{/discussion}
