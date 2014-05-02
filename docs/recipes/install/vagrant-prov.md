---
Title:    Provisioning Vagrant with a Shell Script
Topics:   Apache, installation, MySQL, Vagrant
Code:     -
Id:       23
Position: 9
---

{problem}
You want to speed up setting up new Vagrant boxes.

You understand using Vagrant to manage virtual machines, but don't like all the manual provisioning steps when you first set up a machine.
{/problem}

{solution}
Use a provision shell script.

The steps below will set up a standard [LAMP](http://en.wikipedia.org/wiki/LAMP_%28software_bundle%29) install for Laravel development.

#### Step 1 - Update the Vagrantfile

Add a line to the `Vagrantfile` you created in [[Creating a Vagrant Box]]. This line should come before the line with **end** in it.

{ruby}
config.vm.provision :shell, :path => "provision.sh"
{/ruby}

#### Step 2 - Create provision.sh

Create `provision.sh` in the same directory as your `Vagrantfile` with the following content. _(These commands are everything we've done in the previous Vagrant recipes to set up PHP, Apache, and MySQL.)_

{bash}
#!/usr/bin/env bash

# From Creating a Vagrant Box

echo "export PS1='laravel:\w\$ '" >> .bashrc
ln -s /vagrant/projects
cat << EOF | sudo tee -a /etc/motd.tail
***************************************

Welcome to raring32-vanilla Vagrant Box

For Laravel development

***************************************
EOF

sudo apt-get update
sudo apt-get install -y python-software-properties build-essential
sudo add-apt-repository -y ppa:ondrej/php5
sudo apt-get update
sudo apt-get install -y git-core subversion curl php5-cli php5-curl \
 php5-mcrypt php5-gd

### From Installing Composer

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

### From Installing MySQL

sudo debconf-set-selections <<< 'mysql-server \
 mysql-server/root-password password root'
sudo debconf-set-selections <<< 'mysql-server \
 mysql-server/root_password_again password root'
sudo apt-get install -y php5-mysql mysql-server

cat << EOF | sudo tee -a /etc/mysql/conf.d/default_engine.cnf
[mysqld]
default-storage-engine = MyISAM
EOF

sudo service mysql restart

### From Installing Apache

sudo apt-get install -y apache2 libapache2-mod-php5
sudo a2enmod rewrite
sudo service apache2 restart

echo "You've been provisioned"
{/bash}

**Please Note**: The lines ending with a backslash above are continued on the next line and should be entered as one complete line.
{/solution}

{discussion}
Learn the Vagrant commands.

The main ones you need are `up`, `suspend`, `destroy`, and `provision`.

The provision script will be executed whenever you type `vagrant up` and the box didn't exist. If you do a `vagrant destroy`, then the next type you do a `vagrant up` the provisioning will happen.

The command `vagrant provision` will bring vagrant up and reprovision an already existing box.

Issuing a `vagrant suspend` will remove the virtual machine from memory until the next time you call `vagrant up`.

Vagrant provides other methods of provisioning, such as Chef and Puppet, but shell script provisioning, as we've done above, is the simplest method of provisioning.
{/discussion}
