<?php
	$shopping_cart_visibility = '';
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		$shopping_cart_visibility = fw_get_db_settings_option('shopping_cart/shopping_cart_visibility');
	}
?>

											
										<?php if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() ) {?>
											<?php if( $shopping_cart_visibility == "enabled" ) {?>
											
												<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_shopping_cart(); ?>

											<?php }?>
										<?php }?>