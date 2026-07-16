<?php
	$wpml_container_switch = '';
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		$wpml_container_switch = fw_get_db_settings_option('wpml_container_visibility/wpml_container_switch');
		
	}
?>
										<?php if( lpd_abcpersonal_helpers::lpd_abcpersonal_wpml_check() ) {?>
											<?php if($wpml_container_switch=="enabled"){?>
											<div class="wpml-container">
												<div class="wpml-btn-wrap">
													<?php lpd_abcpersonal_front_functions::lpd_abcpersonal_language_selector_flags(); ?>
												</div>
											</div>
											<?php }?>
										<?php }?>