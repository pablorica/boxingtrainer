<?php
$social_media_visibility = $header_social_media_type = $forrst_switch = $forrst_url = $dribbble_switch = $dribbble_url = $flickr_switch = $flickr_url = $twitter_switch = $twitter_url = $facebook_switch = $facebook_url = $skype_switch = $skype_url = $digg_switch = $digg_url = $google_switch = $google_url = $html5_switch = $html5_url = $linkedin_switch = $linkedin_url = $lastfm_switch = $lastfm_url = $vimeo_switch = $vimeo_url = $yahoo_switch = $yahoo_url = $tumblr_switch = $tumblr_url = $apple_switch = $apple_url = $windows_switch = $windows_url = $youtube_switch = $youtube_url = $delicious_switch = $delicious_url = $rss_switch = $rss_url = $picasa_switch = $picasa_url = $deviantart_switch = $deviantart_url = $whatsapp_switch = $whatsapp_url = $snapchat_switch = $snapchat_url = $blogger_switch = $blogger_url = $wordpress_switch = $wordpress_url = $amazon_switch = $amazon_url = $appstore_switch = $appstore_url = $paypal_switch = $paypal_url = $myspace_switch = $myspace_url = $dropbox_switch = $dropbox_url = $windows8_switch = $windows8_url = $pinterest_switch = $pinterest_url = $soundcloud_switch = $soundcloud_url = $google_drive_switch = $google_drive_url = $android_switch = $android_url = $behance_switch = $behance_url = $instagram_switch = $instagram_url = $ebay_switch = $ebay_url = $google_plus_switch = $google_plus_url = $github_switch = $github_url = $stackoverflow_switch = $stackoverflow_url = $spotify_switch = $spotify_url = $stumbleupon_switch = $stumbleupon_url = $visa_switch = $visa_url = $mastercard_switch = $mastercard_url = $amex_switch = $amex_url = $ios_switch = $ios_url = $osx_switch = $osx_url = $evernote_switch = $evernote_url = $yelp_switch = $yelp_url = $yelp2_switch = $yelp2_url = $medium_switch = $medium_url = $slack_switch = $slack_url = $vine_switch = $vine_url = $edge_switch = $edge_url = $outlook_switch = $outlook_url = $pencilcase_switch = $pencilcase_url = $play_switch = $play_url = $icloud_switch = $icloud_url = '';

 fw_get_db_settings_option('header_social_media_icloud/enabled/icloud_url');

	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
	
		$social_media_visibility = fw_get_db_settings_option('header_social_media_picker/social_media_visibility');	
		$header_social_media_type = fw_get_db_settings_option('header_social_media_type');
	
		$forrst_switch = fw_get_db_settings_option('header_social_media_forrst/forrst_switch');
		$forrst_url = fw_get_db_settings_option('header_social_media_forrst/enabled/forrst_url');
		
		$dribbble_switch = fw_get_db_settings_option('header_social_media_dribbble/dribbble_switch');
		$dribbble_url = fw_get_db_settings_option('header_social_media_dribbble/enabled/dribbble_url');
		
		$flickr_switch = fw_get_db_settings_option('header_social_media_flickr/flickr_switch');
		$flickr_url = fw_get_db_settings_option('header_social_media_flickr/enabled/flickr_url');
		
		$twitter_switch = fw_get_db_settings_option('header_social_media_twitter/twitter_switch');
		$twitter_url = fw_get_db_settings_option('header_social_media_twitter/enabled/twitter_url');
		
		$facebook_switch = fw_get_db_settings_option('header_social_media_facebook/facebook_switch');
		$facebook_url = fw_get_db_settings_option('header_social_media_facebook/enabled/facebook_url');
		
		$skype_switch = fw_get_db_settings_option('header_social_media_skype/skype_switch');
		$skype_url = fw_get_db_settings_option('header_social_media_skype/enabled/skype_url');
		
		$digg_switch = fw_get_db_settings_option('header_social_media_digg/digg_switch');
		$digg_url = fw_get_db_settings_option('header_social_media_digg/enabled/digg_url');
		
		$google_switch = fw_get_db_settings_option('header_social_media_google/google_switch');
		$google_url = fw_get_db_settings_option('header_social_media_google/enabled/google_url');
		
		$html5_switch = fw_get_db_settings_option('header_social_media_html5/html5_switch');
		$html5_url = fw_get_db_settings_option('header_social_media_html5/enabled/html5_url');
		
		$linkedin_switch = fw_get_db_settings_option('header_social_media_linkedin/linkedin_switch');
		$linkedin_url = fw_get_db_settings_option('header_social_media_linkedin/enabled/linkedin_url');
		
		$lastfm_switch = fw_get_db_settings_option('header_social_media_lastfm/lastfm_switch');
		$lastfm_url = fw_get_db_settings_option('header_social_media_lastfm/enabled/lastfm_url');
		
		$vimeo_switch = fw_get_db_settings_option('header_social_media_vimeo/vimeo_switch');
		$vimeo_url = fw_get_db_settings_option('header_social_media_vimeo/enabled/vimeo_url');
		
		$yahoo_switch = fw_get_db_settings_option('header_social_media_yahoo/yahoo_switch');
		$yahoo_url = fw_get_db_settings_option('header_social_media_yahoo/enabled/yahoo_url');
		
		$tumblr_switch = fw_get_db_settings_option('header_social_media_tumblr/tumblr_switch');
		$tumblr_url = fw_get_db_settings_option('header_social_media_tumblr/enabled/tumblr_url');
		
		$apple_switch = fw_get_db_settings_option('header_social_media_apple/apple_switch');
		$apple_url = fw_get_db_settings_option('header_social_media_apple/enabled/apple_url');
		
		$windows_switch = fw_get_db_settings_option('header_social_media_windows/windows_switch');
		$windows_url = fw_get_db_settings_option('header_social_media_windows/enabled/windows_url');
		
		$youtube_switch = fw_get_db_settings_option('header_social_media_youtube/youtube_switch');
		$youtube_url = fw_get_db_settings_option('header_social_media_youtube/enabled/youtube_url');
		
		$delicious_switch = fw_get_db_settings_option('header_social_media_delicious/delicious_switch');
		$delicious_url = fw_get_db_settings_option('header_social_media_delicious/enabled/delicious_url');
		
		$rss_switch = fw_get_db_settings_option('header_social_media_rss/rss_switch');
		$rss_url = fw_get_db_settings_option('header_social_media_rss/enabled/rss_url');
		
		$picasa_switch = fw_get_db_settings_option('header_social_media_picasa/picasa_switch');
		$picasa_url = fw_get_db_settings_option('header_social_media_picasa/enabled/picasa_url');
		
		$deviantart_switch = fw_get_db_settings_option('header_social_media_deviantart/deviantart_switch');
		$deviantart_url = fw_get_db_settings_option('header_social_media_deviantart/enabled/deviantart_url');
		
		$whatsapp_switch = fw_get_db_settings_option('header_social_media_whatsapp/whatsapp_switch');
		$whatsapp_url = fw_get_db_settings_option('header_social_media_whatsapp/enabled/whatsapp_url');
		
		$snapchat_switch = fw_get_db_settings_option('header_social_media_snapchat/snapchat_switch');
		$snapchat_url = fw_get_db_settings_option('header_social_media_snapchat/enabled/snapchat_url');
		
		$blogger_switch = fw_get_db_settings_option('header_social_media_blogger/blogger_switch');
		$blogger_url = fw_get_db_settings_option('header_social_media_blogger/enabled/blogger_url');
		
		$wordpress_switch = fw_get_db_settings_option('header_social_media_wordpress/wordpress_switch');
		$wordpress_url = fw_get_db_settings_option('header_social_media_wordpress/enabled/wordpress_url');
		
		$amazon_switch = fw_get_db_settings_option('header_social_media_amazon/amazon_switch');
		$amazon_url = fw_get_db_settings_option('header_social_media_amazon/enabled/amazon_url');
		
		$appstore_switch = fw_get_db_settings_option('header_social_media_appstore/appstore_switch');
		$appstore_url = fw_get_db_settings_option('header_social_media_appstore/enabled/appstore_url');
		
		$paypal_switch = fw_get_db_settings_option('header_social_media_paypal/paypal_switch');
		$paypal_url = fw_get_db_settings_option('header_social_media_paypal/enabled/paypal_url');
		
		$myspace_switch = fw_get_db_settings_option('header_social_media_myspace/myspace_switch');
		$myspace_url = fw_get_db_settings_option('header_social_media_myspace/enabled/myspace_url');
		
		$dropbox_switch = fw_get_db_settings_option('header_social_media_dropbox/dropbox_switch');
		$dropbox_url = fw_get_db_settings_option('header_social_media_dropbox/enabled/dropbox_url');
		
		$windows8_switch = fw_get_db_settings_option('header_social_media_windows8/windows8_switch');
		$windows8_url = fw_get_db_settings_option('header_social_media_windows8/enabled/windows8_url');
		
		$pinterest_switch = fw_get_db_settings_option('header_social_media_pinterest/pinterest_switch');
		$pinterest_url = fw_get_db_settings_option('header_social_media_pinterest/enabled/pinterest_url');
		
		$soundcloud_switch = fw_get_db_settings_option('header_social_media_soundcloud/soundcloud_switch');
		$soundcloud_url = fw_get_db_settings_option('header_social_media_soundcloud/enabled/soundcloud_url');
		
		$google_drive_switch = fw_get_db_settings_option('header_social_media_google_drive/google_drive_switch');
		$google_drive_url = fw_get_db_settings_option('header_social_media_google_drive/enabled/google_drive_url');
		
		$android_switch = fw_get_db_settings_option('header_social_media_android/android_switch');
		$android_url = fw_get_db_settings_option('header_social_media_android/enabled/android_url');
		
		$behance_switch = fw_get_db_settings_option('header_social_media_behance/behance_switch');
		$behance_url = fw_get_db_settings_option('header_social_media_behance/enabled/behance_url');
		
		$instagram_switch = fw_get_db_settings_option('header_social_media_instagram/instagram_switch');
		$instagram_url = fw_get_db_settings_option('header_social_media_instagram/enabled/instagram_url');
		
		$ebay_switch = fw_get_db_settings_option('header_social_media_ebay/ebay_switch');
		$ebay_url = fw_get_db_settings_option('header_social_media_ebay/enabled/ebay_url');
		
		$google_plus_switch = fw_get_db_settings_option('header_social_media_google_plus/google_plus_switch');
		$google_plus_url = fw_get_db_settings_option('header_social_media_google_plus/enabled/google_plus_url');

		$github_switch = fw_get_db_settings_option('header_social_media_github/github_switch');
		$github_url = fw_get_db_settings_option('header_social_media_github/enabled/github_url');
		
		$stackoverflow_switch = fw_get_db_settings_option('header_social_media_stackoverflow/stackoverflow_switch');
		$stackoverflow_url = fw_get_db_settings_option('header_social_media_stackoverflow/enabled/stackoverflow_url');
		
		$spotify_switch = fw_get_db_settings_option('header_social_media_spotify/spotify_switch');
		$spotify_url = fw_get_db_settings_option('header_social_media_spotify/enabled/spotify_url');
		
		$stumbleupon_switch = fw_get_db_settings_option('header_social_media_stumbleupon/stumbleupon_switch');
		$stumbleupon_url = fw_get_db_settings_option('header_social_media_stumbleupon/enabled/stumbleupon_url');
		
		$visa_switch = fw_get_db_settings_option('header_social_media_visa/visa_switch');
		$visa_url = fw_get_db_settings_option('header_social_media_visa/enabled/visa_url');
		
		$mastercard_switch = fw_get_db_settings_option('header_social_media_mastercard/mastercard_switch');
		$mastercard_url = fw_get_db_settings_option('header_social_media_mastercard/enabled/mastercard_url');
		
		$amex_switch = fw_get_db_settings_option('header_social_media_amex/amex_switch');
		$amex_url = fw_get_db_settings_option('header_social_media_amex/enabled/amex_url');
		
		$ios_switch = fw_get_db_settings_option('header_social_media_ios/ios_switch');
		$ios_url = fw_get_db_settings_option('header_social_media_ios/enabled/ios_url');
		
		$osx_switch = fw_get_db_settings_option('header_social_media_osx/osx_switch');
		$osx_url = fw_get_db_settings_option('header_social_media_osx/enabled/osx_url');
		
		$evernote_switch = fw_get_db_settings_option('header_social_media_evernote/evernote_switch');
		$evernote_url = fw_get_db_settings_option('header_social_media_evernote/enabled/evernote_url');
		
		$yelp_switch = fw_get_db_settings_option('header_social_media_yelp/yelp_switch');
		$yelp_url = fw_get_db_settings_option('header_social_media_yelp/enabled/yelp_url');
		
		$yelp2_switch = fw_get_db_settings_option('header_social_media_yelp2/yelp2_switch');
		$yelp2_url = fw_get_db_settings_option('header_social_media_yelp2/enabled/yelp2_url');
		
		$medium_switch = fw_get_db_settings_option('header_social_media_medium/medium_switch');
		$medium_url = fw_get_db_settings_option('header_social_media_medium/enabled/medium_url');
		
		$slack_switch = fw_get_db_settings_option('header_social_media_slack/slack_switch');
		$slack_url = fw_get_db_settings_option('header_social_media_slack/enabled/slack_url');
		
		$vine_switch = fw_get_db_settings_option('header_social_media_vine/vine_switch');
		$vine_url = fw_get_db_settings_option('header_social_media_vine/enabled/vine_url');
		
		$edge_switch = fw_get_db_settings_option('header_social_media_edge/edge_switch');
		$edge_url = fw_get_db_settings_option('header_social_media_edge/enabled/edge_url');
		
		$outlook_switch = fw_get_db_settings_option('header_social_media_outlook/outlook_switch');
		$outlook_url = fw_get_db_settings_option('header_social_media_outlook/enabled/outlook_url');
		
		$pencilcase_switch = fw_get_db_settings_option('header_social_media_pencilcase/pencilcase_switch');
		$pencilcase_url = fw_get_db_settings_option('header_social_media_pencilcase/enabled/pencilcase_url');
		
		$play_switch = fw_get_db_settings_option('header_social_media_play/play_switch');
		$play_url = fw_get_db_settings_option('header_social_media_play/enabled/play_url');
		
		$icloud_switch = fw_get_db_settings_option('header_social_media_icloud/icloud_switch');
		$icloud_url = fw_get_db_settings_option('header_social_media_icloud/enabled/icloud_url');
		
	}
