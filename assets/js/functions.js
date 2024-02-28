/* global jQuery:false */
jQuery(document).ready(function() {
	
	"use strict";
	
	window.breadcrumb_align();
	window.theme_menu();
	window.sticky_menu();
	window.random();
});


breadcrumb_align = function () {

	"use strict";
	
	title_type_1();
	
	function title_type_1() {
		
		var title = jQuery("#title");
		var titleHeight = title.height();
		var breadcrumb = jQuery("#title").find(".breadcrumb");
		var breadcrumInnerbHeight = breadcrumb.innerHeight();
		
		if ( title.length ) {
				
			if ( title.hasClass( "title-breadcrumb-vertical-centered" ) ) {
			
				var breadcrumbMargin = (titleHeight - breadcrumInnerbHeight) / 2;
				jQuery(breadcrumb).css("margin-top", breadcrumbMargin+"px").css("margin-bottom", breadcrumbMargin+"px");
				
			} else if ( title.hasClass( "title-breadcrumb-bottom" ) ) {
			
				var breadcrumbMarginTop = titleHeight - breadcrumInnerbHeight;
				jQuery(breadcrumb).css("margin-top", breadcrumbMarginTop+"px");
				
			}
		
		}
		
	}
	
};

theme_menu = function () {
	
	"use strict";

	themeMenu();
	
	function themeMenu() {
	
		var items = jQuery('.overlapblackbg, .wsmenu, .slideLeft');
		var wsmenucontent = jQuery('.wsmenucontent');
		
		var menuopen = function() {
			jQuery(items).removeClass('menuclose').addClass('menuopen');
		};
		var menuclose = function() { 
			jQuery(items).removeClass('menuopen').addClass('menuclose');
		};
	
		jQuery('#navToggle').on( "click",function(){
			if (wsmenucontent.hasClass('menuopen')) {
				jQuery(menuclose);
			} else {
				jQuery(menuopen);
			}
		});
		wsmenucontent.on( "click",function(){
			if (wsmenucontent.hasClass('menuopen')) {
				jQuery(menuclose);
			}
		});
		
		jQuery('#navToggle,.overlapblackbg').on('click', function(){
			jQuery('.wsmenucontainer').toggleClass( "mrginleft" );
		});
	
		jQuery('.wsmenu-list li').has('.wsmenu-submenu, .wsmenu-submenu-sub, .wsmenu-submenu-sub-sub').prepend('<span class="wsmenu-click"><i class="material-icons">&#xE5DB;</i></span>');
		
		jQuery('.wsmenu-list li').has('.megamenu').prepend('<span class="wsmenu-click"><i class="material-icons">&#xE5DB;</i></span>');
			
		jQuery('.wsmenu-mobile').on( "click",function(){
			jQuery('.wsmenu-list').slideToggle('slow');
		});
		jQuery('.wsmenu-click').on( "click",function(){
		jQuery(this).siblings('.wsmenu-submenu').slideToggle('slow');
		jQuery(this).children('.wsmenu-arrow').toggleClass('wsmenu-rotate');
		jQuery(this).siblings('.wsmenu-submenu-sub').slideToggle('slow');
		jQuery(this).siblings('.wsmenu-submenu-sub-sub').slideToggle('slow');
		jQuery(this).siblings('.megamenu').slideToggle('slow');
		});
			
		window.onresize = function(event) {
			console.log('window resize');
			if(jQuery(window).width() > 781){
				jQuery('.wsmenu-submenu').removeAttr("style");
	 			jQuery('.wsmenu-list').removeAttr("style");
	 		}
	    };

		
		if (jQuery('.wsmenu.wsmenu-nav').length) {
			
			if (jQuery('.nav-toogle-btn.active').length) {
			
				var CookieSet2 = Cookies.get('activeCookie2');
			
				if (CookieSet2 == null) {
				
					if (jQuery('.nav-toogle-btn.active').length) {
						Cookies.set('activeCookie', '1');
					}else{
						Cookies.remove('activeCookie');
					}
				
				}
			
				var CookieSet = Cookies.get('activeCookie');
		
				if (CookieSet != null) {
					jQuery('.nav-toogle-btn').addClass("active");
				}else{
					jQuery('.nav-toogle-btn').removeClass("active");
				}
				if (jQuery('.nav-toogle-btn.active').length) {
					var open=true;
					
				}else{
					var open=false;
					
					jQuery('.wsmenu').hide();
				}
				
			}else{
				var CookieSet1 = Cookies.get('activeCookie1');
		
				if (CookieSet1 != null) {
					jQuery('.nav-toogle-btn').addClass("active");
				}else{
					jQuery('.nav-toogle-btn').removeClass("active");
				}
				if (jQuery('.nav-toogle-btn.active').length) {
					var open=true;

				}else{
					var open=false;
					
					jQuery('.wsmenu').hide();

				}
			} 
			
			jQuery( ".wsmenu" ).each(function() {
				if (jQuery(this).hasClass( "rtl-wsmenu-animation" )) {
				
					var totalItems = jQuery(this).parent().find('.wsmenu-list > li > a').size();
					
					if ( jQuery(this).data( 'animation-type' ) ) {
						var animation_type = jQuery(this).data( 'animation-type' );
					}else{
						var animation_type = 'fadeIn';
					}
					
					jQuery(this).parent().find('.wsmenu-list > li > a').each(function(i){	
						jQuery(this).addClass("animated "+animation_type).addClass("menu-item-an-"+(totalItems+1-(i+1)));
					});
					
				}else{
				
					if ( jQuery(this).data( 'animation-type' ) ) {
						var animation_type = jQuery(this).data( 'animation-type' );
					}else{
						var animation_type = 'fadeIn';
					}
				
					jQuery(this).parent().find('.wsmenu-list > li > a').each(function(i){	
						jQuery(this).addClass("animated "+animation_type).addClass("menu-item-an-"+(i+1));
					});
					
				}
			});
	
			jQuery('.nav-toogle-btn').on('click',function(){
				
				jQuery('.nav-toogle-btn').toggleClass("active");
				
				if(open==false){
				
					jQuery('.wsmenu').fadeIn(200);
					jQuery(this).addClass("active");
					open=true;
					
					Cookies.set('activeCookie', '1');
					Cookies.set('activeCookie1', '1');
					Cookies.remove('activeCookie2')
				
				}else{
				
					jQuery('.wsmenu').fadeOut(200);
					jQuery(this).removeClass("active");
					open=false;
							
					Cookies.remove('activeCookie');
					Cookies.remove('activeCookie1');
					Cookies.set('activeCookie2', '1');
				
				}
			
			});
		}
		

	    
	    
	}

};

