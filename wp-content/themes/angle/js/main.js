//
// This is The Scripts used for Simply Theme
//

//Google Map
if( jQuery('.rst-contact-maps').length && jQuery('.rst-contact-maps').attr('data-center') != '' ) {
	var zoom = jQuery('.rst-contact-maps').attr('data-zoom');
	if( zoom == '' ) zoom = 10;
	
	var rs_location = jQuery('#map-canvas').attr('data-center');
	var rs_location_x = rs_location.substring(0, rs_location.indexOf(",")); 
	var rs_location_y = rs_location.substring(rs_location.indexOf(",")+1);
  
	function initialize() {
	  var map = new google.maps.Map(document.getElementById('map-canvas'), {
		center: new google.maps.LatLng( rs_location_x,rs_location_y ),
		zoom: parseFloat(zoom)
	  });

		map.setOptions({draggable: true, zoomControl: false, scrollwheel: false, disableDoubleClickZoom: true});
		var infowindow = new google.maps.InfoWindow();
		var service = new google.maps.places.PlacesService(map);
	  
	}
	jQuery(document).ready(function() {
		var height = jQuery('.rst-contact-maps').attr('data-height');
		if( height == '' ) height = 500;
		jQuery('.rst-contact-maps').height(height);
		google.maps.event.addDomListener(window, 'load', initialize);
		initialize();
	});
}