?>
<?php if($social_media_visibility=='enabled'){?>

<?php if(($forrst_switch=='enabled')||($dribbble_switch=='enabled')||($flickr_switch=='enabled')||($twitter_switch=='enabled')||($facebook_switch=='enabled')||($skype_switch=='enabled')||($digg_switch=='enabled')||($google_switch=='enabled')||($html5_switch=='enabled')||($linkedin_switch=='enabled')||($lastfm_switch=='enabled')||($vimeo_switch=='enabled')||($yahoo_switch=='enabled')||($tumblr_switch=='enabled')||($apple_switch=='enabled')||($windows_switch=='enabled')||($youtube_switch=='enabled')||($delicious_switch=='enabled')||($rss_switch=='enabled')||($picasa_switch=='enabled')||($deviantart_switch=='enabled')||($whatsapp_switch=='enabled')||($snapchat_switch=='enabled')||($blogger_switch=='enabled')||($wordpress_switch=='enabled')||($amazon_switch=='enabled')||($appstore_switch=='enabled')||($paypal_switch=='enabled')||($myspace_switch=='enabled')||($dropbox_switch=='enabled')||($windows8_switch=='enabled')||($pinterest_switch=='enabled')||($soundcloud_switch=='enabled')||($google_drive_switch=='enabled')||($android_switch=='enabled')||($behance_switch=='enabled')||($instagram_switch=='enabled')||($ebay_switch=='enabled')||($google_plus_switch=='enabled')||($github_switch=='enabled')||($stackoverflow_switch=='enabled')||($visa_switch=='enabled')||($mastercard_switch=='enabled')||($amex_switch=='enabled')||($ios_switch=='enabled')||($osx_switch=='enabled')||($evernote_switch=='enabled')||($yelp_switch=='enabled')||($yelp2_switch=='enabled')||($medium_switch=='enabled')||($slack_switch=='enabled')||($vine_switch=='enabled')||($edge_switch=='enabled')||($outlook_switch=='enabled')||($pencilcase_switch=='enabled')||($play_switch=='enabled')||($icloud_switch=='enabled')
){?>

		<div class="social-container">
			<div class="social-icons-container<?php if($header_social_media_type=='variant_2'){?> social-icons-container-type-2<?php }?>">
				<ul>
					<?php if($forrst_switch=='enabled'){?><li><a href="<?php if($forrst_url){ echo $forrst_url; }?>"><i class="social-icon social-icon-01-forrst"></i><span class="tooltip-text tooltip-container"><span>Forrest</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($dribbble_switch=='enabled'){?><li><a href="<?php if($dribbble_url){ echo $dribbble_url; }?>"><i class="social-icon social-icon-02-dribbble"></i><span class="tooltip-text tooltip-container"><span>Dribbble</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($flickr_switch=='enabled'){?><li><a href="<?php if($flickr_url){ echo $flickr_url; }?>"><i class="social-icon social-icon-04-flickr"></i><span class="tooltip-text tooltip-container"><span>Flickr</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($twitter_switch=='enabled'){?><li><a href="<?php if($twitter_url){ echo $twitter_url; }?>"><i class="social-icon social-icon-05-twitter"></i><span class="tooltip-text tooltip-container"><span>Twitter</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($facebook_switch=='enabled'){?><li><a href="<?php if($facebook_url){ echo $facebook_url; }?>"><i class="social-icon social-icon-06-facebook"></i><span class="tooltip-text tooltip-container"><span>Facebook</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($skype_switch=='enabled'){?><li><a href="<?php if($skype_url){ echo $skype_url; }?>"><i class="social-icon social-icon-07-skype"></i><span class="tooltip-text tooltip-container"><span>Skype</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($digg_switch=='enabled'){?><li><a href="<?php if($digg_url){ echo $digg_url; }?>"><i class="social-icon social-icon-08-digg"></i><span class="tooltip-text tooltip-container"><span>Digg</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($google_switch=='enabled'){?><li><a href="<?php if($google_url){ echo $google_url; }?>"><i class="social-icon social-icon-09-google"></i><span class="tooltip-text tooltip-container"><span>Google</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($html5_switch=='enabled'){?><li><a href="<?php if($html5_url){ echo $html5_url; }?>"><i class="social-icon social-icon-10-html5"></i><span class="tooltip-text tooltip-container"><span>Html5</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($linkedin_switch=='enabled'){?><li><a href="<?php if($linkedin_url){ echo $linkedin_url; }?>"><i class="social-icon social-icon-11-linkedin"></i><span class="tooltip-text tooltip-container"><span>Linkedin</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($lastfm_switch=='enabled'){?><li><a href="<?php if($lastfm_url){ echo $lastfm_url; }?>"><i class="social-icon social-icon-12-lastfm"></i><span class="tooltip-text tooltip-container"><span>Lastfm</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($vimeo_switch=='enabled'){?><li><a href="<?php if($vimeo_url){ echo $vimeo_url; }?>"><i class="social-icon social-icon-13-vimeo"></i><span class="tooltip-text tooltip-container"><span>Vimeo</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($yahoo_switch=='enabled'){?><li><a href="<?php if($yahoo_url){ echo $yahoo_url; }?>"><i class="social-icon social-icon-14-yahoo"></i><span class="tooltip-text tooltip-container"><span>Yahoo</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($tumblr_switch=='enabled'){?><li><a href="<?php if($tumblr_url){ echo $tumblr_url; }?>"><i class="social-icon social-icon-15-tumblr"></i><span class="tooltip-text tooltip-container"><span>Tumblr</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($apple_switch=='enabled'){?><li><a href="<?php if($apple_url){ echo $apple_url; }?>"><i class="social-icon social-icon-16-apple"></i><span class="tooltip-text tooltip-container"><span>Apple</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($windows_switch=='enabled'){?><li><a href="<?php if($windows_url){ echo $windows_url; }?>"><i class="social-icon social-icon-17-windows"></i><span class="tooltip-text tooltip-container"><span>Windows</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($youtube_switch=='enabled'){?><li><a href="<?php if($youtube_url){ echo $youtube_url; }?>"><i class="social-icon social-icon-18-youtube"></i><span class="tooltip-text tooltip-container"><span>Youtube</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($delicious_switch=='enabled'){?><li><a href="<?php if($delicious_url){ echo $delicious_url; }?>"><i class="social-icon social-icon-19-delicious"></i><span class="tooltip-text tooltip-container"><span>Delicious</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($rss_switch=='enabled'){?><li><a href="<?php if($rss_url){ echo $rss_url; }?>"><i class="social-icon social-icon-20-rss"></i><span class="tooltip-text tooltip-container"><span>Rss</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($picasa_switch=='enabled'){?><li><a href="<?php if($picasa_url){ echo $picasa_url; }?>"><i class="social-icon social-icon-21-picasa"></i><span class="tooltip-text tooltip-container"><span>Picasa</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($deviantart_switch=='enabled'){?><li><a href="<?php if($deviantart_url){ echo $deviantart_url; }?>"><i class="social-icon social-icon-22-deviantart"></i><span class="tooltip-text tooltip-container"><span>Deviantart</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($whatsapp_switch=='enabled'){?><li><a href="<?php if($whatsapp_url){ echo $whatsapp_url; }?>"><i class="social-icon social-icon-23-whatsapp"></i><span class="tooltip-text tooltip-container"><span>Whatsapp</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($snapchat_switch=='enabled'){?><li><a href="<?php if($snapchat_url){ echo $snapchat_url; }?>"><i class="social-icon social-icon-24-snapchat"></i><span class="tooltip-text tooltip-container"><span>Snapchat</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($blogger_switch=='enabled'){?><li><a href="<?php if($blogger_url){ echo $blogger_url; }?>"><i class="social-icon social-icon-25-blogger"></i><span class="tooltip-text tooltip-container"><span>Blogger</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($wordpress_switch=='enabled'){?><li><a href="<?php if($wordpress_url){ echo $wordpress_url; }?>"><i class="social-icon social-icon-26-wordpress"></i><span class="tooltip-text tooltip-container"><span>Wordpress</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($amazon_switch=='enabled'){?><li><a href="<?php if($amazon_url){ echo $amazon_url; }?>"><i class="social-icon social-icon-27-amazon"></i><span class="tooltip-text tooltip-container"><span>Amazon</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($appstore_switch=='enabled'){?><li><a href="<?php if($appstore_url){ echo $appstore_url; }?>"><i class="social-icon social-icon-28-appstore"></i><span class="tooltip-text tooltip-container"><span>Appstore</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($paypal_switch=='enabled'){?><li><a href="<?php if($paypal_url){ echo $paypal_url; }?>"><i class="social-icon social-icon-29-paypal"></i><span class="tooltip-text tooltip-container"><span>Paypal</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($myspace_switch=='enabled'){?><li><a href="<?php if($myspace_url){ echo $myspace_url; }?>"><i class="social-icon social-icon-30-myspace"></i><span class="tooltip-text tooltip-container"><span>Myspace</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($dropbox_switch=='enabled'){?><li><a href="<?php if($dropbox_url){ echo $dropbox_url; }?>"><i class="social-icon social-icon-31-dropbox"></i><span class="tooltip-text tooltip-container"><span>Dropbox</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($windows8_switch=='enabled'){?><li><a href="<?php if($windows8_url){ echo $windows8_url; }?>"><i class="social-icon social-icon-32-windows8"></i><span class="tooltip-text tooltip-container"><span>Windows 8</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($pinterest_switch=='enabled'){?><li><a href="<?php if($pinterest_url){ echo $pinterest_url; }?>"><i class="social-icon social-icon-33-pinterest"></i><span class="tooltip-text tooltip-container"><span>Pinterest</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($soundcloud_switch=='enabled'){?><li><a href="<?php if($soundcloud_url){ echo $soundcloud_url; }?>"><i class="social-icon social-icon-34-soundcloud"></i><span class="tooltip-text tooltip-container"><span>Soundcloud</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($google_drive_switch=='enabled'){?><li><a href="<?php if($google_drive_url){ echo $google_drive_url; }?>"><i class="social-icon social-icon-35-google-drive"></i><span class="tooltip-text tooltip-container"><span>Google Drive</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($android_switch=='enabled'){?><li><a href="<?php if($android_url){ echo $android_url; }?>"><i class="social-icon social-icon-36-android"></i><span class="tooltip-text tooltip-container"><span>Android</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($behance_switch=='enabled'){?><li><a href="<?php if($behance_url){ echo $behance_url; }?>"><i class="social-icon social-icon-37-behance"></i><span class="tooltip-text tooltip-container"><span>Behance</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($instagram_switch=='enabled'){?><li><a href="<?php if($instagram_url){ echo $instagram_url; }?>"><i class="social-icon social-icon-38-instagram"></i><span class="tooltip-text tooltip-container"><span>Instagram</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($ebay_switch=='enabled'){?><li><a href="<?php if($ebay_url){ echo $ebay_url; }?>"><i class="social-icon social-icon-39-ebay"></i><span class="tooltip-text tooltip-container"><span>Ebay</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($google_plus_switch=='enabled'){?><li><a href="<?php if($google_plus_url){ echo $google_plus_url; }?>"><i class="social-icon social-icon-40-google-plus"></i><span class="tooltip-text tooltip-container"><span>Google Plus</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($github_switch=='enabled'){?><li><a href="<?php if($github_url){ echo $github_url; }?>"><i class="social-icon social-icon-41-github"></i><span class="tooltip-text tooltip-container"><span>Github</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($stackoverflow_switch=='enabled'){?><li><a href="<?php if($stackoverflow_url){ echo $stackoverflow_url; }?>"><i class="social-icon social-icon-42-stackoverflow"></i><span class="tooltip-text tooltip-container"><span>Spotify</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($spotify_switch=='enabled'){?><li><a href="<?php if($spotify_url){ echo $spotify_url; }?>"><i class="social-icon social-icon-43-spotify"></i><span class="tooltip-text tooltip-container"><span>Stumbleupon</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($stumbleupon_switch=='enabled'){?><li><a href="<?php if($stumbleupon_url){ echo $stumbleupon_url; }?>"><i class="social-icon social-icon-44-stumbleupon"></i><span class="tooltip-text tooltip-container"><span>Visa</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($visa_switch=='enabled'){?><li><a href="<?php if($visa_url){ echo $visa_url; }?>"><i class="social-icon social-icon-45-visa"></i><span class="tooltip-text tooltip-container"><span>Mastercard</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($mastercard_switch=='enabled'){?><li><a href="<?php if($mastercard_url){ echo $mastercard_url; }?>"><i class="social-icon social-icon-46-mastercard"></i><span class="tooltip-text tooltip-container"><span>Amex</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($amex_switch=='enabled'){?><li><a href="<?php if($amex_url){ echo $amex_url; }?>"><i class="social-icon social-icon-47-amex"></i><span class="tooltip-text tooltip-container"><span>Ios</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($ios_switch=='enabled'){?><li><a href="<?php if($ios_url){ echo $ios_url; }?>"><i class="social-icon social-icon-48-ios"></i><span class="tooltip-text tooltip-container"><span>Osx</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($osx_switch=='enabled'){?><li><a href="<?php if($osx_url){ echo $osx_url; }?>"><i class="social-icon social-icon-49-osx"></i><span class="tooltip-text tooltip-container"><span>Evernote</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($evernote_switch=='enabled'){?><li><a href="<?php if($evernote_url){ echo $evernote_url; }?>"><i class="social-icon social-icon-50-evernote"></i><span class="tooltip-text tooltip-container"><span>Yelp</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($yelp_switch=='enabled'){?><li><a href="<?php if($yelp_url){ echo $yelp_url; }?>"><i class="social-icon social-icon-51-yelp"></i><span class="tooltip-text tooltip-container"><span>Yelp</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($yelp2_switch=='enabled'){?><li><a href="<?php if($yelp2_url){ echo $yelp2_url; }?>"><i class="social-icon social-icon-52-yelp"></i><span class="tooltip-text tooltip-container"><span>Slack</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($medium_switch=='enabled'){?><li><a href="<?php if($medium_url){ echo $medium_url; }?>"><i class="social-icon social-icon-53-medium"></i><span class="tooltip-text tooltip-container"><span>Forrest</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($slack_switch=='enabled'){?><li><a href="<?php if($slack_url){ echo $slack_url; }?>"><i class="social-icon social-icon-54-slack"></i><span class="tooltip-text tooltip-container"><span>Forrest</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($vine_switch=='enabled'){?><li><a href="<?php if($vine_url){ echo $vine_url; }?>"><i class="social-icon social-icon-55-vine"></i><span class="tooltip-text tooltip-container"><span>Vine</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($edge_switch=='enabled'){?><li><a href="<?php if($edge_url){ echo $edge_url; }?>"><i class="social-icon social-icon-56-edge"></i><span class="tooltip-text tooltip-container"><span>Edge</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($outlook_switch=='enabled'){?><li><a href="<?php if($outlook_url){ echo $outlook_url; }?>"><i class="social-icon social-icon-57-outlook"></i><span class="tooltip-text tooltip-container"><span>Outlook</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($pencilcase_switch=='enabled'){?><li><a href="<?php if($pencilcase_url){ echo $pencilcase_url; }?>"><i class="social-icon social-icon-58-pencilcase"></i><span class="tooltip-text tooltip-container"><span>Pencilcase</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($play_switch=='enabled'){?><li><a href="<?php if($play_url){ echo $play_url; }?>"><i class="social-icon social-icon-59-play"></i><span class="tooltip-text tooltip-container"><span>Play</span></span><span class="bg-overlay"></span></a></li><?php }?>
					<?php if($icloud_switch=='enabled'){?><li><a href="<?php if($icloud_url){ echo $icloud_url; }?>"><i class="social-icon social-icon-60-icloud"></i><span class="tooltip-text tooltip-container"><span>iCloud</span></span><span class="bg-overlay"></span></a></li><?php }?>
				</ul>
			</div>
		</div>
		
<?php }?>

<?php }?>