<?php get_header(); ?>

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
					
						$page_paddings = ' style="padding-top:'.esc_attr($page_padding_top).'px;padding-bottom:'.esc_attr($page_padding_bottom).'px;"';
					
						$portfolio_post_layout = fw_get_db_post_option( get_the_ID(), 'portfolio_post_layout');
						
						$portfolio_post_type = fw_get_db_post_option( get_the_ID(), 'portfolio_post_type');

					
					}
					
					if ( $current_position === 'full' ) {
						$inner_page='col-md-12';
					}else{
						$inner_page='col-md-9';
					}?>
				
					<div class="<?php echo $inner_page;?> inner-page-content"<?php echo $page_paddings;?>>
					
						<?php if ( $portfolio_post_layout == 'sidebar' ) { ?>
							<div class="row">
								<div class="col-md-8">
									<?php if ( $portfolio_post_type == 'slider' ) { ?>
										<?php get_template_part('includes/portfolio-nivoslider'); ?>
									<?php }else{ ?>
										<?php get_template_part('includes/portfolio-gallery'); ?>
									<?php } ?>
								</div>
								<div class="col-md-4">
									
									<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
									
										<?php the_content(); ?>
									
									<?php endwhile; endif; ?>
									
								</div>
							</div>
						<?php }else{ ?>
							
							<?php if ( $portfolio_post_type == 'slider' ) { ?>
								<?php get_template_part('includes/portfolio-nivoslider'); ?>
							<?php }else{ ?>
								<?php get_template_part('includes/portfolio-gallery'); ?>
							<?php } ?>

							<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
							
								<?php the_content(); ?>
							
							<?php endwhile; endif; ?>
									
						<?php } ?>
						
						
						<?php get_template_part('includes/portfolio-related-posts'); ?>

					</div>
					
					<?php get_sidebar(); ?>
									
				</div>
				
			</div>
		    
		</div>


<?php get_footer(); ?>
