---
Title:    Using a Cache Key Prefix
Topics:   cache
Code:     -
Id:       276
Position: 24
---

{problem}
You have multiple applications using the same cache and want to differentiate keys between them.
{/problem}

{solution}
Set an application specific cache prefix.

Edit your `app/config/cache.php` file and change the `prefix` setting.

{php}
<?php
// app/config/cache.php
return array(
    ...
    'prefix' => 'myprefix',
);
?>
{/php}
{/solution}

{discussion}
Every item retrieved or stored in the cache will automatically have this prefix.

Note the File and Array cache drivers do not use the prefix. This is because those drivers are already considered application specific.
{/discussion}
