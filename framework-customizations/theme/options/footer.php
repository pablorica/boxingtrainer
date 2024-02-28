<?php

	if ( ! defined( 'FW' ) ) {
		die( 'Forbidden' );
	}

	$options = array(
		array(
			'footer' => array(
				'title' => esc_html__( 'Footer', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
				
					'footer_options' => array(
						'title' => esc_html__( 'Footer options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Footer options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'footer_options' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'footer_switch' => array(
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
											)
										),
										'choices' => array(
											'enabled' => array(
		
												'footer_background' => array(
													'type' => 'multi-picker',
													'show_borders' => false,
													'label' => false,
													'desc' => false,
													'value' => array(
														'footer_background_type' => 'background_color',
													),
													'picker' => array(
														'footer_background_type' => array(
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
														
															'footer_color' => array(
															    'type'  => 'rgba-color-picker',
															    'value' => '#252525',
															    'label' => __('Background Color', 'lpd-abcpersonal'),
															),
												
														),
														'background_image' => array(
														
															'footer_color' => array(
															    'type'  => 'rgba-color-picker',
															    'value' => '#252525',
															    'label' => __('Background Color', 'lpd-abcpersonal'),
															),
															'footer_background_settings' => array(
															    'type'  => 'select',
															    'value' => 'repeat_center',
															    'label' => __('Background Settings', 'lpd-abcpersonal' ),
															    'choices' => array(
															        'repeat_center' => __('Repeat, Position: center center', 'lpd-abcpersonal' ),
															        'repeat_top' => __('Repeat, Position: top center', 'lpd-abcpersonal' ),
															        'cover_center' => __('Cover, Position: center center', 'lpd-abcpersonal' ),
															    ),
															    'no-validate' => false,
															),
															'footer_background_image' => array(
																'label' => esc_html__( 'Background Image', 'lpd-abcpersonal' ),
																'type' => 'upload',
															),
															
														
														),
													),
					
												),
		

												'footer_paddings' =>array(
												    'type'  => 'html',
												    'label' => __('Footer Paddings', 'lpd-abcpersonal' ),
												    'html'  => '',
												),
												'footer_padding_top' => array(
													'label' => '',
													'type' => 'short-text',
													'value' => '80',
													'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
												),
												'footer_padding_bottom' => array(
													'label' => '',
													'type' => 'short-text',
													'value' => '40',
													'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
												),
												'footer_padding_clearfix' =>array(
												    'type'  => 'html',
												    'label' => '',
												    'html'  => '<div class="wp-clearfix"></div>',
												),
												'footer_font' => array(
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
												    'label' => __('Font', 'lpd-abcpersonal'),
												),
												'footer_font_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(255,255,255,0.6)',
												    'label' => __('Font Color', 'lpd-abcpersonal'),
												),
												'footer_link_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#48cfad',
												    'label' => __('Link Color', 'lpd-abcpersonal'),
												),
												'footer_link_hover_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#6CD8BD',
												    'label' => __('Link Hover Color', 'lpd-abcpersonal'),
												),
									
											),
										),
										'show_borders' => false,
									),
									

									
								)
							),
	
						),
					),
					
					'footer_bottom' => array(
						'title' => esc_html__( 'Footer bottom', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Footer bottom', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
		
									'footer_bottom_options' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'footer_bottom_switch' => array(
												'type'  => 'switch',
											    'value' => 'enabled',
											    'label' => __('Footer Bottom', 'lpd-abcpersonal' ),
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
		
												'footer_bottom_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#48cfad',
												    'label' => __('Background Color', 'lpd-abcpersonal'),
												),
												'footer_bottom_paddings' =>array(
												    'type'  => 'html',
												    'label' => __('Footer Bottom Paddings', 'lpd-abcpersonal' ),
												    'html'  => '',
												),
												'footer_bottom_padding_top' => array(
													'label' => '',
													'type' => 'short-text',
													'value' => '20',
													'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
												),
												'footer_bottom_padding_bottom' => array(
													'label' => '',
													'type' => 'short-text',
													'value' => '10',
													'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
												),
												'footer_bottom_padding_clearfix' =>array(
												    'type'  => 'html',
												    'label' => '',
												    'html'  => '<div class="wp-clearfix"></div>',
												),
												'footer_bottom_font' => array(
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
												    'label' => __('Font', 'lpd-abcpersonal'),
												),
												'footer_bottom_font_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(255,255,255,0.6)',
												    'label' => __('Link Color', 'lpd-abcpersonal'),
												),
												'footer_bottom_link_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(255,255,255,0.6)',
												    'label' => __('Link Color', 'lpd-abcpersonal'),
												),
												'footer_bottom_link_hover_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#ffffff',
												    'label' => __('Link Hover Color', 'lpd-abcpersonal'),
												),
												'footer_bottom_content' => array(
												    'type'  => 'wp-editor',
												    'value' => '',
												    'label' => __('Content', 'lpd-abcpersonal'),
												    'size' => 'small', // small, large
												    'editor_height' => 150,
												)
																								
	
											),
										),
										'show_borders' => false,
									),
		

									
								)
							),
	
						),
					),
					
					'footer_widgets' => array(
						'title' => esc_html__( 'Footer widgets', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Footer widgets', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
		
									'footer_widget_title' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '700',
									        'size' => 14,
									        'letter-spacing' => 1,
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => false
									    ),
									    'label' => __('Footer Widget Title', 'lpd-abcpersonal'),
									),
									'footer_widget_title_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(255,255,255,1)',
									    'label' => __('Widget Title Color', 'lpd-abcpersonal'),
									),
									
									'footer_columns' => array(
										'type' => 'multi-picker',
										'show_borders' => false,
										'label' => false,
										'desc' => false,
										'value' => array(
											'footer_num_columns' => 'footer_col_3',
										),
										'picker' => array(
											'footer_num_columns' => array(
												'type'  => 'radio',
											    'label' => __('Background', 'lpd-abcpersonal' ),
											    'choices' => array(
											        'footer_col_3' => __('Footer 3 Columns', 'lpd-abcpersonal' ),
											        'footer_col_4' => __('Footer 4 Columns', 'lpd-abcpersonal' ),
											    ),
											    'inline' => true,
											)
										),
										'choices' => array(
											'footer_col_3' => array(
											
												'footer_col_3_layouts' =>array(
												    'type'  => 'html',
												    'label' => __('Footer 3 Column Layouts', 'lpd-abcpersonal' ),
												    'html'  => '',
												),
												'footer_col_3_1' => array(
												    'type'  => 'short-select',
												    'value' => 'col_1_3',
												    'label' => '',
												    'choices' => array(
												    	'col_1_1' => __('Column 1/1', 'lpd-abcpersonal' ),
												        'col_1_2' => __('Column 1/2', 'lpd-abcpersonal' ),
												        'col_1_3' => __('Column 1/3', 'lpd-abcpersonal' ),
												        'col_1_4' => __('Column 1/4', 'lpd-abcpersonal' ),
												        'col_1_6' => __('Column 1/6', 'lpd-abcpersonal' ),
												    ),
												    'no-validate' => false,
												),
												'footer_col_3_2' => array(
												    'type'  => 'short-select',
												    'value' => 'col_1_3',
												    'label' => '',
												    'choices' => array(
												    	'col_1_1' => __('Column 1/1', 'lpd-abcpersonal' ),
												        'col_1_2' => __('Column 1/2', 'lpd-abcpersonal' ),
												        'col_1_3' => __('Column 1/3', 'lpd-abcpersonal' ),
												        'col_1_4' => __('Column 1/4', 'lpd-abcpersonal' ),
												        'col_1_6' => __('Column 1/6', 'lpd-abcpersonal' ),
												    ),
												    'no-validate' => false,
												),
												'footer_col_3_3' => array(
												    'type'  => 'short-select',
												    'value' => 'col_1_3',
												    'label' => '',
												    'choices' => array(
												    	'col_1_1' => __('Column 1/1', 'lpd-abcpersonal' ),
												        'col_1_2' => __('Column 1/2', 'lpd-abcpersonal' ),
												        'col_1_3' => __('Column 1/3', 'lpd-abcpersonal' ),
												        'col_1_4' => __('Column 1/4', 'lpd-abcpersonal' ),
												        'col_1_6' => __('Column 1/6', 'lpd-abcpersonal' ),
												    ),
												    'no-validate' => false,
												),
												'footer_col_3_layout_clearfix' =>array(
												    'type'  => 'html',
												    'label' => '',
												    'html'  => '<div class="wp-clearfix"></div>',
												),
									
											),
											'footer_col_4' => array(
											
												'footer_col_4_layouts' =>array(
												    'type'  => 'html',
												    'label' => __('Footer 4 Column Layouts', 'lpd-abcpersonal' ),
												    'html'  => '',
												),
												'footer_col_4_1' => array(
												    'type'  => 'short-select',
												    'value' => 'col_1_4',
												    'label' => '',
												    'choices' => array(
												    	'col_1_1' => __('Column 1/1', 'lpd-abcpersonal' ),
												        'col_1_2' => __('Column 1/2', 'lpd-abcpersonal' ),
												        'col_1_3' => __('Column 1/3', 'lpd-abcpersonal' ),
												        'col_1_4' => __('Column 1/4', 'lpd-abcpersonal' ),
												        'col_1_6' => __('Column 1/6', 'lpd-abcpersonal' ),
												    ),
												    'no-validate' => false,
												),
												'footer_col_4_2' => array(
												    'type'  => 'short-select',
												    'value' => 'col_1_4',
												    'label' => '',
												    'choices' => array(
												    	'col_1_1' => __('Column 1/1', 'lpd-abcpersonal' ),
												        'col_1_2' => __('Column 1/2', 'lpd-abcpersonal' ),
												        'col_1_3' => __('Column 1/3', 'lpd-abcpersonal' ),
												        'col_1_4' => __('Column 1/4', 'lpd-abcpersonal' ),
												        'col_1_6' => __('Column 1/6', 'lpd-abcpersonal' ),
												    ),
												    'no-validate' => false,
												),
												'footer_col_4_3' => array(
												    'type'  => 'short-select',
												    'value' => 'col_1_4',
												    'label' => '',
												    'choices' => array(
												    	'col_1_1' => __('Column 1/1', 'lpd-abcpersonal' ),
												        'col_1_2' => __('Column 1/2', 'lpd-abcpersonal' ),
												        'col_1_3' => __('Column 1/3', 'lpd-abcpersonal' ),
												        'col_1_4' => __('Column 1/4', 'lpd-abcpersonal' ),
												        'col_1_6' => __('Column 1/6', 'lpd-abcpersonal' ),
												    ),
												    'no-validate' => false,
												),
												'footer_col_4_4' => array(
												    'type'  => 'short-select',
												    'value' => 'col_1_4',
												    'label' => '',
												    'choices' => array(
												    	'col_1_1' => __('Column 1/1', 'lpd-abcpersonal' ),
												        'col_1_2' => __('Column 1/2', 'lpd-abcpersonal' ),
												        'col_1_3' => __('Column 1/3', 'lpd-abcpersonal' ),
												        'col_1_4' => __('Column 1/4', 'lpd-abcpersonal' ),
												        'col_1_6' => __('Column 1/6', 'lpd-abcpersonal' ),
												    ),
												    'no-validate' => false,
												),
												'footer_col_4_layout_clearfix' =>array(
												    'type'  => 'html',
												    'label' => '',
												    'html'  => '<div class="wp-clearfix"></div>',
												),

											),
										),
		
									),
									
									'footer_widget_list_link_color_group' => array(
									    'type' => 'group',
									    'options' => array(

											'footer_widget_list_link_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,0.8)',
											    'label' => __('Widget List Link Color', 'lpd-abcpersonal'),
											),
											
											'footer_widget_list_link_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Widget List Link Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									
									'footer_search_widget_btn_color_group' => array(
									    'type' => 'group',
									    'options' => array(

											'footer_search_widget_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Search Widget Button Color', 'lpd-abcpersonal'),
											),
											
											'footer_search_widget_btn_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#6CD8BD',
											    'label' => __('Search Widget Button Hover Color', 'lpd-abcpersonal'),
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
	
	?>