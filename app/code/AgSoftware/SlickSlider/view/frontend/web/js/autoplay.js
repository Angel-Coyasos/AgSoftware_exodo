require(['jquery', 'jquery/ui', 'slick'], function($) {
    $(document).ready(function() {
        $(".autoplay").slick({
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint:1280,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },

            ]
        });
    });
});

