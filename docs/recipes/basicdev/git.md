---
Title:    Managing Your Project With Git
Topics:   Git, version control
Code:     -
Id:       31
Position: 2
---

{problem}
You aren't using a version control system.

You want to track code changes in your Laravel project and aren't sure what to use.
{/problem}

{solution}
Use [Git](http://git-scm.com/).

{bash}
laravel:~$ cd myapp
laravel:~/myapp$ git init
{/bash}

That's it. Try checking the status.

{bash}
laravel:~/myapp$ git status
{/bash}

You should see all the untracked files.

{text}
# On branch master
#
# Initial commit
#
# Untracked files:
#   (use "git add <file>..." to include in what will be committed)
#
#   .gitattributes
#   .gitignore
#   CONTRIBUTING.md
#   app/
#   artisan
#   bootstrap/
#   composer.json
#   phpunit.xml
#   public/
#   readme.md
#   server.php
#   util/
nothing added to commit but untracked files present (use "git add" to track)
{/text}

Notice the file `composer.lock` is not tracked? You should edit `.gitattributes` and removed the line that has `composer.lock` in it. This way you'll be tracking `composer.lock` too.

{tip}
When you track `composer.lock` with your source code control system it allows you to do a `composer update` on your development machine and then, later, a `composer install` on your production machine. The `composer install` command will make sure all packages are the correct version as specified in the `composer.lock` file. Thus production uses not only the same packages, but the same versions of the packages as your production machine.
{/tip}

If you haven't configured Git with your name and email, it's easy.

{bash}
laravel:~/myapp$ git config --global user.email "you@example.com"
laravel:~/myapp$ git config --global user.name "Your Name"
{/bash}

You can add everything and commit it to your repository with two commands.

{bash}
laravel:~/myapp$ git add .
laravel:~/myapp$ git commit -m "initial checkin"
{/bash}

And a final `status` will show you nothing's changed.

{bash}
laravel:~/myapp$ git status
{/bash}

You should see the following.

{text}
# On branch master
nothing to commit, working directory clean
{/text}
{/solution}

{discussion}
Laravel makes using Git easy.

Laravel automatically provides those hidden Git files to manage things correctly. This keeps you from checking in the entire `vendor` directory or all the log files in `app/storage/logs`.

You can follow your normal Git Workflow, update changes locally, push them to your remote repository (Github maybe?), and feel safe that everything is tracked and protected.
{/discussion}
