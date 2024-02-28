
								<div class="post-wrap">
									<div class="post-title"><span><i class="material-icons">&#xE157;</i></span><h3><?php the_title(); ?></h3></div>
									<?php get_template_part('includes/post-format-post-meta');?>
									<div class="post-content">
										<p><a href="<?php echo strip_tags( get_the_content() ); ?>"><?php echo strip_tags( get_the_content() ); ?></a></p>
									</div>
								</div>