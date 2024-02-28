<?php get_header(); ?>

		<div id="main" class="<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_main_class(); ?> inner-events-post">

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

						<?php if ( has_post_thumbnail() ) {?> 
						<div class="featured-image">
							<img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'lpd-abcpersonal-theme-size-16x9' ); echo esc_url($image[0]);?>" alt="" />
						</div>
						<?php }?>

						<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
						
							<?php the_content(); ?>
						
						<?php endwhile; endif; ?>

					</div>
					
					<?php get_sidebar(); ?>
									
				</div>
				
			</div>
		    
		</div>


<?php get_footer(); ?>
