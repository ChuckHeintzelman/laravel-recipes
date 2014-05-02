---
Title:    Creating a Vagrant Box
Topics:   Git, installation, Subversion, Vagrant
Code:     -
Id:       17
Position: 3
---

{problem}
You need to create a "box" in Vagrant.

Even though you have VirtualBox and Vagrant installed, you can't get any work done without a box to work within.
{/problem}

{solution}
Create a Vagrant Box.

For this example we'll create an Ubuntu 14.04 64bit vanilla box. The term _vanilla_ means nothing extra is installed. It is just like a freshly installed machine.

#### Step 1 - Create a directory for our box

From a terminal window, create the directory structure.

{bash}
$ mkdir vagrant
$ mkdir vagrant/laravel
$ mkdir vagrant/laravel/projects
{/bash}

#### Step 2 - Create the Vagrantfile

Change into the newly created `vagrant/laravel` directory and create a new file there called `Vagrantfile` with the following content.

{ruby}
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "https://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"
  config.vm.network :private_network, ip: "192.168.100.100"
end
{/ruby}

#### Step 3 - Create the virtual machine

This will download, create and configure the virtual machine based on the contents of the `Vagrantfile` we created.

{bash}
$ cd vagrant/laravel
$ vagrant up
{/bash}

This can take a while, especially if its the first time you've installed the `precise64` box.

#### Step 4 - Tweak the Box

Next we'll connect to the virtual machine, and do some minor tweaks.

{bash}
$ cd vagrant/laravel
$ vagrant ssh
{/bash}

After you successfully connect, your prompt will change to `vagrant@precise64-vanilla`. This indicates you are logged into the virtual machine.

{bash}
vagrant@precise64-vanilla:~$ echo "export PS1='laravel:\w\$ '" >> .bashrc
vagrant@precise64-vanilla:~$ ln -s /vagrant/projects
vagrant@precise64-vanilla:~$ cat << EOF | sudo tee -a /etc/motd.tail

***************************************

Welcome to precise64-vanilla Vagrant Box

For Laravel development

***************************************
EOF
vagrant@precise64-vanilla:~$ exit
{/bash}

#### Step 5 - Install basic items

Now when you connect you'll receive new welcome message we created in the last step and your prompt will now be `laravel` instead of `vagrant@precise64-vanilla`.

{bash}
$ cd vagrant/laravel
$ vagrant ssh
laravel:~$ sudo apt-get update
laravel:~$ sudo apt-get install -y python-software-properties build-essential
laravel:~$ sudo add-apt-repository -y ppa:ondrej/php5
laravel:~$ sudo apt-get update
laravel:~$ sudo apt-get install git-core subversion curl php5-cli php5-curl \
laravel:~$ exit
{/bash}
{/solution}

{discussion}
Here's a breakdown of each step.

Step 1

: A subdirectory called `vagrant` was created. This is where any Vagrant files will be created. The one `laravel` directory will contain the virtual machine we're setting up. If you set up another virtual machine, create an additional directory to use as the base directory.

Step 2

: The `Vagrantfile` was created to specify the name of the box (precise64) and the url it can be found at. The first time you install a box Vagrant downloads it, but subsequent installs are much faster.

: The `config.vm.network` line specifies this box will have the IP of 192.168.100.100. You can use any IP address as long as it doesn't conflict with something else in your network. Keep the first two numbers 192 and 168, though.

: When the machine is running, you'll be able to point your browser to 192.168.100.100 and see the web page from the virtual machine.

Step 3

: The `vagrant up` command will initialize the virtual machine and bring it up. This step can take a while. Especially since the first time you do it the _precise64_ operating system must be downloaded. Once the machine is configured, it only takes a second or two to bring it up.

Step 4

: The `echo "export PS1..."` line will make it so the next time we ssh to the virtual machine, it will show a prompt of `vagrant:~$` instead of `vagrant@precise64-vanilla:~$`. If you have multiple Vagrant boxes you should have the prompt mean something special so you always know which box you're on.

: The `ln -s /vagrant/projects` will create a symbolic link in the home directory of the projects folder created back in Step 1. Any new Laravel projects will be created here and can be edited from the host operating system. Vagrant shares that folder with the host OS. If you edit `~/vagrant/laravel/projects/test.txt` from your host OS, you'll be able to see it within Vagrant as `~/projects/test.txt`.

Step 5

: This step installed basic system utilities in the Vagrant machine including git, subversion, and the latest version of PHP.

{tip}
These setup steps are known as provisioning. Vagrant provides multiple ways to provision a box. See [[Provisioning Vagrant with a Shell Script]]
{/tip}
{/discussion}
