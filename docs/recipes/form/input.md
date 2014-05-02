---
Title:    Creating a Form Input Field
Topics:   forms
Code:     Form::email(), Form::file(), Form::hidden(), Form::input(),
          Form::model(), Form::password(), Form::text(), Form::url()
Id:       161
Position: 11
---

{problem}
You want to create a form input field.

Instead of writing HTML directory you want to use Laravel's `Form` facade.
{/problem}

{solution}
Use the `Form::input()` method.

The method takes 4 arguments.

1. `$type` - _(required)_ The first argument specifies the type of input. Values such as `"text"`, `"password"`, `"file"`, etc. are accepted.
2. `$name` - _(required)_ The second argument is name.
3. `$value` - _(optional)_ The third argument is the value for the input field.
4. `$options` - _(optional)_ The fourth argument is an array of additional field attributes. The array can be populated with items having keys such as `"id"`, `"size"`, or `"class"`.

Usually, this is used in a Blade template.

{html}
{{ Form::input('text', 'name') }}
{{ Form::input('email', 'email_address', null, ['class' => 'emailfld']) }}
{/html}
{/solution}

{discussion}
Use the specific method for the type of field you want.

Instead of calling `Form::input()` directly, use one of the following:

* `Form::password()` - [[Creating a Password Input Field]].
* `Form::text()` - [[Creating a Text Input Field]].
* `Form::hidden()` - [[Creating a Hidden Input Field]].
* `Form::email()` - [[Creating an Email Input Field]].
* `Form::url()` - [[Creating a URL Input Field]].
* `Form::file()` - [[Creating a File Input Field]].

### Model binding

See the [[Creating a New Model Based Form]] recipe for details on how the input value is overridden if you bind a model to the form.
{/discussion}