sticky_menu = function () {

	"use strict";

	stickyMenu();
	stickyHover();
	stickyWindowResize();
	
	function stickyMenu() {
	
		var myWindow = jQuery(window);
		var myHeader = jQuery('.nav-sticky');
		
		myWindow.scroll( function (){
			if (myWindow.scrollTop() === 0){
				myHeader.removeClass("nav-is-sticky");
			}else{
				myHeader.addClass("nav-is-sticky");
			}
		});
		
		if (jQuery('.nav-sticky').length) {
			var sticky = new Waypoint.Sticky({
			  	element: jQuery('.nav-sticky')[0],
				offset: function() {
					return -this.element.clientHeight-100;
				}
			});
	
		}
		
	}
	
	function stickyHover() {
		
		if (jQuery('.nav-sticky').length) {
		
			var body = document.body;
			var timer;
			
			window.addEventListener('scroll', function() {
			  clearTimeout(timer);
			  if(!body.classList.contains('disable-sticky-transition')) {
				body.classList.add('disable-sticky-transition');
			  }
			  
			  timer = setTimeout(function(){
			    body.classList.remove('disable-sticky-transition');
			  },500);
			}, false);
		}
		
	}
	
	function stickyWindowResize() {
		
		var delay = (function(){
		  var timer = 0;
		  return function(callback, ms){
		    clearTimeout (timer);
		    timer = setTimeout(callback, ms);
		  };
		})();
		
		var body = document.body;
		
		jQuery( window ).resize(function() {
		
			if(!body.classList.contains('disable-sticky-transition')) {
				body.classList.add('disable-sticky-transition');
			}
		
		    delay(function(){
		      body.classList.remove('disable-sticky-transition');
		    }, 500);
			
			
		} );
		
	}
	
	
};

