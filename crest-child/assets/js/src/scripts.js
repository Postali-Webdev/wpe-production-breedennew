jQuery(function ($) {
    "use strict";

    //apply toggle to desktop nav
    $(document).ready(function () {
        var windowWidth = $(window).width();
        if (windowWidth > 1024) {
            console.log('desktop view');
            $('.menu > .menu-item-has-children > .sub-menu > .menu-item-has-children').append('<span class="child-toggle-desktop"></span>');
            $('.menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > .child-toggle-desktop').on('click', function (e) {
                e.preventDefault();
                $('.active').not($(this).add($(this).parent()).add($(this).siblings('.sub-menu'))).removeClass('active');
                $(this).add($(this).siblings('.sub-menu')).add($(this).parent()).toggleClass('active');
            });


            $('.menu > li.menu-item-has-children').on('mouseenter mouseleave', function (e) {
                $(this).find('.sub-menu').toggleClass('active-hover'); 
                if ($(this).find('.sub-menu').hasClass('active-hover') == false) {
                    $('.active').not($(this).add($(this).parent()).add($(this).siblings('.sub-menu'))).removeClass('active');
                }
            });
        }
    });

    //remove slick slider from awards
    $(document).ready(function () {
        $('#awards').slick('unslick');
    })


    // set all needed classes when we start
    $('.sub-menu').addClass('closed');

    //Hamburger animation
    $('.toggle-nav').click(function() {
        $(this).toggleClass('active');
        $('.menu').toggleClass('opened');
        $('.menu').toggleClass('active'); 
        $('.sub-menu').removeClass('opened');
        $('.sub-menu').addClass('closed');
        return false;
    });
     
    //Close navigation on anchor tap
    $('.active').click(function() {	
        $('.menu').addClass('closed');
        $('.menu').toggleClass('opened');
        $('.menu .sub-menu').removeClass('opened');
        $('.menu .sub-menu').addClass('closed');
    });	

    //Mobile menu accordion toggle for sub pages
    $('.menu > li.menu-item-has-children').prepend('<div class="accordion-toggle"><span class="icon-chevron-right"></span></div>');
    $('.menu > li.menu-item-has-children > .sub-menu').prepend('<div class="child-close"><span class="icon-chevron-left"></span> back</div>');

    //Mobile menu accordion toggle for third-level pages
    $('.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle2"<span class="icon-chevron-right"></span></div>');
    $('.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="tertiary-close"><span class="icon-chevron-left"></span> back</div>');

    $('.menu .accordion-toggle').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
        console.log('clicked');
    });

    $('.menu .accordion-toggle2').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
        console.log('clicked');
    });

    $('.child-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    $('.tertiary-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    // desktop child click close parent subnav
    $('.menu > li.menu-item-has-children > .sub-menu > li > a').click(function(event) {
        $(this).closest('.sub-menu').css('display', 'none');
    });

    //add button before child links on landing page
    $("<div class='all-pages'>View All Pages <span></span></div>").insertBefore('.children');
    $('.all-pages').click(function() {
        $(this).toggleClass("active");
        $(this).parent().find('.children').toggleClass("active");
        $(this).parent().find('.children').slideToggle(400);
	});

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
        $(this).parent().toggleClass("active");
    });

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-search-icon').addClass('icon-close-x');
						$('.menu li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('.menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('.menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
    });
    
    // Form Tooltip
    $(document).ready(function () {
        $('.tooltip').on('click', function () {
            $(this).siblings('.tooltip-content').slideToggle();
        })
    });

});