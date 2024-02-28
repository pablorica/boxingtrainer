
					<?php if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && function_exists('fw_ext_sidebars_get_current_position') ) {?>
					
						<?php
						
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
						?>
						
						
						<?php if ( $current_position !== 'full' ) {?>
						
							<?php if( ($current_position === 'left' && lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()) || ($current_position === 'right' && lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()) ){?>
								<div class="col-md-3 sidebar"<?php echo $page_paddings;?>>
									<?php dynamic_sidebar( 'main-sidebar' ); ?>
								</div>
							<?php }elseif( $current_position === 'right' ) {?>
								<div class="col-md-3 sidebar"<?php echo $page_paddings;?>>
									<?php echo fw_ext_sidebars_show( 'blue' );?>
								</div>
							<?php }elseif( $current_position === 'left' ){?>
								<div class="col-md-3 sidebar"<?php echo $page_paddings;?>>
									<?php echo fw_ext_sidebars_show( 'blue' );?>
								</div>
							<?php }else{?>
								<div class="col-md-3 sidebar"<?php echo $page_paddings;?>>
									<?php dynamic_sidebar( 'main-sidebar' ); ?>
								</div>
							<?php } ?>
						
						<?php } ?>
						
					<?php }else{ ?>
						<div class="col-md-3 sidebar">
							<?php dynamic_sidebar( 'main-sidebar' ); ?>
						</div>
					<?php } ?>