---
Title:    Creating an Apache VirtualHost
Topics:   Apache, configuration
Code:     -
Id:       25
Position: 2
---

{problem}
The default Apache web page shows for your project.

You have Apache installed and have created a Laravel project, but the web page returned by your browser is the default Apache web page.
{/problem}

{solution}
Create an Apache Virtual Host for your project.

{bash}
laravel:~$ cd /etc/apache2/sites-available
laravel:/etc/apache2/sites-available$ sudo vi myapp.conf
{/bash}

Have the contents of the file match what's below.

{text}
<VirtualHost *:80>
  ServerName myapp.localhost.com
  DocumentRoot "/home/vagrant/projects/myapp/public"
  <Directory "/home/vagrant/projects/myapp/public">
    AllowOverride all
  </Directory>
</VirtualHost>
{/text}

Save the file, then continue below.

{bash}
laravel:/etc/apache2/sites-available$ cd ../sites-enabled
laravel:/etc/apache2/sites-enabled$ sudo ln -s ../sites-available/myapp.conf
laravel:/etc/apache2/sites-enabled$ sudo service apache2 restart
{/bash}

#### Fixing Permissions

If you're running a virtual machine under Vagrant, you may want to change the user and group to avoid permission issues.

To do this:

{bash}
laravel:~$ cd /etc/apache2
laravel:/etc/apache2$ sudo vi envvars
{/bash}

Change the lines below to contain the desired user and group

{text}
export APACHE_RUN_USER=vagrant
export APACHE_RUN_GROUP=vagrant
{/text}

Save the file and restart apache.

{bash}
laravel:/etc/apache2$ sudo service apache2 restart
{/bash}
{/solution}

{discussion}
This solution assumes several things.

1. Your apache version is the type that places virtual hosts in `/etc/apache/sites-*`
2. Your Laravel project is in `/home/vagrant/projects/myapp`
3. You have `myapp.localhost.com` in your hosts file (the host file on your host operating system, where you're browser will run)

If the assumptions above are correct you should be able to point your browser to `http://myapp.localhost.com` and see your Laravel web application.
{/discussion}
