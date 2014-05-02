@extends('layouts.default')

@section('breadcrumbs')
  @include('partials.home-features')
@stop

@section('content')

  <div class="row">
    @include('partials.popular-items', ['item' => $popular[0]])
    @include('partials.popular-items', ['item' => $popular[1]])
  </div>
  <div class="row">
    @include('partials.popular-items', ['item' => $popular[2]])
    @include('partials.popular-items', ['item' => $popular[3]])
  </div>

  <section class="section">
    <div class="banner-wrapper banner-horizontal clearfix">
      <h4 class="banner-title h3">Need help?</h4>
      <div class="banner-content">
        <p>
          If a recipe is confusing, please comment on recipe page.
          Otherwise please leave a comment below.
        </p>
      </div>
    </div>
  </section>

  <div class="row">
    <div class="col-md-6">
      <section id="section-lastest-recipes" class="section">
        <h2 class="section-title h4 clearfix">Latest Recipes</h2>
        <ul class="fa-ul">
          @foreach($latest_recipes as $recipe)
            @include('partials.home-recipe', ['recipe' => $recipe, 'date' => true])
          @endforeach
        </ul>
      </section>
    </div>
    <div class="col-md-6">
      <section id="section-popular-recipes" class="section">
        <h2 class="section-title h4 clearfix">Popular Recipes</h2>
        <ul class="fa-ul">
          @foreach($popular_recipes as $recipe)
            @include('partials.home-recipe', ['recipe' => $recipe, 'date' => false])
          @endforeach
        </ul>
      </section>
    </div>
  </div>

@stop