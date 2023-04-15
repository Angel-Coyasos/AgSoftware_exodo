jQuery(function($) {

    const recentlyViewed = $('#recently-viewed');
    var modal = $('#viewed-modal');

    function viewedHidden() {
        let scrollBottom =
            $(document).scrollTop() + $(window).height() >=
            $(document).height() - 120;

        if (scrollBottom) {
            recentlyViewed.addClass('animated slideInUp');
            recentlyViewed.addClass('slideOutDown');
            recentlyViewed.removeClass('slideInUp');
            setTimeout(function() {
                recentlyViewed.addClass('recently-viewed--hidden');
                modal.addClass('viewed-modal--inactive');
                modal.removeClass('viewed-modal--active');
            }, 500);
        } else {
            recentlyViewed.addClass('slideInUp');
            recentlyViewed.removeClass('slideOutDown');
            setTimeout(function() {
                recentlyViewed.removeClass('recently-viewed--hidden');
            }, 500);
        }

    }

    $(window).scroll(viewedHidden);

});
