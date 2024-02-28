<?php
	$msg_container_visibility = $msg_block_content = $msg_block_url = '';
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		$msg_container_visibility = fw_get_db_settings_option('msg_container_visibility/msg_container_switch');
		$msg_block_content = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_content');
		$msg_block_url = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_url');
		
	}
?>

											<?php if($msg_container_visibility=="enabled"){?>
											<div class="message-container">
												<div class="message-container-wrap">
													<?php if($msg_block_url){?>
													<a href="<?php echo $msg_block_url;?>" class="message-block">
													<?php }else{?>
													<div class="message-block">
													<?php }?>		
													
														<?php if($msg_block_content){ echo $msg_block_content;}?>
													
													<?php if($msg_block_url){?>
													</a>
													<?php }else{?>
													</div>
													<?php }?>
												</div>
											</div>
											<?php }?>