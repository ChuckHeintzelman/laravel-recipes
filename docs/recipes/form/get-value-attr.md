---
Title:    Getting the Value Attribute a Field Should Use
Topics:   forms
Code:     Form::getValueAttribute(), Form::macro(), Form::open()
Id:       175
Position: 24
---

{problem}
You need to determine what the value attribute is for a field name.
{/problem}

{solution}
Use the `Form::getValueAttribute()` method.

{php}
$value = Form::getValueAttribute($fieldname);
{/php}

This will return the value that should be used for the field or `null` if there's no value.

You can also specify a value that takes precedence over the model value if your form is bound to a model.

{php}
$value = Form::getValueAttribute($fieldname, $value);
{/php}

If the flash session data contains a value for this field it still takes precedence, but passing the value as the second argument will take precedence over the model data.

See [[Creating a New Model Based Form]].
{/solution}

{discussion}
This is often used in form macros.

There's a precedence to assigning values to fields. This precedence is discussed in [[Creating a New Model Based Form]].

The `Form::getValueAttribute()` allows you to use the correct value, following the precedence, within your form macro.

See the [[Creating Form Macros]] recipe information about form macros.
{/discussion}
