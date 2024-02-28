<?php get_header(); ?>

		<div id="main" class="<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_main_class(); ?>">

		    <div class="container">
		
				<div class="row">
				
					<?php
					$current_position = '';
					$columns = '3';
					
					if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && function_exists('fw_ext_sidebars_get_current_position') ) {
					
						$current_position = fw_ext_sidebars_get_current_position();
					
					}
					
					if ( $current_position === 'full' ) {
						$inner_page='col-md-12';
					}else{
						$inner_page='col-md-9';
					}?>
				
					<div class="<?php echo $inner_page;?> inner-page-content">
					
						<?php if (have_posts()){?>
						<p class="not-happy"><?php esc_html_e('Not happy with the results below please do another search.', 'lpd-abcpersonal') ?></p>
						<form role="search" method="get" class="search-page-form" action="<?php echo home_url('/'); ?>">
	                        <input id="s" class="search_input theme-form theme-form-inline" type="text" name="s" value="<?php the_search_query() ?>"/>
	                        <input class="lpd_t_btn" id="searchsubmit" type="submit" value="<?php esc_html_e('Search', 'lpd-abcpersonal') ?>"/>
		                </form>
		                <hr>
		                <?php }?>
					                					
						<div class="row">					

							<?php $i = 0; if( have_posts() ): while ( have_posts() ) : the_post(); $i ++; ?>
								
								<div class="col-md-4 <?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>">
								
									<?php get_template_part('includes/post-search');?>
																										
								</div>
								
								<?php if (($i%$columns)==0) {?>
									<div class="clearfix"></div>
								<?php }?>

								
							<?php endwhile; ?>
							<div class="clearfix"></div>
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
				
					</div>
					
					<?php get_sidebar(); ?>
									
				</div>
				
			</div>
		    
		</div>


<?php get_footer(); ?>
