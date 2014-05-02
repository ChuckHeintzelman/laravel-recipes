---
Title:    Getting the ID Attribute For a Field Name
Topics:   forms
Code:     Form::getIdAttribute(), Form::macro()
Id:       174
Position: 23
---

{problem}
You want to determine what the ID attribute is for a field name.
{/problem}

{solution}
Use the `Form::getIdAttribute()` method.

{php}
$id = Form::getIdAttribute('fieldname', $attributes);
{/php}

This will return the ID or `null` if there is no ID for the field.
{/solution}

{discussion}
This is often used in form macros.

It's common to need to know the ID within a macro. If there's an explicit `'id'` key in your `$attributes` array it's easy, but Laravel can automatically generate ids based on labels within the form.

The method also checks if there's any forms for the field name, returning the ID appropriately if that's the case.

See the [[Creating Form Macros]] recipe information about form macros.
{/discussion}
