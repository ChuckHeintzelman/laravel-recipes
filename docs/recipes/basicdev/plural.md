---
Title:    Understanding Pluralization Rules
Topics:   -
Code:     -
Id:       117
Position: 5
---

{problem}
You want to know the best practices for pluralization.

You want to know the standard to follow for naming tables and objects.
{/problem}

{solution}
Unfortunately, there is no one accepted way to do it.

Pick a standard for your application and stick with it. Some developers use singular forms for every thing with the justification that a table is really a single entity which holds multiple entities, thus you should refer to the _User Table_ as a single concept, not the _Users_ table.
{/solution}

{discussion}
Laravel implements pluralized tables for singular models. In other words an object named _User_ is stored in a table named _users_.

Following this same logic through, here are a few examples.

* A "person" object - `Person`
* Table full of `Person` objects - `people`
* RESTful interface to the "person" object - `api/people`, `api/people/{id}`
* A single order detail line object - "OrderDetail"
* Table full of `OrderDetail` objects - `order_details`.
* RESTful interface to Order Details - `api/orders/{orderid}/details`, `api/orders/{orderid}/details/{id}`
{/discussion}
