<?php

define( 'LPD_ABCPERSONAL_THEME_VERSION', '1.0');

if ( ! isset( $content_width ) ) $content_width = 960;

add_action( 'vc_before_init', 'lpd_abcpersonal_vcSetAsTheme' );
function lpd_abcpersonal_vcSetAsTheme() {
    vc_set_as_theme();
}

if ( ! function_exists( 'lpd_abcpersonal_setup' ) ) :

function lpd_abcpersonal_setup() {

	load_theme_textdomain( 'lpd-abcpersonal', get_template_directory() . '/languages' );
	
	require_once get_template_directory() . '/functions/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/functions/fonts.php';
	
	lpd_abcpersonal_init();
	lpd_abcpersonal_helpers();
	lpd_abcpersonal_front_functions();
	lpd_abcpersonal_widgets();
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		lpd_abcpersonal_front_css();
	}
	
	lpd_abcpersonal_nav_menu_walker();

	if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() ) {
		lpd_abcpersonal_woocommerce_functions();
	}
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() ) {
		lpd_abcpersonal_tribe_calendar_functions();
	}
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_revslider_check() ) {
		if(is_admin()){set_revslider_as_theme();}
	}
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_essential_grid_check() ) {
		if(is_admin()){set_ess_grid_as_theme();}
	}
}

endif;

add_action( 'after_setup_theme', 'lpd_abcpersonal_setup' );


function lpd_abcpersonal_widgets() {
	
		require_once get_template_directory() . '/functions/widget-social_media.php';
	
}

function lpd_abcpersonal_init() {
	
		require_once get_template_directory() . '/functions/init.php';
		new lpd_abcpersonal_init();
	
}

function lpd_abcpersonal_front_enqueue() {
	
		require_once get_template_directory() . '/functions/front_enqueue.php';
		new lpd_abcpersonal_front_enqueue();
	
}

function lpd_abcpersonal_backend_enqueue() {
	
		require_once get_template_directory() . '/functions/backend_enqueue.php';
		new lpd_abcpersonal_backend_enqueue();
	
}

if( is_admin() ) {

	if ( function_exists( 'lpd_abcpersonal_backend_enqueue' ) ) :

		lpd_abcpersonal_backend_enqueue();
	
	endif;


}else{

	if ( function_exists( 'lpd_abcpersonal_front_enqueue' ) ) :
	
		lpd_abcpersonal_front_enqueue();
		
	endif;
	
}

function lpd_abcpersonal_helpers() {
	
		require_once get_template_directory() . '/functions/helpers.php';
		new lpd_abcpersonal_helpers();
	
}

function lpd_abcpersonal_front_functions() {
	
		require_once get_template_directory() . '/functions/front_functions.php';
		new lpd_abcpersonal_front_functions();
	
}

function lpd_abcpersonal_woocommerce_functions() {
	
		require_once get_template_directory() . '/functions/woocommerce_functions.php';
		new lpd_abcpersonal_woocommerce_functions();
	
}

function lpd_abcpersonal_tribe_calendar_functions() {
	
		require_once get_template_directory() . '/functions/tribe_calendar_functions.php';
		new lpd_abcpersonal_tribe_calendar_functions();
	
}

function lpd_abcpersonal_front_css() {
	
		require_once get_template_directory() . '/functions/front_css.php';
		new lpd_abcpersonal_front_css();
	
}

function lpd_abcpersonal_nav_menu_walker() {
	
		require_once get_template_directory() . '/functions/front_menu_walker.php';
		new lpd_abcpersonal_nav_menu_walker();
	
}


/**
 * Enqueue scripts and styles.
 *
 * return void 
 */
function codigo_enqueue_scripts() {


    // If the Essential Grid plugin is installed and activated, reenqueue the necessary scripts changing the $handle value because is already registered by the Revolution Slider plugin and it is causing conflicts
    if( class_exists('Essential_Grid')
    && (defined('EG_PLUGIN_URL')) 
    ) { 

        //error_log(print_r('Enqueueing Essential_Grid: '. EG_PLUGIN_URL . 'public/assets/js/jquery.themepunch.tools.min.js', true));

        wp_enqueue_script( 
            'essential-tp-tools', 
            EG_PLUGIN_URL . 'public/assets/js/jquery.themepunch.tools.min.js', 
            array( 'jquery', 'themepunchboxext' ), 
            '2.1.0.2b', 
            true 
        );

    }
}



add_action( 
    'wp_enqueue_scripts', 
    'codigo_enqueue_scripts'
);
