---
Title:    Getting All Created Cache Drivers
Topics:   cache
Code:     Cache::getDrivers()
Id:       263
Position: 12
---

{problem}
You want to retrieve a list of created cached drivers.
{/problem}

{solution}
Use the `Cache::getDrivers()` method.

This method returns an array. The array's key is the name of the driver. The value is the instance of the driver.

{php}
$created_drivers = Cache::getDrivers();
{/php}
{/solution}

{discussion}
If no drivers have been created, an empty array is returned.
{/discussion}
