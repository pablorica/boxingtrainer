<?php get_header(); ?>

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
					
						<h4><?php esc_html_e('Oops! The page can&rsquo;t be found.', 'lpd-abcpersonal'); ?></h4>
						<p class="not-happy"><?php esc_html_e('The page you are looking for is not available. Please try to perform a search.', 'lpd-abcpersonal') ?></p>
						<form role="search" method="get" class="search-page-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	                        <input id="s" class="search_input theme-form theme-form-inline" type="text" name="s" value="<?php the_search_query() ?>"/>
	                        <input class="lpd_t_btn" id="searchsubmit" type="submit" value="<?php esc_html_e('Search', 'lpd-abcpersonal') ?>"/>
		                </form>
		                <hr>
		                
						<div class="row">
							
	                    	<?php $query = new WP_Query();
	                    	$query->query('ignore_sticky_posts=1&post_status=publish&posts_per_page=-1');
	                    	
	                    	if ($query->have_posts()){
	                    	?>
			                    	
							<div class="col-md-3">
								<h5><?php esc_html_e('Blog Posts', 'lpd-abcpersonal') ?></h5>
								<ul class="_404_bulleted-list _404_bulleted-list-40 _404_bulleted-list-type-3">

			                    	<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			                        
			                        <li><i class="material-icons">&#xE5CA;</i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			                        
			                        <?php endwhile; endif; ?>
									
								</ul>
							</div>
							
							<?php 
							}
							wp_reset_postdata(); ?>
							
							<?php $pages = get_pages();
								
							if($pages){ ?>
							
							<div class="col-md-3">
								
								<h5><?php esc_html_e('Available Pages', 'lpd-abcpersonal') ?></h5>
								<ul class="_404_bulleted-list _404_bulleted-list-40 _404_bulleted-list-type-3">
								<?php foreach ( $pages as $page ) {
								
								$option = '<li><i class="material-icons">&#xE5CA;</i><a href="'.esc_url(get_permalink( $page->ID )).'">';
								$option .= $page->post_title;
								$option .= '</a></li>';
								
								echo $option;
								}
								?>
								</ul>
								
							</div>
							
							<?php } ?>
							
	                    	<?php
	                    	if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() ) {
	                    	$query = new WP_Query();
	                    	$query->query('post_type=product&ignore_sticky_posts=1&post_status=publish&posts_per_page=-1');
	                    	
	                    	if ($query->have_posts()){
	                    	?>
			                    	
							<div class="col-md-3">
								<h5><?php esc_html_e('Available Products', 'lpd-abcpersonal') ?></h5>
								<ul class="_404_bulleted-list _404_bulleted-list-40 _404_bulleted-list-type-3">

			                    	<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			                        
			                        <li><i class="material-icons">&#xE5CA;</i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			                        
			                        <?php endwhile; endif; ?>
									
								</ul>
							</div>
							
							<?php 
							}
							wp_reset_postdata(); 
							} ?>
							
	                    	<?php 
	                    	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
	                    	$query = new WP_Query();
	                    	$query->query('post_type=fw-portfolio&ignore_sticky_posts=1&post_status=publish&posts_per_page=-1');
	                    	
	                    	if ($query->have_posts()){
	                    	?>
			                    	
							<div class="col-md-3">
								<h5><?php esc_html_e('Available Projects', 'lpd-abcpersonal') ?></h5>
								<ul class="_404_bulleted-list _404_bulleted-list-40 _404_bulleted-list-type-3">

			                    	<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			                        
			                        <li><i class="material-icons">&#xE5CA;</i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			                        
			                        <?php endwhile; endif; ?>
									
								</ul>
							</div>
							
							<?php 
							}
							wp_reset_postdata();
							} ?>
							
						</div>	
				
					</div>
					
					<?php get_sidebar(); ?>
									
				</div>
				
			</div>
		    
		</div>


<?php get_footer(); ?>
