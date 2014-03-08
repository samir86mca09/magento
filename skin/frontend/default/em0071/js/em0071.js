/**
 * EMThemes
 *
 * @license commercial software
 * @copyright (c) 2012 Codespot Software JSC - EMThemes.com. (http://www.emthemes.com)
 */

(function($) {

if (typeof EM == 'undefined') EM = {};
if (typeof EM.tools == 'undefined') EM.tools = {};

var domLoaded = false, 
	windowLoaded = false;

/**
 * Auto positioning product items in products-grid *
 */
EM.tools.decorateProductsGrid = function (productsGridEl) {
	var $productsGridEl = $(productsGridEl);
	if ($productsGridEl.length == 0) return;
		
	var maxHeight = 0;
	$('.item', $productsGridEl).each(function() {
        if ($(this).outerHeight(true) > maxHeight) {
            maxHeight = $(this).outerHeight(true);
        }
	});
	
};

/**
 * Decorate Product Tab
 */ 
EM.tools.decorateProductCollateralTabs = function() {
	$(window).load(function() {
        doSlider('#upsell-product-table .products-grid',false,null,0);
		$('.product-collateral').addClass('tab_content').each(function(i) {
			$(this).wrap('<div class="tabs_wrapper_details collateral_wrapper" />');
			var tabs_wrapper = $(this).parent();
			var tabs_control = $(document.createElement('ul')).addClass('tabs_control').insertBefore(this);
			
			$('.box-collateral', this).addClass('tab-item').each(function(j) {
				var id = 'box_collateral_'+i+'_'+j;
				$(this).addClass('content_'+id);
				tabs_control.append('<li><h2><a href="#'+id+'">'+$('h2', this).html()+'</a></h2></li>');
			});
			
			initToggleTabs(tabs_wrapper);
		});
	});
};

/**
 * Fix iPhone/iPod auto zoom-in when text fields, select boxes are focus
 */
function fixIPhoneAutoZoomWhenFocus() {
	var viewport = $('head meta[name=viewport]');
	if (viewport.length == 0) {
		$('head').append('<meta name="viewport" content="width=device-width, initial-scale=1.0"/>');
		viewport = $('head meta[name=viewport]');
	}	
	var old_content = viewport.attr('content');	
	function zoomDisable(){
		viewport.attr('content', old_content + ', user-scalable=0');
	}
	function zoomEnable(){
		viewport.attr('content', old_content);
	}	
	$("input[type=text], textarea, select").mouseover(zoomDisable).mousedown(zoomEnable);
}

/**
 * Adjust elements to make it responsive
 *
 * Adjusted elements:
 * - Image of product items in products-grid scale to 100% width
 */
function responsive() {	
	// resize products-grid's product image to full width 100% {{{
	var position = $('.products-grid .item').css('position');
	if (position != 'absolute' && position != 'fixed' && position != 'relative')
		$('.products-grid .item').css('position', 'relative');
		
	var img = $('.products-grid .item .product-image img');
	img.each(function() {
		img.data({
			'width': $(this).width(),
			'height': $(this).height()
		})
	});
	img.removeAttr('width').removeAttr('height').css('width', '100%');
	// responsive:
	// - image 
	// - custom logo on sidebar
	// - category image
	$('.sidebar img, .custom-logo, .category-image img').each(function() {
		if (!$(this).hasClass('fluid')) {
			$(this).css({
				'max-width': $(this).width(),
				'max-height': $(this).height(),
				'width': '100%'
			});
		}
	});
}

function menuVertical() {
	if($('.vnav > .menu-item-link > .menu-container > li.fix-top').length > 0){
		$('.vnav > .menu-item-link > .menu-container > li.fix-top').parent().parent().mouseover(function() {
			var $container = $(this).children('.menu-container,ul.level0');
			var $containerHeight = $container.outerHeight();
			var $containerTop = $container.offset().top;
			var $winHeight = $(window).height();
			var $maxHeight = $containerHeight + $containerTop;
			//if($maxHeight >= $winHeight){
				$setTop = $(this).parent().offset().top -  $(this).offset().top;
				if(($setTop+$containerHeight) < $(this).height()){
					$setTop  = $(this).outerHeight() - $containerHeight;
				}
			/*}else{
				$setTop = (-1);
			}*/
			var $grid = $(this).parents('.em_nav').first().parents().first();
			$container.css('top', $setTop);
			if($maxHeight < $winHeight){
				$('.vnav ul.level0,.vnav > .menu-item-link > .menu-container').first().css('top', $setTop-9 +'px');
			}
			
		});
		$('.vnav .menu-item-link > .menu-container,.vnav ul.level0').parent().mouseout(function() {
			var $container = $(this).children('.menu-container,ul.level0');
			$container.removeAttr('style');
		});
	}
}

$(document).ready(function() {
	domLoaded = true;
	isMobile && fixIPhoneAutoZoomWhenFocus();	
	alternativeProductImage();	
	initTopButton();	
	if (EM_Theme.FREEZED_TOP_MENU) persistentMenu();	
	setupReviewLink();
	// safari hack: remove bold in h5, .h5
	if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
		$('h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6').css('font-weight', 'normal');
	}	
	if($('body').viewPC()){
		toolbar();
        searchToolbar();
	}
    addClassAdapt();
    optionCategory();
    doSlider('.more-views ul',false,null,0);
    doSlider('#crosssell-products-list',false,null,0);
    doSlider('#featured_category_products',false,null,0);    
    addClassMobile();
    toogleFooter();
    toogleColorVariation();
    toogleAllCategories();
    toogleStore();
    menuVertical();
});

$(window).bind('load', function() {
	windowLoaded = true;
	responsive();
    EM.tools.decorateProductsGrid('.category-products .products-grid');
});

$(window).bind('orientationchange', function(e) {
    EM.tools.decorateProductsGrid('.category-products .products-grid');
   if(window.orientation != 0){
        $('.store-switcher').addClass('store-switcher-landscape');
   }
});
	
$(window).resize(function() {
    addClassAdapt();
    if (typeof em_slider!=='undefined'){
		setTimeout(function(){em_slider.reinit();},100);
	}	
	if(isPhone == false){
		if ($('#image').length != 0){
			$('#image').width(product_zoom.imageDim.width);
			Event.stopObserving($('#zoom_in'), 'mousedown', product_zoom.startZoomIn.bind(product_zoom));
			Event.stopObserving($('#zoom_in'), 'mouseup', product_zoom.stopZooming.bind(product_zoom));
			Event.stopObserving($('#zoom_in'), 'mouseout', product_zoom.stopZooming.bind(product_zoom));

			Event.stopObserving($('#zoom_out'), 'mousedown', product_zoom.startZoomOut.bind(product_zoom));
			Event.stopObserving($('#zoom_out'), 'mouseup', product_zoom.stopZooming.bind(product_zoom));
			Event.stopObserving($('#zoom_out'), 'mouseout', product_zoom.stopZooming.bind(product_zoom));
			product_zoom = new Product.Zoom('image', 'track', 'handle', 'zoom_in', 'zoom_out', 'track_hint');;
		}
	}
});
    	
})(jQuery);


