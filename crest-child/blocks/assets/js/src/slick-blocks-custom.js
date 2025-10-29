/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    $('#results').slick({
		dots: false,
        arrows: true,
		infinite: true,
		fade: false,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 1300,
		slidesToShow: 4,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1201,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 821,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
	});

	$('#process-slider').slick({
		dots: true,
		infinite: true,
		fade: true,
		autoplay: false,
  		speed: 500,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: false,
    	nextArrow: false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        appendDots: $('.dots'),
	});

    var activeClass = 'slick-active',
    ariaAttribute = 'aria-hidden';
    $( '#process-slider' )
    .on( 'init', function() {
        $( '.slick-dots li:first-of-type' ).addClass( activeClass ).attr( ariaAttribute, false );
    } )
    .on( 'afterChange', function( event, slick, currentSlide ) {
        var $dots = $( '.slick-dots' );
        $( 'li', $dots ).removeClass( activeClass ).attr( ariaAttribute, true );
        $dots.each( function() {
            $( 'li', $( this ) ).eq( currentSlide ).addClass( activeClass ).attr( ariaAttribute, false );
        } );
    } );

    $( '#process-slider' ).slick();

    $('#awards').slick({
		dots: false,
		infinite: true,
        arrows:true,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 800,
		slidesToShow: 6,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
              breakpoint: 821,
              settings: {
                    slidesToShow: 3,
                }
            },
            {
              breakpoint: 601,
              settings: {
                    slidesToShow: 2,
                }
            }
        ]
	});
	
});