<!-- ---style====================================================== -->
<link rel='stylesheet' href='{{asset("assets/front/css/plugins_team.css")}}' type='text/css' media='all'/>

<link href=" {{asset("assets/front/style.css")}}" rel="stylesheet">
@if(isRTL())
<link href=" {{asset("assets/front/rtl.css")}}" rel="stylesheet">
@endif
<link rel='stylesheet' id='rs-plugin-settings-css' href=' {{asset("assets/front/plugin/revslider/css/settings.css")}}'
      type='text/css' media='all'/>
<link rel='stylesheet' id='emallshop-style-css' href=' {{asset("assets/front/css/style-inline-css.css")}}'/>
<link rel='stylesheet' id='js_composer_front-css'
      href='{{asset("assets/front/plugin/js_composer/css/js_composer.min.css")}}' type='text/css' media='all'/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

<style>
    .wiiide {
        width: 100% !important;
    }
</style>

<script>

    (function (html) {
        html.className = html.className.replace(/\bno-js\b/, 'js')
    })(document.documentElement);
</script>
<script type='text/javascript'
        src=' {{asset("assets/front/plugin/js_composer/js/vendors/woocommerce-add-to-cart.js")}} '>
</script>
<script type='text/javascript'
        src=" {{asset("assets/front/plugin/js_composer/js/vendors/woocommerce-add-to-cart.js")}}  "></script>
<script type='text/javascript' src=" {{asset("assets/front/js/js/jquery/jquery.js")}}  "></script>
<script type='text/javascript' src=" {{asset("assets/front/js/js/jquery/jquery.js")}}  "></script>
<script type='text/javascript' src=" {{asset("assets/front/js/js/jquery/jquery-migrate.min.js")}}  "></script>
<script type='text/javascript'
        src=" {{asset("assets/front/plugin/revslider/js/jquery.themepunch.tools.min.js")}}  "></script>
<script type='text/javascript'
        src=" {{asset("assets/front/plugin/revslider/js/jquery.themepunch.revolution.min.js")}} "></script>
<script type='text/javascript' src=" {{asset("assets/front/plugin/Drift/drift.js")}} "></script>
<link href=" {{asset("assets/front/plugin/Drift/drift.css")}}  " rel="stylesheet">

