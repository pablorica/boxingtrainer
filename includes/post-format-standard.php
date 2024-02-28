
								<div class="post-wrap">
									<div class="post-title"><span><i class="material-icons">&#xE236;</i></span><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
									<?php get_template_part('includes/post-format-post-meta');?>
									<div class="post-content">
										<?php if ( get_post_type() == 'post' ) {?>
											<?php the_content(); ?>
										<?php }else{?>
											<?php the_excerpt(); ?>
										<?php }?>
									</div>
								</div>