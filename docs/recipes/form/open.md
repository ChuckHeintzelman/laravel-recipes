---
Title:    Opening a New HTML Form
Topics:   forms
Code:     Form::open()
Id:       124
Position: 1
---

{problem}
You want to start a form.

You know you could use the HTML `<form>` tag directly, but want to use Laravel's `Form` facade.
{/problem}

{solution}
Use the `Form::open()` method.

Usually, this is done in a Blade template. There are several ways to use this method.

#### Using defaults

{html}
{{ Form::open() }}
{/html}

The HTML produced is.

{html}
<form method="POST" action="http://currenturl" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
{/html}

This starts a form, using the POST method, to the current URL and will add an `accept-charset="UTF-8"` to the form. Additionally, a hidden token is added.

#### To a specific url

Instead of passing an `action` you should pass a `url` value. This occurs in the only argument `Form::open()` accepts ... an array.

{html}
{{ Form::open(array('url' => 'http://full.url/here')) }}
{/html}

This produces the following HTML.

{html}
<form method="POST" action="http://full.url/here" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
{/html}

#### To a route

Instead of passing the `action` you should pass a `route` value to one of your named routes.

{html}
{{ Form::open(array('route' => 'named.route')) }}
{/html}

If the route doesn't exist an error will be produced. Otherwise the form's action attribute becomes the full URL to the route.

{html}
<form method="POST" action="http://full.url/someplace" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
{/html}

#### To a controller action

This is where you use `action`.

{html}
{{ Form::open(array('action' => 'Controller@method')) }}
{/html}

If the controller or method doesn't exist an error will be produced. Otherwise the form's action attribute becomes the full URL to the route that will call the specified controller and method.

{html}
<form method="POST" action="http://full.url/someplace" accept-charset="UTF-8">
<input name="_token" type="hidden" value="somelongrandom string">
{/html}

#### Specifying different methods

You can use methods other than POST with your forms. Pass the 'method' you want in the array argument. Valid methods are 'get', 'put', 'patch', 'post', or 'delete'.

{html}
{{ Form::open(array('method' => 'get')) }}
{/html}

This will produce the following HTML.

{html}
<form method="GET" action="http://currenturl" accept-charset="UTF-8">
{/html}

Notice there's no token? The token is not added for GET methods.

See the discussion at the bottom of this recipe for how Laravel _"fakes"_ the methods browsers can't handle.

#### Specifying file uploads

If you pass a `'files' => true` as one of the array arguments, the form will become suitable for file uploads.

{html}
{{ Form::open(array('files' => true)) }}
{/html}

The form now has the `enctype="multipart/form-data"` attribute.

{html}
<form method="POST" action="http://currenturl" accept-charset="UTF-8"
  enctype="multipart/form-data">
<input name="_token" type="hidden" value="somelongrandom string">
{/html}
{/solution}

{discussion}
How Laravel _"fakes"_ methods browsers cannot handle.

The form methods PUT, PATCH, and DELETE cannot be handled by most browsers. So what Laravel does is make the `method="POST"` and adds a hidden field.

{html}
{{ Form::open(array('method' => 'PUT')) }}
{/html}

This produces the following.

{html}
<form method="POST" action="http://currenturl" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PUT">
<input name="_token" type="hidden" value="somelongrandom string">
{/html}

The framework is smart enough to translate those hidden fields and change the request type to match what's desired.
{/discussion}
