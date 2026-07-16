<?php 
$logo_type = '';

if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
	$logo_type = fw_get_db_settings_option('header_logo/logo_type');
}?>
											
											
				<div class="middle-header nav-sticky">
				
					<div class="container">
					
						<div class="row">
							<div class="col-md-12">
								
								<?php
								if($logo_type=='image_logo'){
									get_template_part('includes/image-logo-sticky');
								}else{
									get_template_part('includes/text-logo');
								}?>
								
								<?php
								get_template_part('includes/middle-header-content');
								?>
						
							</div>
						</div>
					
					</div>
				
				</div>