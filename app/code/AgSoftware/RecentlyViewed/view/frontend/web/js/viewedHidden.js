require([
    "jquery"
], function($) {

    const modal = $('#viewed-modal');
    const viewedFloat = $('#viewedFloat');
    const rvcontaier = $('#rv-contaier');

    function viewedHidden() {
        let scrollBottom = $(document).scrollTop() + $(window).height() >= $(document).height() - 120;

        if (scrollBottom) {
            viewedFloat.slideUp('slow');
            if ( modal.css('display') === 'block' ) {
                modal.slideUp('slow');
                rvcontaier.toggleClass('rv-active');
            }
        } else {
            viewedFloat.slideDown('slow');
        }

    }

    $(window).scroll(viewedHidden);

});
