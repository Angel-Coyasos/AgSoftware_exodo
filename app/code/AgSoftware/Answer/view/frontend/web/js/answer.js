require([
    "jquery",
    "Magento_Ui/js/modal/modal"
],function($, modal) {

    var options = {
        type: 'popup',
        responsive: true,
        title: 'Main title',
        buttons: [{
            text: $.mage.__('Ok'),
            class: '',
            click: function () {
                this.closeModal();
            }
        }],
        modalClass: 'modal-answer'
    };

    if ( $('.floating-father').length ) {

        var popup = modal(options, $('#modal'));
        $("#btn-float").click(function() {
            $('#modal').modal('openModal');
            $('#modal').removeClass('modal-popup');
        });

    }

});
