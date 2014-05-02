@extends('layouts.default')

@section('title')
  @parent :: {{{ $recipe->title }}}
@stop

@section('scripts')
  @parent
  {{ HTML::script('/assets/js/prettify.min.js') }}
  <script>
  (function($) {
    prettyPrint();
  })(jQuery);
  </script>
@stop

@section('breadcrumbs')
  <ol class="breadcrumb breadcrumb-custom">
    <li class="text">You are here: </li>
    <li><a href="/">Home</a></li>
    <li><a href="/contents">Contents</a></li>
    <li><a href="/categories/{{ $category->id }}">{{{ $category->name }}}</a></li>
    <li class="active">{{{ $recipe->title }}}</li>
  </ol>
@stop

@section('content')
  <article class="hentry">
    <header class="entry-header">
      <h1 class="entry-title">{{{ $recipe->title }}}</h1>
    </header>
    <div class="entry-content clearfix">

      {{ $recipe->problem }}
      <div class="vspace-16"></div>

      {{ $recipe->solution }}
      <div class="vspace-16"></div>

      {{ $recipe->discussion }}

    </div>
  </article>
  <div class="row">
    <div class="col-xs-6">
      <a href="{{ $recipe->prevLink() }}"
        class="btn btn-custom"
        title="{{{ $recipe->prevTitle() }}}">
        <i class="fa fa-arrow-left"></i>
        Prev
      </a>
    </div>
    <div class="col-xs-6">
      <a href="{{ $recipe->nextLink() }}"
        class="btn btn-custom pull-right"
        title="{{{ $recipe->nextTitle() }}}">
        Next
        <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>


@stop


