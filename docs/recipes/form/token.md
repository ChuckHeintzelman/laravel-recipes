---
Title:    Generating a Hidden Field With the CSRF Token
Topics:   forms
Code:     Form::model(), Form::open(), Form::token()
Id:       153
Position: 4
---

{problem}
You want to output the CSRF token yourself.

You know Laravel does this automatically with `Form::open()` or `Form::model()` but you want to do it yourself.
{/problem}

{solution}
Use the `Form::token()` method.

{html}
{{ Form::token() }}
{/html}

This will output something like.

{html}
<input name="_token" type="hidden" value="somelongvalue">
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
