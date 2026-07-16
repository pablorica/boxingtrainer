							<?php
							$thumbnails = fw_ext_portfolio_get_gallery_images();
							
							$captions = array();
							if ( ! empty( $thumbnails ) ) :
								?>
								
								<?php foreach ( $thumbnails as $thumbnail ) :
									$attachment = get_post( $thumbnail['attachment_id'] );
					
									$captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
					
									$image = wp_get_attachment_image_src( $thumbnail['attachment_id'], 'lpd-abcpersonal-theme-size-16x9' );
									
									?>
									<a class="img-responsive portfolio-gallery-image" href="<?php echo esc_attr($image[0]) ?>" rel="prettyPhoto[portfolio-gallery]" title="<?php echo esc_attr($attachment->post_title) ?>">
										<img src="<?php echo esc_attr($image[0]) ?>" alt="<?php echo esc_attr($attachment->post_title) ?>" />
									</a>
								<?php endforeach ?>
								
							<?php endif ?>