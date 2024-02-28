<?php class lpd_abcpersonal_front_css {


	function __construct() {
	
		add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_css' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_menu_css' ) );
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_woocommerce_css' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_woocommerce_js' ) );
		}
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_tribe_events_css' ) );
		}
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_timetable_check() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_timetable_shortcode_css' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_timetable_css' ) );
		}
		add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_custom_js' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'lpd_abcpersonal_prettyphoto_js' ) );
	}
	
	function lpd_abcpersonal_custom_js(){
		
	    if (!defined('FW')) return; // prevent fatal error when the framework is not active
			
			// Custom Css/Js
			$custom_js = fw_get_db_settings_option('custom_js');
		
			$custom = '';
			
			if($custom_js!=''){
				$custom .= $custom_js;
			}
			
			wp_add_inline_script( 'lpd_abcpersonal_functions', $custom );
		
	}
	
	function lpd_abcpersonal_prettyphoto_js(){
		
		$custom_js = '';
		$custom_js .= '
		jQuery(document).ready(function(){
			jQuery(".inner-page-content a[rel^=\'prettyPhoto\']").prettyPhoto({animation_speed:\'normal\',theme:\'light_square\',slideshow:3000, autoplay_slideshow: false});
		});';
		
		if(is_singular('fw-portfolio')) {
			wp_add_inline_script( 'lpd_abcpersonal_functions', $custom_js );
		}
		
	}
	
	function lpd_abcpersonal_custom_timetable_shortcode_css(){
	
		if (!defined('FW')) return; // prevent fatal error when the framework is not active

	    // Event hours shortcode

		$event_hours_text_color = fw_get_db_settings_option('event_hours_text_color');
		$event_hours_title_font = fw_get_db_settings_option('event_hours_title_font');
		$event_hours_border_color = fw_get_db_settings_option('event_hours_border_color');
		$event_hours_background = fw_get_db_settings_option('event_hours_background');
	    
	    $custom_css = '';
		
        $custom_css .= '
		#event_hours_list{
			color: '. esc_html($event_hours_text_color) .';
		}';
		
		if($event_hours_title_font){
        
			$current_style = $event_hours_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($event_hours_title_font['style']){
				$font_style  = 'font-style: '. $event_hours_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($event_hours_title_font['weight']){
				$font_weight  = 'font-weight: '. $event_hours_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tt_event_hours > li h4{
	            font-family: '. esc_html($event_hours_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($event_hours_title_font['size']) .'px;
	            letter-spacing: '. esc_html($event_hours_title_font['letter-spacing']) .'px;
	            color: '. esc_html($event_hours_title_font['color']) .';
	        }';
        }
        
        $custom_css .= '
		.tt_event_hours li{
			border-color: '. esc_html($event_hours_border_color) .';
			background-color: '. esc_html($event_hours_background) .';
		}';
	    
	    wp_add_inline_style( 'lpd_abcpersonal_timetable_shortcode', $custom_css );
		
	}

	
	function lpd_abcpersonal_custom_timetable_css(){
	
		if (!defined('FW')) return; // prevent fatal error when the framework is not active
		
	    // Timetable Options

		$timetable_border_color = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_border_color');
	    $timetable_th = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_th');
	    $timetable_th_color = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_th_color');
	    $timetable_hours = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_hours');
	    $timetable_hours_color = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_hours_color');
	    $timetable_font = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_font');
	    $timetable_title = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_title');
	    $timetable_time = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_time');
	    $timetable_tooltip_shadow = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_tooltip_shadow');
	    $timetable_filter_font = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_font');
	    $timetable_filter_color = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_color');
	    $timetable_filter_active_color = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_active_color');
	    $timetable_filter_bg = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_bg');
	    $timetable_filter_active_bg = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_active_bg');
	    $timetable_filter_border = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_border');
	    $timetable_filter_active_border = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_active_border');
	    
	    $custom_css = '';
	    
        $custom_css .= '
        table.tt_timetable, table.tt_timetable thead tr {
			border-color: '.$timetable_border_color.';
		}';
		
        $custom_css .= '
        table.tt_timetable td, table.tt_timetable th {
			border-color: '.$timetable_border_color.' !important;
		}';
		
        $custom_css .= '
        table.tt_timetable .event:not(.tt_single_event) .event_container {
			border-bottom-color: '.$timetable_border_color.';
		}';
		
        $custom_css .= '
        table.tt_timetable tbody tr {
			border-color: '.$timetable_border_color.';
		}';
		
		if($timetable_th){
        
			$current_style = $timetable_th['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($timetable_th['style']){
				$font_style  = 'font-style: '. $timetable_th['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($timetable_th['weight']){
				$font_weight  = 'font-weight: '. $timetable_th['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tt_timetable th{
	            font-family: '. esc_html($timetable_th['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($timetable_th['size']) .'px;
	            letter-spacing: '. esc_html($timetable_th['letter-spacing']) .'px;
	            color: '. esc_html($timetable_th_color) .'; 
	        }';
        }
		if($timetable_hours){
        
			$current_style = $timetable_hours['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($timetable_hours['style']){
				$font_style  = 'font-style: '. $timetable_hours['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($timetable_hours['weight']){
				$font_weight  = 'font-weight: '. $timetable_hours['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tt_timetable td.tt_hours_column{
	            font-family: '. esc_html($timetable_hours['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($timetable_hours['size']) .'px;
	            letter-spacing: '. esc_html($timetable_hours['letter-spacing']) .'px;
	            color: '. esc_html($timetable_hours_color) .'; 
	        }';
        }
		if($timetable_font){
        
			$current_style = $timetable_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($timetable_font['style']){
				$font_style  = 'font-style: '. $timetable_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($timetable_font['weight']){
				$font_weight  = 'font-weight: '. $timetable_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tt_tooltip .tt_tooltip_content,
	        .tt_timetable .event .before_hour_text,
			.tt_timetable .event .after_hour_text{
	            font-family: '. esc_html($timetable_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($timetable_font['size']) .'px;
	            letter-spacing: '. esc_html($timetable_font['letter-spacing']) .'px;
	        }';
        }
		if($timetable_title){
        
			$current_style = $timetable_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($timetable_title['style']){
				$font_style  = 'font-style: '. $timetable_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($timetable_title['weight']){
				$font_weight  = 'font-weight: '. $timetable_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tt_timetable .event a, .tt_timetable .event .event_header{
	            font-family: '. esc_html($timetable_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($timetable_title['size']) .'px;
	            letter-spacing: '. esc_html($timetable_title['letter-spacing']) .'px;
	        }';
        }
		if($timetable_time){
        
			$current_style = $timetable_time['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($timetable_time['style']){
				$font_style  = 'font-style: '. $timetable_time['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($timetable_time['weight']){
				$font_weight  = 'font-weight: '. $timetable_time['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tt_timetable .hours{
	            font-family: '. esc_html($timetable_time['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($timetable_time['size']) .'px;
	            letter-spacing: '. esc_html($timetable_time['letter-spacing']) .'px;
	        }';
        }
		
        if($timetable_tooltip_shadow=='disabled'){
        $custom_css .= '
        .tt_tooltip .tt_tooltip_content {
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
		}';
		}
		
		if($timetable_filter_font){
        
			$current_style = $timetable_filter_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($timetable_filter_font['style']){
				$font_style  = 'font-style: '. $timetable_filter_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($timetable_filter_font['weight']){
				$font_weight  = 'font-weight: '. $timetable_filter_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tt_tabs_navigation li a{
	            font-family: '. esc_html($timetable_filter_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($timetable_filter_font['size']) .'px !important;
	            letter-spacing: '. esc_html($timetable_filter_font['letter-spacing']) .'px;
	            color: '. esc_html($timetable_filter_color) .' !important;
	            background-color: '. esc_html($timetable_filter_bg) .';  
	        }';
        }
        
        $custom_css .= '
		.tt_tabs_navigation li a:before{
			border-color: '. esc_html($timetable_filter_border) .';
		}';
        
        $custom_css .= '
		.tt_tabs_navigation li a:hover,
		.tt_tabs_navigation li a.selected,
		.tt_tabs_navigation li.ui-tabs-active a{
			background-color: '. esc_html($timetable_filter_active_bg) .';
			color: '. esc_html($timetable_filter_active_color) .' !important;
		}';
		
        $custom_css .= '
		.tt_tabs_navigation li a:hover:before,
		.tt_tabs_navigation li a.selected:before,
		.tt_tabs_navigation li.ui-tabs-active a:before{
			border-color: '. esc_html($timetable_filter_active_border) .';
		}';
	    
	    wp_add_inline_style( 'lpd_abcpersonal_timetable', $custom_css );
		
	}
	
	function lpd_abcpersonal_custom_tribe_events_css(){
	
		if (!defined('FW')) return; // prevent fatal error when the framework is not active
		
	    // Events Bar
	    $events_form_border_color = fw_get_db_settings_option('events_form_border_color');
	    $events_form_border_hover_color = fw_get_db_settings_option('events_form_border_hover_color');
	    $events_form_bg_color = fw_get_db_settings_option('events_form_bg_color');
	    $events_form_bg_hover_color = fw_get_db_settings_option('events_form_bg_hover_color');
		$events_form_label_font = fw_get_db_settings_option('events_form_label_font');
		$events_form_label_element_color = fw_get_db_settings_option('events_form_label_element_color');
		$viewas_navigation_link_color = fw_get_db_settings_option('viewas_navigation_link_color');
		$viewas_navigation_hover_link_color = fw_get_db_settings_option('viewas_navigation_hover_link_color');
		$events_form_btn_text = fw_get_db_settings_option('events_form_btn_text');
		$events_form_btn_color = fw_get_db_settings_option('events_form_btn_color');
		$events_form_btn_color_hover = fw_get_db_settings_option('events_form_btn_color_hover');
		$events_form_btn_background_color = fw_get_db_settings_option('events_form_btn_background_color');
		$events_form_btn_background_color_hover = fw_get_db_settings_option('events_form_btn_background_color_hover');
		
	    // Mouth View Calendar
	    $navigation_btn_font = fw_get_db_settings_option('navigation_btn_font');
	    $navigation_btn_link_color = fw_get_db_settings_option('navigation_btn_link_color');
	    $navigation_btn_hover_link_color = fw_get_db_settings_option('navigation_btn_hover_link_color');
	    $calendar_table_header = fw_get_db_settings_option('calendar_table_header');
	    $calendar_border_color = fw_get_db_settings_option('calendar_border_color');
	    $calendar_bg_color = fw_get_db_settings_option('calendar_bg_color');
	    $calendar_text_color = fw_get_db_settings_option('calendar_text_color');
	    $calendar_date_font = fw_get_db_settings_option('calendar_date_font');
	    $calendar_date_color = fw_get_db_settings_option('calendar_date_color');
	    $calendar_date_bg_color = fw_get_db_settings_option('calendar_date_bg_color');
	    $calendar_date_active_color = fw_get_db_settings_option('calendar_date_active_color');
	    $calendar_date_active_bg_color = fw_get_db_settings_option('calendar_date_active_bg_color');
		$events_link_font = fw_get_db_settings_option('events_link_font');
	    $events_link_color = fw_get_db_settings_option('events_link_color');
	    $events_link_hover_color = fw_get_db_settings_option('events_link_hover_color');
	    $calendar_btn_text = fw_get_db_settings_option('calendar_btn_text');
	    $calendar_btn_color = fw_get_db_settings_option('calendar_btn_color');
	    $calendar_btn_color_hover = fw_get_db_settings_option('calendar_btn_color_hover');
	    $calendar_btn_background_color = fw_get_db_settings_option('calendar_btn_background_color');
	    $calendar_btn_background_color_hover = fw_get_db_settings_option('calendar_btn_background_color_hover');
	    
	    // List/Day View
	    $listday_navigation_btn_font = fw_get_db_settings_option('listday_navigation_btn_font');
	    $listday_navigation_btn_link_color = fw_get_db_settings_option('listday_navigation_btn_link_color');
	    $listday_navigation_btn_hover_link_color = fw_get_db_settings_option('listday_navigation_btn_hover_link_color');
	    $listday_separator_font = fw_get_db_settings_option('listday_separator_font');
	    $listday_separator_color = fw_get_db_settings_option('listday_separator_color');
	    $listday_separator_bg_color = fw_get_db_settings_option('listday_separator_bg_color');
	    $events_front_post_link_color = fw_get_db_settings_option('events_front_post_link_color');
	    $events_front_post_link_hover_color = fw_get_db_settings_option('events_front_post_link_hover_color');
	    $events_front_title_font = fw_get_db_settings_option('events_front_title_font');
	    $events_front_title_color = fw_get_db_settings_option('events_front_title_color');
	    $events_front_title_hover_color = fw_get_db_settings_option('events_front_title_hover_color');
	    $findoutmore_btn_font = fw_get_db_settings_option('findoutmore_btn_font');
	    $findoutmore_btn_link_color = fw_get_db_settings_option('findoutmore_btn_link_color');
	    $findoutmore_btn_link_hover_color = fw_get_db_settings_option('findoutmore_btn_link_hover_color');
	    $price_badge_font = fw_get_db_settings_option('price_badge_font');
	    $price_badge_color = fw_get_db_settings_option('price_badge_color');
	    $price_badge_background = fw_get_db_settings_option('price_badge_background');
	    $listday_btn_text = fw_get_db_settings_option('listday_btn_text');
	    $listday_btn_color = fw_get_db_settings_option('listday_btn_color');
	    $listday_btn_color_hover = fw_get_db_settings_option('listday_btn_color_hover');
	    $listday_btn_background_color = fw_get_db_settings_option('listday_btn_background_color');
	    $listday_btn_background_color_hover = fw_get_db_settings_option('listday_btn_background_color_hover');
			
	    // Event Post
	    $event_post_navigation_btn_font = fw_get_db_settings_option('event_post_navigation_btn_font');
	    $event_post_navigation_btn_link_color = fw_get_db_settings_option('event_post_navigation_btn_link_color');
	    $event_post_navigation_btn_hover_link_color = fw_get_db_settings_option('event_post_navigation_btn_hover_link_color');   
		$event_post_link_color = fw_get_db_settings_option('event_post_link_color');
		$event_post_link_hover_color = fw_get_db_settings_option('event_post_link_hover_color');
		$event_post_price_badge_font = fw_get_db_settings_option('event_post_price_badge_font');
		$event_post_price_badge_color = fw_get_db_settings_option('event_post_price_badge_color');
		$event_post_price_badge_background = fw_get_db_settings_option('event_post_price_badge_background');
		$event_post_defines_terms_font = fw_get_db_settings_option('event_post_defines_terms_font');
		$event_post_btn_text = fw_get_db_settings_option('event_post_btn_text');
		$event_post_btn_color = fw_get_db_settings_option('event_post_btn_color');
		$event_post_btn_color_hover = fw_get_db_settings_option('event_post_btn_color_hover');
		$event_post_btn_background_color = fw_get_db_settings_option('event_post_btn_background_color');
		$event_post_btn_background_color_hover = fw_get_db_settings_option('event_post_btn_background_color_hover');
		
		$custom_css = '';
		
		// Events Bar
		if($events_form_label_font){
        
			$current_style = $events_form_label_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($events_form_label_font['style']){
				$font_style  = 'font-style: '. $events_form_label_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($events_form_label_font['weight']){
				$font_weight  = 'font-weight: '. $events_form_label_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-bar-filters label{
	            font-family: '. esc_html($events_form_label_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($events_form_label_font['size']) .'px;
	            letter-spacing: '. esc_html($events_form_label_font['letter-spacing']) .'px;
	        }';
        }
        $custom_css .= '
        .tribe-bar-filters label.lpd_form_label:before{
        	background-color: '. esc_html($events_form_label_element_color) .';
        }';
        
        $custom_css .= '
        .tribe-bar-views-list li a{
        	color: '. esc_html($viewas_navigation_link_color) .';
        }';
        
        $custom_css .= '
		.tribe-bar-views-list li.tribe-bar-active a,
		.tribe-bar-views-list li a:hover{
        	color: '. esc_html($viewas_navigation_hover_link_color) .';
        }';
        
        if($events_form_btn_text){
        
			$current_style = $events_form_btn_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($events_form_btn_text['style']){
				$font_style  = 'font-style: '. $events_form_btn_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($events_form_btn_text['weight']){
				$font_weight  = 'font-weight: '. $events_form_btn_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        #tribe-events-bar .tribe-events-button.lpd_t_btn{
	            font-family: '. esc_html($events_form_btn_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($events_form_btn_text['size']) .'px;
	            letter-spacing: '. esc_html($events_form_btn_text['letter-spacing']) .'px;
	            color: '. esc_html($events_form_btn_color) .';
	            background-color: '. esc_html($events_form_btn_background_color) .';
	        }';
        }
		$custom_css .= '#tribe-events-bar .tribe-events-button.lpd_t_btn:hover{color:'.$events_form_btn_color_hover.';background-color:'.$events_form_btn_background_color_hover.';}';
         
        // Mouth View Calendar
        if($navigation_btn_font){
        
			$current_style = $navigation_btn_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($navigation_btn_font['style']){
				$font_style  = 'font-style: '. $navigation_btn_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($navigation_btn_font['weight']){
				$font_weight  = 'font-weight: '. $navigation_btn_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-month .tribe-events-nav-previous a,
	        .tribe-events-month .tribe-events-nav-next a{
	            font-family: '. esc_html($navigation_btn_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($navigation_btn_font['size']) .'px;
	            letter-spacing: '. esc_html($navigation_btn_font['letter-spacing']) .'px;
	            color: '. esc_html($navigation_btn_link_color) .';
	        }';
        }
		
		$custom_css .= '.tribe-events-month .tribe-events-nav-previous a:hover,.tribe-events-month .tribe-events-nav-next a:hover{color:'.$navigation_btn_hover_link_color.';}';
		
        if($calendar_table_header){
        
			$current_style = $calendar_table_header['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($calendar_table_header['style']){
				$font_style  = 'font-style: '. $calendar_table_header['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($calendar_table_header['weight']){
				$font_weight  = 'font-weight: '. $calendar_table_header['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-calendar th{
	            font-family: '. esc_html($calendar_table_header['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($calendar_table_header['size']) .'px;
	            letter-spacing: '. esc_html($calendar_table_header['letter-spacing']) .'px;
	        }';
        }
		
		$custom_css .= '.events-archive.events-gridview #tribe-events-content table .type-tribe_events,#tribe-events-content .tribe-events-calendar th,#tribe-events-content .tribe-events-calendar td,#tribe-events-content table.tribe-events-calendar{border-color:'.$calendar_border_color.';}';
		$custom_css .= '#tribe-events-content table.tribe-events-calendar{background-color:'.$calendar_bg_color.';color:'.$calendar_text_color.';}';
		$custom_css .= '.tribe-events-calendar td div[id*="tribe-events-daynum-"] a{color:'.$calendar_date_color.';}';
		
		if($calendar_date_font){
        
			$current_style = $calendar_date_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($calendar_date_font['style']){
				$font_style  = 'font-style: '. $calendar_date_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($calendar_date_font['weight']){
				$font_weight  = 'font-weight: '. $calendar_date_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-calendar td div[id*="tribe-events-daynum-"]{
	            font-family: '. esc_html($calendar_date_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($calendar_date_font['size']) .'px;
	            letter-spacing: '. esc_html($calendar_date_font['letter-spacing']) .'px;
	            color:'.$calendar_date_color.';
	            background-color:'.$calendar_date_bg_color.';
	        }';
        }
		
		$custom_css .= '.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"],.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] a{color:'.$calendar_date_active_color.';}';
		$custom_css .= '.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"]{background-color:'.$calendar_date_active_bg_color.';}';
        
        if($events_link_font){
        
			$current_style = $events_link_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($events_link_font['style']){
				$font_style  = 'font-style: '. $events_link_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($events_link_font['weight']){
				$font_weight  = 'font-weight: '. $events_link_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        #tribe-events-content .tribe-events-tooltip h4.entry-title,
	        h3.tribe-events-month-event-title a{
	            font-family: '. esc_html($events_link_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($events_link_font['size']) .'px;
	            letter-spacing: '. esc_html($events_link_font['letter-spacing']) .'px;
	            color: '. esc_html($events_link_color) .';
	        }';
        }
        
		$custom_css .= 'h3.tribe-events-month-event-title a:hover{color:'.$events_link_hover_color.';}';
		
        if($calendar_btn_text){
        
			$current_style = $calendar_btn_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($calendar_btn_text['style']){
				$font_style  = 'font-style: '. $calendar_btn_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($calendar_btn_text['weight']){
				$font_weight  = 'font-weight: '. $calendar_btn_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-month .tribe-events-button.lpd_t_btn{
	            font-family: '. esc_html($calendar_btn_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($calendar_btn_text['size']) .'px;
	            letter-spacing: '. esc_html($calendar_btn_text['letter-spacing']) .'px;
	            color: '. esc_html($calendar_btn_color) .';
	            background-color: '. esc_html($calendar_btn_background_color) .';
	        }';
        }
        
		$custom_css .= '.tribe-events-month .tribe-events-button.lpd_t_btn:hover{color:'.$calendar_btn_color_hover.';}';
		$custom_css .= '.tribe-events-month .tribe-events-button.lpd_t_btn:before{background-color:'.$calendar_btn_background_color_hover.';}';
   
   
        // List/Day View
        if($listday_navigation_btn_font){
        
			$current_style = $listday_navigation_btn_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($listday_navigation_btn_font['style']){
				$font_style  = 'font-style: '. $listday_navigation_btn_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($listday_navigation_btn_font['weight']){
				$font_weight  = 'font-weight: '. $listday_navigation_btn_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-list .tribe-events-nav-previous a,
	        .tribe-events-list .tribe-events-nav-next a{
	            font-family: '. esc_html($listday_navigation_btn_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($listday_navigation_btn_font['size']) .'px;
	            letter-spacing: '. esc_html($listday_navigation_btn_font['letter-spacing']) .'px;
	            color: '. esc_html($listday_navigation_btn_link_color) .';
	        }';
        }
		
		$custom_css .= '.tribe-events-list .tribe-events-nav-previous a:hover,.tribe-events-list .tribe-events-nav-next a:hover{color:'.$listday_navigation_btn_hover_link_color.';}';
		
        if($listday_separator_font){
        
			$current_style = $listday_separator_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($listday_separator_font['style']){
				$font_style  = 'font-style: '. $listday_separator_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($listday_separator_font['weight']){
				$font_weight  = 'font-weight: '. $listday_separator_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-day .tribe-events-day-time-slot h5,
	        .tribe-events-list-separator-month{
	            font-family: '. esc_html($listday_separator_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($listday_separator_font['size']) .'px;
	            letter-spacing: '. esc_html($listday_separator_font['letter-spacing']) .'px;
	            color: '. esc_html($listday_separator_color) .';
	            background-color: '. esc_html($listday_separator_bg_color) .';
	        }';
        }
        
        $custom_css .= '.type-tribe_events a{color:'.$events_front_post_link_color.';}';
        $custom_css .= '.type-tribe_events a:hover{color:'.$events_front_post_link_hover_color.';}';
        
        if($events_front_title_font){
        
			$current_style = $events_front_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($events_front_title_font['style']){
				$font_style  = 'font-style: '. $events_front_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($events_front_title_font['weight']){
				$font_weight  = 'font-weight: '. $events_front_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-list .type-tribe_events h2{
	            font-family: '. esc_html($events_front_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($events_front_title_font['size']) .'px;
	            letter-spacing: '. esc_html($events_front_title_font['letter-spacing']) .'px;
	        }';
        }
        
        $custom_css .= '.tribe-events-list .type-tribe_events h2 a{color:'.$events_front_title_color.';}';
        $custom_css .= '.tribe-events-list .type-tribe_events h2 a:hover{color:'.$events_front_title_hover_color.';}';
        
        if($findoutmore_btn_font){
        
			$current_style = $findoutmore_btn_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($findoutmore_btn_font['style']){
				$font_style  = 'font-style: '. $findoutmore_btn_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($findoutmore_btn_font['weight']){
				$font_weight  = 'font-weight: '. $findoutmore_btn_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .type-tribe_events .tribe-events-read-more{
	            font-family: '. esc_html($findoutmore_btn_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($findoutmore_btn_font['size']) .'px;
	            letter-spacing: '. esc_html($findoutmore_btn_font['letter-spacing']) .'px;
	            color: '. esc_html($findoutmore_btn_link_color) .';
	        }';
        }
        
        $custom_css .= '.type-tribe_events .tribe-events-read-more:hover{color:'.$findoutmore_btn_link_hover_color.';}';
        
        if($price_badge_font){
        
			$current_style = $price_badge_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($price_badge_font['style']){
				$font_style  = 'font-style: '. $price_badge_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($price_badge_font['weight']){
				$font_weight  = 'font-weight: '. $price_badge_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
			.tribe-events-list .tribe-events-event-cost,
			.tribe-events-day .tribe-events-event-cost{
	            font-family: '. esc_html($price_badge_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($price_badge_font['size']) .'px;
	            letter-spacing: '. esc_html($price_badge_font['letter-spacing']) .'px;
	            color: '. esc_html($price_badge_color) .';
	            background-color: '. esc_html($price_badge_background) .';
	        }';
        }
        
        if($listday_btn_text){
        
			$current_style = $listday_btn_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($listday_btn_text['style']){
				$font_style  = 'font-style: '. $listday_btn_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($listday_btn_text['weight']){
				$font_weight  = 'font-weight: '. $listday_btn_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-list .tribe-events-button.lpd_t_btn{
	            font-family: '. esc_html($listday_btn_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($listday_btn_text['size']) .'px;
	            letter-spacing: '. esc_html($listday_btn_text['letter-spacing']) .'px;
	            color: '. esc_html($listday_btn_color) .';
	            background-color: '. esc_html($listday_btn_background_color) .';
	        }';
        }
        
		$custom_css .= '.tribe-events-list .tribe-events-button.lpd_t_btn:hover{color:'.$listday_btn_color_hover.';}';
		$custom_css .= '.tribe-events-list .tribe-events-button.lpd_t_btn:before{background-color:'.$listday_btn_background_color_hover.';}';
        
		
        // Event Post
        if($event_post_navigation_btn_font){
        
			$current_style = $event_post_navigation_btn_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($event_post_navigation_btn_font['style']){
				$font_style  = 'font-style: '. $event_post_navigation_btn_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($event_post_navigation_btn_font['weight']){
				$font_weight  = 'font-weight: '. $event_post_navigation_btn_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-single .tribe-events-nav-previous a,
	        .tribe-events-single .tribe-events-nav-next a{
	            font-family: '. esc_html($event_post_navigation_btn_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($event_post_navigation_btn_font['size']) .'px;
	            letter-spacing: '. esc_html($event_post_navigation_btn_font['letter-spacing']) .'px;
	            color: '. esc_html($event_post_navigation_btn_link_color) .';
	        }';
        }
        
		$custom_css .= '.tribe-events-single .tribe-events-nav-previous a:hover,.tribe-events-single .tribe-events-nav-next a:hover{color:'.$event_post_navigation_btn_hover_link_color.';}';
		$custom_css .= '.tribe-events-single a{color:'.$event_post_link_color.';}';
		$custom_css .= '.tribe-events-single a:hover{color:'.$event_post_link_hover_color.';}';
        
        if($event_post_price_badge_font){
        
			$current_style = $event_post_price_badge_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($event_post_price_badge_font['style']){
				$font_style  = 'font-style: '. $event_post_price_badge_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($event_post_price_badge_font['weight']){
				$font_weight  = 'font-weight: '. $event_post_price_badge_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .single-tribe_events .tribe-events-schedule .tribe-events-cost{
	            font-family: '. esc_html($event_post_price_badge_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($event_post_price_badge_font['size']) .'px;
	            letter-spacing: '. esc_html($event_post_price_badge_font['letter-spacing']) .'px;
	            color: '. esc_html($event_post_price_badge_color) .';
	            background-color: '. esc_html($event_post_price_badge_background) .';
	        }';
        }
        
		$custom_css .= '.single-tribe_events .tribe-events-schedule .tribe-events-schedule-icon{background-color:'.$event_post_link_color.';}';
		
        if($event_post_defines_terms_font){
        
			$current_style = $event_post_defines_terms_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($event_post_defines_terms_font['style']){
				$font_style  = 'font-style: '. $event_post_defines_terms_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($event_post_defines_terms_font['weight']){
				$font_weight  = 'font-weight: '. $event_post_defines_terms_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-event-meta dt{
	            font-family: '. esc_html($event_post_defines_terms_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($event_post_defines_terms_font['size']) .'px;
	            letter-spacing: '. esc_html($event_post_defines_terms_font['letter-spacing']) .'px;
	        }';
        };
        
        if($event_post_btn_text){
        
			$current_style = $event_post_btn_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($event_post_btn_text['style']){
				$font_style  = 'font-style: '. $event_post_btn_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($event_post_btn_text['weight']){
				$font_weight  = 'font-weight: '. $event_post_btn_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tribe-events-single .tribe-events-button.lpd_t_btn{
	            font-family: '. esc_html($event_post_btn_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($event_post_btn_text['size']) .'px;
	            letter-spacing: '. esc_html($event_post_btn_text['letter-spacing']) .'px;
	            color: '. esc_html($event_post_btn_color) .';
	            background-color: '. esc_html($event_post_btn_background_color) .';
	        }';
        }
        
		$custom_css .= '.tribe-events-single .tribe-events-button.lpd_t_btn:hover{color:'.$event_post_btn_color_hover.';}';
		$custom_css .= '.tribe-events-single .tribe-events-button.lpd_t_btn:before{background-color:'.$event_post_btn_background_color_hover.';}';

		
		wp_add_inline_style( 'tribe-events-calendar-override-style', $custom_css );
		
	}
	
	function lpd_abcpersonal_custom_woocommerce_js(){
		
		$custom_js = '';
		$custom_js .= '
		jQuery(document).ready(function() {
		"use strict";
		jQuery( ".woocommerce .button" ).addClass( "lpd_btn_overlay");
		jQuery( ".woocommerce .button" ).wrapInner( "<span></span>");
		jQuery( ".woocommerce button.button" ).addClass( "lpd_btn_overlay");
		jQuery( ".woocommerce button.button" ).wrapInner( "<span></span>");
		});';
		
		wp_add_inline_script( 'lpd_abcpersonal_functions', $custom_js );
		
	}
	
	function lpd_abcpersonal_custom_woocommerce_css(){

	    if (!defined('FW')) return; // prevent fatal error when the framework is not active
	    
	    // Shop Options
		$shop_price_font = fw_get_db_settings_option('shop_price_font');
		$shop_rating_color = fw_get_db_settings_option('shop_rating_color');
		$shop_btn_text = fw_get_db_settings_option('shop_btn_text');
		$shop_btn_color = fw_get_db_settings_option('shop_btn_color');
		$shop_btn_color_hover = fw_get_db_settings_option('shop_btn_color_hover');
		$shop_btn_background_color = fw_get_db_settings_option('shop_btn_background_color');
		$shop_btn_background_color_hover = fw_get_db_settings_option('shop_btn_background_color_hover');
		$shop_btn_overlay_effect = fw_get_db_settings_option('shop_btn_overlay_effect');
		$alt_shop_btn_color = fw_get_db_settings_option('alt_shop_btn_color');
		$alt_shop_btn_color_hover = fw_get_db_settings_option('alt_shop_btn_color_hover');
		$alt_shop_btn_background_color = fw_get_db_settings_option('alt_shop_btn_background_color');
		$alt_shop_btn_background_color_hover = fw_get_db_settings_option('alt_shop_btn_background_color_hover');
		$shop_sale_color = fw_get_db_settings_option('shop_sale_color');
		$shop_sale_font = fw_get_db_settings_option('shop_sale_font');
		$shop_out_color = fw_get_db_settings_option('shop_out_color');
		$shop_out_font = fw_get_db_settings_option('shop_out_font');
		$shop_form_label_font = fw_get_db_settings_option('shop_form_label_font');
		$shop_form_label_element_color = fw_get_db_settings_option('shop_form_label_element_color');
	    
		// Catalog Options
		$product_catalog_title_font = fw_get_db_settings_option('product_catalog_title_font');
		$product_catalog_item_switch = fw_get_db_settings_option('product_catalog_item_border/product_category_item_switch');
		$product_catalog_item_border_weight = fw_get_db_settings_option('product_catalog_item_border/enabled/product_catalog_item_border_weight');
		$product_catalog_item_border_color = fw_get_db_settings_option('product_catalog_item_border/enabled/product_catalog_item_border_color');
		$product_category_title_font = fw_get_db_settings_option('product_category_title_font');
		$product_category_counter_font = fw_get_db_settings_option('product_category_counter_font');
		$product_category_item_color = fw_get_db_settings_option('product_category_item_color');
		$product_category_item_switch = fw_get_db_settings_option('product_category_item_border/product_category_item_switch');
		$product_category_item_border_weight = fw_get_db_settings_option('product_category_item_border/enabled/product_category_item_border_weight');
		$product_category_item_border_color = fw_get_db_settings_option('product_category_item_border/enabled/product_category_item_border_color');
		
		// Product Options
		$product_post_title_font = fw_get_db_settings_option('product_post_title_font');
		$product_post_heading_font = fw_get_db_settings_option('product_post_heading_font');
		$product_post_tab_btn_font = fw_get_db_settings_option('product_post_tab_btn_font');
		$product_post_tab_btn_color = fw_get_db_settings_option('product_post_tab_btn_color');
		$product_post_tab_btn_active_color = fw_get_db_settings_option('product_post_tab_btn_active_color');
		$product_post_review_author_font = fw_get_db_settings_option('product_post_review_author_font');
		
		// Checkout Options
		$shop_checkout_heading_font = fw_get_db_settings_option('shop_checkout_heading_font');
		
		// Cart Options
		$shop_cart_heading_font = fw_get_db_settings_option('shop_cart_heading_font');
		$shop_cart_remove_btn = fw_get_db_settings_option('shop_cart_remove_btn');
		$shop_cart_remove_btn_hover = fw_get_db_settings_option('shop_cart_remove_btn_hover');
		$shop_cart_product_title = fw_get_db_settings_option('shop_cart_product_title');
		
		// Widget Options
		$prodcut_widget_title_font = fw_get_db_settings_option('prodcut_widget_title_font');
		$prodcut_widget_btn = fw_get_db_settings_option('prodcut_widget_btn');
		$prodcut_widget_btn_hover = fw_get_db_settings_option('prodcut_widget_btn_hover');
		$search_widget_btn_color = fw_get_db_settings_option('search_widget_btn_color');
		$search_widget_btn_hover_color = fw_get_db_settings_option('search_widget_btn_hover_color');
		
		$custom_css = '';
		
		// Widget Options
        if($prodcut_widget_title_font){
        
			$current_style = $prodcut_widget_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($prodcut_widget_title_font['style']){
				$font_style  = 'font-style: '. $prodcut_widget_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($prodcut_widget_title_font['weight']){
				$font_weight  = 'font-weight: '. $prodcut_widget_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce ul.cart_list li a,
	        .woocommerce ul.product_list_widget li a{
	            font-family: '. esc_html($prodcut_widget_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($prodcut_widget_title_font['size']) .'px;
	            letter-spacing: '. esc_html($prodcut_widget_title_font['letter-spacing']) .'px;
	            color: '. esc_html($prodcut_widget_btn) .';
	        }';
        }
        $custom_css .= '
        .woocommerce ul.cart_list li a:hover,
        .woocommerce ul.product_list_widget li a:hover{
        	color: '. esc_html($prodcut_widget_btn_hover) .';
        }';
        $custom_css .= '
        .woocommerce ul.cart_list li:hover img,
        .woocommerce ul.product_list_widget li:hover img{
        	border-color: '. esc_html($prodcut_widget_btn_hover) .';
        }';
        $custom_css .= '
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range{
        	background-color: '. esc_html($prodcut_widget_btn_hover) .';
        }';
        $custom_css .= '
        .widget_product_search form.woocommerce-product-search button#search-submit{
        	background-color: '. esc_html($search_widget_btn_color) .';
        }';
        
        $custom_css .= '
        .widget_product_search form.woocommerce-product-search button#search-submit:before{
        	background-color: '. esc_html($search_widget_btn_hover_color) .';
        }';
        // Widget Options END
		
		// Product Options
        if($product_post_title_font){
        
			$current_style = $product_post_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($product_post_title_font['style']){
				$font_style  = 'font-style: '. $product_post_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($product_post_title_font['weight']){
				$font_weight  = 'font-weight: '. $product_post_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce div.product .product_title{
	            font-family: '. esc_html($product_post_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($product_post_title_font['size']) .'px;
	            letter-spacing: '. esc_html($product_post_title_font['letter-spacing']) .'px;
	            color: '. esc_html($product_post_title_font['color']) .';
	        }';
        }
        if($product_post_heading_font){
        
			$current_style = $product_post_heading_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($product_post_heading_font['style']){
				$font_style  = 'font-style: '. $product_post_heading_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($product_post_heading_font['weight']){
				$font_weight  = 'font-weight: '. $product_post_heading_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce div.product .woocommerce-tabs .panel h2,
	        .inner-product-post .upsells.products h2,
	        .inner-product-post .related.products h2{
	            font-family: '. esc_html($product_post_heading_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($product_post_heading_font['size']) .'px;
	            letter-spacing: '. esc_html($product_post_heading_font['letter-spacing']) .'px;
	            color: '. esc_html($product_post_heading_font['color']) .';
	        }';
        }
        if($product_post_tab_btn_font){
        
			$current_style = $product_post_tab_btn_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($product_post_tab_btn_font['style']){
				$font_style  = 'font-style: '. $product_post_tab_btn_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($product_post_tab_btn_font['weight']){
				$font_weight  = 'font-weight: '. $product_post_tab_btn_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce div.product .woocommerce-tabs ul.tabs li a{
	            font-family: '. esc_html($product_post_tab_btn_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($product_post_tab_btn_font['size']) .'px;
	            letter-spacing: '. esc_html($product_post_tab_btn_font['letter-spacing']) .'px;
	            color: '. esc_html($product_post_tab_btn_color) .';
	        }';
        }
        $custom_css .= '
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
        	color: '. esc_html($product_post_tab_btn_active_color) .';
        }';
        if($product_post_review_author_font){
        
			$current_style = $product_post_review_author_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($product_post_review_author_font['style']){
				$font_style  = 'font-style: '. $product_post_review_author_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($product_post_review_author_font['weight']){
				$font_weight  = 'font-weight: '. $product_post_review_author_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce #reviews #comments ol.commentlist li .meta strong{
	            font-family: '. esc_html($product_post_review_author_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($product_post_review_author_font['size']) .'px;
	            letter-spacing: '. esc_html($product_post_review_author_font['letter-spacing']) .'px;
	            color: '. esc_html($product_post_review_author_font['color']) .';
	        }';
        }
		// Product Options END
		
		// Shop Options
        if($shop_price_font){
        
			$current_style = $shop_price_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_price_font['style']){
				$font_style  = 'font-style: '. $shop_price_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_price_font['weight']){
				$font_weight  = 'font-weight: '. $shop_price_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce ul.cart_list li .priceWrap, .woocommerce ul.product_list_widget li .priceWrap,
	        .woocommerce div.product p.price, .woocommerce div.product span.price,
	        .woocommerce ul.products li.product .price{
	            font-family: '. esc_html($shop_price_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            letter-spacing: '. esc_html($shop_price_font['letter-spacing']) .'px;
	            color: '. esc_html($shop_price_font['color']) .';
	        }';
        }
        $custom_css .= '
        .woocommerce .star-rating span::before{
        	color: '. esc_html($shop_rating_color) .';
        }';
        if($shop_btn_text){
        
			$current_style = $shop_btn_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_btn_text['style']){
				$font_style  = 'font-style: '. $shop_btn_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_btn_text['weight']){
				$font_weight  = 'font-weight: '. $shop_btn_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{
	            font-family: '. esc_html($shop_btn_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            letter-spacing: '. esc_html($shop_btn_text['letter-spacing']) .'px;
	            color: '. esc_html($shop_btn_color) .';
	            background-color: '. esc_html($shop_btn_background_color) .'; 
	        }';
        }
        $custom_css .= '
        .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover{
        	color: '. esc_html($shop_btn_color_hover) .';
        	background-color: '. esc_html($shop_btn_background_color_hover) .';
        }';
        $custom_css .= '
        .woocommerce a.button.lpd_btn_overlay:hover, .woocommerce button.button.lpd_btn_overlay:hover{
        	background-color: '. esc_html($shop_btn_background_color) .';
        }';
        $custom_css .= '
        .woocommerce a.button:before, .woocommerce button.button:before{
        	background-color: '. esc_html($shop_btn_background_color_hover) .';
        }';
        $custom_css .= '
		.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover,
        .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
        	color: '. esc_html($alt_shop_btn_color) .';
        	background-color: '. esc_html($alt_shop_btn_background_color) .';
        }';
        $custom_css .= '
		.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover,
        .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
        	color: '. esc_html($alt_shop_btn_color_hover) .';
        	background-color: '. esc_html($alt_shop_btn_background_color_hover) .';
        }';
        $custom_css .= '
		.woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover,
        .woocommerce a.button.alt.lpd_btn_overlay:hover, .woocommerce button.button.alt.lpd_btn_overlay:hover{
        	background-color: '. esc_html($alt_shop_btn_background_color) .';
        }';
        $custom_css .= '
        .woocommerce a.button.alt:before, .woocommerce button.button.alt:before{
        	background-color: '. esc_html($alt_shop_btn_background_color_hover) .';
        }';
		if($shop_btn_overlay_effect!='enabled'){
	        $custom_css .= '
	        .woocommerce a.button:before, .woocommerce button.button:before{
	        	display: none;
	        }';
        }
        if($shop_sale_font){
        
			$current_style = $shop_sale_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_sale_font['style']){
				$font_style  = 'font-style: '. $shop_sale_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_sale_font['weight']){
				$font_weight  = 'font-weight: '. $shop_sale_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce span.onsale{
	            font-family: '. esc_html($shop_sale_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($shop_sale_font['size']) .'px;
	            letter-spacing: '. esc_html($shop_sale_font['letter-spacing']) .'px;
	            background-color: '. esc_html($shop_sale_color) .'; 
	        }';
        }
        if($shop_out_font){
        
			$current_style = $shop_out_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_out_font['style']){
				$font_style  = 'font-style: '. $shop_out_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_out_font['weight']){
				$font_weight  = 'font-weight: '. $shop_out_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce span.lpd-out-of-s{
	            font-family: '. esc_html($shop_out_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($shop_out_font['size']) .'px;
	            letter-spacing: '. esc_html($shop_out_font['letter-spacing']) .'px;
	            background-color: '. esc_html($shop_out_color) .'; 
	        }';
        }
		if($shop_form_label_font){
        
			$current_style = $shop_form_label_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_form_label_font['style']){
				$font_style  = 'font-style: '. $shop_form_label_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_form_label_font['weight']){
				$font_weight  = 'font-weight: '. $shop_form_label_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce form .form-row label,
			.woocommerce #review_form .comment-form label{
	            font-family: '. esc_html($shop_form_label_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($shop_form_label_font['size']) .'px;
	            letter-spacing: '. esc_html($shop_form_label_font['letter-spacing']) .'px;
	        }';
        }
        $custom_css .= '
        .woocommerce form .form-row label:before,
		.woocommerce #review_form .comment-form label:before{
        	background-color: '. esc_html($shop_form_label_element_color) .';
        }'; 
		 // Shop Options END
			
        // Catalog Options
        
        if($product_catalog_title_font){
        
			$current_style = $product_catalog_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($product_catalog_title_font['style']){
				$font_style  = 'font-style: '. $product_catalog_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($product_catalog_title_font['weight']){
				$font_weight  = 'font-weight: '. $product_catalog_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce ul.products li.product .product-content h3{
	            font-family: '. esc_html($product_catalog_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($product_catalog_title_font['size']) .'px;
	            letter-spacing: '. esc_html($product_catalog_title_font['letter-spacing']) .'px;
	            color: '. esc_html($product_catalog_title_font['color']) .';
	        }';
        }
		if($product_catalog_item_switch=='enabled'){
	        $custom_css .= '
	        .woocommerce ul.products li.product .productWrap{
	        	border: '. esc_html($product_catalog_item_border_weight) .'px solid;
	        	border-color: '. esc_html($product_catalog_item_border_color) .';
	        }';
        }
        if($product_category_title_font){
        
			$current_style = $product_category_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($product_category_title_font['style']){
				$font_style  = 'font-style: '. $product_category_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($product_catalog_title_font['weight']){
				$font_weight  = 'font-weight: '. $product_category_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce ul.products li.product-category h3{
	            font-family: '. esc_html($product_category_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($product_category_title_font['size']) .'px;
	            letter-spacing: '. esc_html($product_category_title_font['letter-spacing']) .'px;
	        }';
        }
        $custom_css .= '
        .woocommerce ul.products li.product-category a:hover h3{
        	background-color: '. esc_html($product_category_item_color) .';
        }';
        if($product_category_counter_font){
        
			$current_style = $product_category_counter_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($product_category_counter_font['style']){
				$font_style  = 'font-style: '. $product_category_counter_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($product_category_counter_font['weight']){
				$font_weight  = 'font-weight: '. $product_category_counter_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce ul.products li.product-category mark{
	            font-family: '. esc_html($product_category_counter_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($product_category_counter_font['size']) .'px;
	            letter-spacing: '. esc_html($product_category_counter_font['letter-spacing']) .'px;
	            background-color: '. esc_html($product_category_item_color) .';
	        }';
        }
		if($product_category_item_switch=='enabled'){
	        $custom_css .= '
	        .woocommerce ul.products li.product-category a{
	        	border: '. esc_html($product_category_item_border_weight) .'px solid;
	        	border-color: '. esc_html($product_category_item_border_color) .';
	        }';
        }
        // Catalog Options END
        
        // Checkout Options
        if($shop_checkout_heading_font){
        
			$current_style = $shop_checkout_heading_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_checkout_heading_font['style']){
				$font_style  = 'font-style: '. $shop_checkout_heading_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_checkout_heading_font['weight']){
				$font_weight  = 'font-weight: '. $shop_checkout_heading_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce-billing-fields h3,
	        .woocommerce-checkout-review-order #order_review_heading,
	        .woocommerce-shipping-fields #ship-to-different-address{
	            font-family: '. esc_html($shop_checkout_heading_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($shop_checkout_heading_font['size']) .'px;
	            letter-spacing: '. esc_html($shop_checkout_heading_font['letter-spacing']) .'px;
	            color: '. esc_html($shop_checkout_heading_font['color']) .';
	        }';
        }
		// Checkout Options END

        // Cart Options
        if($shop_cart_heading_font){
        
			$current_style = $shop_cart_heading_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_cart_heading_font['style']){
				$font_style  = 'font-style: '. $shop_cart_heading_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_cart_heading_font['weight']){
				$font_weight  = 'font-weight: '. $shop_cart_heading_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .cross-sells h2,
	        .woocommerce-cart .shipping-calculator-button,
	        .woocommerce-cart .cart_totals h2,
	        .inner-cart-page .coupon label{
	            font-family: '. esc_html($shop_cart_heading_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($shop_cart_heading_font['size']) .'px;
	            letter-spacing: '. esc_html($shop_cart_heading_font['letter-spacing']) .'px;
	            color: '. esc_html($shop_cart_heading_font['color']) .';
	        }';
        }
        $custom_css .= '
        .woocommerce a.remove{
        	background-color: '. esc_html($shop_cart_remove_btn) .';
        }';
        $custom_css .= '
        .woocommerce a.remove:hover{
        	background-color: '. esc_html($shop_cart_remove_btn_hover) .';
        }';
        if($shop_cart_product_title){
        
			$current_style = $shop_cart_product_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($shop_cart_product_title['style']){
				$font_style  = 'font-style: '. $shop_cart_product_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($shop_cart_product_title['weight']){
				$font_weight  = 'font-weight: '. $shop_cart_product_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .woocommerce-cart table.cart td.product-name a{
	            font-family: '. esc_html($shop_cart_product_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($shop_cart_product_title['size']) .'px;
	            letter-spacing: '. esc_html($shop_cart_product_title['letter-spacing']) .'px;
	            color: '. esc_html($shop_cart_product_title['color']) .';
	        }';
        }
        // Cart Options END
        	
		wp_add_inline_style( 'lpd_abcpersonal_woocommerce-general', $custom_css );
			
	}

	function lpd_abcpersonal_custom_menu_css(){

	    if (!defined('FW')) return; // prevent fatal error when the framework is not active
	    
		// Mobile Navigation
		$mob_first_level_nav_font = fw_get_db_settings_option('mob_first_level_nav_font');
		$mob_first_level_nav_color = fw_get_db_settings_option('mob_first_level_nav_color');
		$mob_first_level_nav_color_hover = fw_get_db_settings_option('mob_first_level_nav_color_hover');
		$mob_nav_font = fw_get_db_settings_option('mob_nav_font');
		$mob_nav_color = fw_get_db_settings_option('mob_nav_color');
		$mob_nav_color_hover = fw_get_db_settings_option('mob_nav_color_hover');
		$mob_nav_btn_color = fw_get_db_settings_option('mob_nav_btn_color');
		$mob_nav_btn_color_hover = fw_get_db_settings_option('mob_nav_btn_color_hover');
		$mob_nav_title_font = fw_get_db_settings_option('mob_nav_title_font');
		$mob_nav_title_font_color = fw_get_db_settings_option('mob_nav_title_font_color');
		
		
		$custom_css = '';
			
        // Mobile Navigation
        $custom_css .= '
        @media only screen and (max-width: 991px) {
        .wsmenu-click i{
        	color: '. esc_html($mob_first_level_nav_color) .';
        }';
        
        if($mob_first_level_nav_font){
        
			$current_style = $mob_first_level_nav_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($mob_first_level_nav_font['style']){
				$font_style  = 'font-style: '. $mob_first_level_nav_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($mob_first_level_nav_font['weight']){
				$font_weight  = 'font-weight: '. $mob_first_level_nav_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .wsmenu > .wsmenu-list > li > a{
	            font-family: '. esc_html($mob_first_level_nav_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($mob_first_level_nav_font['size']) .'px;
	            letter-spacing: '. esc_html($mob_first_level_nav_font['letter-spacing']) .'px;
	            color: '. esc_html($mob_first_level_nav_color) .';
	        }';
        }
        
        $custom_css .= '
        .wsmenu > .wsmenu-list > li.current_page_parent > a,
        .wsmenu > .wsmenu-list > li.current-menu-ancestor > a,
        .wsmenu > .wsmenu-list > li.current-menu-parent > a,
        .wsmenu > .wsmenu-list > li.current_page_ancestor > a,
        
        .wsmenu > .wsmenu-list > li.current-menu-item > a,
        .wsmenu > .wsmenu-list > li > a.active,
		.wsmenu > .wsmenu-list > li:hover > a{
        	color: '. esc_html($mob_first_level_nav_color_hover) .';
        }';
        
        
        if($mob_nav_font){
        
			$current_style = $mob_nav_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($mob_nav_font['style']){
				$font_style  = 'font-style: '. $mob_nav_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic !important;' : 'font-style: normal !important;';
			}
			
			if($mob_nav_font['weight']){
				$font_weight  = 'font-weight: '. $mob_nav_font['weight'] .' !important;';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ' !important;';
			}
			
	        $custom_css .= '
	        .megamenu > ul > li > a,
	        .mobile-sub .wsmenu-submenu li a{
	            font-family: '. esc_html($mob_nav_font['family']) .' !important;
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($mob_nav_font['size']) .'px !important;
	            letter-spacing: '. esc_html($mob_nav_font['letter-spacing']) .'px !important;
	            color: '. esc_html($mob_nav_color) .' !important;
	        }';
        }
        
        $custom_css .= '
        .megamenu > ul > li.current_page_parent > a,
        .megamenu > ul > li.current-menu-ancestor > a,
        .megamenu > ul > li.current-menu-parent > a,
        .megamenu > ul > li.current_page_ancestor > a,
        
        .megamenu > ul > li.current-menu-item > a,
        .megamenu > ul > li > a:hover,
        
        .mobile-sub .wsmenu-submenu li.current_page_parent > a,
        .mobile-sub .wsmenu-submenu li.current-menu-ancestor > a,
        .mobile-sub .wsmenu-submenu li.current-menu-parent > a,
        .mobile-sub .wsmenu-submenu li.current_page_ancestor > a,
        
        .mobile-sub .wsmenu-submenu li.current-menu-item > a,
        .mobile-sub .wsmenu-submenu li a:hover,
		.mobile-sub .wsmenu-submenu li a:active,
		.mobile-sub .wsmenu-submenu li:hover > a{
        	color: '. esc_html($mob_nav_color_hover) .' !important;
        }';
        
        $custom_css .= '
        .animated-arrow span, .animated-arrow span:before, .animated-arrow span:after{
        	background-color: '. esc_html($mob_nav_btn_color) .';
        }';
        
        $custom_css .= '
        .animated-arrow.menuopen span:before,
		.animated-arrow.menuopen span:after{
        	background-color: '. esc_html($mob_nav_btn_color_hover) .';
        }';
        
        if($mob_nav_title_font){
        
			$current_style = $mob_nav_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($mob_nav_title_font['style']){
				$font_style  = 'font-style: '. $mob_nav_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic !important;' : 'font-style: normal !important;';
			}
			
			if($mob_nav_title_font['weight']){
				$font_weight  = 'font-weight: '. $mob_nav_title_font['weight'] .' !important;';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ' !important;';
			}
			
	        $custom_css .= '
	        .nav-megamenu-type-1 .megamenu li.title{
	            font-family: '. esc_html($mob_nav_title_font['family']) .' !important;
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($mob_nav_title_font['size']) .'px !important;
	            letter-spacing: '. esc_html($mob_nav_title_font['letter-spacing']) .'px !important;
	            color: '. esc_html($mob_nav_title_font_color) .' !important;
	        }';
        }
        
        $custom_css .= '}';   
        // Mobile Navigation END
        	
		wp_add_inline_style( 'lpd_abcpersonal_webslidemenu', $custom_css );
			
	}

	function lpd_abcpersonal_custom_css(){

	    if (!defined('FW')) return; // prevent fatal error when the framework is not active
			
			// General Settings
			$body_color = fw_get_db_settings_option('body_color');
			$header_wrap_bg = fw_get_db_settings_option('header_wrap_bg');
			$footer_visibility = fw_get_db_settings_option('footer_visibility');
			$footer_bottom_visibility = fw_get_db_settings_option('footer_bottom_visibility');

			// Typography
			$body_font = fw_get_db_settings_option('body_font');
			$body_font_color = fw_get_db_settings_option('body_font_color');
			$link_color = fw_get_db_settings_option('link_color');
			$link_hover_color = fw_get_db_settings_option('link_hover_color');
			$headings_font = fw_get_db_settings_option('headings_font');
			$headings_font_color = fw_get_db_settings_option('headings_font_color');
			
			// Sidebar
			$widget_link_color = fw_get_db_settings_option('widget_link_color');
			$widget_link_hover_color = fw_get_db_settings_option('widget_link_hover_color');
			$widget_title_font = fw_get_db_settings_option('widget_title_font');
			$widget_list_link_color = fw_get_db_settings_option('widget_list_link_color');
			$widget_list_link_hover_color = fw_get_db_settings_option('widget_list_link_hover_color');
			$search_widget_btn_color = fw_get_db_settings_option('search_widget_btn_color');
			$search_widget_btn_hover_color = fw_get_db_settings_option('search_widget_btn_hover_color');
			$tag_widget_title_font = fw_get_db_settings_option('tag_widget_title_font');
			
			// Custom Css/Js
			$custom_css_styles = fw_get_db_settings_option('custom_css');
			
			// Widget Social Media
			$widget_forrst_switch = fw_get_db_settings_option('widget_social_media_forrst/forrst_switch');
			$widget_dribbble_switch = fw_get_db_settings_option('widget_social_media_dribbble/dribbble_switch');
			$widget_flickr_switch = fw_get_db_settings_option('widget_social_media_flickr/flickr_switch');
			$widget_twitter_switch = fw_get_db_settings_option('widget_social_media_twitter/twitter_switch');
			$widget_facebook_switch = fw_get_db_settings_option('widget_social_media_facebook/facebook_switch');
			$widget_skype_switch = fw_get_db_settings_option('widget_social_media_skype/skype_switch');
			$widget_digg_switch = fw_get_db_settings_option('widget_social_media_digg/digg_switch');
			$widget_google_switch = fw_get_db_settings_option('widget_social_media_google/google_switch');
			$widget_html5_switch = fw_get_db_settings_option('widget_social_media_html5/html5_switch');
			$widget_linkedin_switch = fw_get_db_settings_option('widget_social_media_linkedin/linkedin_switch');
			$widget_lastfm_switch = fw_get_db_settings_option('widget_social_media_lastfm/lastfm_switch');
			$widget_vimeo_switch = fw_get_db_settings_option('widget_social_media_vimeo/vimeo_switch');
			$widget_yahoo_switch = fw_get_db_settings_option('widget_social_media_yahoo/yahoo_switch');
			$widget_tumblr_switch = fw_get_db_settings_option('widget_social_media_tumblr/tumblr_switch');
			$widget_apple_switch = fw_get_db_settings_option('widget_social_media_apple/apple_switch');
			$widget_windows_switch = fw_get_db_settings_option('widget_social_media_windows/windows_switch');
			$widget_youtube_switch = fw_get_db_settings_option('widget_social_media_youtube/youtube_switch');
			$widget_delicious_switch = fw_get_db_settings_option('widget_social_media_delicious/delicious_switch');
			$widget_rss_switch = fw_get_db_settings_option('widget_social_media_rss/rss_switch');
			$widget_picasa_switch = fw_get_db_settings_option('widget_social_media_picasa/picasa_switch');
			$widget_deviantart_switch = fw_get_db_settings_option('widget_social_media_deviantart/deviantart_switch');
			$widget_whatsapp_switch = fw_get_db_settings_option('widget_social_media_whatsapp/whatsapp_switch');
			$widget_snapchat_switch = fw_get_db_settings_option('widget_social_media_snapchat/snapchat_switch');
			$widget_blogger_switch = fw_get_db_settings_option('widget_social_media_blogger/blogger_switch');
			$widget_wordpress_switch = fw_get_db_settings_option('widget_social_media_wordpress/wordpress_switch');
			$widget_amazon_switch = fw_get_db_settings_option('widget_social_media_amazon/amazon_switch');
			$widget_appstore_switch = fw_get_db_settings_option('widget_social_media_appstore/appstore_switch');
			$widget_paypal_switch = fw_get_db_settings_option('widget_social_media_paypal/paypal_switch');
			$widget_myspace_switch = fw_get_db_settings_option('widget_social_media_myspace/myspace_switch');
			$widget_dropbox_switch = fw_get_db_settings_option('widget_social_media_dropbox/dropbox_switch');
			$widget_windows8_switch = fw_get_db_settings_option('widget_social_media_windows8/windows8_switch');
			$widget_pinterest_switch = fw_get_db_settings_option('widget_social_media_pinterest/pinterest_switch');
			$widget_soundcloud_switch = fw_get_db_settings_option('widget_social_media_soundcloud/soundcloud_switch');
			$widget_google_drive_switch = fw_get_db_settings_option('widget_social_media_google_drive/google_drive_switch');
			$widget_android_switch = fw_get_db_settings_option('widget_social_media_android/android_switch');
			$widget_behance_switch = fw_get_db_settings_option('widget_social_media_behance/behance_switch');
			$widget_instagram_switch = fw_get_db_settings_option('widget_social_media_instagram/instagram_switch');
			$widget_ebay_switch = fw_get_db_settings_option('widget_social_media_ebay/ebay_switch');
			$widget_google_plus_switch = fw_get_db_settings_option('widget_social_media_google_plus/google_plus_switch');
			$widget_github_switch = fw_get_db_settings_option('widget_social_media_github/github_switch');
			$widget_stackoverflow_switch = fw_get_db_settings_option('widget_social_media_stackoverflow/stackoverflow_switch');
			$widget_spotify_switch = fw_get_db_settings_option('widget_social_media_spotify/spotify_switch');
			$widget_stumbleupon_switch = fw_get_db_settings_option('widget_social_media_stumbleupon/stumbleupon_switch');
			$widget_visa_switch = fw_get_db_settings_option('widget_social_media_visa/visa_switch');
			$widget_mastercard_switch = fw_get_db_settings_option('widget_social_media_mastercard/mastercard_switch');
			$widget_amex_switch = fw_get_db_settings_option('widget_social_media_amex/amex_switch');
			$widget_ios_switch = fw_get_db_settings_option('widget_social_media_ios/ios_switch');
			$widget_osx_switch = fw_get_db_settings_option('widget_social_media_osx/osx_switch');
			$widget_evernote_switch = fw_get_db_settings_option('widget_social_media_evernote/evernote_switch');
			$widget_yelp_switch = fw_get_db_settings_option('widget_social_media_yelp/yelp_switch');
			$widget_yelp2_switch = fw_get_db_settings_option('widget_social_media_yelp2/yelp2_switch');
			$widget_medium_switch = fw_get_db_settings_option('widget_social_media_medium/medium_switch');
			$widget_slack_switch = fw_get_db_settings_option('widget_social_media_slack/slack_switch');
			$widget_vine_switch = fw_get_db_settings_option('widget_social_media_vine/vine_switch');
			$widget_edge_switch = fw_get_db_settings_option('widget_social_media_edge/edge_switch');
			$widget_outlook_switch = fw_get_db_settings_option('widget_social_media_outlook/outlook_switch');
			$widget_pencilcase_switch = fw_get_db_settings_option('widget_social_media_pencilcase/pencilcase_switch');
			$widget_play_switch = fw_get_db_settings_option('widget_social_media_play/play_switch');
			$widget_icloud_switch = fw_get_db_settings_option('widget_social_media_icloud/icloud_switch');
			$widget_social_media_btn_color = fw_get_db_settings_option('widget_social_media_btn_color');
			$widget_social_media_btn_background = fw_get_db_settings_option('widget_social_media_btn_background');
			$widget_social_media_btn_background_hover = fw_get_db_settings_option('widget_social_media_btn_background_hover');
			$widget_social_media_tooltip_bg = fw_get_db_settings_option('widget_social_media_tooltip_bg');
			
			// Search Page
		    $search_page_form_btn_text = fw_get_db_settings_option('search_page_form_btn_text');
		    $search_page_form_btn_color = fw_get_db_settings_option('search_page_form_btn_color');
		    $search_page_form_btn_color_hover = fw_get_db_settings_option('search_page_form_btn_color_hover');
		    $search_page_form_btn_background_color = fw_get_db_settings_option('search_page_form_btn_background_color');
		    $search_page_form_btn_background_color_hover = fw_get_db_settings_option('search_page_form_btn_background_color_hover');
			$search_page_thumb_overlay_color = fw_get_db_settings_option('search_page_thumb_overlay_color');
			$search_page_thumb_btn_color = fw_get_db_settings_option('search_page_thumb_btn_color');
			$search_page_thumb_btn_hover_color = fw_get_db_settings_option('search_page_thumb_btn_hover_color');
			$search_page_title = fw_get_db_settings_option('search_page_title');
			$search_page_title_color = fw_get_db_settings_option('search_page_title_color');
			$search_page_title_hover_color = fw_get_db_settings_option('search_page_title_hover_color');
			$search_page_img_replacement = fw_get_db_settings_option('search_page_img_replacement');
	
			// Header Elements
			//-----------------
			$header_background = fw_get_db_settings_option('header_background');
			$header_padding_top = fw_get_db_settings_option('header_padding_top');
			$header_padding_bottom = fw_get_db_settings_option('header_padding_bottom');
			$header_bottom_border_switch = fw_get_db_settings_option('header_bottom_border/header_bottom_border_switch');
			$header_border_weight = fw_get_db_settings_option('header_bottom_border/enabled/header_border_weight');
			$header_border_color = fw_get_db_settings_option('header_bottom_border/enabled/header_border_color');
			$header_sticky_menu_styles = fw_get_db_settings_option('header_sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_header_background = fw_get_db_settings_option('header_sticky_menu_styles/enabled/header_background');
			$sticky_header_padding_top = fw_get_db_settings_option('header_sticky_menu_styles/enabled/header_padding_top');
			$sticky_header_padding_bottom = fw_get_db_settings_option('header_sticky_menu_styles/enabled/header_padding_bottom');
			$sticky_header_border_weight = fw_get_db_settings_option('header_sticky_menu_styles/enabled/header_border_weight');
			$sticky_header_border_color = fw_get_db_settings_option('header_sticky_menu_styles/enabled/header_border_color');
			
			//-----------------
			$logo_type = fw_get_db_settings_option('header_logo/logo_type');
			$header_logo_text = fw_get_db_settings_option('header_logo/text_logo/header_logo_text');
			$header_logo_text_margin_top = fw_get_db_settings_option('header_logo/text_logo/header_logo_text_margin_top');
			$header_logo_text_margin_right = fw_get_db_settings_option('header_logo/text_logo/header_logo_text_margin_right');
			$header_logo_text_margin_bottom = fw_get_db_settings_option('header_logo/text_logo/header_logo_text_margin_bottom');
			$header_logo_text_margin_left = fw_get_db_settings_option('header_logo/text_logo/header_logo_text_margin_left');
			$text_logo_sticky_menu_styles = fw_get_db_settings_option('header_logo/text_logo/sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_header_logo_text_color = fw_get_db_settings_option('header_logo/text_logo/sticky_menu_styles/enabled/header_logo_text');
			$sticky_header_logo_text_margin_top = fw_get_db_settings_option('header_logo/text_logo/sticky_menu_styles/enabled/header_logo_text_margin_top');
			$sticky_header_logo_text_margin_bottom = fw_get_db_settings_option('header_logo/text_logo/sticky_menu_styles/enabled/header_logo_text_margin_bottom');
			$header_logo_height = fw_get_db_settings_option('header_logo/image_logo/header_logo_height');
			$header_logo_margin_top = fw_get_db_settings_option('header_logo/image_logo/header_logo_margin_top');
			$header_logo_margin_right = fw_get_db_settings_option('header_logo/image_logo/header_logo_margin_right');
			$header_logo_margin_bottom = fw_get_db_settings_option('header_logo/image_logo/header_logo_margin_bottom');
			$header_logo_margin_left = fw_get_db_settings_option('header_logo/image_logo/header_logo_margin_left');
			$image_logo_sticky_menu_styles = fw_get_db_settings_option('header_logo/image_logo/sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_header_logo_height = fw_get_db_settings_option('header_logo/image_logo/sticky_menu_styles/enabled/header_logo_height');
			$sticky_header_logo_margin_top = fw_get_db_settings_option('header_logo/image_logo/sticky_menu_styles/enabled/header_logo_margin_top');
			$sticky_header_logo_margin_bottom = fw_get_db_settings_option('header_logo/image_logo/sticky_menu_styles/enabled/header_logo_margin_bottom');
			//-----------------
			$header_navigation_margin_top = fw_get_db_settings_option('header_navigation_margin_top');
			$right_bar = fw_get_db_settings_option('right_bar');
			$header_navigation_sticky_menu_styles = fw_get_db_settings_option('header_navigation_sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_header_navigation_margin_top = fw_get_db_settings_option('header_navigation_sticky_menu_styles/enabled/header_navigation_margin_top');
			//-----------------
			$menu_nav_color = fw_get_db_settings_option('menu_navigation/visible/menu_nav_color');
			$menu_nav_color_hover = fw_get_db_settings_option('menu_navigation/visible/menu_nav_color_hover');
			$menu_nav_background_color = fw_get_db_settings_option('menu_navigation/visible/menu_nav_background_color');
			$menu_nav_background_color_hover = fw_get_db_settings_option('menu_navigation/visible/menu_nav_background_color_hover');
			$menu_nav_border = fw_get_db_settings_option('menu_navigation/visible/menu_nav_border/menu_nav_border_switch');
			$menu_nav_border_weight = fw_get_db_settings_option('menu_navigation/visible/menu_nav_border/enabled/menu_nav_border_weight');
			$menu_nav_border_color = fw_get_db_settings_option('menu_navigation/visible/menu_nav_border/enabled/menu_nav_border_color');
			$menu_nav_border_color_hover = fw_get_db_settings_option('menu_navigation/visible/menu_nav_border/enabled/menu_nav_border_color_hover');
			$menu_nav_margin_top = fw_get_db_settings_option('menu_navigation/visible/menu_nav_margin_top');
			$menu_nav_margin_right = fw_get_db_settings_option('menu_navigation/visible/menu_nav_margin_right');
			$menu_nav_margin_bottom = fw_get_db_settings_option('menu_navigation/visible/menu_nav_margin_bottom');
			$menu_nav_margin_left = fw_get_db_settings_option('menu_navigation/visible/menu_nav_margin_left');
			$menu_nav_sticky_menu_styles = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_menu_nav_color = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_color');
			$sticky_menu_nav_color_hover = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_color_hover');
			$sticky_menu_nav_background_color = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_background_color');
			$sticky_menu_nav_background_color_hover = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_background_color_hover');
			$sticky_menu_nav_border_color = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_border_color');
			$sticky_menu_nav_border_color_hover = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_border_color_hover');
			$sticky_menu_nav_margin_top = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_margin_top');
			$sticky_menu_nav_margin_bottom = fw_get_db_settings_option('menu_navigation/visible/sticky_menu_styles/enabled/menu_nav_margin_bottom');
			
			//-----------------
			$menu_item_padding_top = fw_get_db_settings_option('menu_item_padding_top');
			$menu_item_padding_right = fw_get_db_settings_option('menu_item_padding_right');
			$menu_item_padding_bottom = fw_get_db_settings_option('menu_item_padding_bottom');
			$menu_item_padding_left = fw_get_db_settings_option('menu_item_padding_left');
			$menu_button_padding_left = fw_get_db_settings_option('menu_button_inner_padding_left');
			$menu_button_paddings_nl_switch = fw_get_db_settings_option('menu_button_paddings_notebook_layout/menu_button_paddings_nl_switch');
			$menu_button_padding_right_nl = fw_get_db_settings_option('menu_button_paddings_notebook_layout/enabled/menu_button_padding_right_nl');
			$menu_button_padding_left_nl = fw_get_db_settings_option('menu_button_paddings_notebook_layout/enabled/menu_button_padding_left_nl');
			$menu_button_paddings_tl_switch = fw_get_db_settings_option('menu_button_paddings_tablet_layout/menu_button_paddings_tl_switch');
			$menu_button_padding_right_tl = fw_get_db_settings_option('menu_button_paddings_tablet_layout/enabled/menu_button_padding_right_tl');
			$menu_button_padding_left_tl = fw_get_db_settings_option('menu_button_paddings_tablet_layout/enabled/menu_button_padding_left_tl');
			$menu_button_padding_top = fw_get_db_settings_option('menu_button_padding_top');
			$menu_button_padding_right = fw_get_db_settings_option('menu_button_padding_right');
			$menu_button_padding_bottom = fw_get_db_settings_option('menu_button_padding_bottom');
			$menu_button_padding_left = fw_get_db_settings_option('menu_button_padding_left');
			$menu_button_inner_padding_right = fw_get_db_settings_option('menu_button_inner_padding_right');
			$menu_button_inner_padding_left = fw_get_db_settings_option('menu_button_inner_padding_left');
			$menu_button_inner_paddings_nl_switch = fw_get_db_settings_option('menu_button_inner_paddings_notebook_layout/menu_button_inner_paddings_nl_switch');
			$menu_button_inner_padding_right_nl = fw_get_db_settings_option('menu_button_inner_paddings_notebook_layout/enabled/menu_button_inner_padding_right_nl');
			$menu_button_inner_padding_left_nl = fw_get_db_settings_option('menu_button_inner_paddings_notebook_layout/enabled/menu_button_inner_padding_left_nl');
			$menu_button_inner_paddings_tl_switch = fw_get_db_settings_option('menu_button_inner_paddings_tablet_layout/menu_button_inner_paddings_tl_switch');
			$menu_button_inner_padding_right_tl = fw_get_db_settings_option('menu_button_inner_paddings_tablet_layout/enabled/menu_button_inner_padding_right_tl');
			$menu_button_inner_padding_left_tl = fw_get_db_settings_option('menu_button_inner_paddings_tablet_layout/enabled/menu_button_inner_padding_left_tl');
			$menu_button_text = fw_get_db_settings_option('menu_button_text');
			$menu_button_color = fw_get_db_settings_option('menu_button_color');
			$menu_button_color_hover = fw_get_db_settings_option('menu_button_color_hover');
			$menu_background_color = fw_get_db_settings_option('menu_background_color');
			$menu_background_color_hover = fw_get_db_settings_option('menu_background_color_hover');
			$menu_button_overlay_effect = fw_get_db_settings_option('menu_button_overlay_effect');
			$menu_button_border = fw_get_db_settings_option('menu_button_border/menu_button_border_switch');
			$border_weight = fw_get_db_settings_option('menu_button_border/enabled/border_weight');
			$border_color = fw_get_db_settings_option('menu_button_border/enabled/border_color');
			$border_color_hover = fw_get_db_settings_option('menu_button_border/enabled/border_color_hover');
			$menu_button_radius = fw_get_db_settings_option('menu_button_radius');
			$menu_sticky_menu_styles = fw_get_db_settings_option('menu_sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_menu_item_padding_top = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/menu_item_padding_top');
			$sticky_menu_item_padding_bottom = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/menu_item_padding_bottom');
			$sticky_menu_button_color = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/menu_button_color');
			$sticky_menu_button_color_hover = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/menu_button_color_hover');
			$sticky_menu_background_color = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/menu_background_color');
			$sticky_menu_background_color_hover = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/menu_background_color_hover');
			$sticky_border_color = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/border_color');
			$sticky_border_color_hover = fw_get_db_settings_option('menu_sticky_menu_styles/enabled/border_color_hover');
			
			//-----------------
			$menu_dropdown_border_switch = fw_get_db_settings_option('menu_dropdown_border/menu_dropdown_border_switch');
			$menu_dropdown_border_color = fw_get_db_settings_option('menu_dropdown_border/enabled/menu_dropdown_border_color');
			$dropdown_font = fw_get_db_settings_option('dropdown_font');
			$dropdown_color = fw_get_db_settings_option('dropdown_color');
			$dropdown_color_hover = fw_get_db_settings_option('dropdown_color_hover');
			$dropdown_title_font = fw_get_db_settings_option('dropdown_title_font');
			//-----------------
			$search_form_visibility = fw_get_db_settings_option('search_form/search_form_visibility');
			$search_btn_container_margin_top = fw_get_db_settings_option('search_form/enabled/search_btn_container_margin_top');
			$search_btn_container_margin_right = fw_get_db_settings_option('search_form/enabled/search_btn_container_margin_right');
			$search_btn_container_margin_bottom = fw_get_db_settings_option('search_form/enabled/search_btn_container_margin_bottom');
			$search_btn_container_margin_left = fw_get_db_settings_option('search_form/enabled/search_btn_container_margin_left');
			$search_btn_sepline = fw_get_db_settings_option('search_form/enabled/search_btn_sepline/sepline_switch');
			$search_btn_sepline_color = fw_get_db_settings_option('search_form/enabled/search_btn_sepline/enabled/search_btn_sepline_color');
			$search_btn_margin_right = fw_get_db_settings_option('search_form/enabled/search_btn_margin_right');
			$search_btn_margin_left = fw_get_db_settings_option('search_form/enabled/search_btn_margin_left');
			$search_btn_width = fw_get_db_settings_option('search_form/enabled/search_btn_width');
			$search_btn_icon_size = fw_get_db_settings_option('search_form/enabled/search_btn_icon_size');
			$search_btn_color = fw_get_db_settings_option('search_form/enabled/search_btn_color');
			$search_btn_color_hover = fw_get_db_settings_option('search_form/enabled/search_btn_color_hover');
			$search_btn_background = fw_get_db_settings_option('search_form/enabled/search_btn_background');
			$search_btn_background_hover = fw_get_db_settings_option('search_form/enabled/search_btn_background_hover');
			$search_button_border = fw_get_db_settings_option('search_form/enabled/search_button_border/search_button_border_switch');
			$search_border_weight = fw_get_db_settings_option('search_form/enabled/search_button_border/enabled/search_border_weight');
			$search_border_color = fw_get_db_settings_option('search_form/enabled/search_button_border/enabled/search_border_color');
			$search_border_color_hover = fw_get_db_settings_option('search_form/enabled/search_button_border/enabled/search_border_color_hover');
			$search_form_sticky_menu_styles = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_search_btn_container_margin_top = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_btn_container_margin_top');
			$sticky_search_btn_container_margin_bottom = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_btn_container_margin_bottom');
			$sticky_search_btn_sepline_color = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_btn_sepline_color');
			$sticky_search_btn_color = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_btn_color');
			$sticky_search_btn_color_hover = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_btn_color_hover');
			$sticky_search_btn_background = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_btn_background');
			$sticky_search_btn_background_hover = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_btn_background_hover');
			$sticky_search_border_color = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_border_color');
			$sticky_search_border_color_hover = fw_get_db_settings_option('search_form/enabled/sticky_menu_styles/enabled/search_border_color_hover');
			
			//-----------------
			$shopping_cart_visibility = fw_get_db_settings_option('shopping_cart/shopping_cart_visibility');
			$shopping_cart_btn_container_margin_top = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_container_margin_top');
			$shopping_cart_btn_container_margin_right = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_container_margin_right');
			$shopping_cart_btn_container_margin_bottom = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_container_margin_bottom');
			$shopping_cart_btn_container_margin_left = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_container_margin_left');
			$shopping_sepline_switch = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_sepline/sepline_switch');
			$shopping_cart_btn_sepline_color = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_sepline/enabled/shopping_cart_btn_sepline_color');
			$shopping_cart_btn_margin_right = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_margin_right');
			$shopping_cart_btn_margin_left = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_margin_left');
			$shopping_cart_btn_padding_bottom = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_padding_bottom');
			$shopping_cart_btn_width = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_width');
			$shopping_cart_btn_color = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_color');
			$shopping_cart_btn_color_hover = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_color_hover');
			$shopping_cart_btn_background = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_background');
			$shopping_cart_btn_background_hover = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_btn_background_hover');
			$shopping_cart_alternative = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_alternative/shopping_cart_alternative_switch');
			$shopping_cart_btn_counter_color = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_alternative/enabled/shopping_cart_btn_counter_color');
			$shopping_cart_btn_counter_color_hover = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_alternative/enabled/shopping_cart_btn_counter_color_hover');
			$shopping_cart_btn_counter_bg = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_alternative/enabled/shopping_cart_btn_counter_bg');
			$shopping_cart_btn_counter_bg_hover = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_alternative/enabled/shopping_cart_btn_counter_bg_hover');
			$shopping_cart_button_border_switch = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_button_border/shopping_cart_button_border_switch');
			$shopping_cart_border_weight = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_button_border/enabled/shopping_cart_border_weight');
			$shopping_cart_border_color = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_button_border/enabled/shopping_cart_border_color');
			$shopping_cart_border_color_hover= fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_button_border/enabled/shopping_cart_border_color_hover');
			$shopping_cart_sticky_menu_styles = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_shopping_cart_btn_container_margin_top = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_container_margin_top');
			$sticky_shopping_cart_btn_container_margin_bottom = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_container_margin_bottom');
			$sticky_shopping_cart_btn_padding_bottom = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_padding_bottom');
			$sticky_shopping_cart_btn_sepline_color = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_sepline_color');
			$sticky_shopping_cart_btn_color = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_color');
			$sticky_shopping_cart_btn_color_hover = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_color_hover');
			$sticky_shopping_cart_btn_background = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_background');
			$sticky_shopping_cart_btn_background_hover = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_background_hover');
			$sticky_shopping_cart_btn_counter_color = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_counter_color');
			$sticky_shopping_cart_btn_counter_color_hover = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_counter_color_hover');
			$sticky_shopping_cart_btn_counter_bg = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_counter_bg');
			$sticky_shopping_cart_btn_counter_bg_hover = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_btn_counter_bg_hover');
			$sticky_shopping_cart_border_color = fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_border_color');
			$sticky_shopping_cart_border_color_hover= fw_get_db_settings_option('shopping_cart/enabled/sticky_menu_styles/enabled/shopping_cart_border_color_hover');
			
			//-----------------
			$msg_container_visibility = fw_get_db_settings_option('msg_container_visibility/msg_container_switch');
			$msg_container_margin_top = fw_get_db_settings_option('msg_container_visibility/enabled/msg_container_margin_top');
			$msg_container_margin_right = fw_get_db_settings_option('msg_container_visibility/enabled/msg_container_margin_right');
			$msg_container_margin_bottom = fw_get_db_settings_option('msg_container_visibility/enabled/msg_container_margin_bottom');
			$msg_container_margin_left = fw_get_db_settings_option('msg_container_visibility/enabled/msg_container_margin_left');
			$msg_container_sepline = fw_get_db_settings_option('msg_container_visibility/enabled/msg_container_sepline/sepline_switch');
			$msg_container_sepline_color = fw_get_db_settings_option('msg_container_visibility/enabled/msg_container_sepline/enabled/msg_container_sepline_color');
			$msg_block_margin_right = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_margin_right');
			$msg_block_margin_left = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_margin_left');
			$msg_block_padding_right = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_padding_right');
			$msg_block_padding_left = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_padding_left');
			$msg_block_content = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_content');
			$msg_block_url = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_url');
			$msg_block_text = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_text');
			$msg_block_background = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_background');
			$msg_block_sticky_menu_styles = fw_get_db_settings_option('msg_container_visibility/enabled/sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_msg_container_margin_top = fw_get_db_settings_option('msg_container_visibility/enabled/sticky_menu_styles/enabled/msg_container_margin_top');
			$sticky_msg_container_margin_bottom = fw_get_db_settings_option('msg_container_visibility/enabled/sticky_menu_styles/enabled/msg_container_margin_bottom');
			$sticky_msg_container_sepline_color = fw_get_db_settings_option('msg_container_visibility/enabled/sticky_menu_styles/enabled/msg_container_sepline_color');
			$sticky_msg_block_text_color = fw_get_db_settings_option('msg_container_visibility/enabled/sticky_menu_styles/enabled/msg_block_text_color');
			$sticky_msg_block_background = fw_get_db_settings_option('msg_container_visibility/enabled/sticky_menu_styles/enabled/msg_block_background');
			
			//-----------------
			$wpml_container_switch = fw_get_db_settings_option('wpml_container_visibility/wpml_container_switch');
			$wpml_container_margin_top = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_container_margin_top');
			$wpml_container_margin_right = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_container_margin_right');
			$wpml_container_margin_left = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_container_margin_left');
			$wpml_container_margin_bottom = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_container_margin_bottom');
			$wpml_btn_sepline = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_sepline/sepline_switch');
			$wpml_btn_sepline_color = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_sepline/enabled/wpml_btn_sepline_color');
			$wpml_btn_margin_right = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_margin_right');
			$wpml_btn_margin_left = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_margin_left');
			$wpml_btn_padding_bottom = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_padding_bottom');
			$wpml_btn_width = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_width');
			$wpml_btn_color = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_color');
			$wpml_btn_color_hover = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_color_hover');
			$wpml_btn_background = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_background');
			$wpml_btn_background_hover = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_btn_background_hover');
			$wpml_button_border_switch = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_button_border/wpml_button_border_switch');
			$wpml_border_weight = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_button_border/enabled/wpml_border_weight');
			$wpml_border_color = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_button_border/enabled/wpml_border_color');
			$wpml_border_color_hover = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_button_border/enabled/wpml_border_color_hover');
			$wpml_dropdown_text_color = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_dropdown_text_color');
			$wpml_dropdown_text_color_hover = fw_get_db_settings_option('wpml_container_visibility/enabled/wpml_dropdown_text_color_hover');
			$wpml_sticky_menu_styles = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_wpml_container_margin_top = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_container_margin_top');
			$sticky_wpml_container_margin_bottom = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_container_margin_bottom');
			$sticky_wpml_btn_sepline_color = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_btn_sepline_color');
			$sticky_wpml_btn_color = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_btn_color');
			$sticky_wpml_btn_color_hover = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_btn_color_hover');
			$sticky_wpml_btn_background = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_btn_background');
			$sticky_wpml_btn_background_hover = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_btn_background_hover');
			$sticky_wpml_border_color = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled/wpml_border_color');
			$sticky_wpml_border_color_hover = fw_get_db_settings_option('wpml_container_visibility/enabled/sticky_menu_styles/enabled//wpml_border_color_hover');

			// Header Social Media
			$forrst_switch = fw_get_db_settings_option('header_social_media_forrst/forrst_switch');
			$dribbble_switch = fw_get_db_settings_option('header_social_media_dribbble/dribbble_switch');
			$flickr_switch = fw_get_db_settings_option('header_social_media_flickr/flickr_switch');
			$twitter_switch = fw_get_db_settings_option('header_social_media_twitter/twitter_switch');
			$facebook_switch = fw_get_db_settings_option('header_social_media_facebook/facebook_switch');
			$skype_switch = fw_get_db_settings_option('header_social_media_skype/skype_switch');
			$digg_switch = fw_get_db_settings_option('header_social_media_digg/digg_switch');
			$google_switch = fw_get_db_settings_option('header_social_media_google/google_switch');
			$html5_switch = fw_get_db_settings_option('header_social_media_html5/html5_switch');
			$linkedin_switch = fw_get_db_settings_option('header_social_media_linkedin/linkedin_switch');
			$lastfm_switch = fw_get_db_settings_option('header_social_media_lastfm/lastfm_switch');
			$vimeo_switch = fw_get_db_settings_option('header_social_media_vimeo/vimeo_switch');
			$yahoo_switch = fw_get_db_settings_option('header_social_media_yahoo/yahoo_switch');
			$tumblr_switch = fw_get_db_settings_option('header_social_media_tumblr/tumblr_switch');
			$apple_switch = fw_get_db_settings_option('header_social_media_apple/apple_switch');
			$windows_switch = fw_get_db_settings_option('header_social_media_windows/windows_switch');
			$youtube_switch = fw_get_db_settings_option('header_social_media_youtube/youtube_switch');
			$delicious_switch = fw_get_db_settings_option('header_social_media_delicious/delicious_switch');
			$rss_switch = fw_get_db_settings_option('header_social_media_rss/rss_switch');
			$picasa_switch = fw_get_db_settings_option('header_social_media_picasa/picasa_switch');
			$deviantart_switch = fw_get_db_settings_option('header_social_media_deviantart/deviantart_switch');
			$whatsapp_switch = fw_get_db_settings_option('header_social_media_whatsapp/whatsapp_switch');
			$snapchat_switch = fw_get_db_settings_option('header_social_media_snapchat/snapchat_switch');
			$blogger_switch = fw_get_db_settings_option('header_social_media_blogger/blogger_switch');
			$wordpress_switch = fw_get_db_settings_option('header_social_media_wordpress/wordpress_switch');
			$amazon_switch = fw_get_db_settings_option('header_social_media_amazon/amazon_switch');
			$appstore_switch = fw_get_db_settings_option('header_social_media_appstore/appstore_switch');
			$paypal_switch = fw_get_db_settings_option('header_social_media_paypal/paypal_switch');
			$myspace_switch = fw_get_db_settings_option('header_social_media_myspace/myspace_switch');
			$dropbox_switch = fw_get_db_settings_option('header_social_media_dropbox/dropbox_switch');
			$windows8_switch = fw_get_db_settings_option('header_social_media_windows8/windows8_switch');
			$pinterest_switch = fw_get_db_settings_option('header_social_media_pinterest/pinterest_switch');
			$soundcloud_switch = fw_get_db_settings_option('header_social_media_soundcloud/soundcloud_switch');
			$google_drive_switch = fw_get_db_settings_option('header_social_media_google_drive/google_drive_switch');
			$android_switch = fw_get_db_settings_option('header_social_media_android/android_switch');
			$behance_switch = fw_get_db_settings_option('header_social_media_behance/behance_switch');
			$instagram_switch = fw_get_db_settings_option('header_social_media_instagram/instagram_switch');
			$ebay_switch = fw_get_db_settings_option('header_social_media_ebay/ebay_switch');
			$google_plus_switch = fw_get_db_settings_option('header_social_media_google_plus/google_plus_switch');
			$github_switch = fw_get_db_settings_option('header_social_media_github/github_switch');
			$stackoverflow_switch = fw_get_db_settings_option('header_social_media_stackoverflow/stackoverflow_switch');
			$spotify_switch = fw_get_db_settings_option('header_social_media_spotify/spotify_switch');
			$stumbleupon_switch = fw_get_db_settings_option('header_social_media_stumbleupon/stumbleupon_switch');
			$visa_switch = fw_get_db_settings_option('header_social_media_visa/visa_switch');
			$mastercard_switch = fw_get_db_settings_option('header_social_media_mastercard/mastercard_switch');
			$amex_switch = fw_get_db_settings_option('header_social_media_amex/amex_switch');
			$ios_switch = fw_get_db_settings_option('header_social_media_ios/ios_switch');
			$osx_switch = fw_get_db_settings_option('header_social_media_osx/osx_switch');
			$evernote_switch = fw_get_db_settings_option('header_social_media_evernote/evernote_switch');
			$yelp_switch = fw_get_db_settings_option('header_social_media_yelp/yelp_switch');
			$yelp2_switch = fw_get_db_settings_option('header_social_media_yelp2/yelp2_switch');
			$medium_switch = fw_get_db_settings_option('header_social_media_medium/medium_switch');
			$slack_switch = fw_get_db_settings_option('header_social_media_slack/slack_switch');
			$vine_switch = fw_get_db_settings_option('header_social_media_vine/vine_switch');
			$edge_switch = fw_get_db_settings_option('header_social_media_edge/edge_switch');
			$outlook_switch = fw_get_db_settings_option('header_social_media_outlook/outlook_switch');
			$pencilcase_switch = fw_get_db_settings_option('header_social_media_pencilcase/pencilcase_switch');
			$play_switch = fw_get_db_settings_option('header_social_media_play/play_switch');
			$icloud_switch = fw_get_db_settings_option('header_social_media_icloud/icloud_switch');
			$social_media_btn_color = fw_get_db_settings_option('social_media_btn_color');
			$social_media_btn_background = fw_get_db_settings_option('social_media_btn_background');
			$social_media_btn_background_hover = fw_get_db_settings_option('social_media_btn_background_hover');
			$social_media_tooltip_bg = fw_get_db_settings_option('social_media_tooltip_bg');
			$social_media_container_margin_top = fw_get_db_settings_option('social_media_container_margin_top');
			$social_media_container_margin_right = fw_get_db_settings_option('social_media_container_margin_right');
			$social_media_container_margin_bottom = fw_get_db_settings_option('social_media_container_margin_bottom');
			$social_media_container_margin_left = fw_get_db_settings_option('social_media_container_margin_left');
			$social_media_sepline = fw_get_db_settings_option('social_media_sepline/sepline_switch');
			$social_media_sepline_color = fw_get_db_settings_option('social_media_sepline/enabled/social_media_sepline_color');
			$social_media_margin_right = fw_get_db_settings_option('social_media_margin_right');
			$social_media_margin_left = fw_get_db_settings_option('social_media_margin_left');
			
			$social_media_sticky_menu_styles = fw_get_db_settings_option('social_media_sticky_menu_styles/sticky_menu_styles_switch');
			$sticky_social_media_btn_color = fw_get_db_settings_option('social_media_sticky_menu_styles/enabled/social_media_btn_color');
			$sticky_social_media_btn_background = fw_get_db_settings_option('social_media_sticky_menu_styles/enabled/social_media_btn_background');
			$sticky_social_media_btn_background_hover = fw_get_db_settings_option('social_media_sticky_menu_styles/enabled/social_media_btn_background_hover');
			$sticky_social_media_container_margin_top = fw_get_db_settings_option('social_media_sticky_menu_styles/enabled/social_media_container_margin_top');
			$sticky_social_media_container_margin_bottom = fw_get_db_settings_option('social_media_sticky_menu_styles/enabled/social_media_container_margin_bottom');
			$sticky_social_media_sepline_color = fw_get_db_settings_option('social_media_sticky_menu_styles/enabled/social_media_sepline_color');
			
			// Footer Options
			$footer_switch = fw_get_db_settings_option('footer_options/footer_switch');
			$footer_background_type = fw_get_db_settings_option('footer_options/enabled/footer_background/footer_background_type');
			$footer_background_color = fw_get_db_settings_option('footer_options/enabled/footer_background/background_color/footer_color');
			$footer_background_image_color = fw_get_db_settings_option('footer_options/enabled/footer_background/background_image/footer_color');
			$footer_background_settings = fw_get_db_settings_option('footer_options/enabled/footer_background/background_image/footer_background_settings');
			$footer_background_image = esc_attr(fw_get_db_settings_option('footer_options/enabled/footer_background/background_image/footer_background_image/url'));
			$footer_padding_top = fw_get_db_settings_option('footer_options/enabled/footer_padding_top');
			$footer_padding_bottom = fw_get_db_settings_option('footer_options/enabled/footer_padding_bottom');
			$footer_font = fw_get_db_settings_option('footer_options/enabled/footer_font');
			$footer_font_color = fw_get_db_settings_option('footer_options/enabled/footer_font_color');
			$footer_link_color = fw_get_db_settings_option('footer_options/enabled/footer_link_color');
			$footer_link_hover_color = fw_get_db_settings_option('footer_options/enabled/footer_link_hover_color');
			
			// Footer Bottom
			$footer_bottom_switch = fw_get_db_settings_option('footer_bottom_options/footer_bottom_switch');
			$footer_bottom_color = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_color');
			$footer_bottom_padding_top = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_padding_top');
			$footer_bottom_padding_bottom = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_padding_bottom');
			$footer_bottom_font = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_font');
			$footer_bottom_font_color = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_font_color');
			$footer_bottom_link_color = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_link_color');
			$footer_bottom_link_hover_color = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_link_hover_color');
			
			// Footer Widgets
			$footer_widget_title = fw_get_db_settings_option('footer_widget_title');
			$footer_widget_title_color = fw_get_db_settings_option('footer_widget_title_color');
			$footer_widget_list_link_color = fw_get_db_settings_option('footer_widget_list_link_color');
			$footer_widget_list_link_hover_color = fw_get_db_settings_option('footer_widget_list_link_hover_color');
			$footer_search_widget_btn_color = fw_get_db_settings_option('footer_search_widget_btn_color');
			$footer_search_widget_btn_hover_color = fw_get_db_settings_option('footer_search_widget_btn_hover_color');	
			
			// Header Title
			$header_title = fw_get_db_settings_option('header_title');
			$header_subtitle = fw_get_db_settings_option('header_subtitle');
			$breadcrumb = fw_get_db_settings_option('breadcrumb');
			$breadcrumb_primary_font_color = fw_get_db_settings_option('breadcrumb_primary_font_color');
			$breadcrumb_secondary_font_color = fw_get_db_settings_option('breadcrumb_secondary_font_color');
			$breadcrumb_primary_color = fw_get_db_settings_option('breadcrumb_primary_color');
			$breadcrumb_secondary_color = fw_get_db_settings_option('breadcrumb_secondary_color');
			
			// Blog Options							
			$blog_post_link_color = fw_get_db_settings_option('blog_post_link_color');
			$blog_post_hover_color = fw_get_db_settings_option('blog_post_hover_color');
			$blog_post_title = fw_get_db_settings_option('blog_post_title');
			$blog_post_title_link_color = fw_get_db_settings_option('blog_post_title_link_color');
			$blog_post_title_hover_link_color = fw_get_db_settings_option('blog_post_title_hover_link_color');
			$blog_post_meta_font = fw_get_db_settings_option('blog_post_meta_font');
			$more_btn_font = fw_get_db_settings_option('more_btn_font');
			$more_btn_link_color = fw_get_db_settings_option('more_btn_link_color');
			$more_btn_hover_link_color = fw_get_db_settings_option('more_btn_hover_link_color');
			$thumbnail_overlay_bg = fw_get_db_settings_option('thumbnail_overlay_bg');
			$thumbnail_overlay_btn = fw_get_db_settings_option('thumbnail_overlay_btn');
			$thumbnail_overlay_btn_hover = fw_get_db_settings_option('thumbnail_overlay_btn_hover');
			
			// Post Options							
			$post_link_color = fw_get_db_settings_option('post_link_color');
			$post_link_hover_color = fw_get_db_settings_option('post_link_hover_color');
			$post_meta_font = fw_get_db_settings_option('post_meta_font');
			
			// Related Post Options
			$related_post_thumb_overlay_color = fw_get_db_settings_option('related_post_thumb_overlay_color');
			$related_post_thumb_btn_color = fw_get_db_settings_option('related_post_thumb_btn_color');
			$related_post_thumb_btn_hover_color = fw_get_db_settings_option('related_post_thumb_btn_hover_color');
			$related_post_title = fw_get_db_settings_option('related_post_title');
			$related_post_title_color = fw_get_db_settings_option('related_post_title_color');
			$related_post_title_hover_color = fw_get_db_settings_option('related_post_title_hover_color');
			$related_post_switch = fw_get_db_settings_option('related_post_meta/related_post_switch');
			$related_post_meta= fw_get_db_settings_option('related_post_meta/enabled/related_post_meta_font');
			
			// Comments Options	
			$comment_link_color = fw_get_db_settings_option('comment_link_color');
			$comment_link_hover_color = fw_get_db_settings_option('comment_link_hover_color');
			$comment_author_font = fw_get_db_settings_option('comment_author_font');
			$comment_reply_font = fw_get_db_settings_option('comment_reply_font');
			$comment_reply_btn_color = fw_get_db_settings_option('comment_reply_btn_color');
			$comment_reply_btn_hover_color = fw_get_db_settings_option('comment_reply_btn_hover_color');
			$comment_form_label_font = fw_get_db_settings_option('comment_form_label_font');
			$comment_form_label_element_color = fw_get_db_settings_option('comment_form_label_element_color');
			$comment_form_btn_text = fw_get_db_settings_option('comment_form_btn_text');
			$comment_form_btn_color = fw_get_db_settings_option('comment_form_btn_color');
			$comment_form_btn_color_hover = fw_get_db_settings_option('comment_form_btn_color_hover');
			$comment_form_btn_background_color = fw_get_db_settings_option('comment_form_btn_background_color');
			$comment_form_btn_background_color_hover = fw_get_db_settings_option('comment_form_btn_background_color_hover');
			
			// Portfolio Options
			$portfolio_link_color = fw_get_db_settings_option('portfolio_link_color');
			$portfolio_link_hover_color = fw_get_db_settings_option('portfolio_link_hover_color');
			$portfolio_related_post_title = fw_get_db_settings_option('portfolio_related_post_title');
			$portfolio_related_post_title_color = fw_get_db_settings_option('portfolio_related_post_title_color');
			$portfolio_related_post_title_hover_color = fw_get_db_settings_option('portfolio_related_post_title_hover_color');
			$portfolio_related_post_switch = fw_get_db_settings_option('portfolio_related_post_meta/portfolio_related_post_switch');
			$portfolio_related_post_meta= fw_get_db_settings_option('portfolio_related_post_meta/enabled/portfolio_related_post_meta_font');
			
			// Contact Options (primary)
		    $contact_form_border_color = fw_get_db_settings_option('contact_form_border_color');
		    $contact_form_border_hover_color = fw_get_db_settings_option('contact_form_border_hover_color');
		    $contact_form_bg_color = fw_get_db_settings_option('contact_form_bg_color');
		    $contact_form_bg_hover_color = fw_get_db_settings_option('contact_form_bg_hover_color');
		    $contact_form_label_font = fw_get_db_settings_option('contact_form_label_font');
		    $contact_form_label_font_color = fw_get_db_settings_option('contact_form_label_font_color');
		    $contact_form_label_element_color = fw_get_db_settings_option('contact_form_label_element_color');
		    $contact_form_input_text_color = fw_get_db_settings_option('contact_form_input_text_color');
		    $contact_form_placeholder_color = fw_get_db_settings_option('contact_form_placeholder_color');
		    $contact_form_btn_text = fw_get_db_settings_option('contact_form_btn_text');
		    $contact_form_btn_color = fw_get_db_settings_option('contact_form_btn_color');
		    $contact_form_btn_color_hover = fw_get_db_settings_option('contact_form_btn_color_hover');
		    $contact_form_btn_background_color = fw_get_db_settings_option('contact_form_btn_background_color');
		    $contact_form_btn_background_color_hover = fw_get_db_settings_option('contact_form_btn_background_color_hover');
		    
			// Contact Options (secondary)
		    $contact_form_secondary_border_color = fw_get_db_settings_option('contact_form_secondary_border_color');
		    $contact_form_secondary_border_hover_color = fw_get_db_settings_option('contact_form_secondary_border_hover_color');
		    $contact_form_secondary_bg_color = fw_get_db_settings_option('contact_form_secondary_bg_color');
		    $contact_form_secondary_bg_hover_color = fw_get_db_settings_option('contact_form_secondary_bg_hover_color');
		    $contact_form_secondary_label_font = fw_get_db_settings_option('contact_form_secondary_label_font');
		    $contact_form_secondary_label_font_color = fw_get_db_settings_option('contact_form_secondary_label_font_color');
		    $contact_form_secondary_label_element_color = fw_get_db_settings_option('contact_form_secondary_label_element_color');
		    $contact_form_secondary_input_text_color = fw_get_db_settings_option('contact_form_secondary_input_text_color');
		    $contact_form_secondary_placeholder_color = fw_get_db_settings_option('contact_form_secondary_placeholder_color');
		    $contact_form_secondary_btn_text = fw_get_db_settings_option('contact_form_secondary_btn_text');
		    $contact_form_secondary_btn_color = fw_get_db_settings_option('contact_form_secondary_btn_color');
		    $contact_form_secondary_btn_color_hover = fw_get_db_settings_option('contact_form_secondary_btn_color_hover');
		    $contact_form_secondary_btn_background_color = fw_get_db_settings_option('contact_form_secondary_btn_background_color');
		    $contact_form_secondary_btn_background_color_hover = fw_get_db_settings_option('contact_form_secondary_btn_background_color_hover');
		    
			// Tables (primary)
			$vc_table_color_1 = fw_get_db_settings_option('vc_table_color_1');
			$vc_table_color_2 = fw_get_db_settings_option('vc_table_color_2');
			$vc_table_border_color = fw_get_db_settings_option('vc_table_border_color');
			$vc_table_body = fw_get_db_settings_option('vc_table_body');
			$vc_table_heading = fw_get_db_settings_option('vc_table_heading');
			$vc_table_btn_text = fw_get_db_settings_option('vc_table_btn_text');
			$vc_table_btn_color = fw_get_db_settings_option('vc_table_btn_color');
			$vc_table_btn_color_hover = fw_get_db_settings_option('vc_table_btn_color_hover');
			$vc_table_btn_background_color = fw_get_db_settings_option('vc_table_btn_background_color');
			$vc_table_btn_background_color_hover = fw_get_db_settings_option('vc_table_btn_background_color_hover');
			$vc_table_margin_bottom = fw_get_db_settings_option('vc_table_margin_bottom');
			
			// Tables (secondary)
			$vc_table_secondary_color_1 = fw_get_db_settings_option('vc_table_secondary_color_1');
			$vc_table_secondary_color_2 = fw_get_db_settings_option('vc_table_secondary_color_2');
			$vc_table_secondary_border_color = fw_get_db_settings_option('vc_table_secondary_border_color');
			$vc_table_secondary_body = fw_get_db_settings_option('vc_table_secondary_body');
			$vc_table_secondary_heading = fw_get_db_settings_option('vc_table_secondary_heading');
			$vc_table_secondary_btn_text = fw_get_db_settings_option('vc_table_secondary_btn_text');
			$vc_table_secondary_btn_color = fw_get_db_settings_option('vc_table_secondary_btn_color');
			$vc_table_secondary_btn_color_hover = fw_get_db_settings_option('vc_table_secondary_btn_color_hover');
			$vc_table_secondary_btn_background_color = fw_get_db_settings_option('vc_table_secondary_btn_background_color');
			$vc_table_secondary_btn_background_color_hover = fw_get_db_settings_option('vc_table_secondary_btn_background_color_hover');
			$vc_table_secondary_margin_bottom = fw_get_db_settings_option('vc_table_secondary_margin_bottom');
			
        
        $custom_css = '';
        //-----------------

        // General Options
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        $custom_css .= '
        #main,
        body{
        	background-color: '. esc_html($body_color) .';
        }';
        
        $custom_css .= '
        #headerWrap{
        	background-color: '. esc_html($header_wrap_bg) .';
        }';
        }
        // General Options END
        
        // Typography
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        if($body_font){
        
			$current_style = $body_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($body_font['style']){
				$font_style  = 'font-style: '. $body_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($body_font['weight']){
				$font_weight  = 'font-weight: '. $body_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        body{
	            font-family: '. esc_html($body_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($body_font['size']) .'px;
	            line-height: '. esc_html($body_font['line-height']) .';
	            letter-spacing: '. esc_html($body_font['letter-spacing']) .'px;
	            color: '. esc_html($body_font_color) .';
	        }';
        }
        
        $custom_css .= '
        a{
        	color: '. esc_html($link_color) .';
        }';
        
        $custom_css .= '
        a:hover{
        	color: '. esc_html($link_hover_color) .';
        }';
        
        if($headings_font){
        
			$current_style = $headings_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($headings_font['style']){
				$font_style  = 'font-style: '. $headings_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($headings_font['weight']){
				$font_weight  = 'font-weight: '. $headings_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        h1,h2,h3,h4,h5,h6{
	            font-family: '. esc_html($headings_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($headings_font['size']) .'px;
	            line-height: '. esc_html($headings_font['line-height']) .';
	            letter-spacing: '. esc_html($headings_font['letter-spacing']) .'px;
	            color: '. esc_html($headings_font_color) .';
	        }';
        }
        }
        // Typography END
        
        // Sidebar
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        $custom_css .= '
        .widget ul > li > a.rsswidget,
        .sidebar a{
        	color: '. esc_html($widget_link_color) .';
        }';
        
        $custom_css .= '
        .widget ul > li > a.rsswidget:hover,
        .sidebar a:hover{
        	color: '. esc_html($widget_link_hover_color) .';
        }';
        
        if($widget_title_font){
        
			$current_style = $widget_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($widget_title_font['style']){
				$font_style  = 'font-style: '. $widget_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($widget_title_font['weight']){
				$font_weight  = 'font-weight: '. $widget_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .box_header,
	        .widget-title{
	            font-family: '. esc_html($widget_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($widget_title_font['size']) .'px;
	            letter-spacing: '. esc_html($widget_title_font['letter-spacing']) .'px;
	            color: '. esc_html($widget_title_font['color']) .';
	        }';
        }
        $custom_css .= '
        .tagcloud a,
        .widget ul > li > a{
        	color: '. esc_html($widget_list_link_color) .';
        }';
        $custom_css .= '
        .tagcloud a:hover,
        .widget ul > li > a:hover{
        	color: '. esc_html($widget_list_link_hover_color) .';
        }';
        $custom_css .= '
        .widget ul > li .countWrap{
        	background-color: '. esc_html($widget_list_link_hover_color) .';
        }';
        $custom_css .= '
        .widget ul > li:hover .countWrap{
        	background-color: '. esc_html($widget_list_link_color) .';
        }';
        $custom_css .= '
        .widget ul > li > a:after{
        	border-bottom-color: '. esc_html($widget_list_link_hover_color) .';
        }';
        
        $custom_css .= '
        .widget_search form.search-form button#search-submit{
        	background-color: '. esc_html($search_widget_btn_color) .';
        }';
        
        $custom_css .= '
        .widget_search form.search-form button#search-submit:before{
        	background-color: '. esc_html($search_widget_btn_hover_color) .';
        }';
        
        if($tag_widget_title_font){
        
			$current_style = $tag_widget_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($tag_widget_title_font['style']){
				$font_style  = 'font-style: '. $tag_widget_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($tag_widget_title_font['weight']){
				$font_weight  = 'font-weight: '. $tag_widget_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .tagcloud a{
	            font-family: '. esc_html($tag_widget_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($tag_widget_title_font['size']) .'px !important;
	            letter-spacing: '. esc_html($tag_widget_title_font['letter-spacing']) .'px;
	        }';
        }
        } 
        // Sidebar END
           
		// Custom Css/Js
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {	
			if($custom_css_styles!=''){
				$custom_css .= $custom_css_styles;
			}
		}
		// Custom Css/Js END
		
        // Widget Social Media
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		if(($widget_forrst_switch=='enabled')||($widget_dribbble_switch=='enabled')||($widget_flickr_switch=='enabled')||($widget_twitter_switch=='enabled')||($widget_facebook_switch=='enabled')||($widget_skype_switch=='enabled')||($widget_digg_switch=='enabled')||($widget_google_switch=='enabled')||($widget_html5_switch=='enabled')||($widget_linkedin_switch=='enabled')||($widget_lastfm_switch=='enabled')||($widget_vimeo_switch=='enabled')||($widget_yahoo_switch=='enabled')||($widget_tumblr_switch=='enabled')||($widget_apple_switch=='enabled')||($widget_windows_switch=='enabled')||($widget_youtube_switch=='enabled')||($widget_delicious_switch=='enabled')||($widget_rss_switch=='enabled')||($widget_picasa_switch=='enabled')||($widget_deviantart_switch=='enabled')||($widget_whatsapp_switch=='enabled')||($widget_snapchat_switch=='enabled')||($widget_blogger_switch=='enabled')||($widget_wordpress_switch=='enabled')||($widget_amazon_switch=='enabled')||($widget_appstore_switch=='enabled')||($widget_paypal_switch=='enabled')||($widget_myspace_switch=='enabled')||($widget_dropbox_switch=='enabled')||($widget_windows8_switch=='enabled')||($widget_pinterest_switch=='enabled')||($widget_soundcloud_switch=='enabled')||($widget_google_drive_switch=='enabled')||($widget_android_switch=='enabled')||($widget_behance_switch=='enabled')||($widget_instagram_switch=='enabled')||($widget_ebay_switch=='enabled')||($widget_google_plus_switch=='enabled')||($widget_github_switch=='enabled')||($widget_stackoverflow_switch=='enabled')||($widget_visa_switch=='enabled')||($widget_mastercard_switch=='enabled')||($widget_amex_switch=='enabled')||($widget_ios_switch=='enabled')||($widget_osx_switch=='enabled')||($widget_evernote_switch=='enabled')||($widget_yelp_switch=='enabled')||($widget_yelp2_switch=='enabled')||($widget_medium_switch=='enabled')||($widget_slack_switch=='enabled')||($widget_vine_switch=='enabled')||($widget_edge_switch=='enabled')||($widget_outlook_switch=='enabled')||($widget_pencilcase_switch=='enabled')||($widget_play_switch=='enabled')||($widget_icloud_switch=='enabled')
		){
	        $custom_css .= '
		    .widget-social-icons-container > ul > li > a{
	        	background-color: '. esc_html($widget_social_media_btn_background) .';
	        	color: '. esc_html($widget_social_media_btn_color) .' !important;
	        }';
	
	        $custom_css .= '
		    .widget-social-icons-container > ul > li > a span.bg-overlay{
	        	background-color: '. esc_html($widget_social_media_btn_background_hover) .';
	        }';
	        
	        $custom_css .= '
		    .widget-social-icons-container > ul > li > a .tooltip-container{
	        	background-color: '. esc_html($widget_social_media_tooltip_bg) .';
	        }';
	        
	        $custom_css .= '
		    .widget-social-icons-container > ul > li > a .tooltip-container:after{
	        	border-left-color: '. esc_html($widget_social_media_tooltip_bg) .';
	        }';
	        
	        
        }
        }
        // Widget Social Media END
        
		// Search Page
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {	

        if($search_page_form_btn_text){
        
			$current_style = $search_page_form_btn_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($search_page_form_btn_text['style']){
				$font_style  = 'font-style: '. $search_page_form_btn_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($search_page_form_btn_text['weight']){
				$font_weight  = 'font-weight: '. $search_page_form_btn_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .search-page-form .lpd_t_btn{
	            font-family: '. esc_html($search_page_form_btn_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($search_page_form_btn_text['size']) .'px;
	            letter-spacing: '. esc_html($search_page_form_btn_text['letter-spacing']) .'px;
				background-color: '. esc_html($search_page_form_btn_background_color) .'; 
				color: '. esc_html($search_page_form_btn_color) .';
	        }';
        }
        $custom_css .= '
        .search-page-form .lpd_t_btn:hover,
        .search-page-form .lpd_t_btn:active,
        .search-page-form .lpd_t_btn:focus{
			background-color: '. esc_html($search_page_form_btn_background_color_hover) .'; 
			color: '. esc_html($search_page_form_btn_color_hover) .';
        }';
        $custom_css .= '
        .search-post-container .featured-image:before{
        	background-color: '. esc_html($search_page_thumb_overlay_color) .';
        }';
        $custom_css .= '
        .search-post-container .featured-image .hover-effect-btn{
        	background-color: '. esc_html($search_page_thumb_btn_color) .';
        }';
        $custom_css .= '
        .search-post-container .featured-image .hover-effect-btn:hover {
        	background-color: '. esc_html($search_page_thumb_btn_hover_color) .';
        }';
        if($search_page_title){
        
			$current_style = $search_page_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($search_page_title['style']){
				$font_style  = 'font-style: '. $search_page_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($search_page_title['weight']){
				$font_weight  = 'font-weight: '. $search_page_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-search-page .search-post-container-content h4 a{
	            font-family: '. esc_html($search_page_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($search_page_title['size']) .'px;
	            letter-spacing: '. esc_html($search_page_title['letter-spacing']) .'px;
	            color: '. esc_html($search_page_title_color) .';
	        }';
        }
        $custom_css .= '
        .inner-search-page .search-post-container-content h4 a:hover{
        	color: '. esc_html($search_page_title_hover_color) .';
        }';
		
		}
		// Search Page END
        
        // Header Elements
        //-----------------
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        $custom_css .= '
        .middle-header{
        	background-color: '. esc_html($header_background) .';
        	padding-top: '. esc_html($header_padding_top) .'px;
        	padding-bottom: '. esc_html($header_padding_bottom) .'px;
        }';
      
		if($header_bottom_border_switch=='enabled'){
	        $custom_css .= '
	        .middle-header{
	        	border-bottom: '. esc_html($header_border_weight) .'px solid;
	        	border-bottom-color: '. esc_html($header_border_color) .';
	        }';
        }
      
      
		if($header_sticky_menu_styles=='enabled'){
	        $custom_css .= '
	        .middle-header.nav-sticky{
	        	background-color: '. esc_html($sticky_header_background) .';
	        	padding-top: '. esc_html($sticky_header_padding_top) .'px;
	        	padding-bottom: '. esc_html($sticky_header_padding_bottom) .'px;
	        }';
	        
			if($header_bottom_border_switch=='enabled'){
		        $custom_css .= '
		        .middle-header.nav-sticky {
		        	border-bottom: '. esc_html($sticky_header_border_weight) .'px solid;
		        	border-bottom-color: '. esc_html($sticky_header_border_color) .';
		        }';
	        }
        }
      
        if($logo_type=='text_logo'){
        
			$current_style = $header_logo_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($header_logo_text['style']){
				$font_style  = 'font-style: '. $header_logo_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($header_logo_text['weight']){
				$font_weight  = 'font-weight: '. $header_logo_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .text-logo #logo{
	            font-family: '. esc_html($header_logo_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($header_logo_text['size']) .'px;
	            letter-spacing: '. esc_html($header_logo_text['letter-spacing']) .'px;
	            color: '. esc_html($header_logo_text['color']) .';
	        }';
    	
	    	$custom_css .= '
	        .text-logo{
	        	margin-top: '. esc_html($header_logo_text_margin_top) .'px;
	        	margin-right: '. esc_html($header_logo_text_margin_right) .'px;
	        	margin-bottom: '. esc_html($header_logo_text_margin_bottom) .'px;
	            margin-left: '. esc_html($header_logo_text_margin_left) .'px;
	        }';
	        
	    	if($text_logo_sticky_menu_styles=='enabled'){
		    	$custom_css .= '
		        .nav-sticky .text-logo{
		        	margin-top: '. esc_html($sticky_header_logo_text_margin_top) .'px;
		        	margin-bottom: '. esc_html($sticky_header_logo_text_margin_bottom) .'px;
		        }';
		        $custom_css .= '
		        .nav-sticky .text-logo #logo{
		            color: '. esc_html($sticky_header_logo_text_color) .';
		        }';
	        }
        
        }
        
        if($logo_type=='image_logo'){
	    	$custom_css .= '
	        .logo{
	        	margin-top: '. esc_html($header_logo_margin_top) .'px;
	        	margin-right: '. esc_html($header_logo_margin_right) .'px;
	        	margin-bottom: '. esc_html($header_logo_margin_bottom) .'px;
	            margin-left: '. esc_html($header_logo_margin_left) .'px;
	        }';
	        
	    	$custom_css .= '
	        .logo #logo{
	        	height: '. esc_html($header_logo_height) .'px;
	        }';
	        
	        if($image_logo_sticky_menu_styles=='enabled'){
		    	$custom_css .= '
		        .nav-sticky .logo{
		        	margin-top: '. esc_html($sticky_header_logo_margin_top) .'px;
		        	margin-bottom: '. esc_html($sticky_header_logo_margin_bottom) .'px;
		        }';
		        
		    	$custom_css .= '
		        .nav-sticky .logo #logo{
		        	height: '. esc_html($sticky_header_logo_height) .'px;
		        }';
	        }
	    }
        
        //-----------------
        if($header_navigation_margin_top){
	        $custom_css .= '
	        .menu-wrapper{
	            padding-top: '. esc_html($header_navigation_margin_top) .'px;
	        }';
        }
        if($header_navigation_sticky_menu_styles){
	        $custom_css .= '
	        .nav-sticky .menu-wrapper{
	            padding-top: '. esc_html($sticky_header_navigation_margin_top) .'px;
	        }';
        }
        
    	$custom_css .= '
        .right-bar{
            margin-left: '. esc_html($right_bar) .'px;
        }';
        //-----------------
        if($menu_nav_color){
	        $custom_css .= '
	        .nav-toogle-btn > span > span,
			.nav-toogle-btn > span > span:before,
			.nav-toogle-btn > span > span:after{
	            background-color: '. esc_html($menu_nav_color) .';
	        }'; 
        }
        
        if($menu_nav_color_hover){
	        $custom_css .= '
	        .nav-toogle-btn:hover > span > span,
			.nav-toogle-btn:hover > span > span:before,
			.nav-toogle-btn:hover > span > span:after{
	            background-color: '. esc_html($menu_nav_color_hover) .';
	        }'; 
        }
        
        if($menu_nav_background_color){
	        $custom_css .= '
	        .nav-toogle-btn{
	            background-color: '. esc_html($menu_nav_background_color) .';
	        }'; 
        }

        if($menu_nav_background_color_hover){
	        $custom_css .= '
	        .nav-toogle-btn:hover{
	            background-color: '. esc_html($menu_nav_background_color_hover) .';
	        }'; 
        }
        
        if($menu_nav_border=='enabled'){
	        $custom_css .= '
	        .nav-toogle-btn:before{
	            border-width: '. esc_html($menu_nav_border_weight) .'px;
	            border-color: '. esc_html($menu_nav_border_color) .';
	            border-style: solid;
	        }';
	        $custom_css .= '
	        .nav-toogle-btn:hover:before{
	            border-color: '. esc_html($menu_nav_border_color_hover) .';
	        }';
        }
        
        $custom_css .= '
        .nav-toogle-container{
        	margin-top: '. esc_html($menu_nav_margin_top) .'px;
        	margin-right: '. esc_html($menu_nav_margin_right) .'px;
        	margin-bottom: '. esc_html($menu_nav_margin_bottom) .'px;
            margin-left: '. esc_html($menu_nav_margin_left) .'px;
        }';
        
        if($menu_nav_sticky_menu_styles=="enabled"){
        
	        $custom_css .= '
	        .nav-sticky .nav-toogle-btn > span > span,
			.nav-sticky .nav-toogle-btn > span > span:before,
			.nav-sticky .nav-toogle-btn > span > span:after{
	            background-color: '. esc_html($sticky_menu_nav_color) .';
	        }'; 
        
	        $custom_css .= '
	        .nav-sticky .nav-toogle-btn:hover > span > span,
			.nav-sticky .nav-toogle-btn:hover > span > span:before,
			.nav-sticky .nav-toogle-btn:hover > span > span:after{
	            background-color: '. esc_html($sticky_menu_nav_color_hover) .';
	        }'; 
	        
	        $custom_css .= '
	        .nav-sticky .nav-toogle-btn{
	            background-color: '. esc_html($sticky_menu_nav_background_color) .';
	        }'; 

	        $custom_css .= '
	        .nav-sticky .nav-toogle-btn:hover{
	            background-color: '. esc_html($sticky_menu_nav_background_color_hover) .';
	        }'; 
        
	        if($menu_nav_border=='enabled'){
		        $custom_css .= '
		        .nav-sticky .nav-toogle-btn:before{
		            border-color: '. esc_html($sticky_menu_nav_border_color) .';
		        }';
		        $custom_css .= '
		        .nav-sticky .nav-toogle-btn:hover:before{
		            border-color: '. esc_html($sticky_menu_nav_border_color_hover) .';
		        }';
	        }
        
	        $custom_css .= '
	        .nav-sticky .nav-toogle-container{
	        	margin-top: '. esc_html($sticky_menu_nav_margin_top) .'px;
	        	margin-bottom: '. esc_html($sticky_menu_nav_margin_bottom) .'px;
	        }';
	        
        }
        
        //-----------------
        $custom_css .= '
        .wsmenu-list > li{
        	padding-top: '. esc_html($menu_item_padding_top) .'px;
        	padding-right: '. esc_html($menu_item_padding_right) .'px;
        	padding-bottom: '. esc_html($menu_item_padding_bottom) .'px;
            padding-left: '. esc_html($menu_item_padding_left) .'px;
        }
	    .wsmenu-submenu-float-right > .wsmenu-submenu{
			right: '. esc_html($menu_item_padding_right) .'px !important;
		}';
        
        if($menu_button_paddings_nl_switch=="enabled"){
	        $custom_css .= '
	        @media (min-width: 1200px) and (max-width: 1479px) {
	        .wsmenu-list > li{
	        	padding-right: '. esc_html($menu_button_padding_right_nl) .'px;
	            padding-left: '. esc_html($menu_button_padding_left_nl) .'px;
	        }}';
        }
       
        if($menu_button_paddings_tl_switch=="enabled"){
	        $custom_css .= '
	        @media (min-width: 992px) and (max-width: 1199px) {
	        .wsmenu-list > li{
	        	padding-right: '. esc_html($menu_button_padding_right_tl) .'px;
	            padding-left: '. esc_html($menu_button_padding_left_tl) .'px;
	        }}';
        }
		
        if($menu_button_text){
        
			$current_style = $menu_button_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($menu_button_text['style']){
				$font_style  = 'font-style: '. $menu_button_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($menu_button_text['weight']){
				$font_weight  = 'font-weight: '. $menu_button_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	       $custom_css .= '
			.wsmenu-list > li > a{
			    font-family: '. esc_html($menu_button_text['family']) .';
				'. esc_html($font_style) .'
				'. esc_html($font_weight) .'
			    font-size: '. esc_html($menu_button_text['size']) .'px;
			    letter-spacing: '. esc_html($menu_button_text['letter-spacing']) .'px;
			    line-height: '. esc_html($menu_button_text['line-height']) .'px;
			    color: '. esc_html($menu_button_color) .';
			}';
	       $custom_css .= '
	       	.wsmenu-list > li.current_page_parent > a,
	       	.wsmenu-list > li.current-menu-ancestor > a,
	       	.wsmenu-list > li.current-menu-parent > a,
	       	.wsmenu-list > li.current_page_ancestor > a,
	       	
	       	.wsmenu-list > li.current-menu-item > a,
			.wsmenu-list > li:hover > a,
			.wsmenu-list > li > a:hover,
			.wsmenu-list > li > a.active{
			    color: '. esc_html($menu_button_color_hover) .';
			}';
        }
        
        $custom_css .= '
        .wsmenu-list > li > a > span{
        	padding-right: '. esc_html($menu_button_inner_padding_right) .'px;
            padding-left: '. esc_html($menu_button_inner_padding_left) .'px;
            background-color: '. esc_html($menu_background_color) .';
			-webkit-border-radius: '. esc_html($menu_button_radius) .'px;
			-moz-border-radius: '. esc_html($menu_button_radius) .'px;
			border-radius: '. esc_html($menu_button_radius) .'px;
        }';
        
        if($menu_button_inner_paddings_nl_switch=="enabled"){
	        $custom_css .= '
	        @media (min-width: 1200px) and (max-width: 1479px) {
	        .wsmenu-list > li > a > span{
	        	padding-right: '. esc_html($menu_button_inner_padding_right_nl) .'px;
	            padding-left: '. esc_html($menu_button_inner_padding_left_nl) .'px;
	        }}';
        }
       
        if($menu_button_inner_paddings_tl_switch=="enabled"){
	        $custom_css .= '
	        @media (min-width: 992px) and (max-width: 1199px) {
	        .wsmenu-list > li > a > span{
	        	padding-right: '. esc_html($menu_button_inner_padding_right_tl) .'px;
	            padding-left: '. esc_html($menu_button_inner_padding_left_tl) .'px;
	        }}';
        }
        
        $custom_css .= '
       	.wsmenu-list > li.current_page_parent > a > span,
       	.wsmenu-list > li.current-menu-ancestor > a > span,
       	.wsmenu-list > li.current-menu-parent > a > span,
       	.wsmenu-list > li.current_page_ancestor > a > span,
       	
        .wsmenu-list > li.current-menu-item > a > span,
		.wsmenu-list > li > a.active > span{
			background-color: '. esc_html($menu_background_color_hover) .';
        }';
        
        if($menu_button_overlay_effect=="disabled"){
	        $custom_css .= '
			.wsmenu-list > li:hover > a > span,
			.wsmenu-list > li > a:hover > span{
				background-color: '. esc_html($menu_background_color_hover) .';
	        }';  
        }
               
        if($menu_button_overlay_effect=="enabled"){
	        $custom_css .= '
	        .wsmenu-list.menu-btn-animated > li > a > span > span.btn-overlay{
            	height: '. esc_html($menu_button_text['line-height']) .'px;
				-webkit-border-radius: '. esc_html($menu_button_radius) .'px;
				-moz-border-radius: '. esc_html($menu_button_radius) .'px;
				border-radius: '. esc_html($menu_button_radius) .'px;
				background-color: '. esc_html($menu_background_color_hover) .';
	        }';
        }
        
       if($menu_button_border=="enabled"){
	        $custom_css .= '
	        .wsmenu-list > li > a > span:before{
	        	border: '. esc_html($border_weight) .'px solid;
	        	border-color: '. esc_html($border_color) .';
				-webkit-border-radius: '. esc_html($menu_button_radius) .'px;
				-moz-border-radius: '. esc_html($menu_button_radius) .'px;
				border-radius: '. esc_html($menu_button_radius) .'px;
	        }';
	        $custom_css .= '
	        .wsmenu-list > li.current_page_parent > a > span:before,
	        .wsmenu-list > li.current-menu-ancestor > a > span:before,
	        .wsmenu-list > li.current-menu-parent > a > span:before,
	        .wsmenu-list > li.current_page_ancestor > a > span:before,
	        
	        .wsmenu-list > li.current-menu-item > a > span:before,
			.wsmenu-list > li:hover > a > span:before,
			.wsmenu-list > li > a:hover > span:before,
			.wsmenu-list > li > a.active > span:before{
				border-color: '. esc_html($border_color_hover) .';
	        }';
        }

		if($menu_sticky_menu_styles=='enabled'){
		
	        $custom_css .= '
	        .nav-sticky .wsmenu-list > li{
	        	padding-top: '. esc_html($sticky_menu_item_padding_top) .'px;
	        	padding-bottom: '. esc_html($sticky_menu_item_padding_bottom) .'px;
	        }';
		
	       $custom_css .= '
			.nav-sticky .wsmenu-list > li > a{
			    color: '. esc_html($sticky_menu_button_color) .';
			}';
	       $custom_css .= '
	       .nav-sticky .wsmenu-list > li.current_page_parent > a,
	       .nav-sticky .wsmenu-list > li.current-menu-ancestor > a,
	       .nav-sticky .wsmenu-list > li.current-menu-parent > a,
	       .nav-sticky .wsmenu-list > li.current_page_ancestor > a,
	       
	       	.nav-sticky .wsmenu-list > li.current-menu-item > a,
			.nav-sticky .wsmenu-list > li:hover > a,
			.nav-sticky .wsmenu-list > li > a:hover,
			.nav-sticky .wsmenu-list > li > a.active{
			    color: '. esc_html($sticky_menu_button_color_hover) .';
			}';
			
	        $custom_css .= '
	        .nav-sticky .wsmenu-list > li > a > span{
	            background-color: '. esc_html($sticky_menu_background_color) .';
	        }';
		
	        $custom_css .= '
	        .nav-sticky .wsmenu-list > li.current_page_parent > a > span,
	        .nav-sticky .wsmenu-list > li.current-menu-ancestor > a > span,
	        .nav-sticky .wsmenu-list > li.current-menu-parent > a > span,
	        .nav-sticky .wsmenu-list > li.current_page_ancestor > a > span,
	        
	        .nav-sticky .wsmenu-list > li.current-menu-item > a > span,
			.nav-sticky .wsmenu-list > li > a.active > span{
				background-color: '. esc_html($sticky_menu_background_color_hover) .';
	        }';
		
	        if($menu_button_overlay_effect=="disabled"){
		        $custom_css .= '
				.nav-sticky .wsmenu-list > li:hover > a > span,
				.nav-sticky .wsmenu-list > li > a:hover > span{
					background-color: '. esc_html($sticky_menu_background_color_hover) .';
		        }';  
	        }
	               
	        if($menu_button_overlay_effect=="enabled"){
		        $custom_css .= '
		        .nav-sticky .wsmenu-list.menu-btn-animated > li > a > span > span.btn-overlay{
					background-color: '. esc_html($sticky_menu_background_color_hover) .';
		        }';
	        }
		
	       if($menu_button_border=="enabled"){
		        $custom_css .= '
		        .nav-sticky .wsmenu-list > li > a > span:before{
		        	border-color: '. esc_html($sticky_border_color) .';
		        }';
		        $custom_css .= '
		        .nav-sticky .wsmenu-list > li.current_page_parent > a > span:before,
		        .nav-sticky .wsmenu-list > li.current-menu-ancestor > a > span:before,
		        .nav-sticky .wsmenu-list > li.current-menu-parent > a > span:before,
		        .nav-sticky .wsmenu-list > li.current_page_ancestor > a > span:before,    
		        
		        .nav-sticky .wsmenu-list > li.current-menu-item > a > span:before,
				.nav-sticky .wsmenu-list > li:hover > a > span:before,
				.nav-sticky .wsmenu-list > li > a:hover > span:before,
				.nav-sticky .wsmenu-list > li > a.active > span:before{
					border-color: '. esc_html($sticky_border_color_hover) .';
		        }';
	        }
			
		}

		//-----------------
        if($menu_dropdown_border_switch=="enabled"){
	        $custom_css .= '
	        .nav-submenu-type-1 .wsmenu-submenu-sub-sub:after,
			.nav-submenu-type-1 .wsmenu-submenu-sub:after,
			.nav-submenu-type-1 .wsmenu-submenu:after{
	        	background-color: '. esc_html($menu_dropdown_border_color) .';
	        }';
	        $custom_css .= '
	        .nav-megamenu-type-1 .megamenu{
	        	border-color: '. esc_html($menu_dropdown_border_color) .';
	        }';
        }
        
        if($dropdown_font){
        
			$current_style = $dropdown_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($dropdown_font['style']){
				$font_style  = 'font-style: '. $dropdown_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($dropdown_font['weight']){
				$font_weight  = 'font-weight: '. $dropdown_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .nav-megamenu-type-1 .megamenu .link-list li.menu-item a,
	        .nav-submenu-type-1 .wsmenu-submenu li a{
	            font-family: '. esc_html($dropdown_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($dropdown_font['size']) .'px;
	            line-height: '. esc_html($dropdown_font['line-height']) .';
	            letter-spacing: '. esc_html($dropdown_font['letter-spacing']) .'px;
	            color: '. esc_html($dropdown_color) .';
	        }';
        }
        
        $custom_css .= '
        .nav-megamenu-type-1 .megamenu .link-list li.menu-item a .menu-item-textWrap:after,
		.nav-submenu-type-1 .wsmenu-submenu li a .menu-item-textWrap:after{
        	background-color: '. esc_html($dropdown_color_hover) .';
        }';

        $custom_css .= '
        .nav-megamenu-type-1 .megamenu .link-list li.menu-item a:active,
        .nav-megamenu-type-1 .megamenu .link-list li.menu-item a:hover,
        .nav-submenu-type-1 .wsmenu-submenu li a.active,
		.nav-submenu-type-1 .wsmenu-submenu li a:hover{
        	color: '. esc_html($dropdown_color_hover) .';
        }';
        
        if($dropdown_title_font){
        
			$current_style = $dropdown_title_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($dropdown_title_font['style']){
				$font_style  = 'font-style: '. $dropdown_title_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($dropdown_title_font['weight']){
				$font_weight  = 'font-weight: '. $dropdown_title_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .nav-megamenu-type-1 .megamenu li.title{
	            font-family: '. esc_html($dropdown_title_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($dropdown_title_font['size']) .'px;
	            letter-spacing: '. esc_html($dropdown_title_font['letter-spacing']) .'px;
	            color: '. esc_html($dropdown_title_font['color']) .';
	        }';
        }
        
        //-----------------
        if($search_form_visibility=='enabled'){
	        $custom_css .= '
	        .search-container{
	        	margin-top: '. esc_html($search_btn_container_margin_top) .'px;
	        	margin-right: '. esc_html($search_btn_container_margin_right) .'px;
	        	margin-bottom: '. esc_html($search_btn_container_margin_bottom) .'px;
	            margin-left: '. esc_html($search_btn_container_margin_left) .'px;
	        }';
	        
	        if($search_btn_sepline=='enabled'){
		        $custom_css .= '
			    .search-container:before{
				    position: absolute;
				    top: 5px;
				    left: 0;
				    width: 1px;
				    height: 40px;
				    background-color: '. esc_html($search_btn_sepline_color) .';
				    content: "";
		        }';
	        }
	        
	        $custom_css .= '
		    .search-btn{
	        	margin-right: '. esc_html($search_btn_margin_right) .'px;
	            margin-left: '. esc_html($search_btn_margin_left) .'px;
	        }';
	        
	        $custom_css .= '
		    .search-btn > div{
	        	width: '. esc_html($search_btn_width) .'px;
	        	color: '. esc_html($search_btn_color) .';
	        	background-color: '. esc_html($search_btn_background) .';
	        }';
	        
	        $custom_css .= '
		    .search-btn:hover > div{
	        	color: '. esc_html($search_btn_color_hover) .';
	        	background-color: '. esc_html($search_btn_background_hover) .';
	        }';
	        
	        $custom_css .= '
		    .search-btn i{
	        	font-size: '. esc_html($search_btn_icon_size) .'px;
	        }';
	        
	        if($search_button_border=='enabled'){
		        $custom_css .= '
		        .search-btn > div:before{
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					content: "";
		            border-width: '. esc_html($search_border_weight) .'px;
		            border-color: '. esc_html($search_border_color) .';
		            border-style: solid;
		        }';
		        $custom_css .= '
		        .search-btn:hover > div:before{
		            border-color: '. esc_html($search_border_color_hover) .';
		        }';
	        }
	        
	        if($search_form_sticky_menu_styles=='enabled'){
	        
		        $custom_css .= '
		        .nav-sticky .search-container{
		        	margin-top: '. esc_html($sticky_search_btn_container_margin_top) .'px;
		        	margin-bottom: '. esc_html($sticky_search_btn_container_margin_bottom) .'px;
		        }';
		        
		        if($search_btn_sepline=='enabled'){
			        $custom_css .= '
				    .nav-sticky .search-container:before{
					    background-color: '. esc_html($sticky_search_btn_sepline_color) .';
			        }';
		        }
	        
		        $custom_css .= '
			    .nav-sticky .search-btn > div{
		        	color: '. esc_html($sticky_search_btn_color) .';
		        	background-color: '. esc_html($sticky_search_btn_background) .';
		        }';
		        
		        $custom_css .= '
			    .nav-sticky .search-btn:hover > div{
		        	color: '. esc_html($sticky_search_btn_color_hover) .';
		        	background-color: '. esc_html($sticky_search_btn_background_hover) .';
		        }';
	        
		        if($search_button_border=='enabled'){
			        $custom_css .= '
			        .nav-sticky .search-btn > div:before{
			            border-color: '. esc_html($sticky_search_border_color) .';
			        }';
			        $custom_css .= '
			        .nav-sticky .search-btn:hover > div:before{
			            border-color: '. esc_html($sticky_search_border_color_hover) .';
			        }';
		        }
		        
	        }
	        
        }
                
        //-----------------
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() ) {
        if( $shopping_cart_visibility == "enabled" ) {
        
	        $custom_css .= '
	        .shopping-cart-container{
	        	margin-top: '. esc_html($shopping_cart_btn_container_margin_top) .'px;
	        	margin-right: '. esc_html($shopping_cart_btn_container_margin_right) .'px;
	        	margin-bottom: '. esc_html($shopping_cart_btn_container_margin_bottom) .'px;
	            margin-left: '. esc_html($shopping_cart_btn_container_margin_left) .'px;
	        }';
	        
	        if($shopping_sepline_switch=='enabled'){
		        $custom_css .= '
			    .shopping-cart-container:before{
				    position: absolute;
				    top: 5px;
				    left: 0;
				    width: 1px;
				    height: 40px;
				    background-color: '. esc_html($shopping_cart_btn_sepline_color) .';
				    content: "";
		        }';
	        }
	        
	        $custom_css .= '
		    .shopping-cart-btn-wrap{
	        	margin-right: '. esc_html($shopping_cart_btn_margin_right) .'px;
	            margin-left: '. esc_html($shopping_cart_btn_margin_left) .'px;
	            padding-bottom: '. esc_html($shopping_cart_btn_padding_bottom) .'px;
	        }';
	        
	        $custom_css .= '
		    .shopping-cart-btn-content{
	        	width: '. esc_html($shopping_cart_btn_width) .'px;
	        	color: '. esc_html($shopping_cart_btn_color) .';
	        	background-color: '. esc_html($shopping_cart_btn_background) .';
	        }';
	        
	        $custom_css .= '
		    .shopping-cart-btn-wrap:hover .shopping-cart-btn-content{
	        	color: '. esc_html($shopping_cart_btn_color_hover) .';
	        	background-color: '. esc_html($shopping_cart_btn_background_hover) .';
	        }';
	        
	        if($shopping_cart_button_border_switch=='enabled'){
		        $custom_css .= '
		        .shopping-cart-btn-content:before{
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					content: "";
		            border-width: '. esc_html($shopping_cart_border_weight) .'px;
		            border-color: '. esc_html($shopping_cart_border_color) .';
		            border-style: solid;
		        }';
		        $custom_css .= '
		        .shopping-cart-btn-wrap:hover .shopping-cart-btn-content:before{
		            border-color: '. esc_html($shopping_cart_border_color_hover) .';
		        }';
	        }
	        
	        if($shopping_cart_alternative=='enabled'){
		        
		        $custom_css .= '
			    .shopping-cart-btn.shopping-cart-btn-type-1 .count{
		        	color: '. esc_html($shopping_cart_btn_counter_color) .';
		        	background-color: '. esc_html($shopping_cart_btn_counter_bg) .';
		        }';
		        
		        $custom_css .= '
			    .shopping-cart-btn-wrap:hover .shopping-cart-btn.shopping-cart-btn-type-1 .count{
		        	color: '. esc_html($shopping_cart_btn_counter_color_hover) .';
		        	background-color: '. esc_html($shopping_cart_btn_counter_bg_hover) .';
		        }';
	        }
	        
	        if($shopping_cart_sticky_menu_styles=='enabled'){
	        
		        $custom_css .= '
		        .nav-sticky .shopping-cart-container{
		        	margin-top: '. esc_html($sticky_shopping_cart_btn_container_margin_top) .'px;
		        	margin-bottom: '. esc_html($sticky_shopping_cart_btn_container_margin_bottom) .'px;
		        }';
		        
		        $custom_css .= '
			    .nav-sticky .shopping-cart-btn-wrap{
		            padding-bottom: '. esc_html($sticky_shopping_cart_btn_padding_bottom) .'px;
		        }';
		        
		        if($shopping_sepline_switch=='enabled'){
			        $custom_css .= '
				    .nav-sticky .shopping-cart-container:before{
					    background-color: '. esc_html($sticky_shopping_cart_btn_sepline_color) .';
			        }';
		        }
	        
		        $custom_css .= '
			    .nav-sticky .shopping-cart-btn-content{
		        	color: '. esc_html($sticky_shopping_cart_btn_color) .';
		        	background-color: '. esc_html($sticky_shopping_cart_btn_background) .';
		        }';
		        
		        $custom_css .= '
			    .nav-sticky .shopping-cart-btn-wrap:hover .shopping-cart-btn-content{
		        	color: '. esc_html($sticky_shopping_cart_btn_color_hover) .';
		        	background-color: '. esc_html($sticky_shopping_cart_btn_background_hover) .';
		        }';
		       
		        if($shopping_cart_button_border_switch=='enabled'){
			        $custom_css .= '
			        .nav-sticky .shopping-cart-btn-content:before{
			            border-color: '. esc_html($sticky_shopping_cart_border_color) .';
			        }';
			        $custom_css .= '
			        .nav-sticky .shopping-cart-btn-wrap:hover .shopping-cart-btn-content:before{
			            border-color: '. esc_html($sticky_shopping_cart_border_color_hover) .';
			        }';
		        }
		        
		        if($shopping_cart_alternative=='enabled'){
			        
			        $custom_css .= '
				    .nav-sticky .shopping-cart-btn.shopping-cart-btn-type-1 .count{
			        	color: '. esc_html($sticky_shopping_cart_btn_counter_color) .';
			        	background-color: '. esc_html($sticky_shopping_cart_btn_counter_bg) .';
			        }';
			        
			        $custom_css .= '
				    .nav-sticky .shopping-cart-btn-wrap:hover .shopping-cart-btn.shopping-cart-btn-type-1 .count{
			        	color: '. esc_html($sticky_shopping_cart_btn_counter_color_hover) .';
			        	background-color: '. esc_html($sticky_shopping_cart_btn_counter_bg_hover) .';
			        }';
		        }
		        
	        }
	       
	    }
	    
		}
		
        //-----------------
        if($msg_container_visibility=="enabled"){
	       
	        $custom_css .= '
	        .message-container{
	        	margin-top: '. esc_html($msg_container_margin_top) .'px;
	        	margin-right: '. esc_html($msg_container_margin_right) .'px;
	        	margin-bottom: '. esc_html($msg_container_margin_bottom) .'px;
	            margin-left: '. esc_html($msg_container_margin_left) .'px;
	        }';
	        
	        if($msg_container_sepline=='enabled'){
		        $custom_css .= '
			    .message-container:before{
				    position: absolute;
				    top: 5px;
				    left: 0;
				    width: 1px;
				    height: 40px;
				    background-color: '. esc_html($msg_container_sepline_color) .';
				    content: "";
		        }';
	        } 
	        
	        $custom_css .= '
	        .message-container-wrap{
	        	margin-right: '. esc_html($msg_block_margin_right) .'px;
	            margin-left: '. esc_html($msg_block_margin_left) .'px;
	        }';
	        
	        if($msg_block_text){
	        
				$current_style = $msg_block_text['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($msg_block_text['style']){
					$font_style  = 'font-style: '. $msg_block_text['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($msg_block_text['weight']){
					$font_weight  = 'font-weight: '. $msg_block_text['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}

		        $custom_css .= '
		        .message-block{
		            font-family: '. esc_html($msg_block_text['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($msg_block_text['size']) .'px;
		            letter-spacing: '. esc_html($body_font['letter-spacing']) .'px;
		            color: '. esc_html($msg_block_text['color']) .';
		        	padding-right: '. esc_html($msg_block_padding_right) .'px;
		            padding-left: '. esc_html($msg_block_padding_left) .'px;
		            background-color: '. esc_html($msg_block_background) .';
		            
		        }';
		        
	        }
	        
	        if($msg_block_sticky_menu_styles=="enabled"){
		        $custom_css .= '
		        .nav-sticky .message-container{
		        	margin-top: '. esc_html($sticky_msg_container_margin_top) .'px;
		        	margin-bottom: '. esc_html($sticky_msg_container_margin_bottom) .'px;
		        }';
		        
		        if($msg_container_sepline=='enabled'){
			        $custom_css .= '
				    .nav-sticky .message-container:before{
					    background-color: '. esc_html($sticky_msg_container_sepline_color) .';
			        }';
		        } 
		        
		        $custom_css .= '
		        .nav-sticky .message-block{
		            color: '. esc_html($sticky_msg_block_text_color) .';
		            background-color: '. esc_html($sticky_msg_block_background) .';
		            
		        }';
	        }
	        
        }
        
        
        //-----------------
		if($wpml_container_switch=="enabled"){
	        $custom_css .= '
	        .wpml-container{
	        	margin-top: '. esc_html($wpml_container_margin_top) .'px;
	        	margin-right: '. esc_html($wpml_container_margin_right) .'px;
	        	margin-bottom: '. esc_html($wpml_container_margin_bottom) .'px;
	            margin-left: '. esc_html($wpml_container_margin_left) .'px;
	        }';
	        
	        if($wpml_btn_sepline=='enabled'){
		        $custom_css .= '
			    .wpml-container:before{
				    position: absolute;
				    top: 5px;
				    left: 0;
				    width: 1px;
				    height: 40px;
				    background-color: '. esc_html($wpml_btn_sepline_color) .';
				    content: "";
		        }';
	        } 
	        
	        $custom_css .= '
	        .wpml-btn-wrap{
	        	margin-right: '. esc_html($wpml_btn_margin_right) .'px;
	            margin-left: '. esc_html($wpml_btn_margin_left) .'px;
	            padding-bottom: '. esc_html($wpml_btn_padding_bottom) .'px;
	        }';
	        
	        $custom_css .= '
	        .wpml-btn{
	        	color: '. esc_html($wpml_btn_color) .';
	        	width: '. esc_html($wpml_btn_width) .'px;
	            background-color: '. esc_html($wpml_btn_background) .';
	        }';
	        
	        $custom_css .= '
	        .wpml-btn-wrap:hover .wpml-btn{
	        	color: '. esc_html($wpml_btn_color_hover) .';
	            background-color: '. esc_html($wpml_btn_background_hover) .';
	        }';
	        
	        if($wpml_button_border_switch=='enabled'){
		        $custom_css .= '
		        .wpml-btn:before{
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					content: "";
		            border-width: '. esc_html($wpml_border_weight) .'px;
		            border-color: '. esc_html($wpml_border_color) .';
		            border-style: solid;
		        }';
		        $custom_css .= '
		        .wpml-btn-wrap:hover .wpml-btn:before{
		            border-color: '. esc_html($wpml_border_color_hover) .';
		        }';
	        }
	        
	        $custom_css .= '
	        .wpml-dropdown ul li a{
	        	color: '. esc_html($wpml_dropdown_text_color) .';
	        }';
	        
	        $custom_css .= '
	        .wpml-dropdown ul li a:hover{
	        	color: '. esc_html($wpml_dropdown_text_color_hover) .';
	        }';
	        
	        if($wpml_sticky_menu_styles=="enabled"){
	        
		        $custom_css .= '
		        .nav-sticky .wpml-container{
		        	margin-top: '. esc_html($sticky_wpml_container_margin_top) .'px;
		        	margin-bottom: '. esc_html($sticky_wpml_container_margin_bottom) .'px;
		        }';
		        
		        if($wpml_btn_sepline=='enabled'){
			        $custom_css .= '
				    .nav-sticky .wpml-container:before{
					    background-color: '. esc_html($sticky_wpml_btn_sepline_color) .';
			        }';
		        } 

		        $custom_css .= '
		        .nav-sticky .wpml-btn{
		        	color: '. esc_html($sticky_wpml_btn_color) .';
		            background-color: '. esc_html($sticky_wpml_btn_background) .';
		        }';
		        
		        $custom_css .= '
		        .nav-sticky .wpml-btn-wrap:hover .wpml-btn{
		        	color: '. esc_html($sticky_wpml_btn_color_hover) .';
		            background-color: '. esc_html($sticky_wpml_btn_background_hover) .';
		        }';
		        
		        if($wpml_button_border_switch=='enabled'){
			        $custom_css .= '
			        .nav-sticky .wpml-btn:before{
			            border-color: '. esc_html($sticky_wpml_border_color) .';
			        }';
			        $custom_css .= '
			        .nav-sticky .wpml-btn-wrap:hover .wpml-btn:before{
			            border-color: '. esc_html($sticky_wpml_border_color_hover) .';
			        }';
		        } 
		        
	        }
	  
	        
        }        
        }       
        // Header Elements END
                
        // Header Social Media
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		if(($forrst_switch=='enabled')||($dribbble_switch=='enabled')||($flickr_switch=='enabled')||($twitter_switch=='enabled')||($facebook_switch=='enabled')||($skype_switch=='enabled')||($digg_switch=='enabled')||($google_switch=='enabled')||($html5_switch=='enabled')||($linkedin_switch=='enabled')||($lastfm_switch=='enabled')||($vimeo_switch=='enabled')||($yahoo_switch=='enabled')||($tumblr_switch=='enabled')||($apple_switch=='enabled')||($windows_switch=='enabled')||($youtube_switch=='enabled')||($delicious_switch=='enabled')||($rss_switch=='enabled')||($picasa_switch=='enabled')||($deviantart_switch=='enabled')||($whatsapp_switch=='enabled')||($snapchat_switch=='enabled')||($blogger_switch=='enabled')||($wordpress_switch=='enabled')||($amazon_switch=='enabled')||($appstore_switch=='enabled')||($paypal_switch=='enabled')||($myspace_switch=='enabled')||($dropbox_switch=='enabled')||($windows8_switch=='enabled')||($pinterest_switch=='enabled')||($soundcloud_switch=='enabled')||($google_drive_switch=='enabled')||($android_switch=='enabled')||($behance_switch=='enabled')||($instagram_switch=='enabled')||($ebay_switch=='enabled')||($google_plus_switch=='enabled')||($github_switch=='enabled')||($stackoverflow_switch=='enabled')||($visa_switch=='enabled')||($mastercard_switch=='enabled')||($amex_switch=='enabled')||($ios_switch=='enabled')||($osx_switch=='enabled')||($evernote_switch=='enabled')||($yelp_switch=='enabled')||($yelp2_switch=='enabled')||($medium_switch=='enabled')||($slack_switch=='enabled')||($vine_switch=='enabled')||($edge_switch=='enabled')||($outlook_switch=='enabled')||($pencilcase_switch=='enabled')||($play_switch=='enabled')||($icloud_switch=='enabled')
		){
	        $custom_css .= '
		    .social-container .social-icons-container > ul > li > a{
	        	background-color: '. esc_html($social_media_btn_background) .';
	        	color: '. esc_html($social_media_btn_color) .';
	        }';
	
	        $custom_css .= '
		    .social-container .social-icons-container > ul > li > a span.bg-overlay{
	        	background-color: '. esc_html($social_media_btn_background_hover) .';
	        }';
	        
	        $custom_css .= '
		    .social-container .social-icons-container > ul > li > a .tooltip-container{
	        	background-color: '. esc_html($social_media_tooltip_bg) .';
	        }';
	        
	        $custom_css .= '
		    .social-container .social-icons-container > ul > li > a .tooltip-container:after{
	        	border-left-color: '. esc_html($social_media_tooltip_bg) .';
	        }';
	        
	        $custom_css .= '
		    .social-container{
	        	margin-top: '. esc_html($social_media_container_margin_top) .'px;
	        	margin-right: '. esc_html($social_media_container_margin_right) .'px;
	        	margin-bottom: '. esc_html($social_media_container_margin_bottom) .'px;
	            margin-left: '. esc_html($social_media_container_margin_left) .'px;
	        }';
	        
	        if($social_media_sepline=='enabled'){
		        $custom_css .= '
			    .social-container:before{
				    position: absolute;
				    top: 5px;
				    left: 0;
				    width: 1px;
				    height: 40px;
				    background-color: '. esc_html($social_media_sepline_color) .';
				    content: "";
		        }';
	        }
	        
	        $custom_css .= '
		    .social-container .social-icons-container{
	        	margin-right: '. esc_html($social_media_margin_right) .'px;
	            margin-left: '. esc_html($social_media_margin_left) .'px;
	        }';
	        
	        if($social_media_sticky_menu_styles=='enabled'){
		        $custom_css .= '
			    .nav-sticky .social-container .social-icons-container > ul > li > a{
		        	background-color: '. esc_html($sticky_social_media_btn_background) .';
		        	color: '. esc_html($sticky_social_media_btn_color) .';
		        }';
		
		        $custom_css .= '
			    .nav-sticky .social-container .social-icons-container > ul > li > a span.bg-overlay{
		        	background-color: '. esc_html($sticky_social_media_btn_background_hover) .';
		        }';
		        
		        $custom_css .= '
			    .nav-sticky .social-container{
		        	margin-top: '. esc_html($sticky_social_media_container_margin_top) .'px;
		        	margin-bottom: '. esc_html($sticky_social_media_container_margin_bottom) .'px;
		        }';
		        
		        if($social_media_sepline=='enabled'){
			        $custom_css .= '
				    .nav-sticky .social-container:before{
					    background-color: '. esc_html($sticky_social_media_sepline_color) .';
			        }';
		        }
	        }
	        
        }
        }
        // Header Social Media END
        
        // Header Title
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        if($header_title){
			
			$current_style = $header_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($header_title['style']){
				$font_style  = 'font-style: '. $header_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($header_title['weight']){
				$font_weight  = 'font-weight: '. $header_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
 
	        $custom_css .= '
	        #title .title h2{
	        	font-family: '. esc_html($header_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($header_title['size']) .'px;
	        	letter-spacing: '. esc_html($header_title['letter-spacing']) .'px;
	            color: '. esc_html($header_title['color']) .';
	        }';
        }
        
        if($header_subtitle){
			
			$current_style = $header_subtitle['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($header_subtitle['style']){
				$font_style  = 'font-style: '. $header_subtitle['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($header_subtitle['weight']){
				$font_weight  = 'font-weight: '. $header_subtitle['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}

	        $custom_css .= '
	        #title .subtitle{
	        	font-family: '. esc_html($header_subtitle['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($header_subtitle['size']) .'px;
	        	letter-spacing: '. esc_html($header_subtitle['letter-spacing']) .'px;
	            color: '. esc_html($header_subtitle['color']) .';
	        }';
        }
        
        if($breadcrumb){
			
			$current_style = $breadcrumb['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($breadcrumb['style']){
				$font_style  = 'font-style: '. $breadcrumb['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($breadcrumb['weight']){
				$font_weight  = 'font-weight: '. $breadcrumb['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}

	        $custom_css .= '
	        .breadcrumb ul{
	        	font-family: '. esc_html($breadcrumb['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	        	font-size: '. esc_html($breadcrumb['size']) .'px;
	        	letter-spacing: '. esc_html($breadcrumb['letter-spacing']) .'px;
	            color: '. esc_html($breadcrumb_primary_font_color) .';
	            background-color: '. esc_html($breadcrumb_primary_color) .';
	        }';
        }
        
        if($breadcrumb_secondary_font_color){
	        $custom_css .= '
	        .breadcrumb li.parent a{
	            color: '. esc_html($breadcrumb_secondary_font_color) .';
	        }';
        }
        
        if($breadcrumb_secondary_color){
	        $custom_css .= '
	        .breadcrumb li.parent{
	            background-color: '. esc_html($breadcrumb_secondary_color) .';
	        }
	        .breadcrumb li.parent.last-parent:after{
	        	border-left-color: '. esc_html($breadcrumb_secondary_color) .';
	        }';
        }
        }
        // Header Title END
        
        // Footer Options
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        if($footer_switch=='enabled'){
        
	        if($footer_font){
	        
				$current_style = $footer_font['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($footer_font['style']){
					$font_style  = 'font-style: '. $footer_font['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($footer_font['weight']){
					$font_weight  = 'font-weight: '. $footer_font['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        #footer{
		            font-family: '. esc_html($footer_font['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($footer_font['size']) .'px;
		            letter-spacing: '. esc_html($footer_font['letter-spacing']) .'px;
		        	color: '. esc_html($footer_font_color) .';
		        }';
	        }
	        
	        $custom_css .= '
	        #footer a{
	        	color: '. esc_html($footer_link_color) .';
	        }';
	        
	        $custom_css .= '
	        #footer a:hover{
	        	color: '. esc_html($footer_link_hover_color) .';
	        }';
	        
	        $custom_css .= '
	        #footer .middle-section{
	        	padding-top: '. esc_html($footer_padding_top) .'px;
	        	padding-bottom: '. esc_html($footer_padding_bottom) .'px;
	        }';
	        
	        if(($footer_background_type=='background_image')&&$footer_background_image){
		        $custom_css .= '
		        #footer{
		        	background-color: '. esc_html($footer_background_image_color) .';
		        	background-image: url('. esc_html($footer_background_image) .');
		        }';
	        }else{
		        $custom_css .= '
		        #footer{
		        	background-color: '. esc_html($footer_background_color) .';
		        }';
	        }
	        
        }
        }
        // Footer Options END   
        
        // Footer Bottom
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        if($footer_bottom_switch=='enabled'){
        
	        if($footer_bottom_font){
	        
				$current_style = $footer_bottom_font['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($footer_bottom_font['style']){
					$font_style  = 'font-style: '. $footer_bottom_font['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($footer_bottom_font['weight']){
					$font_weight  = 'font-weight: '. $footer_bottom_font['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        #footer .bottom-section{
		            font-family: '. esc_html($footer_bottom_font['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($footer_bottom_font['size']) .'px;
		            letter-spacing: '. esc_html($footer_bottom_font['letter-spacing']) .'px;
		        	background-color: '. esc_html($footer_bottom_color) .';
		        	color: '. esc_html($footer_bottom_font_color) .';
		        	padding-top: '. esc_html($footer_bottom_padding_top) .'px;
		        	padding-bottom: '. esc_html($footer_bottom_padding_bottom) .'px;
		        }';
	        }
	        
	        $custom_css .= '
	        #footer .bottom-section a{
	        	color: '. esc_html($footer_bottom_link_color) .';
	        }';
	        
	        $custom_css .= '
	        #footer .bottom-section a:hover{
	        	color: '. esc_html($footer_bottom_link_hover_color) .';
	        }';

	        
        }
        }
        // Footer Bottom END 
          
		// Footer Widget
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        if($footer_widget_title){
        
			$current_style = $footer_widget_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($footer_widget_title['style']){
				$font_style  = 'font-style: '. $footer_widget_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($footer_widget_title['weight']){
				$font_weight  = 'font-weight: '. $footer_widget_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        #footer .widget-title{
	            font-family: '. esc_html($footer_widget_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($footer_widget_title['size']) .'px;
	            letter-spacing: '. esc_html($footer_widget_title['letter-spacing']) .'px;
	            color: '. esc_html($footer_widget_title_color) .';
	        }';
        }
		
        $custom_css .= '
        #footer .tagcloud a,
        #footer .widget ul > li > a{
        	color: '. esc_html($footer_widget_list_link_color) .';
        }';
        
        $custom_css .= '
        #footer .tagcloud a:hover,
        #footer .widget ul > li > a:hover{
        	color: '. esc_html($footer_widget_list_link_hover_color) .';
        }';
        
        $custom_css .= '
        #footer .widget_search form.search-form button#search-submit{
        	background-color: '. esc_html($footer_search_widget_btn_color) .';
        }';
        
        $custom_css .= '
        #footer .widget_search form.search-form button#search-submit:before{
        	background-color: '. esc_html($footer_search_widget_btn_hover_color) .';
        }';
        }
        // Footer Widget END

        // Blog Options
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        $custom_css .= '
        .front-blog-post .post a{
        	color: '. esc_html($blog_post_link_color) .';
        }';
        $custom_css .= '
        .front-blog-post .post a:hover{
        	color: '. esc_html($blog_post_hover_color) .';
        }';
        $custom_css .= '
        .front-blog-post .post-title > span{
        	background-color: '. esc_html($blog_post_link_color) .';
        }';
        if($blog_post_title){
        
			$current_style = $blog_post_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($blog_post_title['style']){
				$font_style  = 'font-style: '. $blog_post_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($blog_post_title['weight']){
				$font_weight  = 'font-weight: '. $blog_post_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .front-blog-post .post-title > h3{
	            font-family: '. esc_html($blog_post_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($blog_post_title['size']) .'px;
	            letter-spacing: '. esc_html($blog_post_title['letter-spacing']) .'px;
	            color: '. esc_html($blog_post_title['color']) .';
	        }';
        }
        $custom_css .= '
        .front-blog-post .post-title > h3 a{
        	color: '. esc_html($blog_post_title_link_color) .';
        }';
        $custom_css .= '
        .front-blog-post .post-title > h3 a:hover{
        	color: '. esc_html($blog_post_title_hover_link_color) .';
        }';
        $custom_css .= '
        .front-blog-post .post-meta ul li .material-icons{
        	color: '. esc_html($blog_post_link_color) .';
        }';
        if($blog_post_meta_font){
        
			$current_style = $blog_post_meta_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($blog_post_meta_font['style']){
				$font_style  = 'font-style: '. $blog_post_meta_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($blog_post_meta_font['weight']){
				$font_weight  = 'font-weight: '. $blog_post_meta_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .front-blog-post .post-meta ul li a{
	            font-family: '. esc_html($blog_post_meta_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($blog_post_meta_font['size']) .'px;
	            letter-spacing: '. esc_html($blog_post_meta_font['letter-spacing']) .'px;
	        }';
        }
        if($more_btn_font){
        
			$current_style = $more_btn_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($more_btn_font['style']){
				$font_style  = 'font-style: '. $more_btn_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($more_btn_font['weight']){
				$font_weight  = 'font-weight: '. $more_btn_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .front-blog-post .post-content .more-link{
	            font-family: '. esc_html($more_btn_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($more_btn_font['size']) .'px;
	            letter-spacing: '. esc_html($more_btn_font['letter-spacing']) .'px;
	            color: '. esc_html($more_btn_link_color) .';
	        }';
        }
        $custom_css .= '
        .front-blog-post .post-content .more-link:hover{
        	color: '. esc_html($more_btn_hover_link_color) .';
        }';
        $custom_css .= '
        .front-blog-post .post .featured-image .hover-effect{
        	background-color: '. esc_html($thumbnail_overlay_bg) .';
        }';
        $custom_css .= '
        .front-blog-post .post .featured-image .hover-effect-btn{
        	background-color: '. esc_html($thumbnail_overlay_btn) .';
        }';
        $custom_css .= '
        .front-blog-post .post .featured-image .hover-effect-btn:hover{
        	background-color: '. esc_html($thumbnail_overlay_btn_hover) .';
        }';
		}
        // Blog Options END

        // Post Options
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        $custom_css .= '
        .inner-blog-post a{
        	color: '. esc_html($post_link_color) .';
        }';
        $custom_css .= '
        .inner-blog-post a:hover{
        	color: '. esc_html($post_link_hover_color) .';
        }';
        $custom_css .= '
        .inner-blog-post .post-meta ul li .material-icons{
        	color: '. esc_html($post_link_color) .';
        }';
        if($post_meta_font){
        
			$current_style = $post_meta_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($post_meta_font['style']){
				$font_style  = 'font-style: '. $post_meta_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($post_meta_font['weight']){
				$font_weight  = 'font-weight: '. $post_meta_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-blog-post .post-meta ul li a{
	            font-family: '. esc_html($post_meta_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($post_meta_font['size']) .'px;
	            letter-spacing: '. esc_html($post_meta_font['letter-spacing']) .'px;
	        }';
        }
        }
        // Post Options END
        
        // Related Post Options
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        
        $custom_css .= '
        .gallery-item a:before{
        	background-color: '. esc_html($related_post_thumb_overlay_color) .';
        }';
        $custom_css .= '
        .gallery-item a .hover-effect-btn{
        	background-color: '. esc_html($related_post_thumb_btn_color) .';
        }';
        $custom_css .= '
        .gallery-item a .hover-effect-btn:hover{
        	background-color: '. esc_html($related_post_thumb_btn_hover_color) .';
        }';
        $custom_css .= '
        .related-post-container .featured-image:before{
        	background-color: '. esc_html($related_post_thumb_overlay_color) .';
        }';
        $custom_css .= '
        .related-post-container .featured-image .hover-effect-btn{
        	background-color: '. esc_html($related_post_thumb_btn_color) .';
        }';
        $custom_css .= '
        .related-post-container .featured-image .hover-effect-btn:hover{
        	background-color: '. esc_html($related_post_thumb_btn_hover_color) .';
        }';
        if($related_post_title){
        
			$current_style = $related_post_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($related_post_title['style']){
				$font_style  = 'font-style: '. $related_post_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($related_post_title['weight']){
				$font_weight  = 'font-weight: '. $related_post_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-blog-post .related-post-container-content h4 a{
	            font-family: '. esc_html($related_post_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($related_post_title['size']) .'px;
	            letter-spacing: '. esc_html($related_post_title['letter-spacing']) .'px;
	            color: '. esc_html($related_post_title_color) .';
	        }';
        }
        $custom_css .= '
        .inner-blog-post .related-post-container-content h4 a:hover{
        	color: '. esc_html($related_post_title_hover_color) .';
        }';
        if( $related_post_switch == "enabled" ){
        
			$current_style = $related_post_meta['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($related_post_meta['style']){
				$font_style  = 'font-style: '. $related_post_meta['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($related_post_meta['weight']){
				$font_weight  = 'font-weight: '. $related_post_meta['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-blog-post .related-post-container .related-post-container-meta a{
	            font-family: '. esc_html($related_post_meta['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($related_post_meta['size']) .'px;
	            letter-spacing: '. esc_html($related_post_meta['letter-spacing']) .'px;
	        }';
        }
        $custom_css .= '
        .inner-blog-post .related-post-container .related-post-container-meta .material-icons{
        	color: '. esc_html($post_link_color) .';
        }';
        }
        // Related Post Options END
        
        // Comments Options
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        $custom_css .= '
        .inner-comment-page .comments-area a{
        	color: '. esc_html($comment_link_color) .';
        }';
        $custom_css .= '
        .inner-comment-page .comments-area a:hover{
        	color: '. esc_html($comment_link_hover_color) .';
        }';
        $custom_css .= '
        .inner-comment-page .comments-area .comment-list .comment-meta ul li.author,
        .inner-comment-page .comments-area .comment-list .comment-meta ul li.author a{
        	color: '. esc_html($comment_link_color) .';
        }';
        $custom_css .= '
        .inner-comment-page .comments-area .comment-list .avatar-wrap > span{
        	background-color: '. esc_html($comment_link_color) .';
        }';
        $custom_css .= '
        .inner-comment-page .comments-area .comment-list .children .comment-wrap:before {
        	background-color: '. esc_html($comment_link_color) .';
        }';
        if($comment_author_font){
        
			$current_style = $comment_author_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($comment_author_font['style']){
				$font_style  = 'font-style: '. $comment_author_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($comment_author_font['weight']){
				$font_weight  = 'font-weight: '. $comment_author_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-comment-page .comments-area .comment-list .comment-meta ul li.author,
			.inner-comment-page .comments-area .comment-list .comment-meta ul li.author a{
	            font-family: '. esc_html($comment_author_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($comment_author_font['size']) .'px;
	            letter-spacing: '. esc_html($comment_author_font['letter-spacing']) .'px;
	        }';
        }
        if($comment_reply_font){
        
			$current_style = $comment_reply_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($comment_reply_font['style']){
				$font_style  = 'font-style: '. $comment_reply_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($comment_reply_font['weight']){
				$font_weight  = 'font-weight: '. $comment_reply_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-comment-page .comments-area .comment-list .comment-meta .reply a{
	            font-family: '. esc_html($comment_reply_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($comment_reply_font['size']) .'px;
	            letter-spacing: '. esc_html($comment_reply_font['letter-spacing']) .'px;
	        }';
        }
        $custom_css .= '
        .inner-comment-page .comments-area .comment-list .comment-meta .reply a{
        	background-color: '. esc_html($comment_reply_btn_color) .';
        }';
        $custom_css .= '
        .inner-comment-page .comments-area .comment-list .comment-meta .reply a:hover{
        	background-color: '. esc_html($comment_reply_btn_hover_color) .';
        }';
        if($comment_form_label_font){
        
			$current_style = $comment_form_label_font['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($comment_form_label_font['style']){
				$font_style  = 'font-style: '. $comment_form_label_font['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($comment_form_label_font['weight']){
				$font_weight  = 'font-weight: '. $comment_form_label_font['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-comment-page .comment-form label{
	            font-family: '. esc_html($comment_form_label_font['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($comment_form_label_font['size']) .'px;
	            letter-spacing: '. esc_html($comment_form_label_font['letter-spacing']) .'px;
	        }';
        }
        $custom_css .= '
        .inner-comment-page .comment-form label:before{
        	background-color: '. esc_html($comment_form_label_element_color) .';
        }';
        if($comment_form_btn_text){
        
			$current_style = $comment_form_btn_text['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($comment_form_btn_text['style']){
				$font_style  = 'font-style: '. $comment_form_btn_text['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($comment_form_btn_text['weight']){
				$font_weight  = 'font-weight: '. $comment_form_btn_text['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-comment-page .comment-form .lpd_t_btn{
	            font-family: '. esc_html($comment_form_btn_text['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($comment_form_btn_text['size']) .'px;
	            letter-spacing: '. esc_html($comment_form_btn_text['letter-spacing']) .'px;
				background-color: '. esc_html($comment_form_btn_background_color) .'; 
				color: '. esc_html($comment_form_btn_color) .';
	        }';
        }
        $custom_css .= '
        .inner-comment-page .comment-form .lpd_t_btn:hover,
        .inner-comment-page .comment-form .lpd_t_btn:active,
        .inner-comment-page .comment-form .lpd_t_btn:focus{
				background-color: '. esc_html($comment_form_btn_background_color_hover) .'; 
				color: '. esc_html($comment_form_btn_color_hover) .';
        }';
        }
        // Comments Options END
        
        // Portfolio Options
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
        if($portfolio_related_post_title){
        
			$current_style = $portfolio_related_post_title['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($portfolio_related_post_title['style']){
				$font_style  = 'font-style: '. $portfolio_related_post_title['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($portfolio_related_post_title['weight']){
				$font_weight  = 'font-weight: '. $portfolio_related_post_title['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-portfolio-post .related-post-container-content h4 a{
	            font-family: '. esc_html($portfolio_related_post_title['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($portfolio_related_post_title['size']) .'px;
	            letter-spacing: '. esc_html($portfolio_related_post_title['letter-spacing']) .'px;
	            color: '. esc_html($portfolio_related_post_title_color) .';
	        }';
        }
        $custom_css .= '
        .inner-portfolio-post .related-post-container-content h4 a:hover{
        	color: '. esc_html($portfolio_related_post_title_hover_color) .';
        }';
        if($portfolio_related_post_switch == "enabled"){
        
			$current_style = $portfolio_related_post_meta['variation'];

			if ( $current_style === 'regular' ) {
                $current_style = '400';
            }
            if ( $current_style == 'italic' ) {
                $current_style = '400italic';
            }
            
			if($portfolio_related_post_meta['style']){
				$font_style  = 'font-style: '. $portfolio_related_post_meta['style'] .';';
			}else{
				$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
			}
			
			if($portfolio_related_post_meta['weight']){
				$font_weight  = 'font-weight: '. $portfolio_related_post_meta['weight'] .';';
			}else{
				$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
			}
			
	        $custom_css .= '
	        .inner-portfolio-post .related-post-container .related-post-container-meta a{
	            font-family: '. esc_html($portfolio_related_post_meta['family']) .';
	        	'. esc_html($font_style) .'
	        	'. esc_html($font_weight) .'
	            font-size: '. esc_html($portfolio_related_post_meta['size']) .'px;
	            letter-spacing: '. esc_html($portfolio_related_post_meta['letter-spacing']) .'px;
	        }';
        }
        $custom_css .= '
        .inner-portfolio-post a{
        	color: '. esc_html($portfolio_link_color) .';
        }';
        $custom_css .= '
        .inner-portfolio-post a:hover{
        	color: '. esc_html($portfolio_link_hover_color) .';
        }';
        $custom_css .= '
        .inner-portfolio-post .related-post-container .related-post-container-meta .material-icons{
        	color: '. esc_html($portfolio_link_color) .';
        }';
        }
        // Portfolio Options END
        
        // Contact Options (primary)
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_contactform7_check() ) {
	        $custom_css .= '
			select.wpcf7-form-control,
			textarea.wpcf7-form-control,
			input[type="email"].wpcf7-form-control,
			input[type="date"].wpcf7-form-control,
			input[type="number"].wpcf7-form-control,
			input[type="tel"].wpcf7-form-control,
			input[type="url"].wpcf7-form-control,
			input[type="email"].wpcf7-form-control,
			input[type="text"].wpcf7-form-control{
				border-color: '. esc_html($contact_form_border_color) .';
				background-color: '. esc_html($contact_form_bg_color) .';
	        }';
	        $custom_css .= '
			select.wpcf7-form-control:focus,
			textarea.wpcf7-form-control:focus,
			input[type="email"].wpcf7-form-control:focus,
			input[type="date"].wpcf7-form-control:focus,
			input[type="number"].wpcf7-form-control:focus,
			input[type="tel"].wpcf7-form-control:focus,
			input[type="url"].wpcf7-form-control:focus,
			input[type="email"].wpcf7-form-control:focus,
			input[type="text"].wpcf7-form-control:focus{
				border-color: '. esc_html($contact_form_border_hover_color) .';
				background-color: '. esc_html($contact_form_bg_hover_color) .';
	        }';
	        if($contact_form_label_font){
	        
				$current_style = $contact_form_label_font['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($contact_form_label_font['style']){
					$font_style  = 'font-style: '. $contact_form_label_font['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($contact_form_label_font['weight']){
					$font_weight  = 'font-weight: '. $contact_form_label_font['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpcf7-form label.lpd_form_label{
		            font-family: '. esc_html($contact_form_label_font['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($contact_form_label_font['size']) .'px;
		            letter-spacing: '. esc_html($contact_form_label_font['letter-spacing']) .'px;
		            color: '.esc_html($contact_form_label_font_color).';
		        }';
	        }
	        $custom_css .= '
	        .wpcf7-form label.lpd_form_label:before{
	        	background-color: '. esc_html($contact_form_label_element_color) .';
	        }';
	        $custom_css .= '
			select.wpcf7-form-control,
			textarea.wpcf7-form-control,
			input[type="email"].wpcf7-form-control,
			input[type="date"].wpcf7-form-control,
			input[type="number"].wpcf7-form-control,
			input[type="tel"].wpcf7-form-control,
			input[type="url"].wpcf7-form-control,
			input[type="email"].wpcf7-form-control,
			input[type="text"].wpcf7-form-control{
	        	color: '. esc_html($contact_form_input_text_color) .';
	        }';
	        $custom_css .= '
			.wpcf7-form-control::-moz-placeholder,
			.wpcf7-form-control:-ms-input-placeholder,
			.wpcf7-form-control::-webkit-input-placeholder{
	        	color: '. esc_html($contact_form_placeholder_color) .';
	        }';
	        if($contact_form_btn_text){
	        
				$current_style = $contact_form_btn_text['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($contact_form_btn_text['style']){
					$font_style  = 'font-style: '. $contact_form_btn_text['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($contact_form_btn_text['weight']){
					$font_weight  = 'font-weight: '. $contact_form_btn_text['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        input.wpcf7-form-control[type="submit"]{
		            font-family: '. esc_html($contact_form_btn_text['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($contact_form_btn_text['size']) .'px;
		            letter-spacing: '. esc_html($contact_form_btn_text['letter-spacing']) .'px;
					background-color: '. esc_html($contact_form_btn_background_color) .'; 
					color: '. esc_html($contact_form_btn_color) .';
		        }';
	        }
	        $custom_css .= '
	        input.wpcf7-form-control[type="submit"]:hover,
			input.wpcf7-form-control[type="submit"]:active,
			input.wpcf7-form-control[type="submit"]:focus{
					background-color: '. esc_html($contact_form_btn_background_color_hover) .'; 
					color: '. esc_html($contact_form_btn_color_hover) .';
	        }';
        }
        // Contact Options (primary) END
        
        // Contact Options (secondary)
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_contactform7_check() ) {
	        $custom_css .= '
			.wpcf7-form.secondary-style select.wpcf7-form-control,
			.wpcf7-form.secondary-style textarea.wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="email"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="date"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="number"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="tel"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="url"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="email"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="text"].wpcf7-form-control{
				border-color: '. esc_html($contact_form_secondary_border_color) .';
				background-color: '. esc_html($contact_form_secondary_bg_color) .';
	        }';
	        $custom_css .= '
			.wpcf7-form.secondary-style select.wpcf7-form-control:focus,
			.wpcf7-form.secondary-style textarea.wpcf7-form-control:focus,
			.wpcf7-form.secondary-style input[type="email"].wpcf7-form-control:focus,
			.wpcf7-form.secondary-style input[type="date"].wpcf7-form-control:focus,
			.wpcf7-form.secondary-style input[type="number"].wpcf7-form-control:focus,
			.wpcf7-form.secondary-style input[type="tel"].wpcf7-form-control:focus,
			.wpcf7-form.secondary-style input[type="url"].wpcf7-form-control:focus,
			.wpcf7-form.secondary-style input[type="email"].wpcf7-form-control:focus,
			.wpcf7-form.secondary-style input[type="text"].wpcf7-form-control:focus{
				border-color: '. esc_html($contact_form_secondary_border_hover_color) .';
				background-color: '. esc_html($contact_form_secondary_bg_hover_color) .';
	        }';
	        if($contact_form_secondary_label_font){
	        
				$current_style = $contact_form_secondary_label_font['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($contact_form_secondary_label_font['style']){
					$font_style  = 'font-style: '. $contact_form_secondary_label_font['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($contact_form_secondary_label_font['weight']){
					$font_weight  = 'font-weight: '. $contact_form_secondary_label_font['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpcf7-form.secondary-style label.lpd_form_label{
		            font-family: '. esc_html($contact_form_secondary_label_font['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($contact_form_secondary_label_font['size']) .'px;
		            letter-spacing: '. esc_html($contact_form_secondary_label_font['letter-spacing']) .'px;
		            color: '. esc_html($contact_form_secondary_label_font_color).';
		        }';
	        }
	        $custom_css .= '
	        .wpcf7-form.secondary-style label.lpd_form_label:before{
	        	background-color: '. esc_html($contact_form_secondary_label_element_color) .';
	        }';
	        $custom_css .= '
			.wpcf7-form.secondary-style select.wpcf7-form-control,
			.wpcf7-form.secondary-style textarea.wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="email"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="date"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="number"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="tel"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="url"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="email"].wpcf7-form-control,
			.wpcf7-form.secondary-style input[type="text"].wpcf7-form-control{
	        	color: '. esc_html($contact_form_secondary_input_text_color) .';
	        }';
	        $custom_css .= '
			.wpcf7-form.secondary-style .wpcf7-form-control::-moz-placeholder,
			.wpcf7-form.secondary-style .wpcf7-form-control:-ms-input-placeholder,
			.wpcf7-form.secondary-style .wpcf7-form-control::-webkit-input-placeholder{
	        	color: '. esc_html($contact_form_secondary_placeholder_color) .';
	        }';
	        if($contact_form_secondary_btn_text){
	        
				$current_style = $contact_form_secondary_btn_text['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($contact_form_secondary_btn_text['style']){
					$font_style  = 'font-style: '. $contact_form_secondary_btn_text['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($contact_form_secondary_btn_text['weight']){
					$font_weight  = 'font-weight: '. $contact_form_secondary_btn_text['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpcf7-form.secondary-style input.wpcf7-form-control[type="submit"]{
		            font-family: '. esc_html($contact_form_secondary_btn_text['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($contact_form_secondary_btn_text['size']) .'px;
		            letter-spacing: '. esc_html($contact_form_secondary_btn_text['letter-spacing']) .'px;
					background-color: '. esc_html($contact_form_secondary_btn_background_color) .'; 
					color: '. esc_html($contact_form_secondary_btn_color) .';
		        }';
	        }
	        $custom_css .= '
	        .wpcf7-form.secondary-style input.wpcf7-form-control[type="submit"]:hover,
			.wpcf7-form.secondary-style input.wpcf7-form-control[type="submit"]:active,
			.wpcf7-form.secondary-style input.wpcf7-form-control[type="submit"]:focus{
					background-color: '. esc_html($contact_form_secondary_btn_background_color_hover) .'; 
					color: '. esc_html($contact_form_secondary_btn_color_hover) .';
	        }';
        }
        // Contact Options (secondary) END
        
        // Tables (primary)
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_vc_easytables_check() ) {
	        $custom_css .= '
	        .wpb_vc_table.primary-theme-style table tr{
	        	background-color: '. esc_html($vc_table_color_1) .';
	        }';
	        $custom_css .= '
	        .wpb_vc_table.primary-theme-style table tr:nth-child(2n+1){
	        	background-color: '. esc_html($vc_table_color_2) .';
	        }';
	        $custom_css .= '
	        .wpb_vc_table.primary-theme-style table tr .vc_table_cell{
	        	border-left-color: '. esc_html($vc_table_border_color) .';
	        }';
	        $custom_css .= '
	        .wpb_vc_table.primary-theme-style table tr.vc-th .vc_table_cell{
	        	border-bottom-color: '. esc_html($vc_table_border_color) .';
	        }';
	        if($vc_table_body){
	        
				$current_style = $vc_table_body['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($vc_table_body['style']){
					$font_style  = 'font-style: '. $vc_table_body['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($vc_table_body['weight']){
					$font_weight  = 'font-weight: '. $vc_table_body['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpb_vc_table.primary-theme-style table tr{
		            font-family: '. esc_html($vc_table_body['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($vc_table_body['size']) .'px;
		            letter-spacing: '. esc_html($vc_table_body['letter-spacing']) .'px;
		        }';
	        }
	        if($vc_table_heading){
	        
				$current_style = $vc_table_heading['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($vc_table_heading['style']){
					$font_style  = 'font-style: '. $vc_table_heading['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($vc_table_heading['weight']){
					$font_weight  = 'font-weight: '. $vc_table_heading['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpb_vc_table.primary-theme-style table tr.vc-th{
		            font-family: '. esc_html($vc_table_heading['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($vc_table_heading['size']) .'px;
		            letter-spacing: '. esc_html($vc_table_heading['letter-spacing']) .'px;
		        }';
	        }
	        if($vc_table_btn_text){
	        
				$current_style = $vc_table_btn_text['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($vc_table_btn_text['style']){
					$font_style  = 'font-style: '. $vc_table_btn_text['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($vc_table_btn_text['weight']){
					$font_weight  = 'font-weight: '. $vc_table_btn_text['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpb_vc_table .table_btn{
		            font-family: '. esc_html($vc_table_btn_text['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($vc_table_btn_text['size']) .'px;
		            letter-spacing: '. esc_html($vc_table_btn_text['letter-spacing']) .'px;
		            color: '. esc_html($vc_table_btn_color) .';
		            background-color: '. esc_html($vc_table_btn_background_color) .';
		        }';
		        
		        $custom_css .= '
		        .wpb_vc_table .table_btn:hover{
		            color: '. esc_html($vc_table_btn_color_hover) .';
		            background-color: '. esc_html($vc_table_btn_background_color_hover) .';
		        }';
		        
		        $custom_css .= '
		        .wpb_vc_table{
		            margin-bottom: '. esc_html($vc_table_margin_bottom) .'px !important;
		        }';
	        }
        }
        // Tables (primary) END
        
        // Tables (secondary)
        if( lpd_abcpersonal_helpers::lpd_abcpersonal_vc_easytables_check() ) {
	        $custom_css .= '
	        .wpb_vc_table.secondary-theme-style table tr{
	        	background-color: '. esc_html($vc_table_secondary_color_1) .';
	        }';
	        $custom_css .= '
	        .wpb_vc_table.secondary-theme-style table tr:nth-child(2n+1){
	        	background-color: '. esc_html($vc_table_secondary_color_2) .';
	        }';
	        $custom_css .= '
	        .wpb_vc_table.secondary-theme-style table tr .vc_table_cell{
	        	border-left-color: '. esc_html($vc_table_secondary_border_color) .';
	        }';
	        $custom_css .= '
	        .wpb_vc_table.secondary-theme-style table tr.vc-th .vc_table_cell{
	        	border-bottom-color: '. esc_html($vc_table_secondary_border_color) .';
	        }';
	        if($vc_table_secondary_body){
	        
				$current_style = $vc_table_secondary_body['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($vc_table_secondary_body['style']){
					$font_style  = 'font-style: '. $vc_table_secondary_body['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($vc_table_secondary_body['weight']){
					$font_weight  = 'font-weight: '. $vc_table_secondary_body['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpb_vc_table.secondary-theme-style table tr{
		            font-family: '. esc_html($vc_table_secondary_body['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($vc_table_secondary_body['size']) .'px;
		            letter-spacing: '. esc_html($vc_table_secondary_body['letter-spacing']) .'px;
		        }';
	        }
	        if($vc_table_secondary_heading){
	        
				$current_style = $vc_table_secondary_heading['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($vc_table_secondary_heading['style']){
					$font_style  = 'font-style: '. $vc_table_secondary_heading['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($vc_table_secondary_heading['weight']){
					$font_weight  = 'font-weight: '. $vc_table_secondary_heading['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpb_vc_table.secondary-theme-style table tr.vc-th{
		            font-family: '. esc_html($vc_table_secondary_heading['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($vc_table_secondary_heading['size']) .'px;
		            letter-spacing: '. esc_html($vc_table_secondary_heading['letter-spacing']) .'px;
		        }';
	        }
	        if($vc_table_secondary_btn_text){
	        
				$current_style = $vc_table_secondary_btn_text['variation'];
	
				if ( $current_style === 'regular' ) {
	                $current_style = '400';
	            }
	            if ( $current_style == 'italic' ) {
	                $current_style = '400italic';
	            }
	            
				if($vc_table_secondary_btn_text['style']){
					$font_style  = 'font-style: '. $vc_table_secondary_btn_text['style'] .';';
				}else{
					$font_style  = ( strpos( $current_style, 'italic' ) ) ? 'font-style: italic;' : 'font-style: normal;';
				}
				
				if($vc_table_secondary_btn_text['weight']){
					$font_weight  = 'font-weight: '. $vc_table_secondary_btn_text['weight'] .';';
				}else{
					$font_weight = 'font-weight: ' . intval( $current_style ) . ';';
				}
				
		        $custom_css .= '
		        .wpb_vc_table.secondary-theme-style .table_btn{
		            font-family: '. esc_html($vc_table_secondary_btn_text['family']) .';
		        	'. esc_html($font_style) .'
		        	'. esc_html($font_weight) .'
		            font-size: '. esc_html($vc_table_secondary_btn_text['size']) .'px;
		            letter-spacing: '. esc_html($vc_table_secondary_btn_text['letter-spacing']) .'px;
		            color: '. esc_html($vc_table_secondary_btn_color) .';
		            background-color: '. esc_html($vc_table_secondary_btn_background_color) .';
		        }';
		        
		        $custom_css .= '
		        .wpb_vc_table.secondary-theme-style .table_btn:hover{
		            color: '. esc_html($vc_table_secondary_btn_color_hover) .';
		            background-color: '. esc_html($vc_table_secondary_btn_background_color_hover) .';
		        }';
		        $custom_css .= '
		        .wpb_vc_table.secondary-theme-style{
		            margin-bottom: '. esc_html($vc_table_secondary_margin_bottom) .'px !important;
		        }';
	        }
        }
        // Tables (secondary) END


        wp_add_inline_style( 'lpd_abcpersonal_application', $custom_css );
        
	}
	
}



?>