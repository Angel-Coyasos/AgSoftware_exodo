require(['jquery', 'jquery/ui', 'slick'], function($) {
    $(document).ready(function() {
        $(".custom").slick({
            // autoplay: true,
            // autoplaySpeed: 3000,
            // speed: 1000,
            dots: false,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
                // {
                //     breakpoint:1280,
                //     settings: {
                //         slidesToShow: 2,
                //         slidesToScroll: 1,
                //     },
                // },

            ]
        });
    });
});

