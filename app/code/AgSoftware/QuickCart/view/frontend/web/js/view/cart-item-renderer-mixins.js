// alert("la puta hostia tioo");

define([ 'jquery' ], function ( $ ) {
    'use strict';
    var mixins={
        less: function ( id ){

            let input = document.querySelector( `#cart-item-${id.item_id}-qty` );

            input.value--;

            let update = document.querySelector( `#update-cart-item-${id.item_id}` );

            $( update ).trigger( "click" );

        },
        plus: function ( id ) {

            let input = document.querySelector( `#cart-item-${id.item_id}-qty` );

            input.value++;

            let update = document.querySelector( `#update-cart-item-${id.item_id}` );

            $( update ).trigger( "click" );


        },

    };

    return function(target){
        return target.extend(mixins);
    }

});
