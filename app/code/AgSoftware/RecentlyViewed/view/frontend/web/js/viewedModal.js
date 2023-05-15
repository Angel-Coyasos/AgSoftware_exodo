require([
    "jquery"
], function($) {

    $(document).ready(function() {
        const viewed = $('#viewed');
        const modal = $('#viewed-modal');
        const rvcontaier = $('#rv-contaier');

        function viewedModal() {

            modal.slideToggle('slow');

            if ( modal.hasClass('active')  ) {
                modal.addClass('inactive');
                modal.removeClass('active');
                rvcontaier.toggleClass('rv-active');
            } else {
                modal.addClass('active');
                modal.removeClass('inactive');
                rvcontaier.toggleClass('rv-active');
            }

        }

        viewed.click(viewedModal);

        $(window).on('click', function(event) {
            if (event.target === rvcontaier[0]) {
                viewedModal();
            }
        });


    });

});
