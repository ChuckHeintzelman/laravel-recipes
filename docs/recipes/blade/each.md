---
Title:    Rendering a View For Items in a Collection
Topics:   -
Code:     @each
Id:       239
Position: 11
---

{problem}
You want to render a view for items in a collection in your blade template.
{/problem}

{solution}
Use the Blade `@each` command.

You pass the command at least three arguments:

1. The name of the view to render.
2. The collection
3. What to call each item.

For example if you had the following in your Blade template.

{html}
Items:
@each('items.single', $items, 'item')
{/html}

This is roughly equivelant of the following:

{html}
Items:
@foreach ($items as $item)
    @include('items.single', ['item' => $item])
@endforeach
{/html}
{/solution}

{discussion}
You can also pass a fourth option. This is what to display if the collection is empty.

{html}
Items:
@each('items.single', $items, 'item', 'items.empty')
{/html}

If `$items` is empty then the view `items.empty` view would be rendered. If you preface this fourth argument with `raw|` then it's not rendered as a view, but as raw text.

{html}
Items:
@each('items.single', $items, 'item', 'raw|There are no items')
{/html}

If `$items` is empty, the following HTML would be output.

{html}
Items:
There are no items
{/html}
{/discussion}
