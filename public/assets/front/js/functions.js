/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */
var $ = jQuery.noConflict();
var emallshopOwlArg 	= emallshopOwlArg || {},
	emallshop_options 	= emallshop_options || {}; 

;(function($) {
	
    'use strict';
	
	var emallshop = emallshop || {},
		lmp_update_state,
		emallshopQuickview = false;
	
	emallshop.init = function() {			
		emallshop.$body = $(document.body),
		emallshop.$window = $(window),
		emallshop.$windowWidth = $(window).width(),
		emallshop.$windowHeight = $(window).height();
		
		//this.sitePreloader();
		this.isCheckRTL();
		this.defaultSearchForm();
		this.newsletterPopup();
		this.backToTop();
		this.loginPopup();
		this.stickyHeaderMenu();
		//this.lazyLoadImage();
		this.isotopePortfolio();
		this.ImagesLightbox();
		this.gridListView();
		this.widgetToggle();
		this.widgetMenuToggle();
		this.widgetMaxLimitItem();
		this.productLiveSearch();
		this.productQuickview();
		this.addToCartPopup();
		this.addToCartAjax();
		this.wishlistCount();
		this.compareCount();
		this.productCountdown();
		this.infiniteAjaxPagination();
		this.productsCarousels();
		this.productBrandsCarousel();
		this.productBannerCarousel();
		this.variationsImageChange();
		this.productImageZoom();
		this.initProductThumbnailSlick();
		this.postGalleryCarousel();
		this.testimonialCarousel();
		this.categoryMenuToggle();		
		this.megamenuWindowsPosition();
		this.mobileMenu();
		this.mobileToggle();
		this.stickySidebar();				

		/*
		* Page Loader
		*/
		emallshop.$window.on('load', function() {
			setTimeout(function(){
				jQuery('body').addClass('loaded');
			}, 1000);
		});		
		
		/*
		* Init Masonry grid
		*/
		$( '.blog-posts.masonry-grid' ).masonry( {
			isOriginLeft: false,
		} );
		
		$( '.dokan-seller-wrap' ).masonry( {} );

		/*
		* Change number of products to be viewed on shop page
		*/
		$( '.show-products-number' ).change( function() {
			$( this ).closest( 'form' ).submit();
		} );
		
		/*
		* Change number of products to be viewed on shop page
		*/
		$( '.show-products-number' ).on( 'change', 'select.showpagers', function() {
			$( this ).closest( 'form' ).submit();
		});	
				
		/*
		* FullScreen Button 
		*/
		$('a.fullscreen-button').click(function(e){
			e.preventDefault();
			var target = $(this).attr('href');
			$('.thumbnails-carousel a.fancybox[href="'+target+'"]').trigger('click');
		});	
		
		/*
		* Add loading in wishlist button 
		*/
		$('.add_to_wishlist').on('click',function(){
			$(this).parents('.yith-wcwl-add-button').addClass('show_loading');
		});
		
		/*
		* Reload product gallery after product filder		
		*/
		$(document).on('ready yith-wcan-ajax-filtered', emallshop.productGalleryCarousel);
		
	};		
	
	emallshop.defaultSearchForm = function(){
		// Search toggle.
		$( '.search-toggle' ).on( 'click', function( event ) {
			var that    = $( this ),
				wrapper = $( '#search-container' );
				//container = that.find( 'a' );

			that.toggleClass( 'active' );
			wrapper.toggleClass( 'hide' );

			if ( that.is( '.active' ) || $( '.search-toggle .screen-reader-text' )[0] === event.target ) {
				wrapper.find( '.search-field' ).focus();
			}
		} );
	};
	
	emallshop.isCheckRTL = function(){
		/*
		* If check is site RTL
		*/		
		$('html[dir="rtl"] body').addClass('rtl');
		var emallshop_rtl = false;
		if($('body,html').hasClass('rtl')){ 
			emallshop_rtl =  true;
		}	
		
		return emallshop_rtl;
	};
	
	emallshop.newsletterPopup =  function(){
		//*******************************************************************
		//* Newsletter Popup.
		//*******************************************************************/
		var obj = {
		  init: function() {
			try
			{
			  if ($.cookie('popupNewsletter') !== 'disable') { 
				this.checkboxEvent();
				setTimeout(function() {
				  $('#newsletterPopup').modal('show');
				  var date = new Date();
				  var minutes = 1;
				  date.setTime(date.getTime() + (minutes * 60 * 1000));
				  $.cookie('popupNewsletter', 'disable', {expires:date, path:'/'});
				}, 1500);
			  }
			}
			catch (err) {} // ignore errors reading cookies
		  },
		  checkboxEvent: function() {
			$('input[id^="checkBox"]').change(function(){
			  if ($(this).is(':checked')) {
				$.cookie('popupNewsletter', 'disable', {expires:1, path:'/'});
			  } else {
				$.cookie('popupNewsletter', null, { path: '/' });
			  }
			});
		  }
		};
		
		$(document).ready(function() {
		  obj.init();
		});
	};
	
	emallshop.backToTop = function(){
		//*******************************************************************
		//* Back to top button 
		//********************************************************************/
		emallshop.$window.on('scroll',function(){				
			var button = $('.back-to-top');
			
			if( emallshop.$window.scrollTop() > 150  && emallshop.$windowWidth > 767 ){
				button.fadeIn(400);	
			}else{
				button.fadeOut(400);	
			}		
		});
		
		$('.back-to-top').click(function() {
				$('html,body').animate({scrollTop:0}, 600);	
				return false;
		});				
	};
	
	emallshop.loginPopup = function(){
		//*******************************************************************
		//* User's login popup 
		//********************************************************************/
		emallshop.$body.on('click', '.user-login.enable', function (e) {
			e.preventDefault();
			$('#login-popup').modal('show');
		});
	};
	
	emallshop.stickyHeaderMenu = function(){
		//*******************************************************************
		//* Sticky header menu 
		//********************************************************************/
		
		var sticky_class='';
		var adminBar	= $( '.admin-bar' ).length ? $( '#wpadminbar' ).height() : 0;
		var getHeaderHeight = $('#header').outerHeight();
		
		if($( 'body' ).hasClass( 'sticky-topbar' )){
			sticky_class='topbar';
		}else if($( 'body' ).hasClass( 'sticky-navigation' )){	
			sticky_class='navigation';
		}else if($( 'body' ).hasClass( 'sticky-middle' )){
			sticky_class='middle';
		}		
		
		emallshop.$window.on('resize scroll',function(){


			// if ( ( $( this ).scrollTop() > getHeaderHeight && emallshop.$window.width() > 991) ) {
			// 	emallshop.$body.addClass('scrollActive');
			// 	$('.header-'+ sticky_class).addClass( 'es-sticky' );
			// 	$('.header-'+ sticky_class).css({ 'top': + adminBar + 'px'});
			// } else if ( ( $( this ).scrollTop() > getHeaderHeight ) && (emallshop_options.sticky_header_mobile && emallshop.$window.width() < 992) ) {
			// 	emallshop.$body.addClass('scrollActive');
			// 	$('.header-middle').addClass( 'es-sticky' );
			// 	$('.header-middle').css({ 'top': + adminBar + 'px'});
			// } else {
			// 	emallshop.$body.removeClass('scrollActive');
			// 	$('.header > div').removeClass( 'es-sticky' );
			// 	$('.header > div').removeAttr( 'style' );
			// }
	
	
		});			
	};
	
	emallshop.lazyLoadImage = function(){
		//*******************************************************************
		//* Lazy Load Image 
		//*******************************************************************/		
		
	};
	
	emallshop.isotopePortfolio = function(){
		//*******************************************************************
		//* Init isotope portfolio
		//********************************************************************/

		var $container = $('.portfolioContainer');
		var $filter = $('.portfolioFilter');
		var $layoutMode='masonry';

		if($container.hasClass('normal-grid') ){
			$layoutMode='fitRows';
		}

		emallshop.$window.on('load', function () {
			// Initialize Isotope
			
			if(emallshop.isCheckRTL()){			
				$container.isotope({
					itemSelector: '.portfolio-item',
					isOriginLeft: false,
					layoutMode: $layoutMode
				});
			}
			else{
				$container.isotope({
					itemSelector: '.portfolio-item',
					layoutMode: $layoutMode
				});
			}
			$('.portfolioFilter a').click(function () {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				return false;
			});
			$filter.find('a').click(function () {
				//var selector = $(this).attr('data-filter');
				$filter.find('a').removeClass('current');
				$(this).addClass('current');
			});
		});
	};
	
	emallshop.ImagesLightbox = function(){
		/*
		* Image Lightbox 
		*/
		
		$('a.zoom-gallery').magnificPopup({
			type: 'image',					
			mainClass: 'mfp-with-zoom mfp-img-mobile',
			gallery		: {
				enabled: true
			}
		});
	};
	
	emallshop.gridListView = function(){
		//*******************************************************************
		//* List/Grid view toggle
		//*******************************************************************/
		
		$(".gridlist-toggle a").click(function(){
			var className = $(this).attr('class').split(' ');
			jQuery('.gridlist-toggle a').removeClass('active');
			$(this).addClass('active');
			jQuery.cookie('gridcookie',className[0] +' '+className[1], { path: '/' });
			jQuery('ul.products.is_shop').fadeOut(300, function() {
				
				jQuery(this).removeClass('grid grid-view').removeClass('grid-expand grid-view').removeClass('list list-view').removeClass('list-thin list-view').addClass(className[0] +' '+className[1]).fadeIn(300);
				
			});
			return false;
		});	
		
		if (jQuery.cookie('gridcookie')) {		
			jQuery('ul.products.is_shop').removeClass('grid-expand grid-view').removeClass('list list-view').removeClass('list-thin list-view');
			jQuery('ul.products.is_shop').addClass(jQuery.cookie('gridcookie'));
			var className = jQuery.cookie('gridcookie').split(' ');
			jQuery('.gridlist-toggle a').removeClass('active');
			jQuery('.gridlist-toggle'+ ' .'+ className[0]).addClass('active');
		}	
		
		jQuery('.gridlist-toggle a').click(function(event) {
			event.preventDefault();
		});	
	};
	
	emallshop.widgetMenuToggle = function(){
		//*******************************************************************
		//* Widget Menu Toggle
		//*******************************************************************/
		
		if( emallshop_options.widget_menu_toggle) {
			$('.widget ul.children').parent().addClass('parent-item');
			$('.widget ul.sub-menu').parent().addClass('parent-item');
			$('.widget ul > li.parent-item > ul').hide();
			$('.widget ul > li.parent-item.current-cat-parent > ul').show().parent().addClass('open-item');
			$('.widget ul > li.parent-item.current-cat.cat-parent > ul').show().parent().addClass('open-item');
			
			$('.widget ul > li.parent-item').click(function() {
				if ($(this).hasClass('current-cat-parent') || $(this).hasClass('current-cat.cat-parent')) {
					var li = $(this).closest('li');
					li.find(' > ul').slideToggle('fast');
					$(this).toggleClass('close-cat');
				} else {
					var li = $(this).closest('li');
					li.find(' > ul').slideToggle('fast');
					$(this).toggleClass('open-item');
				}
			});
			
			$('.widget ul.children li, .widget ul.sub-menu li, .widget ul.sub-menu li > a, ul.children li > a').click(function(e){
				e.stopPropagation();
			});
		}		
	};
	
	emallshop.widgetToggle = function(){
		//*******************************************************************
		//* Widget Menu Toggle
		//*******************************************************************/
		
		if( emallshop_options.widget_toggle) {
			
			$('.widget-area .widget').addClass('widget-toggle');
			$('.widget-area .widget .widget-title, .dokan-widget-area .widget .widget-title').click(function(e) {
				e.stopPropagation();
				if ($(this).next().is(':visible')){
                    $(this).parent().addClass('closed');
                } else {
                    $(this).parent().removeClass('closed');
                }
                $(this).next().stop().slideToggle(200);
			});			
		}
	};
	
	emallshop.widgetMaxLimitItem = function(){
		//*******************************************************************
		//* Widget Hide Max Limit Item
		//*******************************************************************/
		if( emallshop_options.widget_hide_max_limit_item) {
			var js_translate_text = emallshop_options.js_translate_text;
			$('.widget .widget-title + ul').hideMaxListItems({
				'max': emallshop_options.number_of_show_widget_items,
				'speed': 500,
				'moreText': js_translate_text.show_more,
				'lessText': js_translate_text.Show_less
			});
		}
	};
	
	emallshop.productLiveSearch = function(){
		//*******************************************************************
		//* Product live search
		//*******************************************************************/		
		
		if( emallshop_options.enable_live_search === '1' ) {
			$('.woocommerce-product-search').each(function(){
				 var append = $(this).find('.live-search-results');
				 var search_categories = $(this).find('#product_cat');
				 var serviceUrl = emallshop_options.ajax_url + '?action=products_live_search';
				 //var product_cat = '';

				if (search_categories.length && search_categories.val() !== '') {
					serviceUrl += '&product_cat=' + search_categories.val();
				}

				 $(this).find('.search-field').devbridgeAutocomplete({
					minChars        : 3,
					appendTo        : append,
					triggerSelectOnValidInput: false,
					serviceUrl      : serviceUrl,
					onSearchStart   : function () {
					  $('.search-btn').removeClass('loading');
					  $('.search-btn').addClass('loading');
					},
					onSelect        : function (suggestion) {
						if (suggestion.id !== -1) {
							window.location.href = suggestion.url;
						}
					},
					onSearchComplete: function () {
						$('.search-btn').removeClass('loading');
					},
					beforeRender: function (container) {
						$(container).removeAttr('style');
					},
					formatResult: function (suggestion, currentValue) {
							var pattern = '(' + $.Autocomplete.utils.escapeRegExChars(currentValue) + ')';
							var html = '';					
							if(suggestion.img) {
								html += '<div class="search-product-image"><img src="'+suggestion.img+'"></div>';
							}
							html += '<div class="search-product-title"><a href="'+suggestion.url+'">'+suggestion.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>')+'</a></div>';
							if(suggestion.price) {
								html += '<span class="search-product-price">'+suggestion.price+'</span>';
							}

							return html;
						}
				});

				if( search_categories.length ){
					var searchForm = $(this).find('.search-field').devbridgeAutocomplete();

					search_categories.on( 'change', function( ){
						if( search_categories.val() !== '' ) {
							searchForm.setOptions({
								serviceUrl:  emallshop_options.ajax_url + '?action=products_live_search&product_cat=' + search_categories.val()
							});
						} else{
							searchForm.setOptions({
								serviceUrl:  emallshop_options.ajax_url + '?action=products_live_search'
							});
						}
						// update suggestions
						searchForm.hide();
						searchForm.onValueChange();
					});
				}
			});
		}
	};
	
	emallshop.productQuickview = function(){
		//*******************************************************************
		//* Product quickview
		//*******************************************************************/
				
		$( 'body' ).on( 'click', '.quickview', function(e) {
			e.preventDefault();
			var _this = $( this ),
				pid   = _this.attr( 'data-product_id' ),
				data  = { action: 'emallshop_product_quickview', pid: pid };

			$( 'body .wrapper' ).after( '<div class="qv loading"><div class="pl-loading"></div></div>' );
	
			$.post( myAjax.ajaxurl, data, function( response ) {
				$.magnificPopup.open({
					items: {
						src: response,
						type: 'inline'
					},
					mainClass: 'mfp-fade',
					removalDelay: 800
				});			
				
				setTimeout(function() {
					if ( $( '.product-quickview form' ).hasClass( 'variations_form' ) ) {
						$( '.product-quickview .variations_form' ).wc_variation_form();
						$( '.product-quickview select' ).trigger( 'change' );
					}
				}, 100);
				
				$( '.qv.loading' ).remove();				
				emallshop.initProductThumbnailSlick();
				
				if ( typeof $.PLT !== 'undefined'){
					$.PLT.main_product_variation_select();
					$.PLT.main_product_variation_load_default();
					$.PLT.product_bundle_variation_select();
				}
				
				$( '.images' ).imagesLoaded( function() {
					var imgHeight = $( '.product-quickview .images' ).outerHeight();
					$( '.product-quickview .single-product-entry > div' ).css({
						'height': imgHeight
					});
				});
			});			
			emallshopQuickview=true;
		});		
	};
	
	emallshop.addToCartPopup = function(){
		//*******************************************************************
		//* Add to cart Popup
		//*******************************************************************/
		
		if (!emallshop_options.add_to_cart_popup) { return; }			
		
		jQuery('body').append('<div class="emallshop-notice-wrapper"><div class="emallshop-notice"></div><div class="close"><i class="fa fa-times-circle"></i></div></div>');
		
		jQuery('.emallshop-notice-wrapper .close').on('click', function(){
			jQuery('.emallshop-notice-wrapper').fadeOut();
			jQuery('.emallshop-notice').html('');
		});
		jQuery('body').on( 'adding_to_cart', function(event, button, data) {
			var ajaxPId = button.attr('data-product_id');
			var ajaxPQty = button.attr('data-quantity');
			
			//get product info by ajax
			jQuery.post(
				myAjax.ajaxurl, 
				{
					'action': 'get_productinfo',
					'data':   {'pid': ajaxPId,'quantity': ajaxPQty}
				},
				function(response){
					jQuery('.emallshop-notice').html(response);
				}
			);
		});
		jQuery('body').on( 'added_to_cart', function(event, fragments, cart_hash) {
			//show product info after added
			jQuery('.emallshop-notice-wrapper').fadeIn();
		});		
	};
	
	emallshop.addToCartAjax = function () {
		//*******************************************************************
		//* Add to cart ajax
		//*******************************************************************/
		
		if (!emallshop_options.enable_add_to_cart_ajax) { return; }

		emallshop.$body.find('form.cart').on('click', '.single_add_to_cart_button', function(e) {
			e.preventDefault();

			if ( $(this).hasClass('disabled') ) {
				return;
			}

			var $cartForm = $(this).closest('form.cart'),
				$singleBtn = $(this);
			$singleBtn.addClass('loading');

			if ( !$singleBtn.hasClass('loading') ) {
				return;
			}

			var formdata = $cartForm.serializeArray(),
				currentURL = window.location.href,
				valueID = $singleBtn.attr('value');

			if(typeof valueID !== "undefined" && valueID !== false) {
				var cartid = {
					name : 'add-to-cart',
					value: valueID
				};
				formdata.push(cartid);
			}

			$.ajax({
				url    : window.location.href,
				method : 'post',
				data   : formdata,
				error  : function() {
					window.location = currentURL;
				},
				success: function(response) {
					if ( !response ) {
						window.location = currentURL;
					}


					if ( typeof wc_add_to_cart_params !== 'undefined' ) {
						if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
							window.location = wc_add_to_cart_params.cart_url;
							return;
						}
					}

					$(document.body).trigger('updated_wc_div');
					$(document.body).on('wc_fragments_refreshed', function() {
						$singleBtn.removeClass('loading');						
					});

				}
			});

		});		
		
	};

	emallshop.wishlistCount = function(){
		//*******************************************************************
		//* Ajax Count Wishlist Product
		//*******************************************************************/
		
		var emallshop_ajax_wishlist_count = function() {
			$.ajax({
				type: 'POST',
				url: yith_wcwl_l10n.ajax_url,
				data      : {
					action: 'emallshop_ajax_wishlist_count'
				},
				beforeSend: function () {
				},
				complete  : function () {
				},			
				success   : function (data) {
					//console.log( data );
					$('samp.wishlist-count').html(data);
				}
			});
		};
		$('body').on( 'added_to_wishlist removed_from_wishlist', emallshop_ajax_wishlist_count );
	};
	
	emallshop.compareCount = function(){
		//*******************************************************************
		//* Ajax Count Compare Product
		//*******************************************************************/
		
		$('body').on( 'yith_woocompare_open_popup woocompare_open_popup_mod', function () {				
			$.ajax({
				type: 'post',
				url: myAjax.ajaxurl,
				data      : {
					action: 'emallshop_ajax_compare_count'
				},
				beforeSend: function () { 
				},
				complete  : function () { 
				},	
				success: function (response) { 
					$('samp.compare-count').html(response);				
				},
				error: function(errorThrown){
					//alert(errorThrown);
			   } 
			});
		});

		$(window).on('yith_woocompare_product_removed', function () {
			$('body').trigger('woocompare_open_popup_mod');
		});
		
		//Remove product in compare product widget
		$('.yith-woocompare-widget').on('click', 'li a.remove, a.clear-all', function (e) {

			e.preventDefault();
			var product_id = $(this).data('product_id');
			
			$.ajax({
				type: 'post',
				url: myAjax.ajaxurl,
				data      : {
					action: 'emallshop_ajax_compare_count',
					id:product_id
				},
				beforeSend: function () { 
				},
				complete  : function () { 
				},	
				success: function (response) { 
					$('label.compare-count').html(response);				
				},
				error: function(errorThrown){
					//alert(errorThrown);
			   } 
			});

		});
	};
	
	emallshop.productCountdown = function(){
		//*******************************************************************
		//* Product sale countdown
		//*******************************************************************/
		$('.countdown').each(function(){
			var js_translate_text = emallshop_options.js_translate_text;
			var $this = $(this),
				endDate = $this.data(),
				until = new Date(
					endDate.year,
					endDate.month || 0,
					endDate.day || 1,
					endDate.hours || 0,
					endDate.minutes || 0,
					endDate.seconds || 0
				);
			// initialize
			$this.countdown({
				until : until,
				format : 'dHMS',
				labels : ['years', 'month', 'weeks', js_translate_text.days_text, js_translate_text.hours_text, js_translate_text.mins_text, js_translate_text.secs_text]
			});
		});
	};
	
	emallshop.infiniteAjaxPagination = function(){
		//*******************************************************************
		//* Infinite Ajax Pagination
		//*******************************************************************/
					
		if ( pagination_settings.length === 0 || typeof pagination_settings.pagination_options === 'undefined' ) {
			return;
		}
		
		$.each( pagination_settings.pagination_options, function ( id, pagination_options ) {
			var lmp_is_loading = false, lmp_loading_style;
			var $container = $('.masonry-grid');
			if ( $( pagination_options.products ).length > 0 ) {
				$( pagination_options.products ).after( $( pagination_options.load_more ) );
				current_style();
				$(window).resize( function () {
					current_style();
				});
				$(window).scroll ( function () {
					if ( lmp_loading_style === 'infinity_scroll' ) {
						var products_bottom = $( pagination_options.products ).offset().top + $( pagination_options.products ).height() - pagination_options.buffer;
						var bottom_position = $(window).scrollTop() + $(window).height();
						if ( products_bottom < bottom_position && ! lmp_is_loading ) {
							load_next_page();
						}
					}
				});
				$(document).on( 'click', '.lmp_button', function (event) {
					event.preventDefault();
					$( '.lmp_load_more_button' ).hide(); //EmallShop 2.0
					load_next_page();
				});
				if ( ! pagination_options.is_AAPF ) {
					$(document).on( 'click', pagination_options.pagination+' a', function (event) {
						event.preventDefault();
						load_next_page( true, $(this).attr('href') );
					});
				}
			}
			function load_next_page( replace, user_next_page ) {
				if( ! lmp_is_loading ) {
					if ( typeof( replace ) === 'undefined' ) {
						user_next_page = false;
					}
					if ( typeof( user_next_page ) === 'undefined' ) {
						user_next_page = false;
					}
					var $next_page = $( pagination_options.next_page );
					if ( $next_page.length > 0 || user_next_page !== false ) {
						start_ajax_loading();
						var next_page;
						if( user_next_page !== false ) {
							next_page = user_next_page;
						} else {
							next_page = $next_page.attr('href');
						}
						$.get( next_page, function( data ) {
							var $data = $(data);
							if( pagination_options.lazy_load_m && $(window).width() <= pagination_options.mobile_width || pagination_options.lazy_load && $(window).width() > pagination_options.mobile_width ) {
								$data.find(pagination_options.item+', .berocket_lgv_additional_data').find( 'img' ).each( function ( i, o ) {
									$(o).attr( 'data-src', $(o).attr( 'src' ) ).removeAttr( 'src' );
								});
								$data.find(pagination_options.item+', .berocket_lgv_additional_data').addClass('lazy');
							}
							var $products = $data.find( pagination_options.products ).html();
							if ( replace ) {
								$( pagination_options.products ).html( $products );
								emallshop.productGalleryCarousel(); //EmallShop 2.0
								
								$container.imagesLoaded( function() { // EmallShop 2.0
									$container.masonry('reloadItems').masonry();
									$('.portfolioContainer').isotope( 'reloadItems' ).isotope();
									emallshop.ImagesLightbox ();
								});
							} else {
								$( pagination_options.products ).append( $products );
								emallshop.productGalleryCarousel(); //EmallShop 2.0
																
								$container.imagesLoaded( function() { // EmallShop 2.0
									$container.masonry('reloadItems').masonry();
									$('.portfolioContainer').isotope( 'reloadItems' ).isotope();
									emallshop.ImagesLightbox ();
								});
							}
							if( pagination_options.lazy_load_m && $(window).width() <= pagination_options.mobile_width || pagination_options.lazy_load && $(window).width() > pagination_options.mobile_width ) {
								$( pagination_options.products+' .lazy' ).find( 'img' ).lazyLoadXT();
								$( pagination_options.products ).find('.lazy').on( 'lazyshow', function () {
									$(this).removeClass('lazy').addClass('animated').addClass(pagination_options.LLanimation);
									if( ! $(this).is('.berocket_lgv_additional_data') ) {
										$(this).next( '.berocket_lgv_additional_data' ).removeClass('lazy').addClass('animated').addClass(pagination_options.LLanimation);
									}
								});
							}
							var $pagination = $data.find( pagination_options.pagination );
							$( pagination_options.pagination ).html( $pagination.html() );
							current_style();
							end_ajax_loading();
						});
					}
				}
			}
			function start_ajax_loading() {
				lmp_is_loading = true;
				$( pagination_options.products ).after( $( pagination_options.load_image ) ); //EmallShop 2.0
			}
			function end_ajax_loading() {
				$( pagination_options.load_img_class ).remove();
				lmp_is_loading = false;
				var $next_page = $( pagination_options.next_page );
				if( ( lmp_loading_style === 'infinity_scroll' || lmp_loading_style === 'more_button' ) && $next_page.length <= 0 ) {
					$( pagination_options.products ).append( $( pagination_options.end_text ) );
				}
			}
			function current_style() {
				if( $( pagination_options.next_page ).length > 0 ) {
					$('.lmp_button').attr('href', $( pagination_options.next_page ).attr('href'));
				}
				if ( pagination_options.use_mobile && $(window).width() <= pagination_options.mobile_width ) {
					set_style( pagination_options.mobile_type );
				} else {
					set_style( pagination_options.type );
				}
			}
			function set_style( style ) {
				var $next_page = $( pagination_options.next_page );
				$( pagination_options.pagination ).hide();
				$( '.lmp_load_more_button' ).hide();
				if ( style === 'more_button' ) {
					if ( $next_page.length > 0 ) {
						$( '.lmp_load_more_button' ).show();
					} else {
						setTimeout( test_next_page, 4000 );
					}
				} else if ( style === 'pagination' ) {
					$( pagination_options.pagination ).show();
				}
				lmp_loading_style = style;
			}
			function test_next_page() {
				var $next_page = $( pagination_options.next_page );
				if ( $next_page.length > 0 ) {
					current_style();
				} else {
					setTimeout( test_next_page, 4000 );
				}
			}
			lmp_update_state = function() {
				current_style();
			};
		});
							
	};
	
	emallshop.productsCarousels = function() { 
		//*******************************************************************
		//* owl carousel slider of products
		//*******************************************************************/

		if ( emallshopOwlArg.length === 0 || typeof emallshopOwlArg.productsCarousel === 'undefined' ) {
			return; 
		}
		$.each( emallshopOwlArg.productsCarousel, function ( id, productsCarousel ) {
			var autoplay = ( productsCarousel.autoplay === 'true' ) ? true : false;
			var navigation = ( productsCarousel.navigation === 'true' ) ? true : false;
			var loop = ( productsCarousel.loop === 'true' ) ? true : false;
			var dots = ( productsCarousel.dots === 'true' ) ? true : false;
			var rp_desktop = ( productsCarousel.rp_desktop > 0 ) ? productsCarousel.rp_desktop : 5;
			var rp_small_desktop = ( productsCarousel.rp_small_desktop > 0 ) ? productsCarousel.rp_small_desktop : 4;
			var rp_tablet = ( productsCarousel.rp_tablet > 0 ) ? productsCarousel.rp_tablet : 3;
			var rp_mobile = ( productsCarousel.rp_mobile > 0 ) ? productsCarousel.rp_mobile : 2;
			var rp_small_mobile = ( productsCarousel.rp_small_mobile > 0 ) ? productsCarousel.rp_small_mobile : 1;
			
			var numItems = $( document.getElementById( id ) ).children('.owl-item').length;
			
			$( document.getElementById( id ) ).find( '.product-carousel').owlCarousel({				
				autoplay: 			autoplay,
				autoplayHoverPause: true,
				lazyLoad:			true,
				rtl : 				(emallshop.isCheckRTL()) ? true : false,
				loop: 				( numItems >= rp_desktop && loop) ? true : false,
				rewind: 			true,
				//touchDrag: 			( emallshop.$windowWidth <  768 ) ? false : true,
				smartSpeed:			850,
				nav: 				navigation,
				navText: 			['',''],
				dots: 				dots,
				responsive:{
					0:{
						items: rp_small_mobile
					},
					445:{
						items: rp_mobile
					},
					621:{
						items: rp_tablet
					},
					992:{
						items : rp_small_desktop
					},
					1199:{
						items : rp_desktop
					}
				}
			});			

		} );
		$( '.owl-carousel').addClass('owl-theme');
	};
	
	emallshop.productBrandsCarousel = function() {
		//*******************************************************************
		//* owl carousel slider of products brands
		//*******************************************************************/

		if ( emallshopOwlArg.length === 0 || typeof emallshopOwlArg.productsBrands === 'undefined' ) {
			return;
		}//console.log(emallshopOwlArg);
		$.each( emallshopOwlArg.productsBrands, function ( id, productsBrands ) {
			var autoplay = ( productsBrands.autoplay === 'true' ) ? true : false;
			var navigation = ( productsBrands.navigation === 'true' ) ? true : false;
			var loop = ( productsBrands.loop === 'true' ) ? true : false;
			var dots = ( productsBrands.dots === 'true' ) ? true : false;
			
			var numItems = $( document.getElementById( id ) ).children('.owl-item').length;
			
			if( productsBrands.item_columns > 1 ) {
				var items = productsBrands.item_columns;
			}

			$( document.getElementById( id ) ).find( '.brands-carousel').owlCarousel({
				autoplay:			autoplay,
				loop : 				( numItems >= items && loop) ? true : false,
				rtl : 				(emallshop.isCheckRTL()) ? true : false,
				nav: 				navigation,
				navText: 			['',''],
				stopOnHover: 		true,
				dots: 				dots,
				smartSpeed:			750,
				responsive:{
					0:{
						items:3
					},
					480:{
						items:4
					},
					768:{
						items:6
					},
					1024:{
						items : items
					}
				}
			});

		} );
	};
	
	emallshop.productBannerCarousel = function(){
		//*******************************************************************
		//* owl carousel slider of product banner
		//*******************************************************************/
		
		$('.banner-carousel').owlCarousel({
			autoplay : true,
			rtl : (emallshop.isCheckRTL()) ? true : false,
			responsive : true,
			pagination : true,
			rewindSpeed : 1000,
			singleItem : true
		});
	};
	
	emallshop.productGalleryCarousel = function(){
		//*******************************************************************
		//* Products Gallery Slider
		//*******************************************************************/
		if ( emallshop_options.product_image_hover_style === 'product-image-style3' || emallshop_options.product_image_hover_style === 'product-image-style4' ) {
			
			var $navigation = ( emallshop_options.product_image_hover_style === 'product-image-style3') ? true : false,		$pagination = ( emallshop_options.product_image_hover_style === 'product-image-style4') ? true : false;
			
			$('.product-items li.product').each(function(){
				var productGalleryCarousel = $(this).find('.product_image_gallery');
				var productImage = $(this).find('.product-image');
				var interval;
				if (!productGalleryCarousel.hasClass('owl-loaded')) {
					productGalleryCarousel.owlCarousel({
						items:				1,
						loop:				true,
						autoplayTimeout:	1500,
						rtl:				(emallshop.isCheckRTL()) ? true : false,
						smartSpeed:			450,
						mouseDrag:			false,
						touchDrag:			true,
						//nav:				true,
						navText: 			['',''],
						dots: 				$pagination
					});
					
					productImage.hover(function(){
						productGalleryCarousel.owlCarousel('invalidate', 'all').owlCarousel('refresh');
					});
					
					function stopOwlPropagation(element) {
						jQuery(element).on('to.owl.carousel', function(e) { e.stopPropagation(); });
						jQuery(element).on('next.owl.carousel', function(e) { e.stopPropagation(); });
						jQuery(element).on('prev.owl.carousel', function(e) { e.stopPropagation(); });
						jQuery(element).on('destroy.owl.carousel', function(e) { e.stopPropagation(); });
					}
					stopOwlPropagation('.owl-carousel');

					if($pagination){
						productImage.hover(
							function(){
								interval = setInterval(function() {
									productGalleryCarousel.trigger('next.owl.carousel');
								}, 1500);								
							},
							function(){
								clearInterval(interval);
							}
						);
					}
					
					if($navigation){
						var nextOwl = $(this).find('.product-slider-controls .owl-next');
						var prevOwl = $(this).find('.product-slider-controls .owl-prev');
						
						prevOwl.click(function(){
							productGalleryCarousel.trigger('prev.owl.carousel');
						});								
						nextOwl.click(function(){
							productGalleryCarousel.trigger('next.owl.carousel');
						});								
					}
				}
			});	
		};
	};
	
	emallshop.variationsImageChange = function(){
		/**
		 * Sets product images for the chosen variation
		 */
		$.fn.wc_variations_image_update = function( variation ) {
			var $form             = this,
				$product          = $form.closest( '.product' ),
				$product_gallery  = $product.find( '.images' ),
				$gallery_img      = $product.find( '.product-thumbnails .slick-slide[data-slick-index="0"] img' ),
				$product_img_wrap = $product_gallery.find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' ).eq( 0 ),
				$product_img      = $product_img_wrap.find( '.wp-post-image' ),
				$product_link     = $product_img_wrap.find( 'a' ).eq( 0 );

			if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
				$product_img.wc_set_variation_attr( 'src', variation.image.src );
				$product_img.wc_set_variation_attr( 'height', variation.image.src_h );
				$product_img.wc_set_variation_attr( 'width', variation.image.src_w );
				$product_img.wc_set_variation_attr( 'srcset', variation.image.srcset );
				$product_img.wc_set_variation_attr( 'sizes', variation.image.sizes );
				$product_img.wc_set_variation_attr( 'title', variation.image.title );
				$product_img.wc_set_variation_attr( 'alt', variation.image.alt );
				$product_img.wc_set_variation_attr( 'data-src', variation.image.full_src );
				$product_img.wc_set_variation_attr( 'data-large_image', variation.image.full_src );
				$product_img.wc_set_variation_attr( 'data-large_image_width', variation.image.full_src_w );
				$product_img.wc_set_variation_attr( 'data-large_image_height', variation.image.full_src_h );
				$product_img_wrap.wc_set_variation_attr( 'data-thumb', variation.image.src );
				$gallery_img.wc_set_variation_attr( 'src', variation.image.thumb_src );
				$product_link.wc_set_variation_attr( 'href', variation.image.full_src );
			} else {
				$product_img.wc_reset_variation_attr( 'src' );
				$product_img.wc_reset_variation_attr( 'width' );
				$product_img.wc_reset_variation_attr( 'height' );
				$product_img.wc_reset_variation_attr( 'srcset' );
				$product_img.wc_reset_variation_attr( 'sizes' );
				$product_img.wc_reset_variation_attr( 'title' );
				$product_img.wc_reset_variation_attr( 'alt' );
				$product_img.wc_reset_variation_attr( 'data-src' );
				$product_img.wc_reset_variation_attr( 'data-large_image' );
				$product_img.wc_reset_variation_attr( 'data-large_image_width' );
				$product_img.wc_reset_variation_attr( 'data-large_image_height' );
				$product_img_wrap.wc_reset_variation_attr( 'data-thumb' );
				$gallery_img.wc_reset_variation_attr( 'src' );
				$product_link.wc_reset_variation_attr( 'href' );
			}

			window.setTimeout( function() {
				$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );
				$form.wc_maybe_trigger_slide_position_reset( variation );
				$( window ).trigger( 'resize' );
			}, 20 );
		};
	};
	
	emallshop.productImageZoom = function(){
		//*******************************************************************
		//* Single Product image zoom style
		//******************************************************************
		
		if (!emallshop_options.enable_product_image_zoom) { return; }
		
		if ( $( '.es-image-zoom' ).length > 0 ) {
			var img = $( '.es-image-zoom' );
			img.zoom({
				touch: false
			});
		}
	};
	
	emallshop.initProductThumbnailSlick = function(){
		//*******************************************************************
		//* Product detail image and thumbnails slider
		//*******************************************************************/		
		
		$( '.emallshop-slick-carousel' ).not( '.slick-initialized' ).slick();
		
		$( '#product-image.emallshop-slick-carousel' ).on('afterChange', function(event, slick, currentSlide, nextSlide){
			$(".slick-slide").removeClass('flex-active-slide');
			$('.slick-current').addClass('flex-active-slide');
		});
			
		// Reset the index of image on product variation
		$(document).on( 'found_variation', '.variations_form', function( es, variation ) {		
			if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
				$( '.emallshop-slick-carousel' ).slick( 'slickGoTo', 0 );
			}
		}).on('reset_image', function () {
			$('.emallshop-slick-carousel').slick( 'slickGoTo', 0 );
		});
	};	
	
	emallshop.postGalleryCarousel = function (){
		//*******************************************************************
		//*  post gallery carousel
		//*******************************************************************/
		$('.post-slider').owlCarousel({
			autoplay : 	true,
			rtl : 		(emallshop.isCheckRTL()) ? true : false,
			rewind: 	true,
			smartSpeed: 850,
			nav : 		true,
			navText: 	['',''],
			dots: 		true,		
			items: 		1
		});
		$( '.post-slider').addClass('owl-theme');
	};
	
	emallshop.testimonialCarousel = function(){
		$('.testimonial-carousel').owlCarousel({
			autoplay:			false,
			rtl : 				(emallshop.isCheckRTL()) ? true : false,
			nav: 				true,
			navText:		 	['',''],
			dots: 				false,
			smartSpeed:			750,
			margin:				15,
			items:				1
		});
	};
	
	emallshop.categoryMenuToggle = function(){	
		// var windowWidth = $(window).width(); 
		// var getVerticalMenuHeight = $('.categories-list').outerHeight();
		// //var headerHeight = $('#header').outerHeight();
		// if(windowWidth > 1199){
		// 	$('.home.open-categories-menu .header-navigation .category-menu').removeClass('open').find('.categories-list').slideDown();	
		// }
		
		// $(document).on('click','.category-menu .category-menu-title',function(){	
		// 	$(this).closest('.header-navigation .category-menu.open').find('.categories-list').slideToggle();
		// 	return false;
		// });		
		
		// $(window).scroll(function() {
		// 	var currentPosition = $(window).scrollTop();
		// 	if(windowWidth > 991){
		// 		if(currentPosition > ((getVerticalMenuHeight * 90)/ 100) ){
		// 			$('.home.open-categories-menu .header-navigation .category-menu').addClass('open').find('.categories-list').slideUp();
		// 		}
				
		// 		//$('.header-navigation .category-menu').find('.categories-list').slideUp();
				
		// 		if(currentPosition < ((getVerticalMenuHeight * 90)/ 100) ){
		// 			$('.home.open-categories-menu .header-navigation .category-menu').removeClass('open').find('.categories-list').slideDown();
		// 		}
		// 	}				
		// });
	};
	











	emallshop.megamenuWindowsPosition = function(){
		//*******************************************************************
		//* Megamenu windows exist
		//*******************************************************************/
		
		// position mega menu correctly
		jQuery.fn.emallshop_position_megamenu = function( variables ) {		

			// top header headnling
			var reference_elem = '';		
			reference_elem = jQuery( this ).parent( '.emallshop-main-menu' );		

			if( jQuery( this ).parent( '.emallshop-main-menu' ).length ) {

				var main_nav_container = reference_elem,
					main_nav_container_position = main_nav_container.offset(),
					main_nav_container_width = main_nav_container.width(),
					main_nav_container_left_edge = main_nav_container_position.left,
					main_nav_container_right_edge = main_nav_container_left_edge + main_nav_container_width;

				if( ! jQuery( 'body.rtl' ).length ) {
					return this.each( function() {

						jQuery( this ).children( 'li' ).each( function() {
							var li_item = jQuery( this ),
								li_item_position = li_item.offset(),
								megamenu_wrapper = li_item.find( '.emallshop-megamenu-wrapper' ),
								megamenu_wrapper_width = megamenu_wrapper.outerWidth(),
								megamenu_wrapper_position = 0;

							// check if there is a megamenu
							if( megamenu_wrapper.length ) {
								megamenu_wrapper.removeAttr( 'style' );

								// set megamenu max width
								var reference_emallshop_row;

								if( jQuery( '.emallshop-secondary-main-menu' ).length ) {
									reference_emallshop_row = jQuery( '.emallshop-header-wrapper .emallshop-secondary-main-menu .emallshop-row' );
								} else {
									reference_emallshop_row = jQuery( '.emallshop-header-wrapper .emallshop-row' );
								}

								if( megamenu_wrapper.hasClass( 'col-span-12' ) && ( reference_emallshop_row.width() < megamenu_wrapper.data( 'maxwidth' ) ) ) {
									megamenu_wrapper.css( 'width', reference_emallshop_row.width() );
								} else {
									megamenu_wrapper.removeAttr( 'style' );
								}

								// reset the megmenu width after resizing the menu
								megamenu_wrapper_width = megamenu_wrapper.outerWidth();

								if( li_item_position.left + megamenu_wrapper_width > main_nav_container_right_edge ) {
									megamenu_wrapper_position = -1 * ( li_item_position.left - ( main_nav_container_right_edge - megamenu_wrapper_width ) );

									megamenu_wrapper.css( 'left', megamenu_wrapper_position );
								}
							}
						});
					});

				} else {
					return this.each( function() {
						jQuery( this ).children( 'li' ).each( function() {
							var li_item = jQuery( this ),
								li_item_position = li_item.offset(),
								li_item_right_edge = li_item_position.left + li_item.outerWidth(),
								megamenu_wrapper = li_item.find( '.emallshop-megamenu-wrapper' ),
								megamenu_wrapper_width = megamenu_wrapper.outerWidth(),
								megamenu_wrapper_position = 0;

							// check if there is a megamenu
							if( megamenu_wrapper.length ) {
								megamenu_wrapper.removeAttr( 'style' );

								// set megamenu max width
								var reference_emallshop_row;

								if( jQuery( '.emallshop-secondary-main-menu' ).length ) {
									reference_emallshop_row = jQuery( '.emallshop-header-wrapper .emallshop-secondary-main-menu .emallshop-row' );
								} else {
									reference_emallshop_row = jQuery( '.emallshop-header-wrapper .emallshop-row' );
								}

								if( megamenu_wrapper.hasClass( 'col-span-12' ) && ( reference_emallshop_row.width() < megamenu_wrapper.data( 'maxwidth' ) ) ) {
									megamenu_wrapper.css( 'width', reference_emallshop_row.width() );
								} else {
									megamenu_wrapper.removeAttr( 'style' );
								}

								if( li_item_right_edge - megamenu_wrapper_width < main_nav_container_left_edge ) {

									megamenu_wrapper_position = -1 * ( megamenu_wrapper_width - ( li_item_right_edge - main_nav_container_left_edge ) );

									megamenu_wrapper.css( 'right', megamenu_wrapper_position );
								}
							}
						});
					});
				}
			}
		};
		
		// Calculate megamenu position
		if( jQuery.fn.emallshop_position_megamenu ) {
			jQuery( '.emallshop-main-menu > ul' ).emallshop_position_megamenu();

			jQuery( '.emallshop-main-menu .emallshop-megamenu-menu' ).mouseenter( function() {
				jQuery( this ).parent().emallshop_position_megamenu();
			});

			jQuery(window).resize(function() {
				jQuery( '.emallshop-main-menu > ul' ).emallshop_position_megamenu();
			});
		}
		
		// position dropdown menu correctly
		jQuery.fn.emallshop_position_menu_dropdown = function( variables ) {

			return 	jQuery( this ).children( '.sub-menu' ).each( function() {

				// reset attributes
				jQuery( this ).removeAttr( 'style' );
				jQuery( this ).show();
				jQuery( this ).removeData( 'shifted' );

				var submenu = jQuery( this );

				if( submenu.length ) {
					var submenu_position = submenu.offset(),
						submenu_left = submenu_position.left,
						submenu_top = submenu_position.top,
						submenu_height = submenu.height(),
						submenu_width = submenu.outerWidth(),
						submenu_bottom_edge = submenu_top + submenu_height,
						submenu_right_edge = submenu_left + submenu_width,
						browser_bottom_edge = jQuery( window ).height(),
						browser_right_edge = jQuery( window ).width();

					if(	jQuery( '#wpadminbar' ).length ) {
						var admin_bar_height = jQuery( '#wpadminbar' ).height();
					} else {
						var admin_bar_height = 0;
					}

					if( jQuery( '#side-header' ).length ) {
						var side_header_top = jQuery( '#side-header' ).offset().top - admin_bar_height;
					}

					// current submenu goes beyond browser's right edge
					if( submenu_right_edge > browser_right_edge ) {

						//if there are 2 or more submenu parents position this submenu below last one
						if( submenu.parent().parent( '.sub-menu' ).parent().parent( '.sub-menu' ).length ) {
							submenu.css({
								'left': '0',
								'top': submenu.parent().parent( '.sub-menu' ).height()
							});

						// first or second level submenu
						} else {
							// first level submenu
							if( ! submenu.parent().parent( '.sub-menu' ).length ) {
								submenu.css( 'left', ( -1 ) * submenu_width + submenu.parent().width() );

							// second level submenu
							} else {
								submenu.css({
									'left': ( -1 ) * submenu_width
								});
							}
						}
						
						submenu.data( 'shifted', 1 );
					// parent submenu had to be shifted
					} else if( submenu.parent().parent( '.sub-menu' ).length ) {
						if( submenu.parent().parent( '.sub-menu' ).data( 'shifted' ) ) {
							submenu.css( 'left', ( -1 ) * submenu_width );
							submenu.data( 'shifted', 1 );
						}
					}
				}
			});
				
		};

		// Recursive function for positioning menu items correctly on load
		jQuery.fn.walk_through_menu_items = function() {
			jQuery( this ).emallshop_position_menu_dropdown();

			if( jQuery( this ).find( '.sub-menu' ).length ) {
				jQuery( this ).find( '.sub-menu li' ).walk_through_menu_items();
			} else {
				return;
			}
		};
		
		// Calculate main menu dropdown submenu position
		if( jQuery.fn.emallshop_position_menu_dropdown ) {
			jQuery( '.emallshop-dropdown-menu, .emallshop-dropdown-menu li' ).mouseenter( function() {
				jQuery( this ).emallshop_position_menu_dropdown();
			});

			jQuery( '.emallshop-dropdown-menu > ul > li' ).each( function() {
				jQuery( this ).walk_through_menu_items();
			});

			jQuery( window ).on( 'resize', function() {
				jQuery( '.emallshop-dropdown-menu > ul > li' ).each( function() {
					jQuery( this ).walk_through_menu_items();
				});
			});
		}
	};
	
	emallshop.mobileMenu = function(){
		//*******************************************************************
		//*  Mobile menu display
		//*******************************************************************/		
		
		//Menu wrapper
		$(".mobile-nav-tabs li").click(function(){
			if(!$(this).hasClass("active")){
				var cn=$(this).data("menu");
				$(this).parent().find(".active").removeClass("active");
				$(this).addClass("active");
				$(".mobile-nav-content").removeClass("active").fadeOut(300);
				$(".mobile-"+cn+"-menu").addClass("active").fadeIn(300);
			}
		});
		
		//Menu
		var $mobileMenu = $('#mobile-menu-wrapper');
		emallshop.$body.on('click', '.navbar-toggle', function (e) {
			e.preventDefault();
			$mobileMenu.toggleClass('open');
			emallshop.$body.toggleClass('mobile-menu-opened');
		});

		$( '.mobile-main-menu li.menu-item-has-children' ).append( '<span class="menu-toggle"></span>' );
		
		$mobileMenu.on('click', '.menu-item-has-children > .menu-toggle', function (e) {
			e.preventDefault();

			$(this).closest('li').siblings().find('ul').slideUp();
			$(this).closest('li').siblings().removeClass('active');
			$(this).closest('li').siblings().find('li').removeClass('active');

			$(this).closest('li').children('ul').slideToggle();
			$(this).closest('li').toggleClass('active');

		});

		emallshop.$body.on('click', '.panel-overlay, #mobile-nav-close', function (e) {
			e.preventDefault();
			$mobileMenu.removeClass('open');
			emallshop.$body.removeClass('mobile-menu-opened');
		});

		emallshop.$window.on('resize', function () {
			if (emallshop.$window.width() > 991) {
				if ($mobileMenu.hasClass('open')) {
					$mobileMenu.removeClass('open');
					emallshop.$body.removeClass('mobile-menu-opened');
				}
			}
		});
	};
	
	emallshop.mobileToggle = function(){
		//*******************************************************************
		//*  Mobile Toggle.
		//*******************************************************************/
		$( '.mobile-topbar-wrapper span > ul > li > a' ).on( 'click', function ( e ) {
			e.preventDefault();
			$(this).closest('li').children('ul').slideToggle('active');
		} );
	};
	
	emallshop.stickySidebar = function(){
		//*******************************************************************
		//*  Sticky Sidebar.
		//*******************************************************************/
		$(document).ready(function(){
			jQuery('#sidebar').theiaStickySidebar({
				// Settings
				additionalMarginTop: 80
			});
			
			if (emallshop_options.sticky_image_wrapper){
				jQuery('#product-images-wrapper').theiaStickySidebar({
					additionalMarginTop: 60
				});
			}
			
			if (emallshop_options.sticky_summary_wrapper){
				jQuery('#product-summary-wrapper').theiaStickySidebar({
					additionalMarginTop: 60
				});
			}
		});
	};
	
	/**
	 * Document ready
	 */ 
	$(document).ready(function(){
		emallshop.init();
    });
    jQuery(document).bind('cleverswatch_update_gallery', function (event, response) {
        setTimeout(function() {
            $( '.emallshop-slick-carousel' ).not( '.slick-initialized' ).slick();

			if(!$('.woocommerce.product-quickview')[0]) {
                jQuery('#product-' + response.product_id).find('.images').each(function () {
                    jQuery(this).wc_product_gallery();
                });
                if (!emallshop_options.enable_product_image_zoom) return;
                if ($('.es-image-zoom').length > 0) {
                    var img = $('.es-image-zoom');
                    img.zoom({
                        touch: false
                    });
                }
            }
        },300);
    });
	
})(jQuery);


