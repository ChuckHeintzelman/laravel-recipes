---
Title:    Installing XCache
Topics:   cache, installation, XCache
Code:     Cache
Id:       99
Position: 13
---

{problem}
You want to speed up your application using a cache.
{/problem}

{solution}
Install XCache

#### Step 1 - Install XCache

{bash}
$ sudo apt-get install php5-xcache
{/bash}

#### Step 2 - Edit xcache.ini

To use the variable cache you need to edit the `xcache.var_size` setting in the ini file. Usually, this file is located in `/etc/php5/mods-available`

{text}
# Find the line
xcache.var_size = 0M

# Change it to
xcache.var_size = 100M
{/text}

#### Step 3 - Restart apache

{bash}
$ sudo service apache2 restart
{/bash}
{/solution}

{discussion}
XCache is a fast, stable PHP opcode cacher.

It also provides standard get/set/inc/dec cache operations which Laravel can use to drive its `Cache` component.

See [[Setting up the XCache Cache Driver]] for instructions.
{/discussion}
