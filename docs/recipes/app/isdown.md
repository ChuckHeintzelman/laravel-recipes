---
Title:    Checking if the Application is Down for Maintenance
Topics:   -
Code:     App::isDownForMaintenance()
Id:       120
Position: 14
---

{problem}
You want to check if your application is down for maintenance.
{/problem}

{solution}
Use the `App::isDownForMaintenance()` method.

{php}
if (App::isDownForMaintenance())
{
    die("We're currently down for maintenance.");
}
{/php}
{/solution}

{discussion}
There's a better way to do this.

See the [[Registering a Maintenance Mode Handler]] recipe. This will allow you to set up an action to occur automatically when you're application is in maintenance mode.

Note that your application is considered in maintenance mode of the file `app/storage/meta/down` exists on your file system.

See also:

* [[Registering a Maintenance Mode Handler]]
* [[Putting the Application in Maintenance Mode]]
* [[Bringing the Application Out of Maintenance Mode]]
{/discussion}
