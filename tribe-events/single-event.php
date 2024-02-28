<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

$set_venue_apart = apply_filters( 'tribe_events_single_event_the_meta_group_venue', false, get_the_ID() );

?>

<div id="tribe-events-content" class="tribe-events-single">

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<div class="tribe-events-schedule tribe-clearfix">
		<span class="tribe-events-schedule-icon"><i class="material-icons">&#xE916;</i></span>
		<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
		<?php if ( tribe_get_cost() ) : ?>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div>

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="row">
				<?php if ( has_post_thumbnail() ) {?>
				<div class="col-md-6">
					<!-- Event featured image, but exclude link -->
					<?php echo tribe_event_featured_image( $event_id, 'lpd-abcpersonal-theme-size-3x2', false ); ?>
				</div>
				<div class="col-md-6">
				<?php }else{?>
				<div class="col-md-12">
				<?php }?>
				
				<?php
				if ( ! $set_venue_apart && ! tribe_embed_google_map() ) {
				} elseif ( ! $set_venue_apart && ! tribe_has_organizer() && tribe_embed_google_map() ) {
				} else {
					// If the venue meta has not already been displayed then it will be printed separately by default
					$set_venue_apart = true;
				} ?>
				
				<?php if ( $set_venue_apart ) : ?>

					<?php tribe_get_template_part( 'modules/meta/map' ); ?>
					
				<?php endif; ?>
				
				</div>
			</div>


			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'lpd-abcpersonal' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<i class="material-icons">&#xE5C4;</i> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <i class="material-icons">&#xE5C8;</i>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
