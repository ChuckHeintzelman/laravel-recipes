---
Title:    Getting the Session Store
Topics:   forms
Code:     Form::getSessionStore()
Id:       178
Position: 27
---

{problem}
You want to access the session implementation used by the `Form` facade.
{/problem}

{solution}
Use the `Form::getSessionStore()` method.

{php}
$session = Form::getSessionStore();
{/php}
{/solution}

{discussion}
Generally this is not needed.

You can access the `Session` facade directly. But if you have a complicated application with different session handlers for different parts of your application, Laravel provides this method.
{/discussion}
