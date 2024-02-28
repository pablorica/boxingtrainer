<?php
/**
 * List View Nav Template
 * This file loads the list view navigation.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/nav.php
 *
 * @package TribeEventsCalendar
 * @version 4.2
 *
 */
global $wp_query;

$events_label_plural = tribe_get_event_label_plural();

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<ul class="tribe-events-sub-nav">
	<!-- Left Navigation -->

	<?php if ( tribe_has_previous_event() ) : ?>
		<li class="<?php echo esc_attr( tribe_left_navigation_classes() ); ?>" aria-label="previous events link">
			<a href="<?php echo esc_url( tribe_get_listview_prev_link() ); ?>" rel="prev"><?php printf( '<i class="material-icons">&#xE5C4;</i> ' . esc_html__( 'Previous %s', 'lpd-abcpersonal' ), $events_label_plural ); ?></a>

		</li><!-- .tribe-events-nav-left -->
	<?php endif; ?>

	<!-- Right Navigation -->
	<?php if ( tribe_has_next_event() ) : ?>
		<li class="<?php echo esc_attr( tribe_right_navigation_classes() ); ?>" aria-label="next events link">
			<a href="<?php echo esc_url( tribe_get_listview_next_link() ); ?>" rel="next"><?php printf( esc_html__( 'Next %s', 'lpd-abcpersonal' ), $events_label_plural . ' <i class="material-icons">&#xE5C8;</i>' ); ?></a>
		</li><!-- .tribe-events-nav-right -->
	<?php endif; ?>
</ul>
