---
Title:    Installing VirtualBox
Topics:   installation, VirtualBox
Code:     -
Id:       15
Position: 1
---

{problem}
You need a virtual machine provider.

You want to use Vagrant to set up your development environment, but don't have a virtual machine provider set up.
{/problem}

{solution}
Install VirtualBox.

#### Step 1 - Visit VirtualBox's web page

Point your web browser to the VirtualBox [downloads](https://www.virtualbox.org/wiki/Downloads) page.

![VirtualBox Download Page](images/virtualbox.jpg)

#### Step 2 - Download and install the binary

Find the latest version for your Operating System, download it and then install it as you would install any package on your computer. VirtualBox provides native installers for Windows, Mac OS X, and Linux.

#### Step 3 - Verify it's installed

From a terminal window type `virtualbox` to see if it starts.

{bash}
$ virtualbox
{/bash}

_(On Windows, look for **Oracle VM VirtualBox** on your start screen.)_
{/solution}

{discussion}
What is VirtualBox?

VirtualBox is a cross-platform virtualization application. This means it extends the capabilities of your computer so that it can run multiple operating systems (inside multiple virtual machines) at the same time.

Using VirtualBox is a great way to test new versions of operating systems before upgrading your main machine.

For software developers, VirtualBox allows you to mimic your production platform. No more headaches because some software feature which worked great on your Mac isn't working in production. Simply do your development within the virtual machine.
{/discussion}
