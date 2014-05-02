---
Title:    Registering Before Filters On a Controller
Topics:   filters
Code:     Controller::beforeFilter()
Id:       41
Position: 1
---

{problem}
You want a filter to occur before any actions on a specific controller.

You thought about adding to `app/filters.php`, but are curious if there's another way to do this.
{/problem}

{solution}
Use `Controller::beforeFilter()`

This is normally done in the constructor of your controller.

{php}
class MyController extends \Controller
{
	public function __construct()
	{
		$this->beforeFilter('auth');
	}
}
{/php}

Just like Route filters, you can add additional arguments.

{php}
class MyController extends \Controller
{
	public function __construct()
	{
		$this->beforeFilter('auth', ['except' => 'login']);
		$this->beforeFilter('csrf', ['on' => 'post']);
	}
}
{/php}

Or implement the filter with a Closure.

{php}
class MyController extends \Controller
{
	public function __construct()
	{
		$this->beforeFilter(function()
		{
			if (date('G') < 6)
			{
				return "This website doesn't work before 6am";
			}
		}
	}
}
{/php}
{/solution}

{discussion}
When does this filter get called?

A Controller before filter get's called at the same place in the request lifecycle as a Route before filter does. It happens after the route is determined, but before the actual route is executed. See [[Understanding the Request Lifecycle]].
{/discussion}
