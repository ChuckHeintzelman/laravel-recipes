---
Title:    Bulding an HTML Attribute String From an Array
Topics:   html
Code:     Form::macro(), HTML::attributes(), HTML::macro()
Id:       196
Position: 16
---

{problem}
You have an associative array of attributes for an HTML element and want to convert it to a string.
{/problem}

{solution}
Use the `HTML::attributes()` method.

{php}
echo HTML::attributes(array('id' => '123', 'class' => 'myclass'));
{/php}

The above will build a string where the keys of the array are the attribute names and the values of the array are the attribute values. The output will be.

{text}
id="123" class="myclass"
{/text}
{/solution}

{discussion}
This is useful in HTML or Form macros.

It's useful whenever you need to build tag attributes in HTML or even XML.

See [[Creating Form Macros]]
and [[Creating HTML Macros]].
{/discussion}
