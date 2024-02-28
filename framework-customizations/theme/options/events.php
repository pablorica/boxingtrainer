<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'events' => array(
				'title' => esc_html__( 'Events', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
				
					'events_post_options' => array(
						'title' => esc_html__( 'Events page options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'events_post-box' => array(
								'title' => esc_html__( 'Events page options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'events_title' => array(
								        'type'  => 'text',
								        'value' => 'Events',
								        'label' => __('Events Title', 'lpd-abcpersonal' ),
									),
									'events_sub_title' => array(
								        'type'  => 'text',
								        'value' => '',
								        'label' => __('Events Sub-title', 'lpd-abcpersonal' ),
									),
									'events_header_custom_background' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'events_header_custom_background_switch' => array(
												'type'  => 'switch',
											    'value' => 'disabled',
											    'label' => __('Custom Header Background', 'lpd-abcpersonal' ),
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
				
												'events_header_background_choice' => array(
													'type' => 'multi-picker',
													'show_borders' => false,
													'label' => false,
													'desc' => false,
													'value' => array(
														'events_header_background_type' => 'background_color',
													),
													'picker' => array(
														'events_header_background_type' => array(
															'type'  => 'radio',
														    'label' => __('Background', 'lpd-abcpersonal' ),
														    'choices' => array(
														        'background_color' => __('Background Color', 'lpd-abcpersonal' ),
														        'background_image' => __('Background Image', 'lpd-abcpersonal' ),
														    ),
														    'inline' => true,
														)
													),
													'choices' => array(
														'background_color' => array(
														
															'header_background_color' => array(
															    'type'  => 'color-picker',
															    'value' => '#f5f5f5',
															    'label' => __('Background Color', 'lpd-abcpersonal' )
															)
												
														),
														'background_image' => array(
														
															'header_background_color' => array(
															    'type'  => 'rgba-color-picker',
															    'value' => '#252525',
															    'label' => __('Background Color', 'lpd-abcpersonal'),
															),
															'header_background_settings' => array(
															    'type'  => 'select',
															    'value' => 'repeat_center',
															    'label' => __('Background Settings', 'lpd-abcpersonal' ),
															    'choices' => array(
															        'repeat_center' => __('Repeat, Position: center center', 'lpd-abcpersonal' ),
															        'repeat_top' => __('Repeat, Position: top center', 'lpd-abcpersonal' ),
															        'cover_center' => __('Cover, Position: center center', 'lpd-abcpersonal' ),
															        'parallax_center' => __('Parallax, Position: center center', 'lpd-abcpersonal' ),
															    ),
															    'no-validate' => false,
															),
															'header_background_image' => array(
																'label' => esc_html__( 'Background Image', 'lpd-abcpersonal' ),
																'type' => 'upload',
															),
															
														
														),
													),
							
												),
											),
										),
										'show_borders' => false,
									),
									'events_header_title_paddings_group' => array(
									    'type' => 'group',
									    'options' => array(
											'events_header_title_paddings' =>array(
											    'type'  => 'html',
											    'label' => __('Title Paddings', 'lpd-abcpersonal' ),
											    'html'  => '',
											),
											'events_header_title_padding_top' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '100',
												'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
											),
											'events_header_title_padding_bottom' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '100',
												'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
											),
											'events_header_title_padding_clearfix' =>array(
											    'type'  => 'html',
											    'label' => '',
											    'html'  => '<div class="wp-clearfix"></div>',
											),
										)
									),
									'events_header_title_visibility_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'events_header_title_visibility' => array(
												'type'  => 'switch',
											    'value' => 'enabled',
											    'label' => __('Title', 'lpd-abcpersonal' ),
											    'left-choice' => array(
											        'value' => 'disabled',
											        'label' => __('Disabled', 'lpd-abcpersonal' ),
											    ),
											    'right-choice' => array(
											        'value' => 'enabled',
											        'label' => __('Enabled', 'lpd-abcpersonal' ),
											    ),
											),
											'events_header_breadcrumb_visibility' => array(
												'type'  => 'switch',
											    'value' => 'enabled',
											    'label' => __('Breadcrumb', 'lpd-abcpersonal' ),
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
									),
									'events_options_group' => array(
									    'type' => 'group',
									    'options' => array(
										
											'events_options_paddings' =>array(
											    'type'  => 'html',
											    'label' => __('Page Paddings', 'lpd-abcpersonal' ),
											    'html'  => '',
											),
											'events_options_padding_top' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '50',
												'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
											),
											'events_options_padding_bottom' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '30',
												'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
											),
											'events_options_padding_clearfix' =>array(
											    'type'  => 'html',
											    'label' => '',
											    'html'  => '<div class="wp-clearfix"></div>',
											),
									
										),
									),
									'events_footer_settings_group' => array(
									    'type' => 'group',
									    'options' => array(
										
											'events_footer' => array(
												'type'  => 'switch',
											    'value' => 'enabled',
											    'label' => __('Footer', 'lpd-abcpersonal' ),
											    'left-choice' => array(
											        'value' => 'disabled',
											        'label' => __('Disabled', 'lpd-abcpersonal' ),
											    ),
											    'right-choice' => array(
											        'value' => 'enabled',
											        'label' => __('Enabled', 'lpd-abcpersonal' ),
											    ),
											),
											'events_bottom_footer' => array(
												'type'  => 'switch',
											    'value' => 'enabled',
											    'label' => __('Bottom Section', 'lpd-abcpersonal' ),
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
									),
									'events_sidebar' => array(
									    'type'  => 'short-select',
									    'value' => 'full',
									    'label' => '',
									    'choices' => array(
											'full' => __('Full Width', 'lpd-abcpersonal' ),
											'left' => __('Left', 'lpd-abcpersonal' ),
											'right' => __('Right', 'lpd-abcpersonal' ),
									    ),
									    'label' => __('Events Page Sidebar', 'lpd-abcpersonal' ),
									    'no-validate' => false,
									),

														
								)
							),
	
						),
					),
					
					'events_bar_styles' => array(
						'title' => esc_html__( 'Events Bar', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'events_form_options-box' => array(
								'title' => esc_html__( 'Events Bar', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'events_form_group' => array(
									    'type' => 'group',
									    'options' => array(
											'events_form_border_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#ebebeb',
											    'label' => __('Border Color', 'lpd-abcpersonal' )
											),
											'events_form_border_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#c2c2c2',
											    'label' => __('Border Focus Color', 'lpd-abcpersonal' )
											),
											'events_form_bg_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#fff',
											    'label' => __('Form Color', 'lpd-abcpersonal' )
											),
											'events_form_bg_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#fffeef',
											    'label' => __('Form Focus Color', 'lpd-abcpersonal' )
											),
											'events_form_label_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Open Sans',
											        'subset' => 'latin-ext',
											        'variation' => 'regular',
											        'size' => 14,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Form Label Font', 'lpd-abcpersonal'),
											),
											'events_form_label_element_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Label Element Color', 'lpd-abcpersonal'),
											),
									    ),
	
									    
									),
									'viewas_navigation_group' => array(
									    'type' => 'group',
									    'options' => array(
											'viewas_navigation_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('"View As" Navigation Color', 'lpd-abcpersonal'),
											),
											'viewas_navigation_hover_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('"View As" Navigation Hover Color', 'lpd-abcpersonal'),
											),
									    ),
	
									    
									),
									'events_form_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'events_form_btn_text' => array(
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
											'events_form_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'events_form_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'events_form_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'events_form_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
									    
									    ),
	
									    
									),
								
								)
							),
	
						),
					),
					
					'events_month_view_options' => array(
						'title' => esc_html__( 'Mouth View Calendar', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'events_post-box' => array(
								'title' => esc_html__( 'Mouth View Calendar', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'navigation_btn_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'navigation_btn_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Navigation Font', 'lpd-abcpersonal'),
											),
											'navigation_btn_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('Navigation Color', 'lpd-abcpersonal'),
											),
											'navigation_btn_hover_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Navigation Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
	   
									),
									'calendar_styles_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'calendar_table_header' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => '0'
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Table Header Font', 'lpd-abcpersonal' )
											),
											'calendar_border_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(0,0,0,0.1)',
											    'label' => __('Calendar Border Color', 'lpd-abcpersonal'),
											),
											'calendar_bg_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#ffffff',
											    'label' => __('Calendar Background Color', 'lpd-abcpersonal'),
											),
											'calendar_text_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('Calendar Text Color', 'lpd-abcpersonal'),
											),
											'calendar_date_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => '0'
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Date Font', 'lpd-abcpersonal' )
											),
											'calendar_date_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.5)',
											    'label' => __('Date Color', 'lpd-abcpersonal'),
											),
											'calendar_date_bg_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#fafafa',
											    'label' => __('Date Background Color', 'lpd-abcpersonal'),
											),
											'calendar_date_active_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('Date Active Color', 'lpd-abcpersonal'),
											),
											'calendar_date_active_bg_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(0,0,0,0.1)',
											    'label' => __('Date Background Active Color', 'lpd-abcpersonal'),
											),
											'events_link_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '500',
											        'size' => 13,
											        'letter-spacing' => '0'
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Events Link Font', 'lpd-abcpersonal' )
											),
											'events_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('Events Link Color', 'lpd-abcpersonal'),
											),
											'events_link_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Events Link Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
	   
									),
									'calendar_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'calendar_btn_text' => array(
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
											'calendar_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'calendar_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'calendar_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'calendar_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
									    
									    ),
	
									    
									),
									
								)
							),
	
						),
					),
					
					'events_listday_view_options' => array(
						'title' => esc_html__( 'List/Day View', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'events_listday_post-box' => array(
								'title' => esc_html__( 'List/Day View', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									
									'listday_navigation_btn_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'listday_navigation_btn_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Navigation Font', 'lpd-abcpersonal'),
											),
											'listday_navigation_btn_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('Navigation Color', 'lpd-abcpersonal'),
											),
											'listday_navigation_btn_hover_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Navigation Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
	   
									),
									'separator_title_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'listday_separator_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '500',
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
											    'label' => __('Separator font', 'lpd-abcpersonal'),
											),
											'listday_separator_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#959595',
											    'label' => __('Separator color', 'lpd-abcpersonal'),
											),
											'listday_separator_bg_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#fafafa',
											    'label' => __('Separator background color', 'lpd-abcpersonal'),
											),
									    
									    ),
	   
									),
									'events_front_post_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'events_front_post_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Post link color', 'lpd-abcpersonal'),
											),
											'events_front_post_link_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#6cd8bd',
											    'label' => __('Post link hover color', 'lpd-abcpersonal'),
											),
											'events_front_title_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 24,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Post title font', 'lpd-abcpersonal'),
											),
											'events_front_title_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Post title color', 'lpd-abcpersonal'),
											),
											'events_front_title_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Post title hover color', 'lpd-abcpersonal'),
											),
											'findoutmore_btn_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('"Find Out More" Button Font', 'lpd-abcpersonal'),
											),
											'findoutmore_btn_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('"Find Out More" Button Color', 'lpd-abcpersonal'),
											),
											'findoutmore_btn_link_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('"Find Out More" Button Hover Color', 'lpd-abcpersonal'),
											),
											'price_badge_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'size' => 14,
											        'letter-spacing' => 0.5,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Price Badge Font', 'lpd-abcpersonal'),
											),
											'price_badge_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#ffffff',
											    'label' => __('Price Badge Color', 'lpd-abcpersonal'),
											),
											'price_badge_background' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Price Badge Background', 'lpd-abcpersonal'),
											),
									    
									    ),
	   
									),
									'listday_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'listday_btn_text' => array(
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
											'listday_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'listday_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'listday_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'listday_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
									    
									    ),
	
									    
									),
									
									
								)
							),
	
						),
					),
					'event_post_view_options' => array(
						'title' => esc_html__( 'Event Post', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'event_post_post-box' => array(
								'title' => esc_html__( 'Event Post', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									
									'event_post_navigation_btn_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'event_post_navigation_btn_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Navigation Font', 'lpd-abcpersonal'),
											),
											'event_post_navigation_btn_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,0.8)',
											    'label' => __('Navigation Color', 'lpd-abcpersonal'),
											),
											'event_post_navigation_btn_hover_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Navigation Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
	   
									),
									'event_post_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'event_post_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Post link color', 'lpd-abcpersonal'),
											),
											'event_post_link_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#6cd8bd',
											    'label' => __('Post link hover color', 'lpd-abcpersonal'),
											),
											'event_post_price_badge_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'size' => 14,
											        'letter-spacing' => 0.5,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Price Badge Font', 'lpd-abcpersonal'),
											),
											'event_post_price_badge_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#ffffff',
											    'label' => __('Price Badge Color', 'lpd-abcpersonal'),
											),
											'event_post_price_badge_background' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Price Badge Background', 'lpd-abcpersonal'),
											),
											'event_post_defines_terms_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 12,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Defines Terms Font', 'lpd-abcpersonal'),
											),
									    
									    ),
	   
									),
									'event_post_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'event_post_btn_text' => array(
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
											'event_post_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'event_post_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'event_post_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'event_post_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
									    
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
