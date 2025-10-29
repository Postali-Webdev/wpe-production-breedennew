jQuery(function ($) {
    "use strict";

    $(document).ready(function () {
        
        $('.reviews-toggle > div').on('click', function (e) {
            if ( !$(this).hasClass('active-review')) {
                $('.reviews-toggle > div').toggleClass('active-review');
                $('#video-reviews, #written-reviews').toggleClass('active-review');   
            }
        })
    })

});
