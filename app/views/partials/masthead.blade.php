<div class="container">

  {{-- logo --}}
  <div id="logo" class="site-logo text-center">
    <a href="/" rel="home">{{ HTML::image('/assets/img/logo.png', 'Laravel Recipes') }}</a>
  </div>

  {{-- navbar --}}
  <div id="navbar" class="navbar-wrapper text-center">
    <nav class="navbar navbar-default site-navigation" role="navigation">
      <ul class="nav navbar-nav navbar-menu">
        <li{{ Request::is('/') ? ' class="active"' : '' }}>
          <a href="/">Home</a>
        </li>
        <li{{ Request::is('contents') ? ' class="active"' : ''}}>
          <a href="/contents">Contents</a>
        </li>
        <li{{ Request::is('faq') ? ' class="active"' : ''}}>
          <a href="/faq">FAQ</a>
        </li>
        <li{{ Request::is('topics', 'code') ? ' class="active"' : ''}}>
          <a>Index</a>
          <ul class="dropdown-menu">
            <li{{ Request::is('topics') ? ' class="active"' : ''}}>
              <a href="/topics">Topic</a>
            </li>
            <li{{ Request::is('codes') ? ' class="active"' : ''}}>
              <a href="/codes">Code</a>
            </li>
          </ul>
        </li>
        <li><a href="http://laravelcoding.com">LaravelCoding</a></li>
        <li>
          <a>Laravel.com</a>
          <ul class="dropdown-menu">
            <li><a href="http://laravel.com/docs">Docs</a></li>
            <li><a href="http://laravel.com/api/">API</a></li>
            <li><a href="http://forums.laravel.io/">Forums</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>

  {{-- header search --}}
  <div id="header-search" class="site-search clearfix">
    @include('partials.searchform')
  </div><!-- #header-search -->
</div>
