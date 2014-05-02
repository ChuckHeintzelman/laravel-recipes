---
Title:    Binding an Interface to an Implementation
Topics:   IoC container
Code:     App::bind(), App::make()
Id:       33
Position: 4
---

{problem}
PHP cannot instantiate interfaces

But you like to write beautiful code following SOLID design principles. How can you make interfaces automatically resolve into concrete classes?
{/problem}

{solution}
Use `App::bind()`

{php}
// Bind as an alias
App::bind('FooInterface', 'FooClass');

// Bind as a closure
App::bind('FooInterface', function($app)
{
	return new FooClass;
});
{/php}

Now, with the above code, whenever you call `App::make('FooInterface')` you'll receive a new instance of a FooClass.
{/solution}

{discussion}
Programming to interfaces is powerful.

When you write code which directly deals with interfaces and leave the decision of what the concrete implementation of those interfaces will be to another area of your application, you've created a powerful application where whole sections of implementation can easily be swapped out.

See [[Where to Keep Your Application Bindings]]
{/discussion}
