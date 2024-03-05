/*
 * This code must to be included in 
 * Appareance -> Theme Settings -> General -> Custom Css/Js -> Custom Js
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

})( jQuery );

