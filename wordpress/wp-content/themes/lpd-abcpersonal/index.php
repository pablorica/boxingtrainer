<?php get_header('new'); ?>
<!-- lpd-abcpersonal/index.php -->
		<div id="main" class="<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_main_class(); ?>">

		    <div class="container">
		
				<div class="row">
				
					<?php
					$current_position = $page_paddings = '';
					
					if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && function_exists('fw_ext_sidebars_get_current_position') ) {
					
						$current_position = fw_ext_sidebars_get_current_position();
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

						<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
							
							<div class="<?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>">
							
								<?php if ( has_post_format('video') ) {?>
									<?php get_template_part('includes/post-format-video');?>
								<?php } elseif ( has_post_format('image') ) {?>
									<?php get_template_part('includes/post-format-image');?>
								<?php } elseif ( has_post_format('link') ) {?>
									<?php get_template_part('includes/post-format-link');?>
								<?php } else {?>
									<?php get_template_part('includes/post-format-standard');?>
								<?php }?>
																
							</div>
							
						<?php endwhile; ?>
						
						<div class="pagination">
						
							<?php the_posts_pagination( array(
								'type'         => 'list',
								'end_size'     => 3,
								'mid_size'     => 3,
								'prev_text'    => '<i class="material-icons">&#xE314;</i>',
								'next_text'    => '<i class="material-icons">&#xE315;</i>',
							) ); ?>
						
						</div>
						
						<?php else: ?>
						
							<h4><?php esc_html_e('Sorry, no posts matched your criteria.', 'lpd-abcpersonal'); ?></h4>
						
						<?php endif; ?>
				
					</div>
					
					<?php get_sidebar(); ?>
									
				</div>
				
			</div>
		    
		</div>
<!-- END lpd-abcpersonal/index.php -->

<?php get_footer('new'); ?>
