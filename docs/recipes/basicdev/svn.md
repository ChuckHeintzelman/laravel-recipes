---
Title:    Managing Your Project With Subversion
Topics:   Subversion, version control
Code:     -
Id:       42
Position: 3
---

{problem}
You aren't using a version control system.

You want to track code changes in your Laravel project and aren't sure what to use.
{/problem}

{solution}
Use [Subversion](http://subversion.apache.org/).

### Step 1 - Import an empty project

{bash}
laravel:~$ cd myapp
laravel:~/myapp$ svn import --depth=empty . svn://myrepo/projects/myapp \
> -m "Initial import"
{/bash}

### Step 2 - Check out the empty project into existing project

{bash}
laravel:~/myapp$ svn checkout svn://myrepo/projects/myapp .
{/bash}

### Step 3 - Delete unnessesary files

{bash}
laravel:~/myapp$ rm .gitattributes
laravel:~/myapp$ rm .gitignore
laravel:~/myapp$ rm bootstrap/compiled.php
laravel:~/myapp$ rm app/storage/*/*
{/bash}

### Step 4 - Ignore directory, add files

{bash}
laravel:~/myapp$ svn propset svn:ignore vendor .
laravel:~/myapp$ svn update
laravel:~/myapp$ svn add a* b* c* C* p* r* s*
laravel:~/myapp$ svn propset svn:ignore compiled.php bootstrap/
laravel:~/myapp$ svn propset svn:ignore \* app/storage/cache/
laravel:~/myapp$ svn propset svn:ignore \* app/storage/logs/
laravel:~/myapp$ svn propset svn:ignore \* app/storage/meta/
laravel:~/myapp$ svn propset svn:ignore \* app/storage/sessions/
laravel:~/myapp$ svn propset svn:ignore \* app/storage/views/
{/bash}

### Step 5 - Check everything in

{bash}
laravel:~/myapp$ svn update
laravel:~/myapp$ svn commit -m "Initial import"
{/bash}
{/solution}

{discussion}
This is just one way to do it.

There may be an easier ways for your project. Here's a few alternatives:

* Create an empty subversion project to work with before creating your Laravel project.
* Use a graphical interface to manage the project in subversion.
* Import everything initially.

It's up to you.

A couple things to note ...

In Step 3

: We deleted the files that Laravel will build automatically.

In Step 4

: All those `svn propset` commands are to keep subversion from wanting to manage the vendor directory and contents of logs, cache, etc.
{/discussion}
