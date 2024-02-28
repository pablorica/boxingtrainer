<?php class lpd_abcpersonal_front_enqueue {


	function __construct() {
		
		add_action( 'wp_enqueue_scripts', array( $this, 'js_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'css_styles' ) );	
		add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_woocommerce_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_timetable_styles' ) );
		
	}
	
	function js_scripts() {
		
		wp_enqueue_script( 'lpd_abcpersonal_plugins', get_template_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), LPD_ABCPERSONAL_THEME_VERSION );
		wp_enqueue_script( 'lpd_abcpersonal_functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), LPD_ABCPERSONAL_THEME_VERSION );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
	}
	
	function css_styles() {
	
		wp_enqueue_style( 'lpd_abcpersonal_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		wp_enqueue_style( 'lpd_abcpersonal_application', get_template_directory_uri() . '/assets/css/application.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		wp_enqueue_style( 'lpd_abcpersonal_webslidemenu', get_template_directory_uri() . '/assets/css/webslidemenu.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		wp_enqueue_style( 'lpd_abcpersonal_animate_css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		wp_enqueue_style( 'lpd_abcpersonal_hover', get_template_directory_uri() . '/assets/css/hover.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		wp_enqueue_style( 'lpd_abcpersonal_social_icons', get_template_directory_uri() . '/assets/fonts/picons-social-icons/styles.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		wp_enqueue_style( 'lpd_mdi', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), LPD_ABCPERSONAL_THEME_VERSION );
		if(is_singular('fw-portfolio')) {
			wp_enqueue_style( 'lpd_abcpersonal_prettyphoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		}
		
	}
	
	function lpd_abcpersonal_woocommerce_styles() {
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() ) {
			wp_enqueue_style( 'lpd_abcpersonal_woocommerce-layout', get_template_directory_uri() . '/assets/css/woocommerce-layout.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
			wp_enqueue_style( 'lpd_abcpersonal_woocommerce-smallscreen', get_template_directory_uri() . '/assets/css/woocommerce-smallscreen.css', array(), LPD_ABCPERSONAL_THEME_VERSION, 'only screen and (max-width: ' . apply_filters( 'woocommerce_style_smallscreen_breakpoint', $breakpoint = '768px' ) . ')' );
			wp_enqueue_style( 'lpd_abcpersonal_woocommerce-general', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		}
		
	}
	
	function lpd_abcpersonal_timetable_styles() {
	
		wp_enqueue_style( 'lpd_abcpersonal_timetable_shortcode', get_template_directory_uri() . '/assets/css/theme_timetable_shortcode.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
	
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_timetable_check() && lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check()) {
		
			$timetable_options_switch = fw_get_db_settings_option('custom_timetable_options/timetable_options_switch');
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && ($timetable_options_switch=='enabled')) {
				wp_enqueue_style( 'lpd_abcpersonal_timetable', get_template_directory_uri() . '/assets/css/theme_timetable.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
				wp_dequeue_style( 'timetable_font_lato' );
			}
		}
		
	}
	
}
?>