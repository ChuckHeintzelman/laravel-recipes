---
Title:    Installing APC
Topics:   apc, cache, installation
Code:     -
Id:       91
Position: 10
---

{problem}
You want to speed up your application using a cache.
{/problem}

{solution}
Install APC (Alternative PHP Cache)

It's easy to install with just two lines from your console.

{bash}
$ sudo apt-get install -y php-apc
$ sudo service apache2 restart
{/bash}

The first line installs the package, the second restarts apache.
{/solution}

{discussion}
APC can help your application in two ways.

First of all, is APC's opcode cache. This speeds up the execution of your program by caching the results of PHP's byte-code compiler.

Secondly, you can use APC as a cache within your application. See [[Setting up the APC Cache Driver]] for instructions on using APC as the cache driver.
{/discussion}
