---
Title:    Retrieving a Controller's Before and After Filters
Topics:   filters
Code:     Controller::getAfterFilters(), Controller::getBeforeFilters()
Id:       47
Position: 3
---

{problem}
You need to access the controller's filters.
{/problem}

{solution}
Use `getAfterFilters()` or `getBeforeFilters()` in the controller.

{php}
class SomeController extends Controller {
    public function someMethod()
    {
        // Dump all the before filters
        var_dump($this->getBeforeFilters());
    }
}
{/php}
{/solution}

{discussion}
This is a lower level function.

Generally, you shouldn't need to access the filters within a controller method. The before filters already have ran successfully if you're in any method other than `__construct()`.

The after filters won't fire until after the controller's method returns.

But if you need to access them, this recipe describes how.
{/discussion}
