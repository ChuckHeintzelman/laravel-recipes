<form action="/search" method="get" class="search-form" role="search">
  <div class="form-border">

    <div class="form-inline">
      <div class="form-group">
        {{ Form::text('s', null, [
          'class' => 'search-field form-control input-lg',
          'title' => 'Enter search term',
          'autocomplete' => 'off',
          'placeholder' => 'Search for a recipe. Type your search term here...'
        ])}}
      </div>
      {{ Form::submit('Go', [
        'class' => 'search-submit btn btn-custom btn-lg pull-right'
      ])}}
    </div>

  </div>
</form>
