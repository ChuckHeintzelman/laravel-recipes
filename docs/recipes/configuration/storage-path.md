---
Title:    Changing the Storage Path
Topics:   configuration
Code:     -
Id:       32
Position: 7
---

{problem}
You need to change the location of Laravel's storage path.

The default directories Laravel uses for storing data to the file system does not work for your installation. Permission or other write errors occur.
{/problem}

{solution}
Edit `bootstrap/paths.php` and change the storage location.

{php}
// Change the line below
'storage' => __DIR__.'/../app/storage',

// to what's needed for your install
'storage' => '/home/chuck/my/storage/path',
{/php}

You may also need to create the storage directory and any subdirectories you're using.

{php}
$ mkdir /home/chuck/my/storage/path
$ mkdir /home/chuck/my/storage/path/views
$ mkdir /home/chuck/my/storage/path/meta
$ mkdir /home/chuck/my/storage/path/logs
{/php}

Also create the `sessions` and `cache` directories if needed.
{/solution}

{discussion}
You may only need to change the permissions.

For most installs the default storage path provided by Laravel works fine. Sometimes you may only need to adjust the permissions. See [[Changing Storage Path Permissions]].

But, in those rare cases where the storage location doesn't work, Laravel makes it easy to change.
{/discussion}
