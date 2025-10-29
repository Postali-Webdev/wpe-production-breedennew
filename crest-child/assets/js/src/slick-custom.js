jQuery(function ($) {
    "use strict";
    var windowWidth = $(window).width();
    $('#process-slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: false,
        speed: 750,
        autoplaySpeed: 9000,
        slidesToShow: 1,
        adaptiveHeight: true
    });    

    $('.award-slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        speed: 750,
        autoplaySpeed: 9000,
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });    
    
    if( windowWidth < 1024 ) {
        $('.testimonial-slide-wrapper').slick({
            dots: false,
            arrows: true,
            infinite: true,
            autoplay: false,
            speed: 750,
            autoplaySpeed: 9000,
            slidesToShow: 1,
            adaptiveHeight: true,
        });   
    }

    if (windowWidth < 820) {
        $('#counter-group').slick({
            dots: false,
            arrows: true,
            infinite: true,
            autoplay: false,
            speed: 750,
            autoplaySpeed: 9000,
            slidesToShow: 2,
            adaptiveHeight: true,
        });
    }
  

});