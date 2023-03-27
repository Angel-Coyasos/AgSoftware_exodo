require(['jquery', 'loader'], function($) {
    $(window).on('load', function() {
        console.log('La página ha cargado completamente.');
       /* console.log(loader);*/
        $('#loader').fadeOut();
        /*loader.hide('#loader');*/
       /* $("#loader").loader("hide");*/
        console.log('El widget Loader se ha ocultado.');
    });
});
