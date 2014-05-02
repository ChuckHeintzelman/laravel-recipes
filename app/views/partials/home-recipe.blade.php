{{-- Displays a recipe's title and modification date or view count --}}
{{-- Used to display latest and popular recipes on home page       --}}
<li>
  <i class="fa-li fa fa-cutlery fa-fw text-muted"></i>
  <h3 class="h5">
    <a href="/recipes/{{ $recipe['id'] }}">
      {{{ $recipe['title'] }}}
    </a>
  </h3>
  <small class="meta text-muted">
    <span class="time">
      @if($date)
        <i class="fa fa-clock-o fa-fw"></i>
        {{ $recipe['created_at']->diffForHumans() }}
      @else
        <i class="fa fa-bar-chart-o fa-fw"></i>
        {{ number_format($recipe['views']) }} views
      @endif
    </span>
    <span class="category">
      <i class="fa fa-folder-open-o fa-fw"></i>
      <a href="/categories/{{ $recipe['category_id'] }}">
        {{{ $recipe['category_name'] }}}
      </a>
    </span>
  </small>
</li>
