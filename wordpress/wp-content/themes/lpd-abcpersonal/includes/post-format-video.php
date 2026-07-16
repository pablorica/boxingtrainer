
								<?php $url=lpd_abcpersonal_front_functions::lpd_abcpersonal_get_youtube_url( get_the_content() );
									$disabled_top_border = '';
								?>
								<?php if ( has_post_format('video') && (lpd_abcpersonal_front_functions::lpd_abcpersonal_get_youtube_id( $url )!='')) {
									$disabled_top_border = ' disabled-top-border';
								?>
									<div class="video-container">
									    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo lpd_abcpersonal_front_functions::lpd_abcpersonal_get_youtube_id( $url ); ?>" allowfullscreen></iframe>
									</div>
								<?php }?>
								<div class="post-wrap<?php echo $disabled_top_border ; ?>">
									<div class="post-title"><span><i class="material-icons">&#xE039;</i></span><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
									<?php get_template_part('includes/post-format-post-meta');?>
									<div class="post-content">
										<?php if (lpd_abcpersonal_front_functions::lpd_abcpersonal_get_youtube_id( $url )!='') {?>
											<?php the_excerpt(); ?>
										<?php }else{?>
											<?php the_content(); ?>
										<?php }?>
									</div>
								</div>