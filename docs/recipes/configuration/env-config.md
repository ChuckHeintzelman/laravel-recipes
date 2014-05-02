---
Title:    Environment Specific Configurations
Topics:   configuration, environment
Code:     App::detectEnvironment()
Id:       27
Position: 4
---

{problem}
You want a different configuration than production.

Your application needs different settings depending on if it's running in production, staging, or in your development environment.
{/problem}

{solution}
Use environment specific configurations.

You'll need to set up your application to detect the environment and then you'll be able to use additional configuration files for each environment.

#### Step 1 - Update boostrap/start.php

Find the lines that look something like the following within `bootstrap/start.php`.

{php}
$env = $app->detectEnvironment(array(
	'local' => array('your-machine-name'),
));
{/php}

The code above will set the environment to **local** if the hostname of the machine is **'your-machine-name'**.

{warn}
Laravel 4.1 no longer detects the hostname of the web request. That was an insecure method of determining the environment and has been deprecated. Only the machine's name (as returned by `gethostname()`) is used.
{/warn}

Change this to match the your machine's hostname.

{php}
$env = $app->detectEnvironment(array(
	'local' => array('mymachine'),
));
{/php}

You can test multiple machines at once.

{php}
$env = $app->detectEnvironment(array(
	'local' => array('mymachine1', 'mymachine2'),
	'staging' => array('staging-server'),
));
{/php}

#### Step 2 - Create a config folder for your environment

{bash}
$ mkdir app/config/local
{/bash}

#### Step 3 - Add your own config files

Example `app/config/local/app.php` file with debug on and timezone set.

{bash}
<?php
return array(
	'debug' => true,
	'timezone' => 'America/Los_Angeles',
);
?>
{/bash}
{/solution}

{discussion}
How configurations are merged.

Values from environment specific configuration files are _merged_ into the main configuration files. Thus in the example above (assuming environment is detected as _local_), the following will happen.

{php}
<?php
// key comes from app/config/app.php.
// this will output a big long random string
echo Config::get('app.key');

// timezone comes from app/config/local/app.php
// this will output "America/Los_Angeles"
echo Config::get('app.timezone');
?>
{/php}

The environment specific configuration values will take precedence.

{warn}
### Do not use the name 'testing'

An environment named `testing` is reserved for doing unit tests.
{/warn}
{/discussion}
