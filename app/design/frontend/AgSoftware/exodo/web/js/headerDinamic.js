require([
    "jquery"
], function($) {

    var nav = $('#offer');
    var pageheader = $('.page-header');

    function headerDinamic() {
        var desplazamientoActual = window.pageYOffset;

        if (desplazamientoActual <= 50) {
            if (nav.length) {
                nav.removeClass('offer-header2');
                nav.addClass('offer-header');
                nav.css('transition', '1s');
            }
            pageheader.css('position', 'relative');
            pageheader.css('box-shadow', 'none');
        } else {
            if (nav.length) {
                nav.removeClass('offer-header');
                nav.addClass('offer-header2');
                nav.css('transition', '1s');
            }
            pageheader.css('position', 'fixed');
            pageheader.css('box-shadow', '0 20px 30px 0 rgba(0, 0, 0, 0.05)');
            pageheader.css('top', '0');
        }
    }

    $(window).scroll(function() {
        headerDinamic();
    });

});
