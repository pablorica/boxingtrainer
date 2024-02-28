<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

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
		$header_breadcrumb_visibility = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_breadcrumb_visibility();
		$header_background_type = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_type();
		$header_background_color = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_color();
		$header_background_image_color = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_image_color();
		$header_background_settings = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_settings();
		$header_background_image = lpd_abcpersonal_front_functions::lpd_abcpersonal_header_background_image();

	}?>
	<div class="wsmenucontainer clearfix"><!-- wsmenucontainer -->
	
		<div class="wsmenuMargin">
	
		<?php if ( !is_page_template( 'slider-template.php' ) ) { ?>
			<?php if($header_background_type=='background_image'){?>
				<?php if($header_background_settings=='repeat_center'){?>
					<div id="headerWrap" class="header-image-bg" style="background-image: url(<?php echo esc_url($header_background_image);?>);background-color:<?php echo esc_attr($header_background_image_color);?>;">
				<?php }elseif($header_background_settings=='repeat_top'){?>
					<div id="headerWrap" class="header-image-bg-top" style="background-image: url(<?php echo esc_url($header_background_image);?>);background-color:<?php echo esc_attr($header_background_image_color);?>;">
				<?php }elseif($header_background_settings=='cover_center'){?>
					<div id="headerWrap" class="header-image-bg-cover" style="background-image: url(<?php echo esc_url($header_background_image);?>);background-color:<?php echo esc_attr($header_background_image_color);?>;">
				<?php }elseif($header_background_settings=='parallax_center'){?>
					<div id="headerWrap" class="parallax-bg" data-parallax-image-bg="<?php echo esc_url($header_background_image);?>" style="background-color:<?php echo esc_attr($header_background_image_color);?>;" data-vc-parallax="1.5">
				<?php }else{?>
					<div id="headerWrap">
				<?php }?>
			<?php }else{?>
				<div id="headerWrap" style="background-color:<?php echo esc_attr($header_background_color);?>;">
			<?php }?>
		<?php }else{ ?>
			<?php if($slider_position=='absolute'){?>
				<div id="headerWrap" class="revslider-header revslider-absolute-header">
			<?php }else{ ?>
				<div id="headerWrap" class="revslider-header revslider-relative-header">
			<?php } ?>
		<?php }?>
	  		
			<header id="header"<?php if($header_layouts=='1480') { ?> class="min-width-1480"<?php } ?>>
			
				<div class="wsmenucontent overlapblackbg"></div>
				
				<div class="wsmenuexpandermain">
					<!-- check slideLeft class -->
					<a id="navToggle" class="animated-arrow slideLeft"><span></span></a>
				</div>
				
				<?php
					get_template_part('includes/header_search_form');
					
					get_template_part('includes/middle-header');
					
					if($sticky_menu_visibility=='enabled'){
						get_template_part('includes/middle-header-sticky');
					}
				?>
			
			</header>
			
			<?php 
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
					$title_styles = lpd_abcpersonal_front_functions::lpd_abcpersonal_get_css_styles( array(
						'top_padding' => $header_title_padding_top,
						'bottom_padding' => $header_title_padding_bottom,
					));
				}
			?>
			
			<?php if ( !is_page_template( 'slider-template.php' ) ) { ?>
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
			<?php }else{ ?>
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
		
		</div>