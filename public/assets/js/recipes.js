/* Recipes JS */


/**
 * Startup code
 */
(function($) {
	$("#section-banner").hover(
		function()
		{
			$("#gsd-laravel-img").slideDown(400);
			$("#buy-book-link").html('Buy my book');
		},
		function()
		{
			$("#buy-book-link").html('More...');
			$("#gsd-laravel-img").slideUp(300);
		}
	);
})(jQuery);