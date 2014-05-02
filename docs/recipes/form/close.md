---
Title:    Closing the Current Form
Topics:   forms
Code:     Form::close()
Id:       152
Position: 3
---

{problem}
You want to close the current form.

You know you can simply use a `</form>` but want to do it the Laravel way.
{/problem}

{solution}
Use the `Form::close()` method.

This is usually done in a Blade template.

{html}
{{ Form::close() }}
{/html}
{/solution}

{discussion}
This method actually does more than just return a `</form>`.

It also resets the `Form` internals (any defined labels and bound model). This is important if your web page has more than one form.
{/discussion}
