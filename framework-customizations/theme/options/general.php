<?php

	if ( ! defined( 'FW' ) ) {
		die( 'Forbidden' );
	}

	$options = array(
		array(
			'general' => array(
				'title' => esc_html__( 'General', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
				
					'general_options' => array(
						'title' => esc_html__( 'General options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'General options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
		
									'body_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#ffffff',
									    'label' => __('Body Color', 'lpd-abcpersonal'),
									),
									'header_wrap_bg' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#f0f0f0',
									    'label' => __('Header Wrap Background', 'lpd-abcpersonal'),
									),
									'header_layouts' => array(
									    'type'  => 'select',
									    'value' => '1480',
									    'label' => __('Header Layouts', 'lpd-abcpersonal' ),
									    'choices' => array(
									        '1480' => __('1480px wide', 'lpd-abcpersonal' ),
									        '1200' => __('1200px wide', 'lpd-abcpersonal' ),
									    ),
									),
									'title_layouts' => array(
									    'type'  => 'select',
									    'value' => '1200',
									    'label' => __('Title Layouts', 'lpd-abcpersonal' ),
									    'choices' => array(
									        '1480' => __('1480px wide', 'lpd-abcpersonal' ),
									        '1200' => __('1200px wide', 'lpd-abcpersonal' ),
									    ),
									),
									'main_layouts' => array(
									    'type'  => 'select',
									    'value' => '1200',
									    'label' => __('Page Layouts', 'lpd-abcpersonal' ),
									    'choices' => array(
									        '1480' => __('1480px wide', 'lpd-abcpersonal' ),
									        '1200' => __('1200px wide', 'lpd-abcpersonal' ),
									    ),
									),
									'footer_layouts' => array(
									    'type'  => 'select',
									    'value' => '1200',
									    'label' => __('Footer Layouts', 'lpd-abcpersonal' ),
									    'choices' => array(
									        '1480' => __('1480px wide', 'lpd-abcpersonal' ),
									        '1200' => __('1200px wide', 'lpd-abcpersonal' ),
									    ),
									),
									
								)
							),
	
						),
					),
					
					'typography_options' => array(
						'title' => esc_html__( 'Typography', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Typography', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
		
									'body_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Open Sans',
									        'subset' => 'latin-ext',
									        'variation' => 'regular',
									        'size' => 14,
									        'line-height' => 1.8,
									        'letter-spacing' => 0,
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => true,
									        'letter-spacing' => true,
									        'color'          => false
									    ),
									    'label' => __('Body Font', 'lpd-abcpersonal'),
									),
									
									'body_font_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Body Font Color', 'lpd-abcpersonal'),
									),
									
									'link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Link Color', 'lpd-abcpersonal'),
									),
									
									'link_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#6CD8BD',
									    'label' => __('Link Hover Color', 'lpd-abcpersonal'),
									),
									
									'headings_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'line-height' => 1.5,
									        'letter-spacing' => 0,
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => false,
									        'line-height'    => true,
									        'letter-spacing' => true,
									        'color'          => false
									    ),
									    'label' => __('Headings Font', 'lpd-abcpersonal'),
									),
									
									'headings_font_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,1)',
									    'label' => __('Headings Font Color', 'lpd-abcpersonal'),
									),


								)
							),
	
						),
					),
					
					'sidebar_options' => array(
						'title' => esc_html__( 'Sidebar', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Sidebar', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'widget_link_color_group' => array(
									    'type' => 'group',
									    'options' => array(

											'widget_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Link Color', 'lpd-abcpersonal'),
											),
											
											'widget_link_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#6CD8BD',
											    'label' => __('Link Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),								

									'widget_title_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '700',
									        'size' => 14,
									        'letter-spacing' => 1,
									        'color' => '#252525'
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Widget Title Font', 'lpd-abcpersonal'),
									),
									
									'widget_list_link_color_group' => array(
									    'type' => 'group',
									    'options' => array(

											'widget_list_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('Widget List Link Color', 'lpd-abcpersonal'),
											),
											
											'widget_list_link_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Widget List Link Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									
									'search_widget_btn_color_group' => array(
									    'type' => 'group',
									    'options' => array(

											'search_widget_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Search Widget Button Color', 'lpd-abcpersonal'),
											),
											
											'search_widget_btn_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Search Widget Button Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									
									'tag_widget_title_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => 'regular',
									        'size' => 13,
									        'letter-spacing' => 0,
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => false
									    ),
									    'label' => __('Tag Widget Font', 'lpd-abcpersonal'),
									),



								)
							),
	
						),
					),
					
					'custom_cssjs_options' => array(
						'title' => esc_html__( 'Custom Css/Js', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
						
							'custom_cssjs_options-box' => array(
								'title' => esc_html__( 'Custom Css/Js', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'custom_css' => array(
									    'type'  => 'textarea',
									    'value' => '',
									    'label' => __('Custom Css', 'lpd-abcpersonal'),
									),
									
									'custom_js' => array(
									    'type'  => 'textarea',
									    'value' => '',
									    'label' => __('Custom Js', 'lpd-abcpersonal'),
									),
									
								)
							),
	
						),
					),
					
					'widget_social_media' => array(
						'title' => esc_html__( 'Social Media Widget', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
						
							'theme_options-box' => array(
								'title' => esc_html__( 'Social Media Widget', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'group_widget_social_media' => array(
									    'type' => 'group',
									    'options' => array(
								
										'widget_social_media_type' => array(
										    'type'  => 'radio',
										    'value' => 'variant_1',
										    'label' => __('Button Types', 'lpd-abcpersonal' ),
										    'choices' => array(
										        'variant_1' => __('Variant 1', 'lpd-abcpersonal' ),
										        'variant_2' => __('Variant 2', 'lpd-abcpersonal' ),
										    ),
										    'inline' => false,
										),
										
										'widget_social_media_forrst' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'forrst_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Forrst', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'forrst_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_dribbble' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'dribbble_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Dribbble', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'dribbble_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_flickr' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'flickr_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Flickr', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'flickr_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_twitter' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'twitter_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Twitter', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'twitter_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_facebook' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'facebook_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Facebook', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'facebook_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_skype' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'skype_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Skype', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'skype_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_digg' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'digg_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Digg', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'digg_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_google' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'google_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Google', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'google_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_html5' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'html5_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Html5', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'html5_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_linkedin' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'linkedin_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Linkedin', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'linkedin_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_lastfm' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'lastfm_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Lastfm', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'lastfm_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_vimeo' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'vimeo_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Vimeo', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'vimeo_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_yahoo' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'yahoo_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Yahoo', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'yahoo_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_tumblr' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'tumblr_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Tumblr', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'tumblr_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_apple' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'apple_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Apple', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'apple_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_windows' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'windows_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Windows', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'windows_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_youtube' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'youtube_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Youtube', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'youtube_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_delicious' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'delicious_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Delicious', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'delicious_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_rss' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'rss_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Rss', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'rss_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_picasa' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'picasa_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Picasa', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'picasa_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_deviantart' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'deviantart_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Deviantart', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'deviantart_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_23-whatsapp' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'whatsapp_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Whatsapp', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'whatsapp_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_snapchat' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'snapchat_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Snapchat', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'snapchat_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_blogger' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'blogger_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Blogger', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'blogger_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_wordpress' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'wordpress_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Wordpress', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'wordpress_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_amazon' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'amazon_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Amazon', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'amazon_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_appstore' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'appstore_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Appstore', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'appstore_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_paypal' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'paypal_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Paypal', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'paypal_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_myspace' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'myspace_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Myspace', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'myspace_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_dropbox' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'dropbox_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Dropbox', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'dropbox_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_windows8' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'windows8_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Windows8', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'windows8_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_pinterest' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'pinterest_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Pinterest', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'pinterest_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_soundcloud' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'soundcloud_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Soundcloud', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'soundcloud_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_google_drive' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'google_drive_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Google Drive', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'google_drive_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_android' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'android_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Android', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'android_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_behance' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'behance_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Behance', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'behance_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_instagram' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'instagram_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Instagram', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'instagram_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_ebay' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'ebay_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Ebay', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'ebay_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_google_plus' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'google_plus_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Google Plus', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'google_plus_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_github' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'github_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Github', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'github_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_stackoverflow' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'stackoverflow_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Stackoverflow', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'stackoverflow_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_spotify' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'spotify_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Spotify', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'spotify_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_stumbleupon' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'stumbleupon_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Stumbleupon', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'stumbleupon_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_visa' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'visa_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Visa', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'visa_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_mastercard' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'mastercard_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Mastercard', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'mastercard_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_amex' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'amex_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Amex', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'amex_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_ios' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'ios_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Ios', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'ios_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_osx' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'osx_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Osx', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'osx_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_evernote' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'evernote_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Evernote', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'evernote_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_yelp' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'yelp_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Yelp', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'yelp_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_yelp2' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'yelp2_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Yelp', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'yelp2_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_medium' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'medium_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Medium', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'medium_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_slack' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'slack_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Slack', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'slack_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_vine' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'vine_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Vine', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'vine_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_edge' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'edge_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Edge', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'edge_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_outlook' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'outlook_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Outlook', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'outlook_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_pencilcase' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'pencilcase_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Pencilcase', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'pencilcase_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'widget_social_media_play' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'play_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Play', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'play_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),
							
										'widget_social_media_icloud' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'icloud_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('iCloud', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												)
											),
											'choices' => array(
												'enabled' => array(
			
													'icloud_url' => array(
														'label' => __('URL (Link)', 'lpd-abcpersonal' ),
														'type' => 'text',
														'value' => '',
														'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
													),
		
												),
											),
											'show_borders' => false,
										),

										'widget_social_media_btn_color' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(255,255,255,1)',
										    'label' => __('Button Color', 'lpd-abcpersonal' )
										),
										'widget_social_media_btn_background' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(72,207,173,1)',
										    'label' => __('Background Color', 'lpd-abcpersonal' )
										),
										'widget_social_media_btn_background_hover' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(37,37,37,1)',
										    'label' => __('Background Hover Color', 'lpd-abcpersonal' )
										),
										'widget_social_media_tooltip_bg' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(37,37,37,1)',
										    'label' => __('Tooltip Bakground', 'lpd-abcpersonal' )
										),									
										
										
	
								
										),
									),
								
								)
							),
	
						),
					),
					'search_page_options' => array(
						'title' => esc_html__( 'Search Page', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
						
							'search_page_options-box' => array(
								'title' => esc_html__( 'Search Page', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(


									'search_page_form_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'search_page_form_btn_text' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'size' => 13,
											        'letter-spacing' => 1
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Button Text', 'lpd-abcpersonal' )
											),
											'search_page_form_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'search_page_form_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'search_page_form_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'search_page_form_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
									    
									    ),
									    
									),
									'search_page_thumbnail_group' => array(
									    'type' => 'group',
									    'options' => array(

											'search_page_thumb_overlay_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,0.5)',
											    'label' => __('Thumbnail Overlay Color', 'lpd-abcpersonal'),
											),
											'search_page_thumb_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Thumbnail Button Color', 'lpd-abcpersonal'),
											),
											'search_page_thumb_btn_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#6cd8bd',
											    'label' => __('Thumbnail Button Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									'search_page_title_group' => array(
									    'type' => 'group',
									    'options' => array(

											'search_page_title' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 18,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Post Title Font', 'lpd-abcpersonal'),
											),
											'search_page_title_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Title Color', 'lpd-abcpersonal'),
											),
											'search_page_title_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Title Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									'search_page_img_replacement' =>array(
									    'type'  => 'switch',
									    'value' => 'enabled',
									    'label' => __('Image Replacement', 'lpd-abcpersonal' ),
									    'left-choice' => array(
									        'value' => 'disabled',
									        'label' => __('Disabled', 'lpd-abcpersonal' ),
									    ),
									    'right-choice' => array(
									        'value' => 'enabled',
									        'label' => __('Enabled', 'lpd-abcpersonal' ),
									    ),
									),
								
								)
							),
	
						),
					),
					
				)
			)
		),
	);
	
	?>