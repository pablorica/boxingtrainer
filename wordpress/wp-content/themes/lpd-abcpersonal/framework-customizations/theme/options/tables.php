<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'vc_tables_styles' => array(
				'title' => esc_html__( 'Tables', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
					
					'vc_tables_primary_styles' => array(
						'title' => esc_html__( 'Primary styles', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'vc_tables_primary_options-box' => array(
								'title' => esc_html__( 'Primary styles', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'vc_table_info' => array(
									    'type'  => 'html',
									    'value' => 'default hidden value',
									    'label' => __('How to use?', 'lpd-abcpersonal' ),
									    'html'  => __('Add extra class <strong>primary-theme-style</strong> in Table Settings', 'lpd-abcpersonal' ),
									),
									'vc_table_color_1' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#f5f5f5',
									    'label' => __('Table Color #1', 'lpd-abcpersonal' )
									),
									'vc_table_color_2' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#fafafa',
									    'label' => __('Table Color #2', 'lpd-abcpersonal' )
									),
									'vc_table_border_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#ebebeb',
									    'label' => __('Border Color', 'lpd-abcpersonal' )
									),
									'vc_table_body' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
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
									    'label' => __('Table Body Font', 'lpd-abcpersonal'),
									),
									'vc_table_heading' => array(
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
									    'label' => __('Table Heading Font', 'lpd-abcpersonal'),
									),
									'vc_table_btn_group' => array(
									    'type' => 'group',
									    'options' => array(
											'vc_table_btn_text' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'size' => 12,
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
											'vc_table_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'vc_table_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'vc_table_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'vc_table_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
									    
									    ),
	
									    
									),
									'vc_table_margin_bottom' => array(
										'label' => 'Table Margin Bottom',
										'type' => 'short-text',
										'value' => '20',
										'desc' => esc_html__( 'px', 'lpd-abcpersonal' ),
									),
								
								)
							),
	
						),
					),
					'vc_tables_secondary_styles' => array(
						'title' => esc_html__( 'Secondary styles', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'vc_tables_secondary_options-box' => array(
								'title' => esc_html__( 'Secondary styles', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									
									'vc_table_secondary_info' => array(
									    'type'  => 'html',
									    'value' => 'default hidden value',
									    'label' => __('How to use?', 'lpd-abcpersonal' ),
									    'html'  => __('Add extra class <strong>secondary-theme-style</strong> in Table Settings', 'lpd-abcpersonal' ),
									),
									'vc_table_secondary_color_1' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#f5f5f5',
									    'label' => __('Table Color #1', 'lpd-abcpersonal' )
									),
									'vc_table_secondary_color_2' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#fafafa',
									    'label' => __('Table Color #2', 'lpd-abcpersonal' )
									),
									'vc_table_secondary_border_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#ebebeb',
									    'label' => __('Border Color', 'lpd-abcpersonal' )
									),
									'vc_table_secondary_body' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
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
									    'label' => __('Table Body Font', 'lpd-abcpersonal'),
									),
									'vc_table_secondary_heading' => array(
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
									    'label' => __('Table Heading Font', 'lpd-abcpersonal'),
									),
									'vc_table_secondary_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'vc_table_secondary_btn_text' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'size' => 12,
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
											'vc_table_secondary_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'vc_table_secondary_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'vc_table_secondary_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'vc_table_secondary_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
									    
									    ),
	
									    
									),
									'vc_table_secondary_margin_bottom' => array(
										'label' => 'Table Margin Bottom',
										'type' => 'short-text',
										'value' => '20',
										'desc' => esc_html__( 'px', 'lpd-abcpersonal' ),
									),
								
								)
							),
	
						),
					),
	
				)
			)
		),
	);
