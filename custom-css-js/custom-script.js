/*
 * This code must to be included in 
 * Appareance -> Theme Settings -> General -> Custom Css/Js -> Custom Js
 * 
 * Minifier tool: https://www.toptal.com/developers/javascript-minifier
*/


/*
 * Google Tag Manager: Link Ads campaign data to Google Analytics
*/

//Create script tag <script async src="https://www.googletagmanager.com/gtag/js?id=G-7Z5L7FGX3E">
// Google tag is slowing the page speed. We will remove this feature temporarily
/*
var gtagScript = document.createElement('script');
gtagScript.async = true;
gtagScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-7Z5L7FGX3E';
document.head.appendChild(gtagScript);

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-7Z5L7FGX3E');
*/
(function($) {

   /**
    * Checks if the element is in the viewport
    * 
    * @returns {boolean} 
    */
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
    
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

       //console.log('elementTop '+ elementTop);
    
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    /**
    * Add class to element when it is in the viewport
    * 
    */
    $(window).on('resize scroll', function() {
        //console.log('scroll');
        $('.wpb_animate_when_almost_visible').each(function() {
            if ( $(this).isInViewport() 
                 && !$(this).hasClass('wpb_start_animation')
            ) {
                console.log('wpb_animate_when_almost_visible');
                $(this).addClass('wpb_start_animation animated');
            } 
        });
    });


    /**
    * Some Essential Grid elements are overlaped
    * This code triggers a resize event to fix the problem
    * 
    */
    setTimeout(function(){
        if ( $('.esg-grid-wrap-container').length ) {
            $(window).trigger('resize');
        }
    }, 1000);

    /**
    * Lazy load backend image in main header
    * 
    */
    $( window ).on( "load", function() {
        if ( $('.site-main-header').length ) {
            $('.site-main-header').addClass('loaded');
        }
        /*
        setTimeout(function(){
            if ( $('.site-main-header').length ) {
                $('.site-main-header').addClass('loaded');
            }
        }, 3000);
        */
    });

})( jQuery );
