---
Title:    Setting the Session Store Implementation
Topics:   forms
Code:     Form::setSessionStore()
Id:       179
Position: 28
---

{problem}
You want to change the form's session store implementation.
{/problem}

{solution}
Use the `Form::setSessionStore()` method.

{php}
$session = new MySessionHandler;
Form::setSessionStore($session);
{/php}
{/solution}

{discussion}
This is most useful for testing.

If you're unit testing a form macro you've created, this method allows you to mock the session store implementation as needed.
{/discussion}
