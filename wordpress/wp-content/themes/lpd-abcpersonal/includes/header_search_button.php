<?php
	$search_form_visibility = '';

	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		$search_form_visibility = fw_get_db_settings_option('search_form/search_form_visibility');
		
	}
?>
											<?php if($search_form_visibility=='enabled'){?>
											<div class="search-container">
											
												<div class="search-btn">
													<div>
														<i class="material-icons">&#xE8B6;</i>
													</div>
												</div>
												
											</div>
											<?php }?>