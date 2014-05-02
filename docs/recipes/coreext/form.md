---
Title:    Creating Form Macros
Topics:   form
Code:     Form::button(), Form::checkbox(), Form::close(), Form::email(),
          Form::file(), Form::getIdAttribute(), Form::getSelectOption(),
          Form::getSessionStore(), Form::getValueAttribute(), Form::hidden(),
          Form::image(), Form::input(), Form::label(), Form::macro(),
          Form::model(), Form::old(), Form::oldInputIsEmpty(), Form::open(),
          Form::password(), Form::radio(), Form::reset(), Form::select(),
          Form::selectMonth(), Form::selectRange(), Form::selectYear(),
          Form::setSessionStore(), Form::submit(), Form::text(),
          Form::textarea(), Form::token(), Form::url()
Id:       173
Position: 2
---

{problem}
You'd like to extend the `Form` facade with additional functionality.
{/problem}

{solution}
Use the `Form::macro()` method.

`Form::macro()` allows you to extend the `Form` facade with your own methods.

First you register a macro, then later you can access the macro as you would any of the `Form` methods.

Let's say you add the following code to your `app/start/global.php` file.

{php}
Form::macro('sumthin', function()
{
    return '<input type="sumthin" value="default">';
});
{/php}

Then later, in a Blade template, you can access it.

{html}
{{ Form::sumthin() }}
{/html}

This would output the following.

{html}
<input type="sumthin" value="default">
{/html}

#### Add macros that take arguments

Let's update the `sumthin` macro to take three arguments. First the implementation.

{php}
Form::macro('sumthin', function($value, $count = 10, $start = 1)
{
    $build = array();
    while ($count > 0)
    {
        $build[] = sprintf('<input type="sumthun" value="%s" index="%s">',
          $value, $start);
        $start += 1;
        $count -= 1;
    }
    return join("\n", $build);
});
{/php}

Now `Form::sumthin()` has one required argument and two optional ones. If you don't pass the required argument, Laravel will generate an error.

Use it in a template.

{html}
{{ Form::sumthin('test', 5) }}
{/html}

The output would be.

{html}
<input type="sumthin" value="test" index="1">
<input type="sumthin" value="test" index="2">
<input type="sumthin" value="test" index="3">
<input type="sumthin" value="test" index="4">
<input type="sumthin" value="test" index="5">
{/html}
{/solution}

{discussion}
Examine the source code.

If you look at `FormBuilder.php` in your `vendor/laravel/src/Illuminate\Html` directory you can see several undocumented public methods of the `Form` facade that you can use in your macros.

Your macro code doesn't have access to `$this`, but you can call any of the following handy methods:

* `Form::token()` - See [[Generating a Hidden Field With the CSRF Token]].
* `Form::getIdAttribute()` - See [[Getting the ID Attribute For a Field Name]].
* `Form::getValueAttribute()` - See [[Getting the Value Attribute a Field Should Use]].
* `Form::old()` - See [[Getting a Value From the Session's Old Input]].
* `Form::oldInputIsEmpty()` - See [[Determining if the Old Input is Empty]].
* `Form::getSelectOption()` - See [[Getting the Select Option for a Value]].
* `Form::setSessionStore()` - See [[Setting the Session Store Implementation]].

Or you can call the standard methods:

* `Form::open()` - See [[Opening a New HTML Form]].
* `Form::model()` - See [[Creating a New Model Based Form]].
* `Form::close()` - See [[Closing the Current Form]].
* `Form::label()` - See [[Creating a Form Label Element]].
* `Form::input()` - See [[Creating a Form Input Field]].
* `Form::text()` - See [[Creating a Text Input Field]].
* `Form::password()` - See [[Creating a Password Input Field]].
* `Form::hidden()` - See [[Creating a Hidden Input Field]].
* `Form::email()` - See [[Creating an Email Input Field]].
* `Form::url()` - See [[Creating a URL Input Field]].
* `Form::file()` - See [[Creating a File Input Field]].
* `Form::textarea()` - See [[Creating a Textarea Input Field]].
* `Form::select()` - See [[Creating a Select Box Field]].
* `Form::selectRange()` - See [[Creating a Select Range Field]].
* `Form::selectYear()` - See [[Creating a Select Year Field]].
* `Form::selectMonth()` - See [[Creating a Month Selection Field]].
* `Form::checkbox()` - See [[Creating a Checkbox Input Field]].
* `Form::radio()` - See [[Creating a Radio Button Input Field]].
* `Form::reset()` - See [[Creating a Reset Input Field]].
* `Form::image()` - See [[Creating an Image Input Element]].
* `Form::submit()` - See [[Creating a Submit Button]].
* `Form::button()` - See [[Creating a Button Element]].
* `Form::getSessionStore()` - See [[Getting the Session Store]].

You even can call other macros from your macro.
{/discussion}
