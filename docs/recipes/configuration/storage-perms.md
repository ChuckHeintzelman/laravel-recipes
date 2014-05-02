---
Title:    Changing Storage Path Permissions
Topics:   Apache, configuration, Nginx, permissions
Code:     -
Id:       43
Position: 8
---

{problem}
You're receiving a Permission denied error.

You believe this is because Laravel is trying to write something to the file system and doesn't have permissions to do so.
{/problem}

{solution}
Change the owner or permissions of your storage path.

{bash}
$ cd app/storage
$ sudo chmod 777 *
$ sudo chmod 666 */*
{/bash}
{/solution}

{discussion}
It's likely a user issue.

The instructions in the solution above make the storage directories _world writable_. The real issue is usually one thing.

**Your console user and webserver user are different**

This is normal, but often for development servers it's easier to make your webserver be the same user as your console user. The **Fixing Permissions** section of the two recipes listed below explain how to change this use for Apache and Nginx.

* [[Creating an Apache VirtualHost]]
* [[Creating a Nginx VirtualHost]]
{/discussion}
