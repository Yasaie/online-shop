/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */
var $ = jQuery.noConflict();
var shopOwlArg = shopOwlArg || {};
(function ($) {

    'use strict';

    var shop = shop || {};

    shop.init = function () {
        this.isCheckRTL();
        this.productsCarousels();
    };

    shop.isCheckRTL = function () {
        /*
        * If check is site RTL
        */
        $('html[dir="rtl"] body').addClass('rtl');
        var shop_rtl = false;
        if ($('body,html').hasClass('rtl')) {
            shop_rtl = true;
        }

        return shop_rtl;
    };

    shop.fixOwl = function () {
        $('.owl-stage').each(function () {
            $(this).width($(this).width() + 2);
        });
    };

    shop.productsCarousels = function () {
        //*******************************************************************
        //* owl carousel slider of products
        //*******************************************************************/

        if (shopOwlArg.length === 0 || typeof shopOwlArg.productsCarousel === 'undefined') {
            return;
        }
        $.each(shopOwlArg.productsCarousel, function (id, productsCarousel) {
            var autoplay = (productsCarousel.autoplay === 'true') ? true : false;
            var navigation = (productsCarousel.navigation === 'true') ? true : false;
            var loop = (productsCarousel.loop === 'true') ? true : false;
            var dots = (productsCarousel.dots === 'true') ? true : false;
            var rp_desktop = (productsCarousel.rp_desktop > 0) ? productsCarousel.rp_desktop : 5;
            var rp_small_desktop = (productsCarousel.rp_small_desktop > 0) ? productsCarousel.rp_small_desktop : 4;
            var rp_tablet = (productsCarousel.rp_tablet > 0) ? productsCarousel.rp_tablet : 3;
            var rp_mobile = (productsCarousel.rp_mobile > 0) ? productsCarousel.rp_mobile : 2;
            var rp_small_mobile = (productsCarousel.rp_small_mobile > 0) ? productsCarousel.rp_small_mobile : 1;

            var numItems = $(document.getElementById(id)).children('.owl-item').length;

            $(document.getElementById(id)).find('.product-carousel').owlCarousel({
                autoplay: autoplay,
                autoplayHoverPause: true,
                lazyLoad: true,
                rtl: (shop.isCheckRTL()) ? true : false,
                loop: (numItems >= rp_desktop && loop) ? true : false,
                rewind: true,
                //touchDrag: 			( shop.$windowWidth <  768 ) ? false : true,
                smartSpeed: 850,
                nav: navigation,
                navText: ['', ''],
                dots: dots,
                responsive: {
                    0: {
                        items: rp_small_mobile
                    },
                    445: {
                        items: rp_mobile
                    },
                    621: {
                        items: rp_tablet
                    },
                    992: {
                        items: rp_small_desktop
                    },
                    1199: {
                        items: rp_desktop
                    }
                }
            });

        });
        $('.owl-carousel').addClass('owl-theme');

        shop.fixOwl();
        $(window).resize(shop.fixOwl);
    };

    /**
     * Document ready
     */
    $(document).ready(function () {
        shop.init();
    });

})(jQuery);


