jQuery(function($) {

    const recentlyViewed = $('#recently-viewed');

    let productViewed = true;

    function viewedHidden() {
        let scrollBottom =
            $(document).scrollTop() + $(window).height() >=
            $(document).height() - 120;

        if ( productViewed ) {

            if (scrollBottom) {
                recentlyViewed.addClass('animated slideInUp');
                recentlyViewed.addClass('slideOutDown');
                recentlyViewed.removeClass('slideInUp');
                setTimeout(function() {
                    recentlyViewed.addClass('recently-viewed--hidden');
                }, 300);
            } else {
                recentlyViewed.addClass('slideInUp');
                recentlyViewed.removeClass('slideOutDown');
                setTimeout(function() {
                    recentlyViewed.removeClass('recently-viewed--hidden');
                }, 300);
            }

        }

    }

    $(window).scroll(viewedHidden);

});
