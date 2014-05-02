---
Title:    Registering After Filters On a Controller
Topics:   filters
Code:     Controller::afterFilter()
Id:       45
Position: 2
---

{problem}
You want a filter to occur after any actions on a specific controller.

You thought about adding to `app/filters.php`, but are curious if there's another way to do this.
{/problem}

{solution}
Use `Controller::afterFilter()`

This is normally done in the constructor of your controller.

{php}
class MyController extends \Controller
{
	public function __construct()
	{
		$this->afterFilter('log');
	}
}
{/php}

You can also implement after filters with a Closure.

{php}
class MyController extends \Controller
{
	public function __construct()
	{
		// dump last response
		$this->afterFilter(function($route, $request, $response)
		{
			$content = $response->getContent();
			File::put(app_storage().'/logs/last_response', $content);
		}
	}
}
{/php}
{/solution}

{discussion}
When does this filter get called?

Controller after filters are called after the the controller method is executed, but before the response is returned to the user. This makes it the ideal place to intercept the response and do some last minute manipulation before the user sees it.
{/discussion}
