								
								<?php $disabled_top_border = '';
								if ( has_post_format('image') ) {?>
									<?php if ( has_post_thumbnail() ) {
										$disabled_top_border = ' disabled-top-border';
									?> 
									<div class="featured-image">
										<img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'lpd-abcpersonal-theme-size-16x9' ); echo esc_url($image[0]);?>" alt="" />
										<div class="hover-effect">
											<a href="<?php the_permalink(); ?>" class="hover-effect-btn"><i class="material-icons">&#xE042;</i></a>
										</div>
									</div>
									<?php }?>
								<?php }?>
								<div class="post-wrap<?php echo $disabled_top_border ; ?>">
									<div class="post-title"><span><i class="material-icons">&#xE3C4;</i></span><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
									<?php get_template_part('includes/post-format-post-meta');?>
									<div class="post-content">
										<?php if ( get_post_type() == 'post' ) {?>
											<?php the_content(); ?>
										<?php }else{?>
											<?php the_excerpt(); ?>
										<?php }?>
									</div>
								</div>