@extends('layouts.default')

@section('title')
  @parent :: Table of Contents
@stop

@section('breadcrumbs')
  <ol class="breadcrumb breadcrumb-custom">
    <li class="text">You are here: </li>
    <li><a href="/">Home</a></li>
    <li class="active">Contents</li>
  </ol>
@stop

@section('content')
  <article class="hentry">
    <header class="entry-header">
      <h1 class="entry-title">Table of Contents</h1>
    </header>
    <div class="entry-content clearfix">
      <p class="lead">All the recipes organized into a Table of Contents</p>

      @for ($i = 0; $i < count($parts); $i++)
        <h3 class="text-danger">Part {{ numberToRoman($i + 1) }} - {{{$parts[$i]['name'] }}}</h3>
        <p>{{{ $parts[$i]['description'] }}}</p>
        <div id="accordion-{{ $i }}" class="panel-group accordion">
          @for ($j = 0; $j < count($parts[$i]['categories']); $j++)
            <div class="panel">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle collapsed" data-toggle="collapse"
                    data-parent="#accordion-{{ $i }}"
                    href="#accordion-{{ $i }}-{{ $j }}">
                    {{ $parts[$i]['categories'][$j]['name'] }} Recipes
                  </a>
                </h4>
              </div>
              <div id="accordion-{{ $i }}-{{ $j }}" class="panel-collapse collapse">
                <div class="panel-body">
                  <p>{{{ $parts[$i]['categories'][$j]['description'] }}}</p>
                  <ul class="fa-ul">
                    @foreach ($parts[$i]['categories'][$j]['recipes'] as $url => $recipe)
                      <li>
                        <i class="fa-li fa fa-cutlery fa-fw text-muted"></i>
                        <a href="{{ $url }}">{{{ $recipe }}}</a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          @endfor
        </div>
      @endfor

    </div>

  </article>
@stop
