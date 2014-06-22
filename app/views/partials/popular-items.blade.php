{{-- Displays a category and the top three recipes for the category. Used --}}
{{-- to display popular categories/recipes in the middle of the home page --}}
<div class="col-md-6">
  <section class="box-categories">
    <h1 class="section-title h4 clearfix">
      <i class="fa fa-folder-open-o fa-fw text-muted"></i>
      <small class="pull-right"><i class="fa fa-hdd-o fa-fw"></i> {{ $item[0][0] }}</small>
      {{ $item[0][2] }}
    </h1>
    <ul class="fa-ul">
      @for($i = 1; $i <= 3; $i++)
        <li>
          <i class="fa-li fa fa-cutlery fa-fw text-muted"></i>
          <h3 class="h5">
            <a href="/recipes/{{ $item[$i][0] }}">
              {{{ $item[$i][1] }}}
            </a>
          </h3>
        </li>
      @endfor
    </ul>
    <p class="more-link text-center">
      <a href="/categories/{{ $item[0][1] }}" class="btn btn-custom btn-xs">View All</a>
    </p>
  </section>
</div>
