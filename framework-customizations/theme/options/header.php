<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'header' => array(
				'title' => esc_html__( 'Header', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
				
					'header_elements' => array(
						'title' => esc_html__( 'Header Elements', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Header Elements', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'sticky_menu_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'sticky_menu_visibility' => array(
												'type'  => 'switch',
											    'value' => 'disabled',
											    'label' => __('Sticky Menu', 'lpd-abcpersonal' ),
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
									
									'header_styles' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'header_background' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,0)',
											    'label' => __('Header Background', 'lpd-abcpersonal' )
											),
											'header_paddings' =>array(
											    'type'  => 'html',
											    'label' => __('Header Background', 'lpd-abcpersonal' ),
											    'html'  => '',
											),
											'header_padding_top' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '0',
												'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
											),
											'header_padding_bottom' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '0',
												'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
											),
											'header_padding_clearfix' =>array(
											    'type'  => 'html',
											    'label' => '',
											    'html'  => '<div class="wp-clearfix"></div>',
											),
											
											'header_bottom_border' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'header_bottom_border_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Header Bottom Border', 'lpd-abcpersonal' ),
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
				
														'header_border_weight' => array(
															'label' => __('Border Weight', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '1',
														),
														'header_border_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(0,0,0,0.1)',
														    'label' => __('Border Color', 'lpd-abcpersonal' )
														),
			
													),
												),
												'show_borders' => false,
											),
											
											'header_sticky_menu_styles' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'sticky_menu_styles_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
				
														'header_background' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,1)',
														    'label' => __('Header Background', 'lpd-abcpersonal' )
														),
														'header_paddings' =>array(
														    'type'  => 'html',
														    'label' => __('Header Paddings', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'header_padding_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'header_padding_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'header_padding_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'header_border_weight' => array(
															'label' => __('Border Weight', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '1',
														),
														'header_border_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(0,0,0,0.1)',
														    'label' => __('Border Color', 'lpd-abcpersonal' )
														),
			
													),
												),
												'show_borders' => false,
											),
									    
									    ),
									),
									
									'group_logo' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'header_logo' => array(
												'type' => 'multi-picker',
												'show_borders' => false,
												'label' => false,
												'desc' => false,
												'value' => array(
													'logo_type' => 'text_logo',
												),
												'picker' => array(
													'logo_type' => array(
														'type'  => 'radio',
													    'label' => __('Logo Type', 'lpd-abcpersonal' ),
													    'choices' => array(
													        'text_logo' => __('Text Logo', 'lpd-abcpersonal' ),
													        'image_logo' => __('Image Logo', 'lpd-abcpersonal' ),
													    ),
													    'inline' => false,
													)
												),
												'choices' => array(
													'text_logo' => array(
														'header_logo_text' => array(
														    'type' => 'typography-v2',
														    'value' => array(
														        'family' => 'Poppins',
														        'subset' => 'latin-ext',
														        'variation' => '600',
														        'size' => 36,
														        'letter-spacing' => 0,
														        'color' => '#252525'
														    ),
														    'components' => array(
														        'family'         => true,
														        'size'           => true,
														        'line-height'    => false,
														        'letter-spacing' => true,
														        'color'          => true
														    ),
														    'label' => __('Logo Text', 'lpd-abcpersonal' )
														),
														'header_logo_text_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Logo Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'header_logo_text_margin_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '40',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'header_logo_text_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'header_logo_text_margin_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'header_logo_text_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'header_logo_text_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'sticky_menu_styles' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sticky_menu_styles_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
							
																	'header_logo_text' => array(
																	    'type'  => 'color-picker',
																	    'value' => '#252525',
																	    'label' => __('Logo Text Color', 'lpd-abcpersonal' )
																	),
							
																	'header_logo_text_margins' =>array(
																	    'type'  => 'html',
																	    'label' => __('Logo Margins', 'lpd-abcpersonal' ),
																	    'html'  => '',
																	),
																	'header_logo_text_margin_top' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '40',
																		'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
																	),
																	'header_logo_text_margin_bottom' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'header_logo_text_margin_clearfix' =>array(
																	    'type'  => 'html',
																	    'label' => '',
																	    'html'  => '<div class="wp-clearfix"></div>',
																	),
																),
															),
															'show_borders' => false,
														),
														
													),
													'image_logo' => array(
														'header_logo_image' => array(
															'label' => esc_html__( 'Logo', 'lpd-abcpersonal' ),
															'type' => 'upload',
														),
														'header_logo_height' => array(
															'label' => esc_html__( 'Logo Height', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '40',
															'desc' => esc_html__( 'value in pixels', 'lpd-abcpersonal' ),
														),
														'header_logo_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Logo Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'header_logo_margin_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '40',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'header_logo_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'header_logo_margin_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'header_logo_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'header_logo_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'sticky_menu_styles' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sticky_menu_styles_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
							
																	'header_logo_image' => array(
																		'label' => esc_html__( 'Logo', 'lpd-abcpersonal' ),
																		'type' => 'upload',
																	),
																	'header_logo_height' => array(
																		'label' => esc_html__( 'Logo Height', 'lpd-abcpersonal' ),
																		'type' => 'short-text',
																		'value' => '80',
																		'desc' => esc_html__( 'value in pixels', 'lpd-abcpersonal' ),
																	),
							
																	'header_logo_margins' =>array(
																	    'type'  => 'html',
																	    'label' => __('Logo Margins', 'lpd-abcpersonal' ),
																	    'html'  => '',
																	),
																	'header_logo_margin_top' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '40',
																		'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
																	),
																	'header_logo_margin_bottom' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'header_logo_margin_clearfix' =>array(
																	    'type'  => 'html',
																	    'label' => '',
																	    'html'  => '<div class="wp-clearfix"></div>',
																	),
																),
															),
															'show_borders' => false,
														),
								
													)
												),
				
											),
									    
									    ),
									),
									
									'group_header_navigation' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'header_navigation_margin_top' => array(
												'label' => __('Header Navigation', 'lpd-abcpersonal' ),
												'type' => 'short-text',
												'value' => '55',
												'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
											),
											'right_bar' => array(
												'label' => __('Right Bar', 'lpd-abcpersonal' ),
												'type' => 'short-text',
												'value' => '30',
												'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
											),
											
											'header_navigation_sticky_menu_styles' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'sticky_menu_styles_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
				
														'header_navigation_margin_top' => array(
															'label' => __('Header Navigation', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '55',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
			
													),
												),
												'show_borders' => false,
											),
									    
										),
									),
									
									'group_menu_navigation' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'menu_navigation' => array(
												'type' => 'multi-picker',
												'show_borders' => false,
												'label' => false,
												'desc' => false,
												'value' => array(
													'menu_navigation_type' => 'visible',
												),
												'picker' => array(
													'menu_navigation_type' => array(
														'type'  => 'radio',
													    'label' => __('Menu Navatigion', 'lpd-abcpersonal' ),
													    'choices' => array(
													        'hidden' => __('Hidden', 'lpd-abcpersonal' ),
													        'visible' => __('Visible', 'lpd-abcpersonal' ),
													    ),
													    'inline' => false,
													)
												),
												'choices' => array(
													'visible' => array(
				
				
														'menu_visibility' => array(
														    'type'  => 'radio',
														    'value' => 'visible',
														    'label' => __('Menu', 'lpd-abcpersonal' ),
														    'choices' => array(
														        'hidden' => __('Hidden', 'lpd-abcpersonal' ),
														        'visible' => __('Visible', 'lpd-abcpersonal' ),
														    ),
														    'inline' => false,
														),
														
														'menu_nav_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,1)',
														    'label' => __('Button Color', 'lpd-abcpersonal' )
														),
														'menu_nav_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,1)',
														    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
														),
														'menu_nav_background_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,1)',
														    'label' => __('Background Color', 'lpd-abcpersonal' )
														),
														'menu_nav_background_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(108,216,189,1)',
														    'label' => __('Background Hover Color', 'lpd-abcpersonal' )
														),
														
														'menu_nav_border' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'menu_nav_border_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Menu Navigation Border', 'lpd-abcpersonal' ),
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
							
																	'menu_nav_border_weight' => array(
																		'label' => __('Border Weight', 'lpd-abcpersonal' ),
																		'type' => 'short-text',
																		'value' => '1',
																	),
																
																	'menu_nav_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'menu_nav_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,1)',
																	    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														
														'menu_nav_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Menu Navigation Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'menu_nav_margin_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'menu_nav_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'menu_nav_margin_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '15',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'menu_nav_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														
														'menu_nav_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														
														'menu_nav_rtl_animation' =>array(
														    'type'  => 'switch',
														    'value' => 'disabled',
														    'label' => __('Right-to-left Animation', 'lpd-abcpersonal' ),
														    'left-choice' => array(
														        'value' => 'disabled',
														        'label' => __('Disabled', 'lpd-abcpersonal' ),
														    ),
														    'right-choice' => array(
														        'value' => 'enabled',
														        'label' => __('Enabled', 'lpd-abcpersonal' ),
														    ),
														),
														
														'menu_nav_animation' => array(
														    'type'  => 'select',
														    'value' => 'fadeIn',
														    'label' => __('Menu Animation', 'lpd-abcpersonal' ),
														    'choices' => array(
														        'fadeIn' => 'fadeIn',
														        'fadeInUp' => 'fadeInUp',
														        'zoomIn' => 'zoomIn',
														    ),
														    'no-validate' => false,
														),
														'sticky_menu_styles' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sticky_menu_styles_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
																
																	'menu_nav_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,1)',
																	    'label' => __('Button Color', 'lpd-abcpersonal' )
																	),
																	'menu_nav_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,1)',
																	    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
																	),
																	'menu_nav_background_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(72,207,173,1)',
																	    'label' => __('Background Color', 'lpd-abcpersonal' )
																	),
																	'menu_nav_background_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(108,216,189,1)',
																	    'label' => __('Background Hover Color', 'lpd-abcpersonal' )
																	),
																			
																	'menu_nav_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'menu_nav_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
							
																	'menu_nav_margins' =>array(
																	    'type'  => 'html',
																	    'label' => __('Menu Navigation Margins', 'lpd-abcpersonal' ),
																	    'html'  => '',
																	),
																	'menu_nav_margin_top' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
																	),
																	'menu_nav_margin_bottom' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '15',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'menu_nav_margin_clearfix' =>array(
																	    'type'  => 'html',
																	    'label' => '',
																	    'html'  => '<div class="wp-clearfix"></div>',
																	),
						
																),
															),
															'show_borders' => false,
														),
			
													),
												),
												'show_borders' => false,
											),
									    
										),
									),
									
									'group_menu' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'menu_item_paddings' =>array(
											    'type'  => 'html',
											    'label' => __('Menu Item Paddings', 'lpd-abcpersonal' ),
											    'html'  => '',
											),
											'menu_item_padding_top' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '5',
												'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
											),
											'menu_item_padding_right' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '20',
												'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
											),
											'menu_item_padding_bottom' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '20',
												'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
											),
											'menu_item_padding_left' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '0',
												'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
											),
											'menu_item_padding_clearfix' =>array(
											    'type'  => 'html',
											    'label' => '',
											    'html'  => '<div class="wp-clearfix"></div>',
											),
											'menu_button_paddings_notebook_layout' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'menu_button_paddings_nl_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Menu Button Paddings (Notebook Layout)', 'lpd-abcpersonal' ),
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
				
														'menu_button_paddings_nl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '',
														),
														'menu_button_padding_right_nl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'menu_button_padding_left_nl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'menu_button_padding_clearfix_nl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
			
													),
												),
												'show_borders' => false,
											),
											'menu_button_paddings_tablet_layout' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'menu_button_paddings_tl_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Menu Button Paddings (Tablet Layout)', 'lpd-abcpersonal' ),
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
				
														'menu_button_paddings_tl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '',
														),
														'menu_button_padding_right_tl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'menu_button_padding_left_tl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'menu_button_padding_clearfix_tl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
			
													),
												),
												'show_borders' => false,
											),
											'menu_button_inner_paddings' =>array(
											    'type'  => 'html',
											    'label' => __('Menu Button Inner Paddings', 'lpd-abcpersonal' ),
											    'html'  => '',
											),
											'menu_button_inner_padding_right' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '30',
												'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
											),
											'menu_button_inner_padding_left' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '30',
												'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
											),
											'menu_button_inner_padding_clearfix' =>array(
											    'type'  => 'html',
											    'label' => '',
											    'html'  => '<div class="wp-clearfix"></div>',
											),
											'menu_button_inner_paddings_notebook_layout' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'menu_button_inner_paddings_nl_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Menu Button Inner Paddings (Notebook Layout)', 'lpd-abcpersonal' ),
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
				
														'menu_button_inner_paddings_nl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '',
														),
														'menu_button_inner_padding_right_nl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '30',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'menu_button_inner_padding_left_nl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '30',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'menu_button_inner_padding_clearfix_nl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
			
													),
												),
												'show_borders' => false,
											),
											'menu_button_inner_paddings_tablet_layout' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'menu_button_inner_paddings_tl_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Menu Button Inner Paddings (Tablet Layout)', 'lpd-abcpersonal' ),
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
				
														'menu_button_inner_paddings_tl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '',
														),
														'menu_button_inner_padding_right_tl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '30',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'menu_button_inner_padding_left_tl' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '30',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'menu_button_inner_padding_clearfix_tl' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
			
													),
												),
												'show_borders' => false,
											),
											'menu_button_text' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '500',
											        'size' => 15,
											        'line-height' => 40,
											        'letter-spacing' => 0
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => true,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Menu Button Text', 'lpd-abcpersonal' )
											),
											'menu_button_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(72,207,173,1)',
											    'label' => __('Menu Button Color', 'lpd-abcpersonal' )
											),
											'menu_button_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Menu Button Hover Color', 'lpd-abcpersonal' )
											),
											'menu_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,0)',
											    'label' => __('Menu Background Color', 'lpd-abcpersonal' )
											),
											'menu_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(72,207,173,1)',
											    'label' => __('Menu Background Hover Color', 'lpd-abcpersonal' )
											),
											'menu_button_overlay_effect' =>array(
											    'type'  => 'switch',
											    'value' => 'enabled',
											    'label' => __('Overlay Effect', 'lpd-abcpersonal' ),
											    'left-choice' => array(
											        'value' => 'disabled',
											        'label' => __('Disabled', 'lpd-abcpersonal' ),
											    ),
											    'right-choice' => array(
											        'value' => 'enabled',
											        'label' => __('Enabled', 'lpd-abcpersonal' ),
											    ),
											),
											'menu_button_border' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'menu_button_border_switch' => array(
														'type'  => 'switch',
													    'value' => 'enabled',
													    'label' => __('Button Border', 'lpd-abcpersonal' ),
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
				
														'border_weight' => array(
															'label' => __('Border Weight', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '3',
														),
													
														'border_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,0.5)',
														    'label' => __('Border Color', 'lpd-abcpersonal' )
														),
														'border_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
														),
			
													),
												),
												'show_borders' => false,
											),
											
											'menu_button_radius' => array(
												'label' => __('Button Radius', 'lpd-abcpersonal' ),
												'type' => 'short-text',
												'value' => '20',
											),
											
											'menu_sticky_menu_styles' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'sticky_menu_styles_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
													
													
														'menu_item_paddings' =>array(
														    'type'  => 'html',
														    'label' => __('Menu Item Paddings', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'menu_item_padding_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '5',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'menu_item_padding_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'menu_item_padding_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'menu_button_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,1)',
														    'label' => __('Menu Button Color', 'lpd-abcpersonal' )
														),
														'menu_button_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,1)',
														    'label' => __('Menu Button Hover Color', 'lpd-abcpersonal' )
														),
														'menu_background_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('Menu Background Color', 'lpd-abcpersonal' )
														),
														'menu_background_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,1)',
														    'label' => __('Menu Background Hover Color', 'lpd-abcpersonal' )
														),
														'border_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,0.5)',
														    'label' => __('Border Color', 'lpd-abcpersonal' )
														),
														'border_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
														),
			
													),
												),
												'show_borders' => false,
											),

											
									    
										),
									),
									
									'group_dropdown_menu' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'menu_dropdown_border' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'menu_dropdown_border_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Dropdown Top Border', 'lpd-abcpersonal' ),
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
														'menu_dropdown_border_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,1)',
														    'label' => __('Border Color', 'lpd-abcpersonal' )
														),
			
													),
												),
												'show_borders' => false,
											),
											
											'dropdown_font' => array(
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
											    'label' => __('Dropdown Font', 'lpd-abcpersonal' )
											),
											
											'dropdown_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(37,37,37,1)',
											    'label' => __('Menu Button Color', 'lpd-abcpersonal' )
											),
											'dropdown_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(72,207,173,1)',
											    'label' => __('Menu Button Hover Color', 'lpd-abcpersonal' )
											),
											
											'dropdown_title_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => 0,
											        'color' => '#252525'
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => true,
											    ),
											    'label' => __('Dropdown Title Font', 'lpd-abcpersonal' )
											),
																		    
										),
									),
									
									'header_search' => array(
									    'type' => 'group',
									    'options' => array(
									    
									    
											'search_form' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'search_form_visibility' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Search Form', 'lpd-abcpersonal' ),
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
				
														'search_form_type' => array(
														    'type'  => 'radio',
														    'value' => 'search',
														    'label' => __('Form Type', 'lpd-abcpersonal' ),
														    'choices' => array(
														        'search' => __('Search For', 'lpd-abcpersonal' ),
														        'search_products' => __('Search For Products', 'lpd-abcpersonal' ),
														    ),
														    'inline' => true,
														),
																												
														'search_btn_container_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Search Container Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'search_btn_container_margin_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'search_btn_container_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'search_btn_container_margin_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'search_btn_container_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'search_btn_container_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														
														'search_btn_sepline' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sepline_switch' => array(
																	'type'  => 'switch',
																    'value' => 'enabled',
																    'label' => __('Separate Line', 'lpd-abcpersonal' ),
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
																	'search_btn_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														
														'search_btn_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Search Button Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'search_btn_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'search_btn_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'search_btn_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'search_btn_width' => array(
															'label' => __('Button Width', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '30',
														),
														'search_btn_icon_size' => array(
															'label' => __('Button Icon Size', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '30',
														),
														'search_btn_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,1)',
														    'label' => __('Search Button Color', 'lpd-abcpersonal' )
														),
														'search_btn_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(108,216,189,1)',
														    'label' => __('Search Button Hover Color', 'lpd-abcpersonal' )
														),
														'search_btn_background' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('Search Button Background', 'lpd-abcpersonal' )
														),
														'search_btn_background_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('Search Button Hover Background', 'lpd-abcpersonal' )
														),
														'search_button_border' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'search_button_border_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Search Button Border', 'lpd-abcpersonal' ),
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
							
																	'search_border_weight' => array(
																		'label' => __('Border Weight', 'lpd-abcpersonal' ),
																		'type' => 'short-text',
																		'value' => '1',
																	),
																
																	'search_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'search_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														'sticky_menu_styles' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sticky_menu_styles_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
							
																	'search_btn_container_margins' =>array(
																	    'type'  => 'html',
																	    'label' => __('Search Container Margins', 'lpd-abcpersonal' ),
																	    'html'  => '',
																	),
																	'search_btn_container_margin_top' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
																	),
																	'search_btn_container_margin_bottom' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'search_btn_container_margin_clearfix' =>array(
																	    'type'  => 'html',
																	    'label' => '',
																	    'html'  => '<div class="wp-clearfix"></div>',
																	),
																	'search_btn_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Separate Line Color', 'lpd-abcpersonal' )
																	),
																	'search_btn_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(72,207,173,1)',
																	    'label' => __('Search Button Color', 'lpd-abcpersonal' )
																	),
																	'search_btn_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(108,216,189,1)',
																	    'label' => __('Search Button Hover Color', 'lpd-abcpersonal' )
																	),
																	'search_btn_background' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Search Button Background', 'lpd-abcpersonal' )
																	),
																	'search_btn_background_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Search Button Hover Background', 'lpd-abcpersonal' )
																	),
																	'search_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'search_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),

													
													),
												),
												'show_borders' => false,
											),
									    
										),
									),
									
									
									'header_msg_container' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'msg_container_visibility' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'msg_container_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Message Block', 'lpd-abcpersonal' ),
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
														'msg_container_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Message Container Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'msg_container_margin_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'msg_container_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'msg_container_margin_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'msg_container_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'msg_container_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'msg_container_sepline' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sepline_switch' => array(
																	'type'  => 'switch',
																    'value' => 'enabled',
																    'label' => __('Separate Line', 'lpd-abcpersonal' ),
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
																	'msg_container_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														'msg_block_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Message Block Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'msg_block_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'msg_block_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'msg_block_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'msg_block_paddings' =>array(
														    'type'  => 'html',
														    'label' => __('Message Block Paddings', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'msg_block_padding_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'msg_block_padding_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'msg_block_padding_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'msg_block_content' => array(
															'label' => __('Text Content', 'lpd-abcpersonal' ),
															'type' => 'text',
															'value' => 'Text Content',
														),
														'msg_block_url' => array(
															'label' => __('URL (Link)', 'lpd-abcpersonal' ),
															'type' => 'text',
															'value' => '',
															'desc' => esc_html__( 'Add link to button.', 'lpd-abcpersonal' ),
														),
														'msg_block_text' => array(
														    'type' => 'typography-v2',
														    'value' => array(
														        'family' => 'Poppins',
														        'subset' => 'latin-ext',
														        'variation' => '500',
														        'size' => 16,
														        'letter-spacing' => 0,
														        'color' => '#ffffff'
														    ),
														    'components' => array(
														        'family'         => true,
														        'size'           => true,
														        'line-height'    => false,
														        'letter-spacing' => true,
														        'color'          => true
														    ),
														    'label' => __('Logo Text', 'lpd-abcpersonal' )
														),
														'msg_block_background' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(37,37,37,1)',
														    'label' => __('Message Block Background', 'lpd-abcpersonal' )
														),
														
														'sticky_menu_styles' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sticky_menu_styles_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
							
							
																	'msg_container_margins' =>array(
																	    'type'  => 'html',
																	    'label' => __('Message Container Margins', 'lpd-abcpersonal' ),
																	    'html'  => '',
																	),
																	'msg_container_margin_top' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
																	),
																	'msg_container_margin_bottom' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'msg_container_margin_clearfix' =>array(
																	    'type'  => 'html',
																	    'label' => '',
																	    'html'  => '<div class="wp-clearfix"></div>',
																	),
																	'msg_container_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Separate Line Color', 'lpd-abcpersonal' )
																	),
																	'msg_block_text_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,1)',
																	    'label' => __('Message Block Background', 'lpd-abcpersonal' )
																	),
																	'msg_block_background' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(37,37,37,1)',
																	    'label' => __('Message Block Background', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
													),
												),
												'show_borders' => false,
											),
									    	
											
										),
									),
									
									'header_social_media_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'header_social_media_picker' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'social_media_visibility' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Social Media', 'lpd-abcpersonal' ),
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
														'header_social_media_msg' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '',
														    'desc' => esc_html__( 'Navigate to "Header" => "Header Social Media" for social media options.', 'lpd-abcpersonal' ),
														),
													),
												),
												'show_borders' => false,
											),
									    
										),
									),
									
									'header_shopping_cart' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'shopping_cart' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'shopping_cart_visibility' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Shopping Cart', 'lpd-abcpersonal' ),
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
									    
									    
														'shopping_cart_btn_container_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Shopping Cart Container Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'shopping_cart_btn_container_margin_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'shopping_cart_btn_container_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'shopping_cart_btn_container_margin_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'shopping_cart_btn_container_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'shopping_cart_btn_container_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														
														'shopping_cart_btn_sepline' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sepline_switch' => array(
																	'type'  => 'switch',
																    'value' => 'enabled',
																    'label' => __('Separate Line', 'lpd-abcpersonal' ),
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
																	'shopping_cart_btn_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														
														'shopping_cart_btn_margins' =>array(
														    'type'  => 'html',
														    'label' => __('Shopping Cart Button Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'shopping_cart_btn_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'shopping_cart_btn_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'shopping_cart_btn_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'shopping_cart_btn_padding_bottom' => array(
															'label' => __('Shopping Cart Button Padding', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'shopping_cart_btn_width' => array(
															'label' => __('Shopping Cart Button Width', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '50',
														),
														'shopping_cart_btn_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,1)',
														    'label' => __('Shopping Cart Button Color', 'lpd-abcpersonal' )
														),
														'shopping_cart_btn_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(108,216,189,1)',
														    'label' => __('Shopping Cart Button Hover Color', 'lpd-abcpersonal' )
														),
														'shopping_cart_btn_background' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('Shopping Cart Button Background', 'lpd-abcpersonal' )
														),
														'shopping_cart_btn_background_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('Shopping Cart Button Hover Background', 'lpd-abcpersonal' )
														),
														'shopping_cart_alternative' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'shopping_cart_alternative_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Shopping Cart Alternative Variant', 'lpd-abcpersonal' ),
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
																
																	'shopping_cart_btn_counter_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => '#ffffff',
																	    'label' => __('Counter Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_counter_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => '#ffffff',
																	    'label' => __('Counter Hover Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_counter_bg' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(37,37,37,1)',
																	    'label' => __('Counter Background', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_counter_bg_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(37,37,37,1)',
																	    'label' => __('Counter Hover Background', 'lpd-abcpersonal' )
																	),
																	
						
																),
															),
															'show_borders' => false,
														),
														'shopping_cart_button_border' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'shopping_cart_button_border_switch' => array(
																	'type'  => 'switch',
																    'value' => 'enabled',
																    'label' => __('Shopping Cart Button Border', 'lpd-abcpersonal' ),
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
							
																	'shopping_cart_border_weight' => array(
																		'label' => __('Border Weight', 'lpd-abcpersonal' ),
																		'type' => 'short-text',
																		'value' => '1',
																	),
																
																	'shopping_cart_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														'sticky_menu_styles' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sticky_menu_styles_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
							
							
																	'shopping_cart_btn_container_margins' =>array(
																	    'type'  => 'html',
																	    'label' => __('Shopping Cart Container Margins', 'lpd-abcpersonal' ),
																	    'html'  => '',
																	),
																	'shopping_cart_btn_container_margin_top' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
																	),
																	'shopping_cart_btn_container_margin_bottom' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'shopping_cart_btn_container_margin_clearfix' =>array(
																	    'type'  => 'html',
																	    'label' => '',
																	    'html'  => '<div class="wp-clearfix"></div>',
																	),
																	'shopping_cart_btn_padding_bottom' => array(
																		'label' => __('Shopping Cart Button Padding', 'lpd-abcpersonal' ),
																		'type' => 'short-text',
																		'value' => '20',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'shopping_cart_btn_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Separate Line Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(72,207,173,1)',
																	    'label' => __('Shopping Cart Button Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(108,216,189,1)',
																	    'label' => __('Shopping Cart Button Hover Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_background' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Shopping Cart Button Background', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_background_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('Shopping Cart Button Hover Background', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_counter_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => '#ffffff',
																	    'label' => __('Counter Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_counter_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => '#ffffff',
																	    'label' => __('Counter Hover Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_counter_bg' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(37,37,37,1)',
																	    'label' => __('Counter Background', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_btn_counter_bg_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(37,37,37,1)',
																	    'label' => __('Counter Hover Background', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'shopping_cart_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														
														
														
									    
													),
												),
												'show_borders' => false,
											),
									    
										),
									),
									
									
									'header_wpml' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'wpml_container_visibility' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'wpml_container_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('WPML Button', 'lpd-abcpersonal' ),
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
									    
									    
														'wpml_container_margins' =>array(
														    'type'  => 'html',
														    'label' => __('WPML Container Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'wpml_container_margin_top' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
														),
														'wpml_container_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'wpml_container_margin_bottom' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'wpml_container_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'wpml_container_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														
														'wpml_btn_sepline' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sepline_switch' => array(
																	'type'  => 'switch',
																    'value' => 'enabled',
																    'label' => __('Separate Line', 'lpd-abcpersonal' ),
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
																	'wpml_btn_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														
														'wpml_btn_margins' =>array(
														    'type'  => 'html',
														    'label' => __('WPML Button Margins', 'lpd-abcpersonal' ),
														    'html'  => '',
														),
														'wpml_btn_margin_right' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
														),
														'wpml_btn_margin_left' => array(
															'label' => '',
															'type' => 'short-text',
															'value' => '0',
															'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
														),
														'wpml_btn_margin_clearfix' =>array(
														    'type'  => 'html',
														    'label' => '',
														    'html'  => '<div class="wp-clearfix"></div>',
														),
														'wpml_btn_padding_bottom' => array(
															'label' => __('WPML Button Padding', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '20',
															'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
														),
														'wpml_btn_width' => array(
															'label' => __('WPML Cart Button Width', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '50',
														),
														'wpml_btn_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(37,37,37,1)',
														    'label' => __('WPML Button Color', 'lpd-abcpersonal' )
														),
														'wpml_btn_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(37,37,37,1)',
														    'label' => __('WPML Button Hover Color', 'lpd-abcpersonal' )
														),
														'wpml_btn_background' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('WPML Button Background', 'lpd-abcpersonal' )
														),
														'wpml_btn_background_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(255,255,255,0)',
														    'label' => __('WPML Button Hover Background', 'lpd-abcpersonal' )
														),
														'wpml_button_border' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'wpml_button_border_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('WPML Button Border', 'lpd-abcpersonal' ),
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
							
																	'wpml_border_weight' => array(
																		'label' => __('Border Weight', 'lpd-abcpersonal' ),
																		'type' => 'short-text',
																		'value' => '1',
																	),
																
																	'wpml_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'wpml_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														'wpml_dropdown_text_color' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(37,37,37,0.8)',
														    'label' => __('Dropdown Text Color', 'lpd-abcpersonal' )
														),
														'wpml_dropdown_text_color_hover' => array(
														    'type'  => 'rgba-color-picker',
														    'value' => 'rgba(72,207,173,1)',
														    'label' => __('Dropdown Text Hover Color', 'lpd-abcpersonal' )
														),
														
														'sticky_menu_styles' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'sticky_menu_styles_switch' => array(
																	'type'  => 'switch',
																    'value' => 'disabled',
																    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
							
																	'wpml_container_margins' =>array(
																	    'type'  => 'html',
																	    'label' => __('WPML Container Margins', 'lpd-abcpersonal' ),
																	    'html'  => '',
																	),
																	'wpml_container_margin_top' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
																	),
																	'wpml_container_margin_bottom' => array(
																		'label' => '',
																		'type' => 'short-text',
																		'value' => '0',
																		'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
																	),
																	'wpml_container_margin_clearfix' =>array(
																	    'type'  => 'html',
																	    'label' => '',
																	    'html'  => '<div class="wp-clearfix"></div>',
																	),
																	'wpml_btn_sepline_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Separate Line Color', 'lpd-abcpersonal' )
																	),
																	'wpml_btn_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(37,37,37,1)',
																	    'label' => __('WPML Button Color', 'lpd-abcpersonal' )
																	),
																	'wpml_btn_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(37,37,37,1)',
																	    'label' => __('WPML Button Hover Color', 'lpd-abcpersonal' )
																	),
																	'wpml_btn_background' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('WPML Button Background', 'lpd-abcpersonal' )
																	),
																	'wpml_btn_background_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(255,255,255,0)',
																	    'label' => __('WPML Button Hover Background', 'lpd-abcpersonal' )
																	),
																	'wpml_border_color' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Color', 'lpd-abcpersonal' )
																	),
																	'wpml_border_color_hover' => array(
																	    'type'  => 'rgba-color-picker',
																	    'value' => 'rgba(0,0,0,0.1)',
																	    'label' => __('Border Hover Color', 'lpd-abcpersonal' )
																	),
						
																),
															),
															'show_borders' => false,
														),
														
									    
													),
												),
												'show_borders' => false,
											),

									    
										),
									),
									
									'header_elem_order' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'header_elem_order_1' => array(
											    'type'  => 'select',
											    'value' => 'none',
											    'label' => __('Order 1', 'lpd-abcpersonal' ),
											    'choices' => array(
											        'none' => __('None', 'lpd-abcpersonal' ),
											        'search' => __('Search', 'lpd-abcpersonal' ),
											        'message' => __('Message Block', 'lpd-abcpersonal' ),
											        'social' => __('Social Media', 'lpd-abcpersonal' ),
											        'shopping_cart' => __('Shopping Cart', 'lpd-abcpersonal' ),
											        'wpml_btn' => __('WPML Button', 'lpd-abcpersonal' ),
											    ),
											),
											'header_elem_order_2' => array(
											    'type'  => 'select',
											    'value' => 'none',
											    'label' => __('Order 2', 'lpd-abcpersonal' ),
											    'choices' => array(
											        'none' => __('None', 'lpd-abcpersonal' ),
											        'search' => __('Search', 'lpd-abcpersonal' ),
											        'message' => __('Message Block', 'lpd-abcpersonal' ),
											        'social' => __('Social Media', 'lpd-abcpersonal' ),
											        'shopping_cart' => __('Shopping Cart', 'lpd-abcpersonal' ),
											        'wpml_btn' => __('WPML Button', 'lpd-abcpersonal' ),
											    ),
											),
											'header_elem_order_3' => array(
											    'type'  => 'select',
											    'value' => 'none',
											    'label' => __('Order 3', 'lpd-abcpersonal' ),
											    'choices' => array(
											        'none' => __('None', 'lpd-abcpersonal' ),
											        'search' => __('Search', 'lpd-abcpersonal' ),
											        'message' => __('Message Block', 'lpd-abcpersonal' ),
											        'social' => __('Social Media', 'lpd-abcpersonal' ),
											        'shopping_cart' => __('Shopping Cart', 'lpd-abcpersonal' ),
											        'wpml_btn' => __('WPML Button', 'lpd-abcpersonal' ),
											    ),
											),
											'header_elem_order_4' => array(
											    'type'  => 'select',
											    'value' => 'none',
											    'label' => __('Order 4', 'lpd-abcpersonal' ),
											    'choices' => array(
											        'none' => __('None', 'lpd-abcpersonal' ),
											        'search' => __('Search', 'lpd-abcpersonal' ),
											        'message' => __('Message Block', 'lpd-abcpersonal' ),
											        'social' => __('Social Media', 'lpd-abcpersonal' ),
											        'shopping_cart' => __('Shopping Cart', 'lpd-abcpersonal' ),
											        'wpml_btn' => __('WPML Button', 'lpd-abcpersonal' ),
											    ),
											),
											'header_elem_order_5' => array(
											    'type'  => 'select',
											    'value' => 'none',
											    'label' => __('Order 5', 'lpd-abcpersonal' ),
											    'choices' => array(
											        'none' => __('None', 'lpd-abcpersonal' ),
											        'search' => __('Search', 'lpd-abcpersonal' ),
											        'message' => __('Message Block', 'lpd-abcpersonal' ),
											        'social' => __('Social Media', 'lpd-abcpersonal' ),
											        'shopping_cart' => __('Shopping Cart', 'lpd-abcpersonal' ),
											        'wpml_btn' => __('WPML Button', 'lpd-abcpersonal' ),
											    ),
											),
									    
										),
									),
								
								)
							),
	
						),
					),
					
					'mobile_navigation' => array(
						'title' => esc_html__( 'Mobile Navigation', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Mobile Navigation', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'mob_first_level_nav_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '500',
									        'size' => 16,
									        'letter-spacing' => 0,
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => false
									    ),
									    'label' => __('First Level Navigation Font', 'lpd-abcpersonal' )
									),
									'mob_first_level_nav_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,1)',
									    'label' => __('First Level Color', 'lpd-abcpersonal' )
									),
									'mob_first_level_nav_color_hover' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(72,207,173,1)',
									    'label' => __('First Level Hover Color', 'lpd-abcpersonal' )
									),
									'mob_nav_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '500',
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
									    'label' => __('Navigation Font', 'lpd-abcpersonal' )
									),
									'mob_nav_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Navigation Color', 'lpd-abcpersonal' )
									),
									'mob_nav_color_hover' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(72,207,173,1)',
									    'label' => __('Navigation Hover Color', 'lpd-abcpersonal' )
									),
									'mob_nav_btn_color' => array(
									    'type'  => 'color-picker',
									    'value' => '#252525',
									    'label' => __('Navigation Button Color', 'lpd-abcpersonal' )
									),
									'mob_nav_btn_color_hover' => array(
									    'type'  => 'color-picker',
									    'value' => '#ffffff',
									    'label' => __('Navigation Button Active Color', 'lpd-abcpersonal' )
									),
									'mob_nav_title_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '500',
									        'size' => 14,
									        'letter-spacing' => 0,
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => false,
									    ),
									    'label' => __('Navigation Title Font', 'lpd-abcpersonal' )
									),
									'mob_nav_title_font_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Navigation Color', 'lpd-abcpersonal' )
									),								
								
								)
							),
	
						),
					),
					
					'header_social_media' => array(
						'title' => esc_html__( 'Header Social Media', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
						
							'theme_options-box' => array(
								'title' => esc_html__( 'Header Social Media', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'group_header_social_media' => array(
									    'type' => 'group',
									    'options' => array(
								
										'header_social_media_type' => array(
										    'type'  => 'radio',
										    'value' => 'variant_1',
										    'label' => __('Button Types', 'lpd-abcpersonal' ),
										    'choices' => array(
										        'variant_1' => __('Variant 1', 'lpd-abcpersonal' ),
										        'variant_2' => __('Variant 2', 'lpd-abcpersonal' ),
										    ),
										    'inline' => false,
										),
										
										'header_social_media_forrst' => array(
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
										
										'header_social_media_dribbble' => array(
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
							
										'header_social_media_flickr' => array(
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
										
										'header_social_media_twitter' => array(
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
										
										'header_social_media_facebook' => array(
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
										
										'header_social_media_skype' => array(
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
							
										'header_social_media_digg' => array(
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
										
										'header_social_media_google' => array(
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
										
										'header_social_media_html5' => array(
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
										
										'header_social_media_linkedin' => array(
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
							
										'header_social_media_lastfm' => array(
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
										
										'header_social_media_vimeo' => array(
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
										
										'header_social_media_yahoo' => array(
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
										
										'header_social_media_tumblr' => array(
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
							
										'header_social_media_apple' => array(
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
										
										'header_social_media_windows' => array(
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
										
										'header_social_media_youtube' => array(
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
										
										'header_social_media_delicious' => array(
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
							
										'header_social_media_rss' => array(
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
										
										'header_social_media_picasa' => array(
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
										
										'header_social_media_deviantart' => array(
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
										
										'header_social_media_23-whatsapp' => array(
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
							
										'header_social_media_snapchat' => array(
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
										
										'header_social_media_blogger' => array(
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
										
										'header_social_media_wordpress' => array(
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
										
										'header_social_media_amazon' => array(
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
							
										'header_social_media_appstore' => array(
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
										
										'header_social_media_paypal' => array(
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
										
										'header_social_media_myspace' => array(
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
										
										'header_social_media_dropbox' => array(
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
							
										'header_social_media_windows8' => array(
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
										
										'header_social_media_pinterest' => array(
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
										
										'header_social_media_soundcloud' => array(
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
										
										'header_social_media_google_drive' => array(
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
							
										'header_social_media_android' => array(
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
										
										'header_social_media_behance' => array(
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
										
										'header_social_media_instagram' => array(
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
										
										'header_social_media_ebay' => array(
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
							
										'header_social_media_google_plus' => array(
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
										
										'header_social_media_github' => array(
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
										
										'header_social_media_stackoverflow' => array(
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
										
										'header_social_media_spotify' => array(
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
							
										'header_social_media_stumbleupon' => array(
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
										
										'header_social_media_visa' => array(
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
										
										'header_social_media_mastercard' => array(
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
										
										'header_social_media_amex' => array(
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
							
										'header_social_media_ios' => array(
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
										
										'header_social_media_osx' => array(
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
										
										'header_social_media_evernote' => array(
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
										
										'header_social_media_yelp' => array(
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
							
										'header_social_media_yelp2' => array(
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
										
										'header_social_media_medium' => array(
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
										
										'header_social_media_slack' => array(
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
										
										'header_social_media_vine' => array(
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
							
										'header_social_media_edge' => array(
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
										
										'header_social_media_outlook' => array(
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
										
										'header_social_media_pencilcase' => array(
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
										
										'header_social_media_play' => array(
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
							
										'header_social_media_icloud' => array(
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
										
										'social_media_container_margins' =>array(
										    'type'  => 'html',
										    'label' => __('Social Media Container Margins', 'lpd-abcpersonal' ),
										    'html'  => '',
										),
										'social_media_container_margin_top' => array(
											'label' => '',
											'type' => 'short-text',
											'value' => '0',
											'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
										),
										'social_media_container_margin_right' => array(
											'label' => '',
											'type' => 'short-text',
											'value' => '0',
											'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
										),
										'social_media_container_margin_bottom' => array(
											'label' => '',
											'type' => 'short-text',
											'value' => '0',
											'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
										),
										'social_media_container_margin_left' => array(
											'label' => '',
											'type' => 'short-text',
											'value' => '20',
											'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
										),
										'social_media_container_margin_clearfix' =>array(
										    'type'  => 'html',
										    'label' => '',
										    'html'  => '<div class="wp-clearfix"></div>',
										),
										'social_media_btn_color' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(255,255,255,1)',
										    'label' => __('Button Color', 'lpd-abcpersonal' )
										),
										'social_media_btn_background' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(72,207,173,1)',
										    'label' => __('Background Color', 'lpd-abcpersonal' )
										),
										'social_media_btn_background_hover' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(37,37,37,1)',
										    'label' => __('Background Hover Color', 'lpd-abcpersonal' )
										),
										'social_media_tooltip_bg' => array(
										    'type'  => 'rgba-color-picker',
										    'value' => 'rgba(37,37,37,1)',
										    'label' => __('Tooltip Bakground', 'lpd-abcpersonal' )
										),										
										
										'social_media_sepline' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'sepline_switch' => array(
													'type'  => 'switch',
												    'value' => 'enabled',
												    'label' => __('Separate Line', 'lpd-abcpersonal' ),
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
													'social_media_sepline_color' => array(
													    'type'  => 'rgba-color-picker',
													    'value' => 'rgba(0,0,0,0.1)',
													    'label' => __('Border Color', 'lpd-abcpersonal' )
													),
		
												),
											),
											'show_borders' => false,
										),
										
										'social_media_margins' =>array(
										    'type'  => 'html',
										    'label' => __('Social Media Buttons Margins', 'lpd-abcpersonal' ),
										    'html'  => '',
										),
										'social_media_margin_right' => array(
											'label' => '',
											'type' => 'short-text',
											'value' => '0',
											'desc' => esc_html__( 'right', 'lpd-abcpersonal' ),
										),
										'social_media_margin_left' => array(
											'label' => '',
											'type' => 'short-text',
											'value' => '20',
											'desc' => esc_html__( 'left', 'lpd-abcpersonal' ),
										),
										'social_media_margin_clearfix' =>array(
										    'type'  => 'html',
										    'label' => '',
										    'html'  => '<div class="wp-clearfix"></div>',
										),
										
										'social_media_sticky_menu_styles' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'sticky_menu_styles_switch' => array(
													'type'  => 'switch',
												    'value' => 'disabled',
												    'label' => __('Sticky Menu Styles', 'lpd-abcpersonal' ),
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
			
			
													'social_media_container_margins' =>array(
													    'type'  => 'html',
													    'label' => __('Social Media Container Margins', 'lpd-abcpersonal' ),
													    'html'  => '',
													),
													'social_media_container_margin_top' => array(
														'label' => '',
														'type' => 'short-text',
														'value' => '0',
														'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
													),
													'social_media_container_margin_bottom' => array(
														'label' => '',
														'type' => 'short-text',
														'value' => '0',
														'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
													),
													'social_media_container_margin_clearfix' =>array(
													    'type'  => 'html',
													    'label' => '',
													    'html'  => '<div class="wp-clearfix"></div>',
													),
													'social_media_btn_color' => array(
													    'type'  => 'rgba-color-picker',
													    'value' => 'rgba(255,255,255,1)',
													    'label' => __('Button Color', 'lpd-abcpersonal' )
													),
													'social_media_btn_background' => array(
													    'type'  => 'rgba-color-picker',
													    'value' => 'rgba(72,207,173,1)',
													    'label' => __('Background Color', 'lpd-abcpersonal' )
													),
													'social_media_btn_background_hover' => array(
													    'type'  => 'rgba-color-picker',
													    'value' => 'rgba(37,37,37,1)',
													    'label' => __('Background Hover Color', 'lpd-abcpersonal' )
													),	
													'social_media_sepline_color' => array(
													    'type'  => 'rgba-color-picker',
													    'value' => 'rgba(0,0,0,0.1)',
													    'label' => __('Border Color', 'lpd-abcpersonal' )
													),
		
												),
											),
											'show_borders' => false,
										),
	
								
										),
									),
								
								)
							),
	
						),
					),
					
					'header_title' => array(
						'title' => esc_html__( 'Header Title', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Header Title', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
									
									'header_title' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 48,
									        'letter-spacing' => 0,
									        'color' => '#252525'
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Title', 'lpd-abcpersonal' )
									),
									'header_subtitle' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 18,
									        'letter-spacing' => 0,
									        'color' => '#252525'
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Subitle', 'lpd-abcpersonal' )
									),
									'breadcrumb' => array(
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
									    'label' => __('Breadcrumb Font', 'lpd-abcpersonal' )
									),
									'breadcrumb_primary_font_color' => array(
									    'type'  => 'color-picker',
									    'value' => '#fff',
									    'label' => __('Breadcrumb Primary Color', 'lpd-abcpersonal' )
									),
									'breadcrumb_secondary_font_color' => array(
									    'type'  => 'color-picker',
									    'value' => '#252525',
									    'label' => __('Breadcrumb Secondary Color', 'lpd-abcpersonal' )
									),
									'breadcrumb_primary_color' => array(
									    'type'  => 'color-picker',
									    'value' => '#48cfad',
									    'label' => __('Breadcrumb Primary Background', 'lpd-abcpersonal' )
									),
									'breadcrumb_secondary_color' => array(
									    'type'  => 'color-picker',
									    'value' => '#fff',
									    'label' => __('Breadcrumb Secondary Background', 'lpd-abcpersonal' )
									),
									
									'header_title_padding_group' => array(
									    'type' => 'group',
									    'options' => array(
										
											'header_title_paddings' =>array(
											    'type'  => 'html',
											    'label' => __('Title Paddings', 'lpd-abcpersonal' ),
											    'html'  => '',
											),
											'header_title_padding_top' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '100',
												'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
											),
											'header_title_padding_bottom' => array(
												'label' => '',
												'type' => 'short-text',
												'value' => '100',
												'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
											),
											'header_title_padding_clearfix' =>array(
											    'type'  => 'html',
											    'label' => '',
											    'html'  => '<div class="wp-clearfix"></div>',
											),
									
										),
									),
									'header_title_visibility_group' => array(
									    'type' => 'group',
									    'options' => array(
									    
											'header_title_visibility' => array(
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
											'header_breadcrumb_visibility' => array(
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
									
								)
								
							),
	
						),
					),
					
					'header_background' => array(
						'title' => esc_html__( 'Header Background', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Header Background', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'header_background_group' => array(
									    'type' => 'group',
									    'options' => array(
		
											'header_background_choice' => array(
												'type' => 'multi-picker',
												'show_borders' => false,
												'label' => false,
												'desc' => false,
												'value' => array(
													'header_background_type' => 'background_color',
												),
												'picker' => array(
													'header_background_type' => array(
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
									
								
								)
							),
	
						),
					),
	
				)
			)
		),
	);
