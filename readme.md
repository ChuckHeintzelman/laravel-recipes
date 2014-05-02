# Laravel Recipes

## Contents

* Origin Story (and Creative Commons)
* Installing Laravel Recipes
* How to Edit Existing Recipes
* How to Create New Recipes

## Origin Story (and Creative Commons)

I created laravel-recipes.com with the intention of having a site with hundreds of little "how-tos" explaining every aspect of Laravel. From the beginning tasks to more advanced techniques. It was going to be amazing.

And it was.

But I didn't realize how _huge_ an undertaking this would be. I created almost 300 recipes before this realization. After much head-scratching I decided to open this up to the community at large.

I struggled to find the perfect license for this. I looked at GPL and others, but since this site not only contains code but also content that could be used in a variety of mediums. I settled on the Creative Commons license.

Which means you can share, change, adapt laravel-recipes in any way and redistribute in any format, for any purpose (even commercially) as long as you give appropriate credit and share alike.

[Creative Commons Details](http://creativecommons.org/licenses/by-sa/4.0/)

## Installing Laravel Recipes

Here's a quick start guide:

1. Clone the ChuckHeintzelman/laravel-recipes repository from github
2. Update `bootstrap/start.php` and set up an environment override
3. Add `app/config/YOURENV/database.php` and configure it
4. Run `artisan migrate` to set up the databases
5. Run `artisan recipe:sync` to sync your database with the `docs`
6. Point your web browser at `laravel-recipes/public` and enjoy

# How to Edit Existing Recipes

Editing an existing recipe is easy. Just find the recipe in the `docs/recipes` directory tree and make changes there.

**NOTE** Never change **Id** or **Position** in the header of the markdown document containing the recipe.

When finished making the changes first do a:

    artisan recipe:scan

This will tell you if there any problems with the recipe file. Once verified, you can update your local database with:

    artisan recipe:sync

If that works successfully, clear your application's cache (`artisan cache:clear`) and make sure it looks correct on your local install. When it does, create a pull request to get your change merged into the project.

# How to Create New Recipes

TODO
