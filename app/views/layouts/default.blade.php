<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html>
<!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @section('title')
      Laravel Recipes
    @show
  </title>
  <link rel="shortcut icon" href="/favicon.ico">

  {{ HTML::style('/assets/css/bootstrap.min.css') }}
  {{ HTML::style('/assets/css/font-awesome.min.css') }}
  {{ HTML::style('/assets/css/app.css') }}
  {{ HTML::style('/assets/css/recipes.css') }}

  <!--[if lt IE 9]>
  {{ HTML::script('/assets/js/html5shiv.min.js') }}
  {{ HTML::script('/assets/js/respond.min.js') }}
  <![endif]-->

</head>
<body>

  <div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">

      @include('partials.masthead')

    </header>

    {{-- breadcrumbs --}}
    <div id="features" class="site-hero clearfix">
      <div class="container">
        @section('breadcrumbs')

          View must provide

        @show
      </div>
    </div>
  </div>

  <div id="main" class="site-main clearfix">
    <div class="container">

      <div class="content-area">
        <div class="row">
          <div id="content" class="site-content col-md-9">
            @yield('content')
          </div>

          <div id="sidebar" class="site-sidebar col-md-3">
            <div class="widget-area">

              @include('partials.book-widget')

              <section id="section-categories" class="section">
                <h2 class="section-title h4 clearfix">Categories</h2>
                <ul class="nav nav-pills nav-stacked nav-categories">
                  @foreach ($categories as $id => $category)
                    <li>
                      <a href="/categories/{{ $id }}">
                        <span class="badge pull-right">{{ $category['num_recipes']}}</span>
                        {{ $category['name'] }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </section>

            </div>{{-- widget-area --}}

          </div>

        </div>
      </div>

      @include('partials.disqus')

    </div>
  </div>{{-- main --}}

  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">

      <div class="row">
        <div class="site-info col-md-6">
          <p class="text-muted">
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
              <img alt="Creative Commons License" style="border-width:0"
              src="http://i.creativecommons.org/l/by-sa/4.0/88x31.png" />
            </a>
            <br>
            <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Laravel Recipes</span>
            by <a xmlns:cc="http://creativecommons.org/ns#" href="http://laravel-recipes.com"
              property="cc:attributionName" rel="cc:attributionURL">Chuck Heintzelman</a>
            is licensed under a <a rel="license"
            href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons
            Attribution-ShareAlike 4.0 International License</a>.
          </p>
        </div><!-- .site-info -->

        <div class="site-social text-right col-md-6">
          <ul class="list-inline hidden-print">
            <li>
              <a href="https://www.facebook.com/chuck.heintzelman"
                class="btn btn-social btn-facebook"
                title="Facebook">
                <i class="fa fa-facebook fa-fw"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/storychuck"
                class="btn btn-social btn-twitter"
                title="Twitter">
                <i class="fa fa-twitter fa-fw"></i>
              </a>
            </li>
            <li>
              <a href="https://plus.google.com/107523545757116187447"
                class="btn btn-social btn-google-plus"
                title="Google Plus">
                <i class="fa fa-google-plus fa-fw"></i>
              </a>
            </li>
            <li>
              <a href="http://www.linkedin.com/in/heintzelman/"
                class="btn btn-social btn-linkedin"
                title="Linked In">
                <i class="fa fa-linkedin fa-fw"></i>
              </a>
            </li>
            <li>
              <a href="https://github.com/ChuckHeintzelman"
               class="btn btn-social btn-rss"
               title="GitHub">
               <i class="fa fa-github fa-fw"></i>
             </a>
           </li>
          </ul>
          <small style="align:right"><br><!--CACHETAG--></small>
        </div><!-- .site-social -->
      </div>
    </div>
  </footer>

  @section('scripts')
    {{ HTML::script('/assets/js/jquery.min.js') }}
    {{ HTML::script('/assets/js/bootstrap.min.js') }}
    {{ HTML::script('/assets/js/superfish.js') }}
    {{ HTML::script('/assets/js/mobilemenu.js') }}
    {{ HTML::script('/assets/js/autocomplete.js') }}
    {{ HTML::script('/assets/js/app.js') }}
    {{ HTML::script('/assets/js/recipes.js') }}
  @show

</body>
</html>