---
Title:    Editing the Hosts File
Topics:   configuration
Code:     -
Id:       24
Position: 1
---

{problem}
You need fake hostnames.

You need to use different hostnames to test multiple Laravel applications but don't want to set up the hostnames in a DNS server. Instead, you want to use an _internal_ hostname.
{/problem}

{solution}
Edit your hosts file.

The following examples illustrate adding `myapp.localhost.com` pointing to IP address `192.168.100.100`.

#### Editing the Hosts file in Linux

{bash}
laravel:~$ sudo vi /etc/hosts
{/bash}

Add the line to the file:

{text}
192.168.100.100   myapp.localhost.com
{/text}

Save the file then flush the DNS

{bash}
laravel:~$ sudo service dns-clean start
{/bash}

#### Editing the Hosts file in OS X

{bash}
$ sudo nano /private/etc/hosts
{/bash}

Add the line to the file:

{text}
192.168.100.100   myapp.localhost.com
{/text}

Save the file then flush the DNS

{bash}
$ dscacheutil -flushcache
{/bash}

#### Editing the Hosts file in Windows

Open a command prompt with administrator priveleges.

Then ...

{text}
C:\Windows\System32>cd \Windows\System32\drivers\etc
C:\Windows\System32\drivers\etc>notepad hosts
{/text}

Add the line to the file:

{text}
192.168.100.100   myapp.localhost.com
{/text}

Save the file, then from the administrator command prompt, flush the dns.

{text}
C:\Windows\System32\drivers\etc>ipconfig /flushdns
{/text}
{/solution}

{discussion}
There are conventions for naming internal hostnames.

For example, here are several variations for an application named **MyApp**.

* myapp.local
* myapp.dev
* myapp.localhost.com

{warn}
Keep in mind if you're developing Laravel applications using a Vagrant box, you must edit the hosts file both in the box (the Linux instructions) and in your host operating system. This allows the web server to provide the correct virtual host within the vagrant box and allows you to use your browser on your host operating system to access that virtual host.
{/warn}
{/discussion}
