<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>

		<div id="main" class="<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_main_class(); ?>">

		    <div class="container">
		
				<div class="row">
				
					<?php
					$current_position = $page_paddings = $page_paddings = '';
					
					if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && function_exists('fw_ext_sidebars_get_current_position') ) {
					
						if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
						
							$current_position = fw_get_db_settings_option( 'events_sidebar' );
						
						}else{
						
							$current_position = fw_ext_sidebars_get_current_position();
							
						}
						
						$page_paddings=lpd_abcpersonal_front_functions::lpd_abcpersonal_page_paddings();
						
						if($page_paddings['top']==''){
							$page_padding_top = '50';
						}else{
							$page_padding_top = $page_paddings['top'];
						}
						if($page_paddings['bottom']==''){
							$page_padding_bottom = '30';
						}else{
							$page_padding_bottom = $page_paddings['bottom'];
						}
					
						$page_paddings = ' style="padding-top:'.$page_padding_top.'px;padding-bottom:'.$page_padding_bottom.'px;"';
					}
					
					if ( $current_position === 'full' ) {
						$inner_page='col-md-12';
					}else{
						$inner_page='col-md-9';
					}?>
				
					<div class="<?php echo $inner_page;?> inner-page-content"<?php echo $page_paddings;?>>						

						<div id="tribe-events-pg-template">
							<?php tribe_events_before_html(); ?>
							<?php tribe_get_view(); ?>
							<?php tribe_events_after_html(); ?>
						</div>

					</div>
					
					<?php get_sidebar(); ?>
									
				</div>
				
			</div>
		    
		</div>


<?php
get_footer();