random = function () {
	
	"use strict";
	
	overlaySearch();
	parallaxRow();
	accordionElement();
	

	function overlaySearch() {
		
		jQuery( '.search-btn > div' ).on( "click",function() {
			jQuery('.search-overlay').addClass('overlay-open');
		});
		
		jQuery( ".overlay-close" ).on( "click",function() {
			jQuery('.search-overlay').removeClass('overlay-open');
		});
		
	}

	function smoothScrolling() {
	
	  jQuery('.bigmegamenu a[href*="#"]:not([href="#"])').on( "click",function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      
	      var target = jQuery(this.hash);
	      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
	      
	      var sticky_nav = jQuery('.nav-sticky');
	      
	      if (sticky_nav.length) {
	      
			  var sticky_offset = sticky_nav.outerHeight(true);
		      
	      }else{
	      
		      vsticky_offset = 0;
		      
	      }
	      
	      if (target.length) {
	        jQuery('html, body').animate({
	          scrollTop: target.offset().top-sticky_offset
	        }, 1000);
	        return false;
	      }
	    }
	  });
		
	}
	
	function scrollAnimation() {
	
		jQuery( '.animated' ).each( function () {
			if ( jQuery(this).data( 'animation-type' ) ) {
			
				jQuery(this).css('opacity', 0);
				var animation_type = jQuery(this).data( 'animation-type' );
				var animation_delay = jQuery(this).data( 'animation-delay' ) * 100;
				var animation_offset = jQuery(this).data('animation-offset') * 100 + '%';
				
				if ( jQuery(this).data( 'animation-delay' ) ) {
					
					animation_delay = jQuery(this).data( 'animation-delay' ) * 1000;
					
				}else{
					
					animation_delay = 0;
				}
				
				jQuery(this).waypoint(function() {
					var animatedElm = jQuery(this.element);
					setTimeout(function(){
						animatedElm.css('opacity', 1);
					    animatedElm.addClass(animation_type);
					}, animation_delay);
				}, {
				    offset: animation_offset
				});
								
			}
		});
		
	}
	
	function videoBg() {
		jQuery( '.row-video-bg' ).each( function () {
	
			if ( jQuery(this).data( 'row-video-bg' ) ) {
			
				var video_url = jQuery(this).data( 'row-video-bg' );
				var video_id = getVideoId( video_url );
	
				if ( video_id ) {
					createVideoBg( jQuery(this), video_id );
				}
		
			}
			
		} );
	}

	function getVideoId( video_url ) {
	
		var video_id = video_url.match( /(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/ );
	
		if(video_id !== null) {
			return video_id[ 1 ];
		}
	}

	function resizeVideoBg( videoBg ) {
	
		var videoInnerHeight = videoBg.innerHeight();	
		var videoInnerWidth = videoBg.innerWidth();
	
		if ( ( videoInnerHeight / videoInnerWidth ) < ( 9 / 16 ) ) {
			
			var iframeHeight = videoInnerWidth * ( 9 / 16 );
			var iframeWidth = videoInnerWidth;
			var marginTop = ( iframeHeight - videoInnerHeight ) / 2 * -1;
			var marginLeft = ( iframeWidth - videoInnerWidth ) / 2 * -1;
	
		} else {
		
			iframeWidth = videoInnerHeight * ( 16 / 9 );
			iframeHeight = videoInnerHeight;
			marginLeft = ( iframeWidth - videoInnerWidth ) / 2 * -1;
			marginTop = ( iframeHeight - videoInnerHeight ) / 2 * -1;
	
		}
	
		videoBg.find( '.video-bg iframe' ).css( { marginLeft: marginLeft + 'px', marginTop: marginTop + 'px', width: iframeWidth + 'px', height: iframeHeight + 'px' } );
	}
	
	function createVideoBg( videoBg, videoId) {
	
		if (typeof(YT) == 'undefined' || typeof(YT.Player) == 'undefined') {
		
			$.getScript('//www.youtube.com/iframe_api');
			
			setTimeout( function () {
				createVideoBg( videoBg, videoId);
			}, 100 );
	
			return;
		}
	
		var iframe = videoBg
		.prepend( '<div class="video-bg"><div class="iframe"></div></div>' )
		.find( '.iframe' );
	
		new YT.Player( iframe[ 0 ], {
			width: '100%',
			height: '100%',
			videoId: videoId,
			playerVars: {autoplay: 1,controls: 0,enablejsapi: 1,iv_load_policy: 3,rel: 0,showinfo: 0,playlist: videoId},
			events: { onReady: function ( event ) { event.target.setLoop( true ).mute();}
			}
		} );
	
		resizeVideoBg( videoBg );
	
		jQuery( window ).on( 'resize', function () { resizeVideoBg( videoBg ); } );
		
	}

	function parallaxRow() {

		jQuery( '.parallax-bg' ).each( function () {
		
			if(!jQuery( this ).data( 'parallax-value' )){
				var parallaxValue = 1.5 * 100;
			}else{
				parallaxValue = jQuery( this ).data( 'vc-parallax' ) * 100;
			}
			
			var parallaxImage = jQuery( this ).data( 'parallax-image-bg' );
			var videoId = getVideoId( parallaxImage );
			
			var parallaxBg = jQuery( '<div class="parallax-img">' ).prependTo( jQuery( this ) );
			parallaxBg.height( parallaxValue + '%' );

			if ( videoId ) {
				createVideoBg( parallaxBg, videoId );
			} else {
				parallaxBg.css( 'background-image', 'url(' + parallaxImage + ')' );
			}

			var parallaxSpeed = (parallaxValue - 100)* -1;

			parallaxBg.attr( 'data-bottom-top', 'top: ' + parallaxSpeed + '%;' ).attr( 'data-top-bottom','top: 0%;' );
			
		} );

		// check if VC plugin skrollr active
		if(typeof vc_rowBehaviour == 'function'){
		    return;
		}else{
			if ( window.skrollr ) {
				skrollr.init({
					forceHeight: false,
					smoothScrolling: true,
					mobileCheck: function () {
						return false;
					}
				});
				return;
			}
			
		}	
		
	}
	
	function back_to_top() {
		if (jQuery('#back-to-top').length) {
		    var scrollTrigger = 100,
		        backToTop = function () {
		            var scrollTop = jQuery(window).scrollTop();
		            if (scrollTop > scrollTrigger) {
		                jQuery('#back-to-top').addClass('show');
		            } else {
		                jQuery('#back-to-top').removeClass('show');
		            }
		        };
		    backToTop();
		    jQuery(window).on('scroll', function () {
		        backToTop();
		    });
		    jQuery('#back-to-top').on('click', function (e) {
		        e.preventDefault();
		        jQuery('html,body').animate({
		            scrollTop: 0
		        }, 500);
		    });
		}
	}
	
	function accordionElement(){
		jQuery('.panel-toggle-false .panel-collapse').collapse({toggle: false});
		jQuery('.accordion-element .panel').each(function() {
			if(!jQuery(this).children(".panel-collapse").hasClass('in')){
				jQuery(this).find('a').addClass('collapsed');
			}
		});
	}	

};