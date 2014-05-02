---
Title:    Removing All the Items From the Cache
Topics:   cache
Code:     Cache::flush()
Id:       275
Position: 23
---

{problem}
You want to completely empty your cache.
{/problem}

{solution}
Use the `Cache::flush()` method.

{php}
Cache::flush();
{/php}
{/solution}

{discussion}
Cache drivers implementing cache tags allow tag-based flushing.

{php}
Cache::tags('widgets')->flush();
{/php}
{/discussion}