/**
*   Slider
**/
function doSlider(e,isverticals,iswraps,isauto) {
    function carouselCallBack(carousel){
	    jQuery(e).touchwipe({
		    wipeLeft: function() { 
	    		carousel.next();
	    	},
		    wipeRight: function() { 
	    		carousel.prev();
	    	},
			preventDefaultEvents: false
		});
        jQuery(window).resize(function() {
			carousel.scroll(1,true);
		});						
	}
    var width = jQuery(e +' li.item').width();	
	jQuery(e +' li.item').css('width',width+'px');
	jQuery(e)
	.addClass('jcarousel-skin-tango')
	.jcarousel({
		buttonNextHTML:'<a title="Next" class="next" href="javascript:void(0);" title="Next"></a>',
		buttonPrevHTML:'<a title="Previous" class="previous" href="javascript:void(0);" title="Previous"></a>',
		scroll: 1,
		wrap: iswraps,
        auto: isauto,
		animation:'normal',
		vertical:isverticals,
		initCallback: carouselCallBack
	});    
}

/**
*   persistentMenu
**/
function persistentMenu() {
	var $ = jQuery;

	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 145 && window.freezedTopMenu) {
				$('.em_nav, .nav-container').addClass('fixed-top');
			} else {
				$('.em_nav, .nav-container').removeClass('fixed-top');
			}
		});
	});
}

