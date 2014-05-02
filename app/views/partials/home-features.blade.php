{{-- The 3 big boxes at the top of the home page --}}
<div class="features row">
  <div class="col-sm-4">
    <div class="banner-wrapper text-center">
      <span class="fa-stack fa-3x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
      </span>
      <h4 class="banner-title h3">Contents</h4>
      <div class="banner-content">
        <p>
          There are <span class="badge">{{ $num_recipes }}</span> recipes and counting.
          Browse the Table of Contents and see all the recipes organized
          by category.
        </p>
      </div>
      <p><a href="/contents" class="btn btn-custom btn-sm">Browse</a></p>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="banner-wrapper text-center">
      <span class="fa-stack fa-3x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-list fa-stack-1x fa-inverse"></i>
      </span>
      <h4 class="banner-title h3">Topic Index</h4>
      <div class="banner-content">
        <p>
          Check out the index of topics to help narrow down your
          search and find just the recipe you're looking for.
        </p>
      </div>
      <p><a href="/topics" class="btn btn-custom btn-sm">Browse</a></p>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="banner-wrapper text-center">
      <span class="fa-stack fa-3x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-code fa-stack-1x fa-inverse"></i>
      </span>
      <h4 class="banner-title h3">Code Index</h4>
      <div class="banner-content">
        <p>
          If you're looking for all the recipes using a particular
          class or method, try browsing through the code index.
        </p>
      </div>
      <p><a href="/codes" class="btn btn-custom btn-sm">Browse</a></p>
    </div>
  </div>
</div>
