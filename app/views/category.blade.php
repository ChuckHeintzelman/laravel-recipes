@extends('layouts.default')

@section('title')
  @parent :: {{{ $category->name }}} Category
@stop

@section('breadcrumbs')
  <ol class="breadcrumb breadcrumb-custom">
    <li class="text">You are here: </li>
    <li><a href="/">Home</a></li>
    <li><a href="/contents">Contents</a></li>
    <li class="active">{{{ $category->name }}}</li>
  </ol>
@stop

@section('content')
  <article class="hentry">
    <header class="entry-header">
      <h1 class="entry-title">{{{ $category->name }}} Category</h1>
    </header>
    <div class="entry-content clearfix">
      <p class="lead">{{{ $category->description }}}</p>
      <ul class="fa-ul">
        @foreach ($recipes as $recipe)
          <li class="">
            <h4>
              <i class="fa-li fa fa-cutlery fa-fw text-muted"></i>
              <a href="/recipes/{{ $recipe->id }}/{{ Str::slug($recipe->title) }}">
                {{{ $recipe->title }}}
              </a>
            </h4>
          </li>
        @endforeach
      </ul>
    </div>
  </article>
@stop