/**
*   initTopButton
**/
function initTopButton() {
	var $ = jQuery;
	// hide #back-top first
	$("#back-top").hide();

	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
}

/**
*   toolbar
**/
function toolbar(){
	var $ = jQuery;
	$('.show').each(function(){
		$(this).insertUl();
		$(this).selectUl();
	});
	$('.sortby').each(function(){
		$(this).insertUl();
		$(this).selectUl();
	});	
}

/**
*   search by category
**/
function searchToolbar(){
	var $ = jQuery;
	$('.cat-search').each(function(){
		$(this).insertUlCategorySearch();
		$(this).selectUlCategorySearch();
	});
	$('#select-store').each(function(){
		$(this).insertUl();
		$(this).selectUl();
	});
}

/**
*   showReviewTab
**/
function showReviewTab() {
	var $ = jQuery;
	
	var reviewTab = $('.tabs_control li:contains('+ review +')');
	if (reviewTab.size()) {
		// scroll to review tab
		$('html, body').animate({
			 scrollTop: reviewTab.offset().top
		}, 500);
		 
		 // show review tab
		reviewTab.click();
	} else if ($('#customer-reviews').size()) {
		// scroll to customer review
		$('html, body').animate({ scrollTop: $('#customer-reviews').offset().top }, 500);
	} else {
		return false;
	}
	return true;
}

/**
*   setupReviewLink
**/
function setupReviewLink() {
	jQuery('.r-lnk').click(function (e) {
		if (showReviewTab())
			e.preventDefault();
	});
}

/**
*   addClassAdapt
**/
function addClassAdapt(){
    var valueChange;
    var width = jQuery(window).width();
    if(width >= 1200){
        valueChange = 3;
    }
    else{
        if(width < 1200 && width >= 980){
            valueChange = 2;
        }                   
        else{
            if(width < 980 && width >= 767){
                valueChange = 1;
            }
            else{
                    valueChange = 0;               
                }
            }                
    }
    jQuery('body').not('quickshop-index-view').removeClass('adapt-0 adapt-1 adapt-2 adapt-3 adapt-4 adapt-5 adapt-6')
    		.addClass('adapt-'+valueChange);
    jQuery('body.quickshop-index-view').removeClass('adapt-0 adapt-1 adapt-2 adapt-3 adapt-4 adapt-5 adapt-6');
     //disable freezed top menu when in iphone
	window.freezedTopMenu = (valueChange!=0 && EM_Theme.FREEZED_TOP_MENU) ? 1: 0;
	if (window.freezedTopMenu && jQuery(window).scrollTop() > 145) {
		jQuery('.em_nav, .nav-container').addClass('fixed-top');
	} else {
		jQuery('.em_nav, .nav-container').removeClass('fixed-top');
	}
}

/**
*   isLandscape
**/
function isLandscape() {
	return typeof window.orientation != 'undefined' && (window.orientation == 90 || window.orientation == -90);
}

/**
*   Option Category
**/
function optionCategory(){
    var $ = jQuery;
    if($('#toggleText').length == 0){
        $('#displayOption').hide();
    }else{
        $('#displayOption').show();
    }
    var container = $("#toggleText");
    $("#displayOption").click(
    function( event ){
        event.preventDefault();
        if (container.is( ":visible" )){
            container.slideUp(200);
            $("#displayOption").toggleClass('hidden-arrow');
            $("#displayOption").html('Show Option');
            
            
        } else {
            container.slideDown(200);
            $("#displayOption").removeClass('hidden-arrow');
            $("#displayOption").html('Hide Option');
        }
    }
    );  
}

/**
 * Change the alternative product image when hover
 */
