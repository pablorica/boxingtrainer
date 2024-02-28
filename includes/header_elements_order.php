<?php
	$header_elem_order_1 = $header_elem_order_2 = $header_elem_order_3 = $header_elem_order_4 = $header_elem_order_5 = '';
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		$header_elem_order_1 = fw_get_db_settings_option('header_elem_order_1');
		$header_elem_order_2 = fw_get_db_settings_option('header_elem_order_2');
		$header_elem_order_3 = fw_get_db_settings_option('header_elem_order_3');
		$header_elem_order_4 = fw_get_db_settings_option('header_elem_order_4');
		$header_elem_order_5 = fw_get_db_settings_option('header_elem_order_5');
	}
?>
											<?php if($header_elem_order_5=='wpml_btn'){
												get_template_part('includes/wpml_button');
											}elseif($header_elem_order_5=='message'){
												get_template_part('includes/message_container');
											}elseif($header_elem_order_5=='social'){
												get_template_part('includes/header_social_media');
											}elseif($header_elem_order_5=='shopping_cart'){
												get_template_part('includes/shopping_cart');
											}elseif($header_elem_order_5=='search'){
												get_template_part('includes/header_search_button');
											}?>

											<?php if($header_elem_order_4=='wpml_btn'){
												get_template_part('includes/wpml_button');
											}elseif($header_elem_order_4=='message'){
												get_template_part('includes/message_container');
											}elseif($header_elem_order_4=='social'){
												get_template_part('includes/header_social_media');
											}elseif($header_elem_order_4=='shopping_cart'){
												get_template_part('includes/shopping_cart');
											}elseif($header_elem_order_4=='search'){
												get_template_part('includes/header_search_button');
											}?>
											
											<?php if($header_elem_order_3=='wpml_btn'){
												get_template_part('includes/wpml_button');
											}elseif($header_elem_order_3=='message'){
												get_template_part('includes/message_container');
											}elseif($header_elem_order_3=='social'){
												get_template_part('includes/header_social_media');
											}elseif($header_elem_order_3=='shopping_cart'){
												get_template_part('includes/shopping_cart');
											}elseif($header_elem_order_3=='search'){
												get_template_part('includes/header_search_button');
											}?>
											
											<?php if($header_elem_order_2=='wpml_btn'){
												get_template_part('includes/wpml_button');
											}elseif($header_elem_order_2=='message'){
												get_template_part('includes/message_container');
											}elseif($header_elem_order_2=='social'){
												get_template_part('includes/header_social_media');
											}elseif($header_elem_order_2=='shopping_cart'){
												get_template_part('includes/shopping_cart');
											}elseif($header_elem_order_2=='search'){
												get_template_part('includes/header_search_button');
											}?>
											
											<?php if($header_elem_order_1=='wpml_btn'){
												get_template_part('includes/wpml_button');
											}elseif($header_elem_order_1=='message'){
												get_template_part('includes/message_container');
											}elseif($header_elem_order_1=='social'){
												get_template_part('includes/header_social_media');
											}elseif($header_elem_order_1=='shopping_cart'){
												get_template_part('includes/shopping_cart');
											}elseif($header_elem_order_1=='search'){
												get_template_part('includes/header_search_button');
											}?>