<?php class lpd_abcpersonal_backend_enqueue {


	function __construct() {
	
		add_action( 'admin_enqueue_scripts', array( $this, 'css_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'lpd_abcpersonal_admin_timetable_css' ) );
	
	}
	
	function lpd_abcpersonal_admin_timetable_css(){
	
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_timetable_check() ) {
			$custom_css = 'form#timetable_events_settings tr:first-child{display:none;}';
			
			wp_add_inline_style( 'timetable-admin', $custom_css );
		}
		
	}
	
	function css_styles() {
	
		wp_enqueue_style( 'lpd_abcpersonal_admin', get_template_directory_uri() . '/assets/css/admin.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
		
	}
	function add_scripts() {
	
		wp_enqueue_script( 'lpd_abcpersonal_admin', get_template_directory_uri() . '/assets/js/admin.js', array(), LPD_ABCPERSONAL_THEME_VERSION );
		
	}
	
}
?>