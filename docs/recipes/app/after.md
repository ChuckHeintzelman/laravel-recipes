---
Title:    Registering an After Application Filter
Topics:   filters
Code:     App::after()
Id:       54
Position: 7
---

{problem}
You want to do work after every request in your application.
{/problem}

{solution}
Register a "after" application filter.

{php}
App::after(function($request, $response)
{
    // Capture last response
    $content = $response->getContent();
    File::put(storage_path().'/logs/last_response.txt', $content);
});
{/php}
{/solution}

{discussion}
You can modify the response.

Since after filters receive the response object, you can make changes to the response within this filter. See [[Understanding the Request Lifecycle]] to understand exactly when application after filters are called.
{/discussion}