{{-- //--------------------------------------------------------- --}}
<link href=" {{asset("assets/front/css/added.css")}}  " rel="stylesheet">
<link href=" {{asset("assets/front/css/category.css")}}  " rel="stylesheet">
<link href=" {{asset("assets/front/css/cart.css")}}" rel="stylesheet">
{{-- ----------------------------------------------------------------------- --}}
<script type="text/javascript">
    function setREVStartSize(e) {
        try {
            e.c = jQuery(e.c);
            var i = jQuery(window).width(),
                t = 9999,
                r = 0,
                n = 0,
                l = 0,
                f = 0,
                s = 0,
                h = 0;
            if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
                f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
            }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e
                .gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e
                .sliderLayout) {
                var u = (e.c.width(), jQuery(window).height());
                if (void 0 != e.fullScreenOffsetContainer) {
                    var c = e.fullScreenOffsetContainer.split(",");
                    if (c) jQuery.each(c, function (e, i) {
                        u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                    }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset
                        .length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e
                        .fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                }
                f = u
            } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
            e.c.closest(".rev_slider_wrapper").css({
                height: f
            })
        } catch (d) {
            console.log("Failure at Presize of Slider:" + d)
        }
    };

    jQuery(document).ready(function () {


        // setTimeout(() => {
        //     jQuery("#main-content .container").addClass("wiiide");
        // }, 1000);


        jQuery(".category-menu-title").click(function (e) {


            jQuery(".categories-list").slideToggle();


        });


        jQuery(function () {

            jQuery(".categories-list").slideToggle();

        });


    });
    (function () {
        function addEventListener(element, event, handler) {
            if (element.addEventListener) {
                element.addEventListener(event, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent('on' + event, handler);
            }
        }

        function maybePrefixUrlField() {
            if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                this.value = "http://" + this.value;
            }
        }

        var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
        if (urlFields && urlFields.length > 0) {
            for (var j = 0; j < urlFields.length; j++) {
                addEventListener(urlFields[j], 'blur', maybePrefixUrlField);
            }
        } /* test if browser supports date fields */
        var testInput = document.createElement('input');
        testInput.setAttribute('type', 'date');
        if (testInput.type !== 'date') {

            /* add placeholder & pattern to all date fields */
            var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
            for (var i = 0; i < dateFields.length; i++) {
                if (!dateFields[i].placeholder) {
                    dateFields[i].placeholder = 'YYYY-MM-DD';
                }
                if (!dateFields[i].pattern) {
                    dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
                }
            }
        }

    })();

    var c = document.body.className;
    c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
    document.body.className = c;

    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage =
            "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage +=
            "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
        jQuery(sliderID).show().html(errorMessage);
    }
    /* <![CDATA[ */
    var yith_wcwl_l10n = {
        "ajax_url": "\/demo\/emallshop\/wp-admin\/admin-ajax.php",
        "redirect_to_cart": "no",
        "multi_wishlist": "",
        "hide_add_button": "1",
        "is_user_logged_in": "",
        "ajax_loader_url": "http:\/\/i-wordpress.ir\/demo\/emallshop\/wp-content\/plugins\/yith-woocommerce-wishlist\/assets\/images\/ajax-loader.gif",
        "remove_from_wishlist_after_add_to_cart": "yes",
        "labels": {
            "cookie_disabled": "\u0645\u062a\u0627\u0633\u0641\u06cc\u0645! \u0627\u06cc\u0646 \u0627\u0645\u06a9\u0627\u0646 \u0641\u0642\u0637 \u062f\u0631 \u0635\u0648\u0631\u062a\u06cc \u06a9\u0647 \u06a9\u0648\u06a9\u06cc \u0647\u0627\u06cc \u0645\u0631\u0648\u0631\u06af\u0631 \u0634\u0645\u0627 \u0641\u0639\u0627\u0644 \u0628\u0627\u0634\u062f \u062f\u0631 \u062f\u0633\u062a\u0631\u0633 \u0627\u0633\u062a.",
            "added_to_cart_message": "<div class=\"woocommerce-message\">\u0645\u062d\u0635\u0648\u0644 \u0628\u0647 \u0633\u0628\u062f\u062e\u0631\u06cc\u062f \u0627\u0641\u0632\u0648\u062f\u0647 \u0634\u062f<\/div>"
        },
        "actions": {
            "add_to_wishlist_action": "add_to_wishlist",
            "remove_from_wishlist_action": "remove_from_wishlist",
            "move_to_another_wishlist_action": "move_to_another_wishlsit",
            "reload_wishlist_and_adding_elem_action": "reload_wishlist_and_adding_elem"
        }
    };
    /* <![CDATA[ */
    var cnArgs = {
        "ajaxurl": "http:\/\/i-wordpress.ir\/demo\/emallshop\/wp-admin\/admin-ajax.php",
        "hideEffect": "fade",
        "onScroll": "0",
        "onScrollOffset": "100",
        "cookieName": "cookie_notice_accepted",
        "cookieValue": "TRUE",
        "cookieTime": "2592000",
        "cookiePath": "\/demo\/emallshop\/",
        "cookieDomain": ""
    };
    /* ]]> */
    /* <![CDATA[ */
    var yith_woocompare = {
        "ajaxurl": "\/demo\/emallshop\/?wc-ajax=%%endpoint%%",
        "actionadd": "yith-woocompare-add-product",
        "actionremove": "yith-woocompare-remove-product",
        "actionview": "yith-woocompare-view-table",
        "actionreload": "yith-woocompare-reload-product",
        "added_label": "\u0627\u0636\u0627\u0641\u0647 \u0634\u062f",
        "table_title": "\u0645\u0642\u0627\u06cc\u0633\u0647 \u0645\u062d\u0635\u0648\u0644",
        "auto_open": "yes",
        "loader": "http:\/\/i-wordpress.ir\/demo\/emallshop\/wp-content\/plugins\/yith-woocommerce-compare\/assets\/images\/loader.gif",
        "button_text": "\u0645\u0642\u0627\u06cc\u0633\u0647",
        "cookie_name": "yith_woocompare_list",
        "close_label": "\u0628\u0633\u062a\u0646"
    };
    /* ]]> */
</script>

