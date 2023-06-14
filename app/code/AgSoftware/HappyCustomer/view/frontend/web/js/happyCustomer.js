require([
    "jquery"
], function($) {

    var content = $('body');
    var close = $('.counter-close');
    var popUp = $('.counter-container');
    var counterText = $('.counter-text');

    var text = "";

    if ( content.hasClass('cms-home') ) {
        text = '<br>using WeltPixel products';
    } else if ( content.hasClass('catalog-product-view') ) {
        text = '<br>using this product';
    }

    if ( content.hasClass('cms-home') || content.hasClass('catalog-product-view') ) {

        function openWindow () {
            popUp.show();
            counterText.append(text);
        };

        function closeWindow () {
            popUp.hide('slow');
        };

        setTimeout(openWindow, 10000);

        close.click( closeWindow );

    };

});
