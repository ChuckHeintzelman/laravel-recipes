---
Title:    Installing Redis
Topics:   installation, redis
Code:     -
Id:       95
Position: 12
---

{problem}
You want to speed up your application using a cache.
{/problem}

{solution}
Install Redis

{bash}
$ sudo apt-get install -y redis-server
{/bash}
{/solution}

{discussion}
Now you can configure your cache to use your redis server.

See See [[Setting up the Redis Cache Driver]] for instructions.
{/discussion}
