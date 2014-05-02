---
Title:    Creating an Image Input Element
Topics:   forms
Code:     Form::image()
Id:       170
Position: 20
---

{problem}
You want to create an image input element in your Blade template.
{/problem}

{solution}
Use the `Form::image()` method.

The only required argument, is the first one. It is the url to the image.

{html}
{{ Form::image('images/submit-button.jpg') }}
{/html}

This will produce the following HTML.

{html}
<input src="http://your.url/images/submit-button.jpg" type="image">
{/html}

_Note: If you don't provide a complete URL to the image, your application's url will be used._

You can name the input field with the second argument.

{html}
{{ Form::image('images/submit-button.jpg', 'btnSub') }}
{/html}

Notice the _name_ attribute in the output.

{html}
<input src="http://your.url/images/submit-button.jpg"
  name="btnSub" type="image">
{/html}

Additional attributes can be set by passing an array as the third argument.

{html}
{{ Form::image('images/submit-button.jpg', 'btnSub', ['class' => 'btn']) }}
{/html}

Now the input tag has a class attribute.

{html}
<input class="btn" src="http://your.url/images/submit-button.jpg"
  name="btnSub" type="image">
{/html}
{/solution}

{discussion}
Nothing to discuss.
{/discussion}
