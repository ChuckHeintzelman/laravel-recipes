---
Title:    Creating a Simple Middleware Class
Topics:   middleware
Code:     -
Id:       114
Position: 2
---

{problem}
You want to add middleware to your application but don't know where to begin.
{/problem}

{solution}
Create a simple middleware class.

#### Step 1 - Create the class

{php}
<?php namespace MyApp;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Middleware implements HttpKernelInterface {

  protected $app;

  /**
   * Constructor
   */
  public function __construct(HttpKernelInterface $app)
  {
    $this->app = $app;
  }

  /**
   * Handle the request, return the response
   *
   * @implements HttpKernelInterface::handle
   *
   * @param  \Symfony\Component\HttpFoundation\Request  $request
   * @param  int   $type
   * @param  bool  $catch
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function handle(Request $request,
    $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
  {
    // 1) Modify incoming request if needed
    ...

    // 2) Chain the app handler to get the response
    $response = $this->app->handle($request, $type, $catch);

    // 3) Modify the response if needed
    ...

    // 4) Return the response
    return $response;
  }
}
?>
{/php}

#### Step 2 - Register the Middleware Class

You need to do this in the `register()` method of a service provider.

{php}
App::middleware('MyApp\Middleware');
{/php}

{tip}
Alternatively you can install a simple package I created which allows you to register your middleware in `app/start/preboot.php`. See [Laravel-Hooks](https://github.com/ChuckHeintzelman/Laravel-Hooks) for details.
{/tip}
{/solution}

{discussion}
The above class doesn't do anything.

But it's a good skeleton to start with. Obviously, you'll need to change the namespace and classname to fit your application.

Then you may want to try logging something to make sure it works. You can update the `handle()` method of your class as specified below.

{php}
// In step #1) Modify incoming request if needed

// Log to a file. Since app/start/global.php hasn't been hit
// yet the Log facade isn't set to log to a file yet. So just
// write directly to a file.
$logfile = storage_path().'/logs/laravel.log';
error_log("Middleware entry\n", 3, $logfile);

// In step #3) Modify reponse if needed

// Log to a file. We're safe to use the Log facade now that
// it should be set up in app/start/global.php
Log::info("Middleware exit");
{/php}

Now you can examine your `app/storage/logs/laravel.log` file to see that your middleware works.
{/discussion}
