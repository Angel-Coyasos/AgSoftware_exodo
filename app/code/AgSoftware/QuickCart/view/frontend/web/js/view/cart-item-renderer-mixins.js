// alert("la puta hostia tioo");

define([ 'jquery' ], function ( $ ) {
    'use strict';
    var mixins={
        less: function ( id ){

            let input = document.querySelector( `#cart-item-${id.item_id}-qty` );

            if (input.value <= 1) {

                input.value = 1;

            } else {

                input.value--;

                let update = document.querySelector( `#update-cart-item-${id.item_id}` );

                $( update ).trigger( "click" );

                /*let itemsTotal = document.querySelector( `.items-update-container` );

                itemsTotal.style.display = 'block';

                setTimeout( () => {
                    itemsTotal.style.display = 'none';
                }, 3000);*/

            }

        },
        plus: function ( id ) {

            let input = document.querySelector( `#cart-item-${id.item_id}-qty` );

            input.value++;

            let update = document.querySelector( `#update-cart-item-${id.item_id}` );

            $( update ).trigger( "click" );

           /* let itemsTotal = document.querySelector(`.items-update-container`);

            itemsTotal.style.display = 'block';

            setTimeout(() => {
                itemsTotal.style.display = 'none';
            }, 3000 );*/

        },

    };

    return function(target){
        return target.extend(mixins);
    }

});
