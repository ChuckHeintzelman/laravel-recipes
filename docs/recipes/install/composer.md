---
Title:    Installing Composer
Topics:   Composer, installation
Code:     -
Id:       18
Position: 4
---

{problem}
You want to install Composer.

You know Laravel uses Composer extensively for it's package management, but do not have Composer installed on your machine.
{/problem}

{solution}
Install it with two simple commands.

{bash}
laravel:~$ curl -sS https://getcomposer.org/installer | php
laravel:~$ sudo mv composer.phar /usr/local/bin/composer
{/bash}

Verify it's installed by checking the version.

{bash}
laravel:~$ composer --version
{/bash}

You should see something like:

{text}
Composer version d3ff302194a905be90136fd5a29436a42714e377
{/text}
{/solution}

{discussion}
Composer is a dependency manager for PHP.

Composer allows you to declare libraries your PHP project requires and automatically installs and maintains these libraries for you.

The above instructions are for Linux, specifically Ubuntu 13.04. If you're running a different operating system, visit [getcomposer.org](http://getcomposer.org/doc/00-intro.md) and follow the instructions for your operating system.
{/discussion}
