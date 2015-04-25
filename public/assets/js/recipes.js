/* Recipes JS */


/**
 * Startup code
 */
(function($) {
    $("#section-banner1").hover(
        function()
        {
            $("#l5beauty-img").slideDown(400);
            $("#buy-book-link1").html('Buy my book');
        },
        function()
        {
            $("#buy-book-link1").html('More...');
            $("#l5beauty-img").slideUp(300);
        }
    );
    $("#section-banner2").hover(
        function()
        {
            $("#gsd-laravel-img").slideDown(400);
            $("#buy-book-link2").html('Buy my book');
        },
        function()
        {
            $("#buy-book-link2").html('More...');
            $("#gsd-laravel-img").slideUp(300);
        }
    );
})(jQuery);