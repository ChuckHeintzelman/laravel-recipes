---
Title:    Setting the Request for the Console Environment
Topics:   -
Code:     App::setRequestForConsoleEnvironment()
Id:       211
Position: 28
---

{problem}
You have a console application and want to set the request.
{/problem}

{solution}
Use the `App::setRequestForConsoleEnvironment()`.

Usually, you don't need the whole HTTP layer Laravel provides when developing console utilities. But when you do, you can use this command.

{php}
App::setRequestForConsoleEnvironment();
{/php}
{/solution}

{discussion}
This is most handy with unit testing.

When unit testing sometimes it's nice to "fake" a request environment.

If you're deriving your unit tests from the file Laravel provides for you (`app/tests/TestCase.php`) the `App::setRequestForConsoleEnvironment()` is called automatically for you.
{/discussion}