function main() {

(function () {
   'use strict'
	//Script
	//-----------------------------------
	
	var slider;
    jQuery(document).ready(function($){
		//WoW
		new WOW().init();
		
		$('.rst-remove').remove();
		
		//Video FitVids
		$(".rst-thumbnail").fitVids();
		
		
		
		$('.rst-search').submit(function(e){
			if( !$(this).hasClass('open') ){
				e.preventDefault();
				$('.rst-search').addClass('open').removeClass('exit');
			}
		});
		
		$(document).click(function(event){
			if( !$(event.target).is('.rst-search') && !$(event.target).is('.rst-search *') ){
				$('.rst-search').removeClass('open').addClass('exit');
			}
		});
		
		//Next/Prev Slider Home
		$('.bx-inner-caption a.rst-prev').click(function(e){
			e.preventDefault();
			$(this).parents('.bx-wrapper').find('.bx-controls-direction .bx-prev').click();
		});
		$('.bx-inner-caption a.rst-next').click(function(e){
			e.preventDefault();
			$(this).parents('.bx-wrapper').find('.bx-controls-direction .bx-next').click();
		});
		
		//submenu hover
		$('.rst-main-menu li').hover(function(){
			var offsets = $(this).offset();
			var left = offsets.left;
			var width_li = $(this).outerWidth(true);
			var width_sub = $(this).find('>ul').outerWidth(true);
			var window_width = $(window).outerWidth(true);
			var container_offset = $('#wrapper .container').offset();
			
			if( left+width_sub+width_li > window_width-(container_offset.left+15) ){
				$(this).find('>ul').addClass('rst-position-left');
			}
			else {
				$(this).find('>ul').removeClass('rst-position-left');
			}
		});
		
		//MenuMobie
		$('.rst-menu-trigger').click(function(){
			$(this).toggleClass('exit').parent().find('.rst-nav-menu').slideToggle(700);
		});
		
		//FancyBox
		$('.fancybox-media').fancybox({
			closeBtn	: false,
			padding		: 0,
			helpers: {
				overlay: {
				  locked: false
				},
				media : {}
			},
			tpl: {
				next    : '<a class="bx-prev" href="">Previous</a>',
				prev    : '<a class="bx-next" href="">Next</a>'
			},
			openEffect	: 'elastic',
			closeEffect	: 'elastic'
		});
		
		$('.fancybox-gallery').fancybox({
			openEffect	: 'elastic',
			closeEffect	: 'elastic',
			padding		: 0,
			helpers: {
				overlay: {
				  locked: false
				}
			}
		});
		
		$(".fancybox").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			padding		: 0,
			helpers: {
				overlay: {
				  locked: false
				}
			},
			tpl: {
				next    : '<a class="bx-prev" href="#">Previous</a>',
				prev    : '<a class="bx-next" href="#">Next</a>'
			},
			width		: '70%',
			height		: '70%',
			closeBtn	: false,
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'elastic',
			closeEffect	: 'elastic'
		});
		
		$(document).on('click', '.fancybox-gallery', function(event){
			event.preventDefault();
			var id = $(this).attr('href');
			var width = $(id).find('.bxslider img:first').get(0).width || 800;
			var height = $(id).find('.bxslider img:first').get(0).height || $(window).height();
			$(id).find('.bxslider').hide();
			$.fancybox({
				href: id,
				minWidth: width,
				maxWidth: width,
				minHeight: height,
				maxHeight: height,
				helpers: {
					overlay: {
					  locked: false
					}
				},
				scrolling 	: 'no',
				openEffect	: 'elastic',
				closeEffect	: 'elastic',
				padding		: 0,
				closeBtn	: false,
				afterShow   : function() {
				// setTimeout(function(){
					$(id).find('.bxslider').show();
						if($('.fancybox-wrap .bxslider').data('bxslider')){
							$('.fancybox-wrap .bxslider').data('bxslider').reloadSlider({
								mode: 'fade',
								adaptiveHeight: true,
								nextText: '<span>Next</span>',
								prevText: '<span>Previous</span>',
								onSlideAfter : function($slideElement, oldIndex, newIndex) {
									var height_slider = $('.fancybox-wrap .bx-viewport').height();
									var height_screen = $(window).height();
									$('.fancybox-wrap').css('top', (height_screen-height_slider)/2 );
								}
							});
						}
						else{
							$('.fancybox-wrap .bxslider').data('bxslider', $('.fancybox-wrap .bxslider').bxSlider({
								mode: 'fade',
								adaptiveHeight: true,
								nextText: '<span>Next</span>',
								prevText: '<span>Previous</span>',
								onSlideAfter : function($slideElement, oldIndex, newIndex) {
									var height_slider = $('.fancybox-wrap .bx-viewport').height();
									var height_screen = $(window).height();
									$('.fancybox-wrap').css('top', (height_screen-height_slider)/2 );
								}
							}));
						}
						
					// }, 100);
				}
			});
		});
		
		//BxSlider
		$('.rst-thumbnail .bxslider').bxSlider({
			mode: 'fade',
			adaptiveHeight: true,
			nextText: '<i class="fa fa-angle-double-right"></i>',
			prevText: '<i class="fa fa-angle-double-left"></i>',
		});
		
		
		//Loading
		$(document).on('click', '.rst-ajax-load-more', function(e){
			e.preventDefault();
			var load_more = $(this);
			if( load_more.attr('data-disable') == undefined ) load_more.attr('data-disable',0);
			load_more.attr('data-disable',parseFloat(load_more.attr('data-disable')+1));
			load_more.find('.fa').addClass('fa-spin');
			load_more.find('span').text('Loading...');
			
			var rst_key_eval = eval(load_more.attr('data-key'));
			var paged = parseFloat(load_more.attr('data-paged'));
			var max_paged = parseFloat(load_more.attr('data-max-paged'));
			
			if( parseFloat(load_more.attr('data-disable')) == 1 ){
				$.ajax({
					type: "POST",
					url: rst_key_eval.url,
					data: {
						'action' 	: 'rst_ajax_block',
						'atts' 		: rst_key_eval.atts,
						'paged'		: paged
					}
				}).done(function(data){
					load_more.attr('data-disable', 0 );
					load_more.find('.fa').removeClass('fa-spin');
					load_more.find('span').text('Load more');
					
					var items = jQuery(data).removeClass('slideUp');
					
					load_more.parents('.rst-wrap-ajax').find('.rst-inner-ajax').append(items);
					
					if( $('.rst-grid').length ){
						$('.rst-grid').isotope('appended', items);
						when_images_loaded(jQuery(data), function(){
							$('.rst-grid').isotope('layout');
						});
					}
					
					if( paged < max_paged ) {
						load_more.attr('data-paged',parseFloat(paged)+1);
					} 
					else {
						load_more.remove();
					}
				});
			}
		});
		
		
	});
	
	jQuery(window).scroll(function(){
		$ = jQuery;
		var offset_content = jQuery('#content').offset().top;
		var st = $(window).scrollTop();
		if( st >= offset_content + 10 )
			$('.header-fixed').addClass('header-scrolled');
		else 
			$('.header-fixed').removeClass('header-scrolled');
	});
	
	jQuery(window).resize(function(){
		rst_slider_scroll();
	});
	
	jQuery(window).load(function() {
		$ = jQuery;
		rst_slider_scroll();
		
		if( $('.rst-grid').length ){
			$('.rst-grid').isotope({
				itemSelector: '.rst-post-item',
				layoutMode: 'packery'
			});
		}
		
		$('.slider-home-2').bxSlider({
			mode: 'horizontal',
			slideMargin: 0,
			auto : true,
			easing : 'ease-in-out',
			nextText: '<i class="fa fa-angle-right"></i>',
			prevText: '<i class="fa fa-angle-left"></i>',
			onSliderLoad: function(currentIndex) {     
				$('.slider-home-2').find('.slide').eq(currentIndex + 1).addClass('active-slide');
			},
			onSlideBefore: function($slideElement){
				$('.slider-home-2').find('.active-slide').removeClass('active-slide');
				$slideElement.addClass('active-slide');
			}
		});
		
		$('.bxslider-home').bxSlider({
			mode: 'horizontal',
			slideMargin: 0
		});
		
		if( $("[data-sticky_column]").length ) {
			$("[data-sticky_column]").stick_in_parent({
				parent: "[data-sticky_parent]"
			});
		}
		
		//Set width sub menu
		$('.sub-menu').each(function(){
			$(this).addClass('rst-check');
			var max_width = $(this).outerWidth(true);
			$(this).css('width', max_width+2);
		}).promise().done(function(){
			$('.rst-check').removeClass('rst-check');
		});
	});
	
	
	function when_images_loaded($img_container, callback) { 
		//do callback when images in $img_container are loaded. Only works when ALL images in $img_container are newly inserted images.
		var img_length = $img_container.find('img').length,
			img_load_cntr = 0;

		if (img_length) { //if the $img_container contains new images.
			$('img').load(function() { //then we avoid the callback until images are loaded
				img_load_cntr++;
				if (img_load_cntr == img_length) {
					callback();
				}
			});
		}
		else { //otherwise just do the main callback action if there's no images in $img_container.
			callback();
		}
	}
	
	function rst_slider_scroll(){
		$ = jQuery;
		var width_window = $(window).width();
		if( $('.slider-home-1').length ) {
			if( ! $('.bx-wrapper .slider-home-1').length ){
				slider = $('.slider-home-1').bxSlider({
					slideWidth: 2000,
					minSlides: 3,
					maxSlides: 3,
					slideMargin: 0,
					nextText: '<i class="fa fa-angle-right"></i>',
					prevText: '<i class="fa fa-angle-left"></i>'
				});
			}
			if( width_window > 900 ){
				slider.reloadSlider({
					slideWidth: 2000,
					minSlides: 3,
					maxSlides: 3,
					slideMargin: 0,
					nextText: '<i class="fa fa-angle-right"></i>',
					prevText: '<i class="fa fa-angle-left"></i>'
				});
			}
			if( width_window < 900 & width_window > 600 ){
				slider.reloadSlider({
					slideWidth: 2000,
					minSlides: 2,
					maxSlides: 2,
					slideMargin: 0,
					nextText: '<i class="fa fa-angle-right"></i>',
					prevText: '<i class="fa fa-angle-left"></i>'
				});
			}
			if( width_window <= 600 ){
				slider.reloadSlider({
					slideWidth: 2000,
					minSlides: 1,
					maxSlides: 1,
					slideMargin: 0,
					nextText: '<i class="fa fa-angle-right"></i>',
					prevText: '<i class="fa fa-angle-left"></i>'
				});
			}
		}
		
	}
	
}());

}
main();