---
Title:    Installing Memcached
Topics:   cache, installation, memcached
Code:     -
Id:       93
Position: 11
---

{problem}
You want to speed up your application using a cache.
{/problem}

{solution}
Install Memcached

{bash}
$ sudo apt-get install -y memcached php5-memcached
$ sudo service apache2 restart
{/bash}

The first line installs the package, the second restarts apache.
{/solution}

{discussion}
Now you can configure your cache to use memcached.

See See [[Setting up the Memcached Cache Driver]] for instructions.
{/discussion}
