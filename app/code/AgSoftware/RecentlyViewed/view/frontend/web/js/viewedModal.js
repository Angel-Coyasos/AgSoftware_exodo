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
                rvcontaier.removeClass('rv-active');
            } else {
                modal.addClass('active');
                modal.removeClass('inactive');
                rvcontaier.addClass('rv-active');
            }

        }

        function closeModal() {

            modal.slideUp('slow');

            if ( modal.hasClass('active')  ) {
                modal.addClass('inactive');
                modal.removeClass('active');
                rvcontaier.removeClass('rv-active');
            }

        }

        viewed.click(viewedModal);

        $(window).on('click', function(event) {
            if ( event.target === rvcontaier[0] ) {
                viewedModal();
            } else if ( event.target === $('#chevronUp')[0]  || event.target === $('#chevronUp i')[0] ) {
                closeModal();
            }
        });

    });

});
