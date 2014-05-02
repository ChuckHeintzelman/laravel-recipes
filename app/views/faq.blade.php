@extends('layouts.default')

@section('title')
  @parent :: Frequently Asked Questions
@stop

@section('breadcrumbs')
  <ol class="breadcrumb breadcrumb-custom">
    <li class="text">You are here: </li>
    <li><a href="/">Home</a></li>
    <li class="active">FAQ</li>
  </ol>
@stop

@section('content')
  <article class="hentry">
    <header class="entry-header">
      <h1 class="entry-title">Frequently Asked Questions</h1>
    </header>
    <div class="entry-content clearfix">
      <p class="lead">Questions Frequently Asked at Laravel Recipes</p>

      <h3 class="text-danger">Recipe Questions</h3>
      <div id="accordion-1" class="panel-group accordion">
        <div class="panel">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle collapsed" data-toggle="collapse"
                data-parent="#accordion-1" href="#accordion-1-1">
                Some of these recipes are too simple. Why have them?
              </a>
            </h4>
          </div>
          <div id="accordion-1-1" class="panel-collapse collapse">
            <div class="panel-body">
              <p>
                In an attempt to be comprehensive, recipes from every area in
                Laravel are included. And keep in mind even though a recipe
                is simple for you, there may be a novice looking for that
                particular recipe.
              </p>
            </div>
          </div>
        </div>
      </div>

      <h3 class="text-danger">Site Questions</h3>
      <div id="accordion-2" class="panel-group accordion">
        <div class="panel">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle collapsed" data-toggle="collapse"
                data-parent="#accordion-2" href="#accordion-2-1">
                Is this open source?
              </a>
            </h4>
          </div>
          <div id="accordion-2-1" class="panel-collapse collapse">
            <div class="panel-body">
              <p>
                Yes. Please contribute. Check out the source at
                <a href="https://github.com/ChuckHeintzelman/laravel-recipes">github</a>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </article>
@stop

