<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="wsmenucontainer clearfix"><!-- wsmenucontainer -->

		<?php 
		$header_logo_text = get_field('header_logo_text', 'option');

		$twitter_url = get_field('twitter_url', 'option');
		$facebook_url = get_field('facebook_url', 'option');
		$instagram_url = get_field('instagram_url', 'option');
		$phone_number = get_field('phone_number', 'option');
		$email = get_field('email', 'option');
		$whatapps = get_field('whatapps', 'option');
		
									
		?>

		<header class="header-new">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-8 col-xl-12">
						<div class="logo-text-wrap">
							<a href="<?php echo home_url() ?>" title="Boxing Trainer London - Home">
								<?php echo ($header_logo_text ? $header_logo_text : 'Boxing Trainer'); ?>
							</a>
						</div><?php // .logo-text-wrap ?>
					</div><?php // .col ?>
					<div class="col-12 col-md-4 col-xl-12">
						<div class="menu-sc-wrap">

							<div class="desktop-menu-wrap">
								<div class="menu-wrap">
									<?php 
									wp_nav_menu( array(
										'theme_location' => 'primary-menu'			
									));
									?>
								</div><?php // .menu-wrap ?>
							</div><?php // .desktop-menu-wrap ?>

							<div class="menu-wrap mobile-menu-wrap">
								<a class="btn-menu-mobile" rel="nofollow" href="#">
									<img width="49px" height="34px" src="<?php echo get_template_directory_uri() ?>/assets/images/burger menu.png" alt="Burger Menu" />
								</a>
							</div><?php // .menu-wrap ?> <br>
							<div class="social-media-contact-info-wrap">
								<div class="social-media-wrap">
									
									<ul>
										<?php if($instagram_url){?>
											<li>
												<a target="_blank" title="Instagram" href="<?php echo $instagram_url ?>">
													<i class="social-icon social-icon-38-instagram"></i>
												</a>
											</li>
										<?php }?>
										<?php if($facebook_url){?>
											<li>
												<a target="_blank" title="Facebook" href="<?php echo $facebook_url?>">
													<i class="social-icon social-icon-06-facebook"></i>
												</a>
											</li>
										<?php }?>
										<?php if($twitter_url){?>
											<li>
												<a target="_blank" title="Twitter" href="<?php echo $twitter_url; ?>">
													<i class="fa-brands fa-x-twitter"></i>
												</a>
											</li>
										<?php }?>
									</ul>
								</div><?php // .social-media-wrap ?>
								<div class="floating-contact-info-wrap">
									<ul>
										<?php if($phone_number){?>
											<li>
												<a title="Phone" href="tel:<?php echo $phone_number ?>">
													 <i class="fa-solid fa-phone"></i>
												</a>
											</li>
										<?php }?>
										<?php if($email){?>
											<li>
												<a title="Email" href="mailto:<?php echo $email ?>">
													<i class="fa-solid fa-envelope"></i>
												</a>
											</li>
										<?php }?>
										<?php if($whatapps){?>
											<li>
												<a title="Whatapps" href="<?php echo $whatapps ?>">
													<i class="fa-brands fa-whatsapp"></i>
												</a>
											</li>
										<?php }?>
									</ul>
								</div><?php // .floating-contact-info-wrap ?>
							</div><?php // .social-media-contact-info-wrap ?>
						</div><?php // .menu-sc-wrap ?>
					</div><?php // .col ?>
				</div><?php // .row ?>
			</div><?php // .container ?>
		</header><?php // .header-new ?>

		<div class="floating-menu-wrap">
			<a class="btn-close-menu" href="#" rel="nofollow">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/close menu.png" alt="Close Menu" />
			</a>
			<div class="logo-text-wrap">
				<a href="<?php echo home_url() ?>" title="Boxing Trainer London - Home">
					Boxing Trainer London
				</a>
			</div><?php // .logo-text-wrap ?>
			<div class="menu-wrap">
			<?php 
			wp_nav_menu( array(
				'theme_location' => 'primary-menu'			
			));
			?>
			</div><?php // .menu-wrap ?>
			<div class="social-media-wrap">
				<ul>
					<?php if($phone_number){?>
						<li>
							<a title="Phone" href="tel:<?php echo $phone_number ?>">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/tel.svg" alt="Phone" />
							</a>
						</li>
					<?php }?>
					<?php if($email){?>
						<li>
							<a title="Email" href="mailto:<?php echo $email ?>">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/email.svg" alt="Email" />
							</a>
						</li>
					<?php }?>
					<?php if($whatapps){?>
						<li>
							<a title="Whatapps" href="<?php echo $whatapps ?>">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/whatsapp.svg" alt="Whatapps" />
							</a>
						</li>
					<?php }?>
				</ul>			
			</div><?php // .social-media-wrap ?>
			<div class="social-media-wrap social-media-wrap-2">
				<ul>
					<?php if($instagram_url){?>
						<li>
							<a target="_blank" title="Instagram" href="<?php echo $instagram_url ?>">
								<i class="social-icon social-icon-38-instagram"></i>
							</a>
						</li>
					<?php }?>
					<?php if($facebook_url){?>
						<li>
							<a target="_blank" title="Facebook" href="<?php echo $facebook_url?>">
								<i class="social-icon social-icon-06-facebook"></i>
							</a>
						</li>
					<?php }?>
					<?php if($twitter_url){?>
						<li>
							<a target="_blank" title="Twitter" href="<?php echo $twitter_url; ?>">
								<i class="fa-brands fa-x-twitter"></i>
							</a>
						</li>
					<?php }?>
				</ul>
			</div><?php // .social-media-wrap ?>
			
		</div><?php // .floating-menu-wrap ?>

		<script>
			jQuery('.btn-menu-mobile').click(
				function(e){
					e.preventDefault();
					jQuery('body').addClass('mobile-menu-open');
				}
			)
			jQuery('.btn-close-menu').click(
				function(e){
					e.preventDefault();
					jQuery('body').removeClass('mobile-menu-open');
				}
			)
			
		</script>

		<?php
	
		$sticky_menu_visibility = $header_layouts = $title_layouts = $slider_position = $slider_container = $slider_shortcode = $header_title_padding_top = $header_title_padding_bottom = $header_title_visibility = $header_breadcrumb_visibility = $header_background_type = $header_background_color = $header_background_image_color = $header_background_settings = $header_background_image = $title_styles = '';
		
		if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
			$sticky_menu_visibility = fw_get_db_settings_option('sticky_menu_visibility');
			$header_layouts = fw_get_db_settings_option('header_layouts');
			$title_layouts = fw_get_db_settings_option('title_layouts');	
			$slider_position = fw_get_db_post_option( get_the_ID(),'slider_position/slider_position_switch');
			$slider_container = fw_get_db_post_option( get_the_ID(),'slider_position/relative/slider_container/slider_container_type');
			$slider_shortcode = fw_get_db_post_option( get_the_ID(),'slider_shortcode');
			$header_title_padding_top = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_title_padding_top();
			$header_title_padding_bottom = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_title_padding_bottom();
			$header_title_visibility = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_title_visibility();
			//$header_breadcrumb_visibility = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_breadcrumb_visibility();
			$header_breadcrumb_visibility = 'disabled'; // I'm forcing the breadcrumbs to be disabled
			$header_background_type = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_type();
			$header_background_color = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_color();
			$header_background_image_color = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_image_color();
			$header_background_settings = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_settings();
			$header_background_image = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_image();

		}?>
	

		
		<?php if ( !is_page_template( 'slider-template.php' ) and !is_page_template( 'template-page-gift-page.php' ) and !is_page_template( 'template-page-homepage.php' ) and !is_page_template( 'template-page-packages.php' )  ) { ?>
			<?php if($header_background_type=='background_image'){?>
				<link rel="preload" href="<?php echo esc_url($header_background_image);?>" as="image" type="image/webp">
				<?php if($header_background_settings=='repeat_center'){?>
					<div id="headerWrap" class="header-image-bg" style="background-color:<?php echo esc_attr($header_background_image_color);?>;">
				<?php }elseif($header_background_settings=='repeat_top'){?>
					<div id="headerWrap" class="header-image-bg-top" style="background-color:<?php echo esc_attr($header_background_image_color);?>;">
				<?php }elseif($header_background_settings=='cover_center'){?>
					<div id="headerWrap" class="header-image-bg-cover" style="background-color:<?php echo esc_attr($header_background_image_color);?>;">
				<?php }elseif($header_background_settings=='parallax_center'){?>
					<div id="headerWrap" class="parallax-bg" data-parallax-image-bg="<?php echo esc_url($header_background_image);?>" style="background-color:<?php echo esc_attr($header_background_image_color);?>;" data-vc-parallax="1.5">
				<?php }else{?>
					<div id="headerWrap">
				<?php }?>

				<script>
				document.addEventListener("DOMContentLoaded", () => {
					const hero = document.querySelector('#headerWrap');
					hero.style.backgroundImage = "url('<?php echo esc_url($header_background_image);?>')";
				});
				</script>
				<style>
					#title .title h2 {
						font-family: Oswald;
						font-style: normal;
						font-weight: 600;
						font-size: 48px;
						letter-spacing: 0px;
						color: #ffffff;
					}
				</style>

			<?php }else{?>
				<div id="headerWrap" style="background-color:<?php echo esc_attr($header_background_color);?>;">
			<?php }?>
		<?php } else if ( is_page_template( 'slider-template.php' ) ) {?>
			<?php if($slider_position=='absolute'){?>
				<div id="headerWrap" class="revslider-header revslider-absolute-header">
			<?php }else{ ?>
				<div id="headerWrap" class="revslider-header revslider-relative-header">
			<?php } ?>
		<?php }?>

		<?php if ( !is_page_template( 'slider-template.php' ) and !is_page_template( 'template-page-gift-page.php' ) and !is_page_template( 'template-page-homepage.php' ) and !is_page_template( 'template-page-packages.php' ) ) { ?>
				<?php if($header_title_visibility!='disabled'||function_exists('fw_ext_breadcrumbs')&&$header_title_padding_top!='0'||$header_title_padding_bottom!='0') { ?>
				<div id="title" class="title-breadcrumb-vertical-centered<?php if($title_layouts=='1480') { ?>  min-width-1480<?php } ?>" style="<?php echo esc_attr( $title_styles ); ?>">
					
					<?php if($header_title_visibility!='disabled'||function_exists('fw_ext_breadcrumbs')) { ?>
				    <div class="container">
				
						<div class="row">
							<div class="col-md-12">
												
								<?php if($header_title_visibility!='disabled') { ?>
								<div class="title">	
									<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_page_title(); ?>
									<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_page_sub_title(); ?>
								</div>
								<?php } ?>
								
								<?php if( function_exists('fw_ext_breadcrumbs') ) {
									if($header_breadcrumb_visibility!='disabled') {
										fw_ext_breadcrumbs($separator = '');
									}
								} ?>
								
							</div>
						</div>
				      
				    </div>
				    <?php } ?>
				    
					
				</div>
				<?php } ?>
			<?php } else if ( is_page_template( 'slider-template.php' ) ) { ?>
				<?php if ($slider_shortcode) {?>
				<div class="revslider-container<?php if ($slider_container=="1480") { ?> min-width-1480<?php } ?>">
				
					<?php if ($slider_container!="full") { ?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
					<?php } ?>		
								<?php  echo do_shortcode( $slider_shortcode ); ?>
								
					<?php if ($slider_container!="full") { ?>			
							</div>
						</div>
					</div>
					<?php } ?>
					
				</div>
				<?php } ?>
			<?php } ?>
		</div> <?php // #header-wrap ?>