<script type='text/javascript' src='{{asset("assets/front/js/plugins.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/js/jquery.autocomplete.min.js")}}'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var wc_add_to_cart_variation_params = {
        "wc_ajax_url": "\/demo\/emallshop\/?wc-ajax=%%endpoint%%",
        "i18n_no_matching_variations_text": "\u0628\u0627 \u0639\u0631\u0636 \u067e\u0648\u0632\u0634\u060c \u0647\u06cc\u0686 \u0643\u0627\u0644\u0627\u064a\u06cc \u0645\u0637\u0627\u0628\u0642 \u0627\u0646\u062a\u062e\u0627\u0628 \u0634\u0645\u0627 \u06cc\u0627\u0641\u062a \u0646\u0634\u062f. \u0644\u0637\u0641\u0627\u064b \u062a\u0631\u06a9\u06cc\u0628 \u062f\u06cc\u06af\u0631\u06cc \u0631\u0627 \u0627\u0646\u062a\u062e\u0627\u0628 \u06a9\u0646\u06cc\u062f.",
        "i18n_make_a_selection_text": "\u0644\u0637\u0641\u0627 \u0628\u0631\u062e\u06cc \u0627\u0632 \u06af\u0632\u06cc\u0646\u0647\u200c\u0647\u0627\u06cc \u0645\u062d\u0635\u0648\u0644 \u0631\u0627 \u0642\u0628\u0644 \u0627\u0632 \u0627\u0636\u0627\u0641\u0647 \u06a9\u0631\u062f\u0646 \u0622\u0646 \u0628\u0647 \u0633\u0628\u062f \u062e\u0631\u06cc\u062f\u060c \u0627\u0646\u062a\u062e\u0627\u0628 \u06a9\u0646\u06cc\u062f.",
        "i18n_unavailable_text": "\u0628\u0627 \u0639\u0631\u0636 \u067e\u0648\u0632\u0634\u060c \u0627\u06cc\u0646 \u0643\u0627\u0644\u0627 \u062f\u0631 \u062f\u0633\u062a\u0631\u0633 \u0646\u06cc\u0633\u062a. \u0644\u0637\u0641\u0627\u064b \u062a\u0631\u06a9\u06cc\u0628 \u062f\u06cc\u06af\u0631\u06cc \u0631\u0627 \u0627\u0646\u062a\u062e\u0627\u0628 \u06a9\u0646\u06cc\u062f."
    };

    var emallshop_options = {
        "rtl": "1",

        "enable_live_search": "1",
        "js_translate_text": {
            "days_text": "\u0631\u0648\u0632",
            "hours_text": "\u0633\u0627\u0639\u062a",
            "mins_text": "\u062f\u0642\u06cc\u0642\u0647",
            "secs_text": "\u062b\u0627\u0646\u06cc\u0647",
            "show_more": "+ \u0646\u0645\u0627\u06cc\u0634 \u0628\u06cc\u0634\u062a\u0631",
            "Show_less": "- \u0646\u0645\u0627\u06cc\u0634 \u06a9\u0645\u062a\u0631"
        },
        "typeahead_options": {
            "hint": false,
            "highlight": true
        },
        "nonce": "e4cb0e7596",
        "product_image_hover_style": "product-image-style2",
        "enable_add_to_cart_ajax": "",
        "add_to_cart_popup": "1",
        "enable_product_image_zoom": "1",
        "enable_product_image_lightbox": "1",
        "widget_toggle": "1",
        "widget_menu_toggle": "1",
        "widget_hide_max_limit_item": "1",
        "number_of_show_widget_items": "8",
        "sticky_header_mobile": "1",
        "sticky_image_wrapper": "1",
        "sticky_summary_wrapper": "1"
    };

    var emallshopOwlArg = {
        "productsCarousel": {
            "section_5d2584217b22b": {
                "autoplay": "true",
                "loop": "true",
                "navigation": "true",
                "dots": "true",
                "rp_desktop": "5",
                "rp_small_desktop": "5",
                "rp_tablet": "4",
                "rp_mobile": "3",
                "rp_small_mobile": "1"
            },
            "section-5d258421cf96e": {
                "autoplay": "true",
                "loop": "true",
                "navigation": "true",
                "dots": "true",
                "rp_desktop": "5",
                "rp_small_desktop": "5",
                "rp_tablet": "4",
                "rp_mobile": "3",
                "rp_small_mobile": "1"
            },
            "section-5d258422056b9": {
                "autoplay": "true",
                "loop": "true",
                "navigation": "true",
                "dots": "true",
                "rp_desktop": "5",
                "rp_small_desktop": "5",
                "rp_tablet": "4",
                "rp_mobile": "3",
                "rp_small_mobile": "1"
            },
            "section-5d2584222735a": {
                "autoplay": "true",
                "loop": "true",
                "navigation": "true",
                "dots": "true",
                "rp_desktop": "1",
                "rp_small_desktop": "1",
                "rp_tablet": "1",
                "rp_mobile": "1",
                "rp_small_mobile": "1"
            }
        }
    };

    var pagination_settings = {
        "pagination_options": [{
            "type": "infinity_scroll",
            "use_mobile": false,
            "mobile_type": "more_button",
            "mobile_width": 767,
            "is_AAPF": "",
            "buffer": 50,
            "load_image": "<div class=\"lmp_products_loading\"><img src=\"http:\/\/i-wordpress.ir\/demo\/emallshop\/wp-content\/themes\/emallshop\/admin\/images\/ajax-loader4.gif\"><\/div>",
            "load_img_class": ".lmp_products_loading",
            "load_more": "<div class=\"lmp_load_more_button\"><a class=\"lmp_button\" href=\"#load_next_page\">Load More<\/a><\/div>",
            "lazy_load": false,
            "lazy_load_m": false,
            "LLanimation": "zoomInUp",
            "loading": "\u0628\u0627\u0631\u06af\u06cc\u0631\u06cc...",
            "loading_class": "",
            "end_text": "\u0628\u06cc\u0634\u062a\u0631 \u0648\u062c\u0648\u062f \u0646\u062f\u0627\u0631\u062f",
            "end_text_class": "",
            "products": ".blog-posts",
            "item": "article.post",
            "pagination": ".posts-navigation",
            "next_page": ".posts-navigation a.next"
        }, {
            "type": "more_button",
            "use_mobile": false,
            "mobile_type": "more_button",
            "mobile_width": 767,
            "is_AAPF": "",
            "buffer": 50,
            "load_image": "<div class=\"lmp_products_loading\"><img src=\"http:\/\/i-wordpress.ir\/demo\/emallshop\/wp-content\/themes\/emallshop\/admin\/images\/ajax-loader4.gif\"><\/div>",
            "load_img_class": ".lmp_products_loading",
            "load_more": "<div class=\"lmp_load_more_button\"><a class=\"lmp_button\" href=\"#load_next_page\">Load More<\/a><\/div>",
            "lazy_load": false,
            "lazy_load_m": false,
            "LLanimation": "zoomInUp",
            "loading": "\u0628\u0627\u0631\u06af\u06cc\u0631\u06cc...",
            "loading_class": "",
            "end_text": "\u0628\u06cc\u0634\u062a\u0631 \u0648\u062c\u0648\u062f \u0646\u062f\u0627\u0631\u062f",
            "end_text_class": "",
            "products": ".portfolioContainer",
            "item": ".portfolio-item",
            "pagination": ".posts-navigation",
            "next_page": ".posts-navigation a.next"
        }, {
            "type": "infinity_scroll",
            "use_mobile": false,
            "mobile_type": "more_button",
            "mobile_width": 767,
            "is_AAPF": "",
            "buffer": 50,
            "load_image": "<div class=\"lmp_products_loading\"><img src=\"http:\/\/i-wordpress.ir\/demo\/emallshop\/wp-content\/themes\/emallshop\/admin\/images\/ajax-loader4.gif\"><\/div>",
            "load_img_class": ".lmp_products_loading",
            "load_more": "<div class=\"lmp_load_more_button\"><a class=\"lmp_button\" href=\"#load_next_page\"><i class=\"fa  fa-arrow-circle-o-down\"><\/i> \u0628\u0627\u0631\u06af\u06cc\u0631\u06cc \u0628\u06cc\u0634\u062a\u0631<\/a><\/div>",
            "lazy_load": false,
            "lazy_load_m": false,
            "LLanimation": "",
            "loading": "\u0628\u0627\u0631\u06af\u06cc\u0631\u06cc...",
            "loading_class": "",
            "end_text": "\u0628\u06cc\u0634\u062a\u0631 \u0648\u062c\u0648\u062f \u0646\u062f\u0627\u0631\u062f",
            "end_text_class": "",
            "products": "ul.products.is_shop",
            "item": "li.product",
            "pagination": ".woocommerce-pagination",
            "next_page": ".woocommerce-pagination a.next"
        }]
    };
    /* ]]> */
</script>
<script type='text/javascript' src='{{asset("assets/front/js/functions.js")}}'></script>
<script type='text/javascript' src='{{asset("assets/front/plugin/js_composer/js/dist/js_composer_front.min.js")}}'></script>

<!-- ===================================================== -->
<script src="{{asset('assets/front/plugin/zoom-master/jquery.zoom.min.js')}}"></script>

