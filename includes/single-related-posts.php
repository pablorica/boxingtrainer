						<?php
						
						$related_post_img_replacement = $related_post_switch = $related_post_excerpt = '';
						
						if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
							$related_post_img_replacement = fw_get_db_settings_option('related_post_img_replacement');
							$related_post_switch = fw_get_db_settings_option('related_post_meta/related_post_switch');
							$related_post_excerpt = fw_get_db_settings_option('related_post_excerpt');
						}
						
					    $orig_post = $post;
					    global $post;
					    $tags = wp_get_post_tags($post->ID);
					     
					    if ($tags) {
					    
					    $tag_ids = array();
					    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
					    
					    $args=array(
					    'post_type' => 'post',
					    'tag__in' => $tag_ids,
					    'post__not_in' => array($post->ID),
					    'posts_per_page'=>3,
					    'ignore_sticky_posts'=>1
					    );
					     
					    $my_query = new wp_query( $args );
					    if( $my_query->have_posts() ) {
					    ?>
					 
					     	<div class="related-posts">
						     	<h3><?php esc_html_e( 'Related Posts', 'lpd-abcpersonal' );?></h3>
							 	<div class="row">
					    <?php
					    while( $my_query->have_posts() ) {
					    $my_query->the_post();?>
					    
							    	<div class="col-md-4">
							    		<div class="related-post-container related-post-container-img-ratio-16x9<?php if ( (has_post_thumbnail())||($related_post_img_replacement=="enabled") ) {?> rpc-remove-top-border<?php }?>">
											<?php if ( has_post_thumbnail() ) {?> 
											<div class="featured-image">
												<img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'lpd-abcpersonal-theme-size-16x9' ); echo esc_url($image[0]);?>" alt="" />
												<div class="hover-effect">
													<a href="<?php the_permalink()?>" class="hover-effect-btn"><i class="material-icons">&#xE042;</i></a>
												</div>
											</div>
											<?php }else{?>
												<?php if ($related_post_img_replacement=="enabled") {?> 
												<div class="no-featured-image">
													<div class="no-image-label">
														<span><?php esc_html_e( 'No Image', 'lpd-abcpersonal' );?></span>
													</div>
												</div>
												<?php }?>
											<?php }?>
											<div class="related-post-container-content">
										        <h4><a href="<?php  the_permalink()?>"><?php the_title(); ?></a></h4>
										        <?php echo lpd_abcpersonal_front_functions::lpd_abcpersonal_excerpt($related_post_excerpt); ?>
										        <?php if( $related_post_switch == "enabled" ) {?>
										        <div class="related-post-container-meta"><i class="material-icons">&#xE893;</i><?php echo lpd_abcpersonal_front_functions::lpd_abcpersonal_get_categories();?></div>
										        <?php }?>
											</div>
							    		</div>
									</div>
							    
					    <?php }?>
					   			 </div>
					    	</div>
					    
					    <?php } }
					    
					    $post = $orig_post;
					    wp_reset_postdata();
					    ?>