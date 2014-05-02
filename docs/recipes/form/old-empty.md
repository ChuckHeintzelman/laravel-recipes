---
Title:    Determining if the Old Input is Empty
Topics:   forms
Code:     Form::oldInputIsEmpty()
Id:       177
Position: 26
---

{problem}
You want to see if there's any old input (flashed input data the previous time the form was submitted).
{/problem}

{solution}
Use the `Form::oldInputIsEmpty()` method.

{php}
if ( ! Form::oldInputIsEmpty())
{
    // check the old input value for specific fields
}
{/php}
{/solution}

{discussion}
See also [[Getting a Value From the Session's Old Input]].
{/discussion}
