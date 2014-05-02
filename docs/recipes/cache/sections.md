---
Title:    Organizing Your Cache into Sections
Topics:   cache
Code:     Cache::section()
Id:       101
Position: 9
---

{problem}
You have many items in your cache and want to organize them.
{/problem}

{solution}
Organize your cache into sections.

You can use the `Cache::section()` method to specify categories or _groups_ of cache keys.

{php}
$item = Cache::section('inventory')->get('last-purchased');
{/php}

The nice thing about sections is you can treat the entire section as sort of a "mini-cache" and use all the cache methods on just that section.

{php}
// Store a value
Cache::section('section')->put('key', 'value', $minutes);

// Retrieve a value
$value = Cache::section('section')->get('key');

// Flush the whole section
Cache::section('section')->flush();
{/php}
{/solution}

{discussion}
Sections aren't available for every Cache driver.

Neither the File Cache driver nor the Database Cache driver supports cache sections.
{/discussion}
