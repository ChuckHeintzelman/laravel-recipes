---
Title:    Setting up the WinCache Cache Driver
Topics:   cache, configuration
Code:     -
Id:       98
Position: 7
---

{problem}
You are running PHP in Windows and want to use the WinCache Driver.
{/problem}

{solution}
Configure caching to use it.

Edit `app/config/cache.php` and change the driver to `'wincache'`.

{php}
    'driver' => 'wincache',
{/php}
{/solution}

{discussion}
WinCache requires the IIS server using the FastCGI extension.

Detailed setup instructions are beyond the scope of this book. You can find out more at:

* [PHP Documentation Page](http://www.php.net/manual/en/wincache.requirements.php)
* [WinCache PECL Page](http://pecl.php.net/package/wincache)
{/discussion}