function alternativeProductImage() {
    var $=jQuery;
	var tm;
	function swap() {
		clearTimeout(tm);
		setTimeout(function() {
			el = $(this).find('img[data-alt-src]');
			var newImg = $(el).data('alt-src');
			var oldImg = $(el).attr('src');
			$(el).attr('src', newImg).data('alt-src', oldImg);
		}.bind(this), 200);
	}	
	$('.item .product-image img[data-alt-src]').parents('.item').bind('mouseenter', swap).bind('mouseleave', swap);
}

/**
*   After Layer Update
**/
window.afterLayerUpdate = function () {
    var $=jQuery;  
    optionCategory();
    if($('body').viewPC()){
		toolbar();
	}
    EM.tools.decorateProductsGrid('.category-products .products-grid');
    alternativeProductImage(); 
    qs({
		itemClass: '.products-grid li.item, .products-list li.item, li.item .cate_product, .product-upsell-slideshow li.item, #crosssell-products-list li.item', //selector for each items in catalog product list,use to insert quickshop image
		aClass: 'a.product-image', //selector for each a tag in product items,give us href for one product
		imgClass: '.product-image img' //class for quickshop href
	});   
}

/**
*   Add class mobile
**/
function addClassMobile(){
    if(isMobile == true){
        jQuery('body').addClass('mobile-view');
    }
}

/**
*   Toogle Footer Information Mobile View
**/
function toogleFooter(){
    if(isPhone==true){
        jQuery('#footer-information ul').css('display','none');
		jQuery('#footer-information p.h5').on('click', function(){
			jQuery(this).toggleClass("active").parent().find("ul").slideToggle();
		});		
    }
}

/**
*   Toogle Color Variation
**/
function toogleColorVariation(){
    if(isMobile == false){
        var $ = jQuery;
        var screen = "<div id='bg_fade_color'></div>";
    	$(document.body).append(screen);
    			
    	$(".btn_color_variation").click(function() {
    		var bg	=	$("#bg_fade_color");
    		bg.css("opacity",0.5);
    		bg.css("display","block");
            var left = ( $(window).width() - $(".colordiv").width() ) / 2;
    		$(".colordiv").show();    		
    		$(".colordiv").css('top', Math.max($(document).scrollTop(), Math.min($(this).offset().top, $(document).scrollTop() + $(window).height() - $(".colordiv").outerHeight())) + 20 + 'px');
            $(".colordiv").css('left',left);    		
    	});
    	
    	$(".btn_color_close").click(function() {
    		color_hide();
    	});
    	
    	function color_hide(){
    		var bg	=	$("#bg_fade_color");
    		$(".colordiv").hide();
    		bg.css("opacity",0);
    		bg.css("display","none");
    	}
    }
}

function toogleAllCategories(){
    if(isPhone==true){
        jQuery('#all-category-toogle .mobile-toogle').css('display','none');
        jQuery('#all-category-toogle .block_title').addClass('bkg-allcategorie');
		jQuery('#all-category-toogle .block_title').on('click', function(){
			jQuery(this).toggleClass("active").parent().find("div.mobile-toogle").slideToggle();
		});	
    }
}

function toogleStore(){
    if(isMobile == false){               
        var $=jQuery;
        doSlider('#slider_storeview ul',false,null,0);
        $('.storediv').hide(); 
        $(".btn_storeview").click(function() {
    		store_show();        
    	});
    	
    	$(".btn_storeclose").click(function() {
    		store_hide();
    	});
    	
    	function store_show(){            
    		var bg	=	$("#bg_fade_color");
    		bg.css("opacity",0.5);
    		bg.css("display","block");
    		$(".storediv").show();
            var top =( $(window).height() - $(".storediv").height() ) / 2;
            var left = ( $(window).width() - $(".storediv").width() ) / 2;
            $(".storediv").css('top', top+'px');
            $(".storediv").css('left', left+'px');
    	}
    	
    	function store_hide(){
    		var bg	=	$("#bg_fade_color");
    		$(".storediv").hide();
    		bg.css("opacity",0);
    		bg.css("display","none");
    	}
    }
}