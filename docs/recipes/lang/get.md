---
Title:    Getting the Translation for a Key
Topics:   localization
Code:     Lang::get()
Id:       249
Position: 1
---

{problem}
You want to return a language specific message.
{/problem}

{solution}
Use the `Lang::get()` method.

When you pass `Lang::get()` a key, it looks up the key in the translation tables for the current locale. If no match is found, the original key is returned.

{html}
echo Lang::get('message.hello');
{/html}

The above will look in `app/lang/XX/message.php` for a `'hello'` key. _(Note that XX is the current locale setting)_.

If your message contains placeholders, you can pass that as a second argument. Let's say `app/lang/en/message.php` contains the following.

{php}
<?php
return array(
    'hello' => 'Hi there',
    'hello2' => 'Hi there, :person',
);
?>
{/php}

Then the following code would output "Hi there, Chuck".

{php}
echo Lang::get('message.hello2', ['person' => 'Chuck']);
{/php}

If you want to use a specific locale instead of the current locale, you can pass a third argument.

{php}
echo Lang::get('message.hello', array(), 'en');
{/php}

That would always retrieve the English version.
{/solution}

{discussion}
Translation strings are stores in the `app/lang` directory.

{text}
/app
   /lang
      /en
         pagination.php
         reminders.php
         validation.php
      /es
         pagination.php
         reminders.php
         validation.php
{/text}

Add your own files, to create additional "groups" of messages.
{/discussion}
