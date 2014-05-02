@extends('layouts.default')

@section('title')
  @parent :: Topic Index
@stop

@section('breadcrumbs')
  <ol class="breadcrumb breadcrumb-custom">
    <li class="text">You are here: </li>
    <li><a href="/">Home</a></li>
    <li class="active">Topic Index</li>
  </ol>
@stop

@section('content')
  <article class="hentry">
    <header class="entry-header">
      <h1 class="entry-title">Topic Index</h1>
    </header>
    <div class="entry-content clearfix">
      <p class="lead">The recipes in every topic</p>
      <div class="row">
        @for ($column = 0; $column < 3; $column++)
          <div class="col-sm-4">
            @foreach ($columns[$column] as $topic_id => $info)
              <h5>
                <a href="/topics/{{ $topic_id }}" class="text-muted">
                  {{{ $info['name'] }}}
                </a>
              </h5>
              <ul class="fa-ul">
                @foreach($info['recipes'] as $recipe_id)
                  <li><small>
                    <i class="fa-li fa fa-cutlery text-warning"></i>
                    <a href="/recipes/{{ $recipe_id }}">
                      {{{ $recipes[$recipe_id] }}}
                    </a>
                  </small></li>
                @endforeach
              </ul>
            @endforeach
          </div>
        @endfor
      </div>
    </div>
  </article>
@stop