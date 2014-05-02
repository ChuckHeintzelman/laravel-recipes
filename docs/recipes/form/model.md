---
Title:    Creating a New Model Based Form
Topics:   forms
Code:     Form::checkbox(), Form::input(), Form::model(), Form::open(),
          Form::radio(), Form::select(), Form::textarea()
Id:       151
Position: 2
---

{problem}
You want the fields in your form to be bound with a model.
{/problem}

{solution}
Open your form with `Form::model()`.

Usually this is done in a blade template.

{html}
{{ Form::model($item, array('route' => array('items.update', $item->id))) }}
{/html}

**Use this instead of `Form::open()`**

Now any `Form::input()`, `Form::textarea()` and `Form::select()` will use the model to populate the data.
{/solution}

{discussion}
There's actually an order of precedence for populating your form. The precedence is **FEM**.

1. **(F)**lash Data from the Session. This is where old input is stored from the previous request. This allows your form to be populated with previously entered data in case of errors.
2. **(E)**xplicitly passed data. For instance, if you call `Form::input()` and specify the value argument, this will be used next.
3. **(M)**odel Data. If the model has the same named attribute as the form field, its value will be used.
{/discussion}
