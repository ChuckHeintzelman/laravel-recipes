---
Title:    Creating a New Artisan Command
Topics:   artisan
Code:     -
Id:       284
Position: 31
---

{problem}
You want to add a new command to artisan.
{/problem}

{solution}
Use the `php artisan command:make` utility.

This will set up a command skeleton for you.

{bash}
$ php artisan command:make TestCommand
Command created successfully.
{/bash}

This will create a `TestCommand.php` in your `app/commands` directory. The skeleton created looks like:

{php}
<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TestCommand extends Command {

  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'command:name';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description.';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function fire()
  {
    //
  }

  /**
   * Get the console command arguments.
   *
   * @return array
   */
  protected function getArguments()
  {
    return array(
      array('example', InputArgument::REQUIRED, 'An example argument.'),
    );
  }

  /**
   * Get the console command options.
   *
   * @return array
   */
  protected function getOptions()
  {
    return array(
      array('example', null, InputOption::VALUE_OPTIONAL,
        'An example option.' null),
    );
  }
}
?>
{/php}

You would then edit this skeleton, updating the command specifics provided, and implementing the `fire()` method.
{/solution}

{discussion}
You still need to make artisan aware of the command.

Add the following line to your `app/start/artisan.php` file.

{php}
Artisan::add(new TestCommand);
{/php}

Depending on the structure of your project, you may also have to dump the autoloader.

{bash}
$ composer dump-autoload
{/bash}

Now the command you created will be available. Artisan should list your new command in its list of commands.

{bash}
$ php artisan list
{/bash}
{/discussion}
