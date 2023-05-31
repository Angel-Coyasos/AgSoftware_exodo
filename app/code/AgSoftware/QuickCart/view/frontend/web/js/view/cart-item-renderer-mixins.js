define(['jquery'], function($) {
    'use strict';

    var mixins = {

        less: function(id) {

            let input = $(`#cart-item-${id.item_id}-qty`);
            let update = $(`#update-cart-item-${id.item_id}`);
            let spinner = input.siblings('.spinner');

            spinner.show();
            input.hide();


            input.val(parseInt(input.val()) - 1);

            update.trigger("click");

            setTimeout(function() {
                spinner.hide();
                input.show();
            }, 1000);

        },
        plus: function(id) {

            let input = $(`#cart-item-${id.item_id}-qty`);
            let update = $(`#update-cart-item-${id.item_id}`);
            let spinner = input.siblings('.spinner');

            spinner.show();
            input.hide();


            input.val(parseInt(input.val()) + 1);

            update.trigger("click");

            setTimeout(function() {
                spinner.hide();
                input.show();
            }, 1000);

        },

    };

    return function(target) {
        return target.extend(mixins);
    };

});
