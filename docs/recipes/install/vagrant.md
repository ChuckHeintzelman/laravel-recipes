---
Title:    Installing Vagrant
Topics:   installation, Vagrant, VirtualBox
Code:     -
Id:       16
Position: 2
---

{problem}
You want to develop in an environment similar to production.

You know sometimes errors occur in production that don't occur on your development box. You want your development environment to match your production environment as closely as possible. This way you'll minimize errors caused by differences between the two.
{/problem}

{solution}
Install [Vagrant](http://www.vagrantup.com/) to configure and manage your work environment.

{warn}
#### Vagrant Requires a Virtual Machine Provider

If you don't have VirtualBox or VMWare set up on your machine, you'll need to install that before continuing. See [[Installing VirtualBox]]
{/warn}

#### Step 1 - Visit Vagrant's web page

Point your web browser to the [Vagrant](http://www.vagrantup.com/) page.

![Vagrant Home Page](images/vagrant.jpg)

#### Step 2 - Download and install the binary

From the Vagrant home page, click on the *Downloads* link. Then click on the latest version. _(At the time of this writing, the latest version is v1.3.5)_

On the next screen, find the package for your operating system. Download it and install it as you would install any package on your computer. Vagrant provides native installers for Windows, Mac OS X, and Linux.

#### Step 3 - Verify it's installed

From a terminal window (or DOS Command Prompt) type `vagrant -v` to see if the program is found.

{bash}
$ vagrant -v
{/bash}

You should see the version. Something like.

{text}
Vagrant 1.3.5
{/text}
{/solution}

{discussion}
This solution only installs the Vagrant program.

You will still need to configure and provision a box to use. See [[Creating a Vagrant Box]].

Vagrant uses VirtualBox (or VMWare) to provide easy-to-configure virtual machines. This let's you set up a reproducible and portable environment simply by specifying a few configuration options.

The greatest benefit to developers is the ability to minimize differences between working and production environments. Also, you can have identical work environments configured on multiple machines.
{/discussion}
