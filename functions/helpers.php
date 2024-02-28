<?php	

class lpd_abcpersonal_helpers {
	
		public static function lpd_abcpersonal_unyson_check() {
			return defined('FW') && function_exists('fw_get_db_settings_option');
		}
		
		public static function lpd_abcpersonal_contactform7_check() {
			return in_array( 'contact-form-7/wp-contact-form-7.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
		
		public static function lpd_abcpersonal_vc_easytables_check() {
			return in_array( 'vc-table-manager/vc-table-manager.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
		
		public static function lpd_abcpersonal_woocommerce_check() {
			return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
		
		public static function lpd_abcpersonal_wpml_check() {
			return in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
		
		public static function lpd_abcpersonal_event_calendar_check() {
			return in_array( 'the-events-calendar/the-events-calendar.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
		
		public static function lpd_abcpersonal_timetable_check() {
			return in_array( 'timetable/timetable.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
		
		public static function lpd_abcpersonal_revslider_check() {
			return in_array( 'revslider/revslider.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
		
		public static function lpd_abcpersonal_essential_grid_check() {
			return in_array( 'essential-grid/essential-grid.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		}
	
}