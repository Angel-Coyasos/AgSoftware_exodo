define([
    'ko',
    'uiComponent',
    'Magento_Customer/js/model/customer'
], function(ko, Component, customer) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'AgSoftware_ThankYouPage/checkout/payment/discount-points'
        },

        isVisible: ko.observable(false),

        initialize: function() {
            this._super();

            // Verificar el estado de inicio de sesión del usuario
            if (customer.isLoggedIn()) {
                this.isVisible(true);
            }
        }
    });
});
