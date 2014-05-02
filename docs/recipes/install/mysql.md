---
Title:    Installing MySQL
Topics:   installation, MySQL
Code:     -
Id:       19
Position: 5
---

{problem}
You need a database server for your Laravel application.

But you don't have a database server installed on your machine.
{/problem}

{solution}
Install MySQL.

Here are the instructions for Ubuntu 13.04.

{bash-lines}
laravel:~$ sudo debconf-set-selections <<< \
> 'mysql-server mysql-server/root_password password root'
laravel:~$ sudo debconf-set-selections <<< \
> 'mysql-server mysql-server/root_password_again password root'
laravel:~$ sudo apt-get install -y php5-mysql mysql-server
laravel:~$ cat << EOF | sudo tee -a /etc/mysql/conf.d/default_engine.cnf
> [mysqld]
> default-storage-engine = MyISAM
EOF
laravel:~$ sudo service mysql restart
{/bash}

This configures MySQL with the `root` user having a password of `root`. The default storage engine is set to `MyISAM`.
{/solution}

{discussion}
MySQL is the worlds most popular open source database.

Here's a breakdown of the steps above:

Lines 1 - 4

: The first four lines of the above instructions issue two Ubuntu specific commands to skip the prompt for the root password when MySQL is installed.

Line 5

: This line installs MySQL and the PHP drivers

Lines 6 - 9

: This creates a new configuration file for MySQL to set the default storage engine to MyISAM. Otherwise, the default is to use InnoDB. If you prefer InnoDB then skip this step.

Line 10

: Restart MySQL to take the configuration change into account.

#### See Also

The [[Setting up the MySQL Database Driver]] recipe.
{/discussion}
