---
Title:    Installing Nginx
Topics:   installation, Nginx
Code:     -
Id:       21
Position: 7
---

{problem}
You have no web server installed.

You'd like to install a web server for your Laravel application to use.
{/problem}

{solution}
Install Nginx.

Here are the instructions for Ubuntu 13.04.

{bash}
laravel:~$ sudo apt-get install -y php5-fpm nginx
laravel:~$ sudo service nginx start
{/bash}
{/solution}

{discussion}
Nginx is pronounced "engine-x".

Nginx is rapidly becoming the favorite web server for techies everywhere.

It's fast, easy to configure, and doesn't use as much memory as Apache.

See also [[Creating a Nginx VirtualHost]]
{/discussion}
