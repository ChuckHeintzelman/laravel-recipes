{{-- Uses app.disqus_shortname from Config              --}}
{{-- Only displays if app.disqus_show is true in Config --}}
{{-- Sets disqus_identifier if $recipe_id present       --}}
{{-- Sets disqus_title if $recipe_title present         --}}
@if (Config::get('app.disqus_show'))
  <div id="disqus_thread"></div>
  <script type="text/javascript">
    var disqus_shortname = '{{ Config::get("app.disqus_shortname") }}';
    @if (isset($recipe_id))
      var disqus_identifier = 'recipe-{{ $recipe_id }}';
    @endif
    @if (isset($recipe_title))
      var disqus_title = {{ $recipe_title }};
    @endif

    (function() {
      var dsq = document.createElement('script');
      dsq.type = 'text/javascript';
      dsq.async = true;
      dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
  </script>
  <noscript>
    Please enable JavaScript to view the
    <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
  </noscript>
  <a href="http://disqus.com" class="dsq-brlink">
    comments powered by <span class="logo-disqus">Disqus</span>
  </a>
@endif
