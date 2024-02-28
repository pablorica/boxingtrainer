<?php

$menu_button_overlay_effect = $menu_navigation_type = $menu_visibility = $menu_nav_rtl_animation = $menu_nav_animation = $search_form_visibility = $wpml_container_switch = $shopping_cart_visibility = $search_form_visibility = $msg_container_visibility = $social_media_visibility = "";

if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
	$menu_navigation_type = fw_get_db_settings_option('menu_navigation/menu_navigation_type');
	$menu_visibility = fw_get_db_settings_option('menu_navigation/visible/menu_visibility');
	$menu_nav_rtl_animation = fw_get_db_settings_option('menu_navigation/visible/menu_nav_rtl_animation');
	$menu_nav_animation = fw_get_db_settings_option('menu_navigation/visible/menu_nav_animation');
	$menu_button_overlay_effect = fw_get_db_settings_option('menu_button_overlay_effect');
	$search_form_visibility = fw_get_db_settings_option('search_form/search_form_visibility');
	$wpml_container_switch = fw_get_db_settings_option('wpml_container_visibility/wpml_container_switch');
	$shopping_cart_visibility = fw_get_db_settings_option('shopping_cart/shopping_cart_visibility');
	$search_form_visibility = fw_get_db_settings_option('search_form/search_form_visibility');
	$msg_container_visibility = fw_get_db_settings_option('msg_container_visibility/msg_container_switch');
	$social_media_visibility = fw_get_db_settings_option('header_social_media_picker/social_media_visibility');
}?>
											
											
								<div class="bigmegamenu clearfix"> 
									<div class="menu-wrapper">
										<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
										<nav class="nav-submenu-type-1 nav-megamenu-type-1 wsmenu<?php if($menu_navigation_type=='visible'){?> wsmenu-nav<?php }?><?php if($menu_nav_rtl_animation=='enabled'){?> rtl-wsmenu-animation<?php }?> clearfix"<?php if($menu_nav_animation){?> data-animation-type="<?php echo $menu_nav_animation;?>"<?php }?>>
										
										<?php
										
										$menu_class = "mobile-sub wsmenu-list";
										
										if($menu_button_overlay_effect=="enabled"){
											$menu_class .= " menu-btn-animated";
										}
										
										wp_nav_menu( array(
											'theme_location' => 'primary-menu',
											'menu_class' => $menu_class,
											'container' => '',
											'walker' => new lpd_abcpersonal_nav_menu_walker,				
										));
										?>
										
										</nav>
										
										<?php }?>
										
										<?php if (($menu_navigation_type=='visible')||($wpml_container_switch=='enabled')||($shopping_cart_visibility=='enabled')||($search_form_visibility=='enabled')||($msg_container_visibility=='enabled')||($social_media_visibility=='enabled')) { ?>
										<div class="right-bar">
											
											<?php
											get_template_part('includes/header_elements_order');
											?>
	
											<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
												<?php if($menu_navigation_type=='visible'){?>
												<div class="nav-toogle-container">
													
													<div class="nav-toogle-btn<?php if($menu_visibility=='visible'){?> active<?php }?>">
														<span><span></span></span>
													</div>
													
												</div>
												<?php }?>
											<?php }?>
											
										</div>
										<?php }?>										
									
									</div>
									
								</div>