@extends('layouts.default')

@section('title')
  @parent :: {{{ $code->name }}} Code
@stop

@section('breadcrumbs')
  <ol class="breadcrumb breadcrumb-custom">
    <li class="text">You are here: </li>
    <li><a href="/">Home</a></li>
    <li><a href="/codes">Code Index</a></li>
    <li class="active">{{{ $code->name }}}</li>
  </ol>
@stop

@section('content')
  <article class="hentry">
    <header class="entry-header">
      <h1 class="entry-title">{{{ $code->name }}} code</h1>
    </header>
    <div class="entry-content clearfix">
      <ul class="fa-ul">
        @foreach ($recipes as $recipe)
          <li class="">
            <h4>
              <i class="fa-li fa fa-cutlery fa-fw text-muted"></i>
              <a href="/recipes/{{ $recipe->id }}">
                {{{ $recipe->title }}}
              </a>
            </h4>
          </li>
        @endforeach
      </ul>
    </div>
  </article>
@stop
