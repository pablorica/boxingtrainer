<?php get_header('new'); ?>

		<div id="main" class="<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_main_class(); ?>">

		    <div class="container">
		
				<div class="row">
				
					<?php
					$current_position = '';
					
					if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && function_exists('fw_ext_sidebars_get_current_position') ) {
					
						$current_position = fw_ext_sidebars_get_current_position();
					
					}
					
					if ( $current_position === 'full' ) {
						$inner_page='col-md-12';
					}else{
						$inner_page='col-md-9';
					}?>
				
					<div class="<?php echo $inner_page;?> inner-page-content">	

						<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
						
							<div class="featured-image">
								<img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo esc_url($image[0]);?>" alt="" />
							</div>
							
							<?php if ( has_excerpt() ) : ?>
								<figcaption class="wp-caption-text"><?php the_excerpt(); ?></figcaption>
							<?php endif; ?>
							
							<div class="divider divider-20"></div>
						
							<?php the_content();?>
							
							<div class="nav-links"><div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'lpd-abcpersonal' ) ); ?></div><div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'lpd-abcpersonal' ) ); ?></div></div>
							
							<?php if ( comments_open() || get_comments_number() ) {
								comments_template();
							}?>
						
						<?php endwhile; endif; ?>
						
						<div class="divider divider-30"></div>

					</div>
					
					<?php get_sidebar(); ?>
									
				</div>
				
			</div>
		    
		</div>


<?php get_footer('new'); ?>

