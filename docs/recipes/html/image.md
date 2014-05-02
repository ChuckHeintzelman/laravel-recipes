---
Title:    Generating an HTML Image Element
Topics:   html
Code:     HTML::image()
Id:       185
Position: 5
---

{problem}
You want to add an image to your Blade template.

Instead of simply using the `<img...>` HTML tag, you want to use the `HTML` facade.
{/problem}

{solution}
Use the `HTML::image()` method.

The only required argument is the path to the image.

{html}
{{ HTML::image('img/picture.jpg') }}
{/html}

Which produces the following HTML.

{html}
<img src="http://your.url/img/picture.jpg">
{/html}

If the image path you pass isn't a complete URL, Laravel will use your application's URL to build a complete URL.

You can add the `alt` attribute with the second argument.

{html}
{{ HTML::image('img/picture.jpg', 'a picture') }}
{/html}

Now the HTML will look like the following.

{html}
<img src="http://your.url/img/picture.jpg" alt="a picture">
{/html}

The third argument, if used, must be an array. It contains additional attributes to add to the img tag.

{html}
{{ HTML::image('img/picture.jpg', 'a picture', array('class' => 'thumb')) }}
{/html}

Now the HTML contains a class attribute.

{html}
<img src="http://your.url/img/picture.jpg" class="thumb" alt="a picture">
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
