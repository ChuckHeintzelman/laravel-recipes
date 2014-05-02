---
Title:    Generating a New Application Key
Topics:   artisan
Code:     Hash::make()
Id:       283
Position: 30
---

{problem}
You want to set a new application key.
{/problem}

{solution}
Use the `php artisan key:generate` command.

{bash}
$ php artisan key:generate
Application key [Idgz1PE3zO9iNc0E3oeH3CHDPX9MzZe3] set successfully.
{/bash}
{/solution}

{discussion}
You shouldn't need to do this.

When you first create your Laravel application, `key:generate` is automatically called.

So it should already be set for you.

If you change it by executing the command again, be aware that passwords saved with `Hash::make()` will no longer be valid.
{/discussion}
