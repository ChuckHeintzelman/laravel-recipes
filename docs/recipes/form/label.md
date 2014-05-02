---
Title:    Creating a Form Label Element
Topics:   forms
Code:     Form::label()
Id:       154
Position: 5
---

{problem}
You want to create a label on your form.

And you want to use Laravel's `Form` facade to do it.
{/problem}

{solution}
Use the `Form::label()` method.

Using two arguments (name and value).

{html}
{{ Form::label('name', 'Your Name') }}
{/html}

This will output the following.

{html}
<label for="name">Your Name</label>
{/html}

You can also add additional attributes by passing an array as the third argument.

{html}
{{ Form::label('name', 'Your Name', array('class' => 'mylabel')) }}
{/html}

Now the output has a class attribute.

{html}
<label for="name" class="mylabel">Your Name</label>
{/html}
{/solution}

{discussion}
You may eliminate the value argument.

Laravel's smart enough to build a suitable prompt if the second argument is missing.

{html}
{{ Form::label('first_name') }}

{{ Form::label('phone_number') }}
{/html}

This will output.

{html}
<label for="first_name">First Name</label>
<label for="phone_number">Phone Number</label>
{/html}

**Using Form::label() will automatically generate ids**

If the form element the label is _for_ does not have an id attribute, one will be created automatically. In other words, if you have a label for _"phone"_ and the field named "phone" does not have an id, it will automatically use _"phone"_ as the id.

_This only works if the field is generated using the `Form` facade._
{/discussion}
