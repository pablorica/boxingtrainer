<?php	

class lpd_abcpersonal_tribe_calendar_functions {
	
		function __construct() {
		
			remove_action( 'tribe_events_after_footer', array( 'Tribe__Events__iCal' , 'maybe_add_link' ), 10, 1 );
			remove_action( 'tribe_events_single_event_after_the_content', array( 'Tribe__Events__iCal', 'single_event_links' ) );
			add_action( 'tribe_events_after_footer', array( $this , 'maybe_add_link' ), 10, 1 );
			add_action( 'tribe_events_single_event_after_the_content', array( $this , 'single_event_links' ));
			add_filter( 'tribe_events_the_previous_month_link', array( $this , 'tribe_events_the_previous_month_link' ) );
			add_filter( 'tribe_events_the_next_month_link', array( $this , 'tribe_events_the_next_month_link' ) );
		
		}

		function single_event_links() {
	
			// don't show on password protected posts
			if ( is_single() && post_password_required() ) {
				return;
			}
			echo '<div class="tribe-events-cal-links">';
			echo '<a class="tribe-events-gcal tribe-events-button lpd_t_btn lpd_t_btn-animated" href="' . Tribe__Events__Main::instance()->esc_gcal_url( tribe_get_gcal_link() ) . '" title="' . esc_attr__( 'Add to Google Calendar', 'lpd-abcpersonal' ) . '"><span>+ ' . esc_html__( 'Google Calendar', 'lpd-abcpersonal' ) . '</span></a>';
			echo '<a class="tribe-events-ical tribe-events-button lpd_t_btn lpd_t_btn-animated" href="' . esc_url( tribe_get_single_ical_link() ) . '" title="' . esc_attr__( 'Download .ics file', 'lpd-abcpersonal' ) . '" ><span>+ ' . esc_html__( 'iCal Export', 'lpd-abcpersonal' ) . '</span></a>';
			echo '</div><!-- .tribe-events-cal-links -->';
		}

		function maybe_add_link() {
			global $wp_query;
			$show_ical = apply_filters( 'tribe_events_list_show_ical_link', true );
		
			if ( ! $show_ical ) {
				return;
			}
			if ( tribe_is_month() && ! tribe_events_month_has_events() ) {
				return;
			}
			if ( is_single() || empty( $wp_query->posts ) ) {
				return;
			}
		
			$tec = Tribe__Events__Main::instance();
		
			$view = $tec->displaying;
			if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $wp_query->query_vars['eventDisplay'] ) ) {
				$view = $wp_query->query_vars['eventDisplay'];
			}
		
			switch ( strtolower( $view ) ) {
				case 'month':
					$modifier = sprintf( esc_html__( "Month's %s", 'lpd-abcpersonal' ), tribe_get_event_label_plural() );
					break;
				case 'week':
					$modifier = sprintf( esc_html__( "Week's %s", 'lpd-abcpersonal' ), tribe_get_event_label_plural() );
					break;
				case 'day':
					$modifier = sprintf( esc_html__( "Day's %s", 'lpd-abcpersonal' ), tribe_get_event_label_plural() );
					break;
				default:
					$modifier = sprintf( esc_html__( 'Listed %s', 'lpd-abcpersonal' ), tribe_get_event_label_plural() );
					break;
			}
		
			$text  = apply_filters( 'tribe_events_ical_export_text', esc_html__( 'Export', 'lpd-abcpersonal' ) . ' ' . $modifier );
			$title = esc_html__( 'Use this to share calendar data with Google Calendar, Apple iCal and other compatible apps', 'lpd-abcpersonal' );
			$ical  = '<a class="tribe-events-ical tribe-events-button lpd_t_btn lpd_t_btn-animated" title="' . $title . '" href="' . esc_url( tribe_get_ical_link() ) . '"><span>+ ' . $text . '</span></a>';
		
			echo $ical;
		}
		
		function tribe_events_the_previous_month_link() {
			$html = '';
			$url  = tribe_get_previous_month_link();
			$date = Tribe__Events__Main::instance()->previousMonth( tribe_get_month_view_date() );
			$earliest_event_date = tribe_events_earliest_date( Tribe__Date_Utils::DBYEARMONTHTIMEFORMAT );
		
			// Only form the link if a) we have a known earliest event date and b) the previous month date is the same or later
			if ( $earliest_event_date && $date >= $earliest_event_date ) {
				$text = tribe_get_previous_month_text();
				$html = '<a data-month="' . $date . '" href="' . esc_url( $url ) . '" rel="prev"><i class="material-icons">&#xE5C4;</i> ' . $text . ' </a>';
			}
			return $html;
		}
		
		function tribe_events_the_next_month_link() {
			$html = '';
			$url  = tribe_get_next_month_link();
			$text = tribe_get_next_month_text();
	
			// Check if $url is populated (an empty string may indicate the date was out-of-bounds, ie on 32bit servers)
			if ( ! empty( $url ) ) {
				$date = Tribe__Events__Main::instance()->nextMonth( tribe_get_month_view_date() );
				if ( $date <= tribe_events_latest_date( Tribe__Date_Utils::DBYEARMONTHTIMEFORMAT ) ) {
					$html = '<a data-month="' . $date . '" href="' . esc_url( $url ) . '" rel="next">' . $text . ' <i class="material-icons">&#xE5C8;</i></a>';
				}
			}
	
			return $html;
		}
	
}