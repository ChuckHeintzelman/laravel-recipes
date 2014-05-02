---
Title:    Installing Apache
Topics:   Apache, installation
Code:     -
Id:       20
Position: 6
---

{problem}
You have no web server installed.

You'd like to install a web server for your Laravel application to use.
{/problem}

{solution}
Install Apache.

{bash}
laravel:~$ sudo apt-get install -y apache2 libapache2-mod-php5
laravel:~$ sudo a2enmod rewrite
laravel:~$ sudo service apache2 restart
{/bash}
{/solution}

{discussion}
Apache is the most dominant web server on the Internet.

Notice the second line in the above instructions. This enables **mod-rewrite** with Apache. This is required for Laravel to work correctly.

See also [[Creating an Apache VirtualHost]]
{/discussion}
