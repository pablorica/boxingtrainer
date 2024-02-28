								<?php
								
								$header_logo_image = '';
								
								if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
									$header_logo_image = esc_attr(fw_get_db_settings_option('header_logo/image_logo/header_logo_image/url'));
								}
								
								?>
								
								
								<div class="logo">
									<a id="logo" href="<?php echo home_url('/'); ?>"><img src="<?php echo $header_logo_image; ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?> &ndash; <?php echo esc_attr( get_bloginfo('description') ); ?>" /></a>
								</div>