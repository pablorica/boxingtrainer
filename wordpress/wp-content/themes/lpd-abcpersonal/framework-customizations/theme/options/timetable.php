<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'timetable' => array(
				'title' => esc_html__( 'Timetable', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
					
					'timetable_options' => array(
						'title' => esc_html__( 'Timetable options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'timetable_options-box' => array(
								'title' => esc_html__( 'Timetable options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'custom_timetable_options' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'timetable_options_switch' => array(
												'type'  => 'switch',
											    'value' => 'disabled',
											    'label' => __('Custom Timetable Styles', 'lpd-abcpersonal' ),
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
				
												'timetable_border_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#cccccc',
												    'label' => __('Border Color', 'lpd-abcpersonal' )
												),
												
												'timetable_th' => array(
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
												        'color'          => false,
												    ),
												    'label' => __('Table Header', 'lpd-abcpersonal'),
												),
												'timetable_th_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(37,37,37,0.8)',
												    'label' => __('Table Header Color', 'lpd-abcpersonal' )
												),
												
												'timetable_hours' => array(
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
												        'color'          => false,
												    ),
												    'label' => __('Table Hours', 'lpd-abcpersonal'),
												),
												'timetable_hours_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(37,37,37,0.5)',
												    'label' => __('Table Hours Color', 'lpd-abcpersonal' )
												),
												'timetable_font' => array(
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
												        'color'          => false,
												    ),
												    'label' => __('Table Font', 'lpd-abcpersonal'),
												),
												'timetable_title' => array(
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
												        'color'          => false,
												    ),
												    'label' => __('Event Title', 'lpd-abcpersonal'),
												),
												'timetable_time' => array(
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
												        'color'          => false,
												    ),
												    'label' => __('Event Time', 'lpd-abcpersonal'),
												),
												'timetable_tooltip_shadow' => array(
													'type'  => 'switch',
												    'value' => 'enabled',
												    'label' => __('Tooltip Shadow', 'lpd-abcpersonal' ),
												    'left-choice' => array(
												        'value' => 'disabled',
												        'label' => __('Disabled', 'lpd-abcpersonal' ),
												    ),
												    'right-choice' => array(
												        'value' => 'enabled',
												        'label' => __('Enabled', 'lpd-abcpersonal' ),
												    ),
												),
												'timetable_filter_font' => array(
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
												    'label' => __('Tabs Filter Font', 'lpd-abcpersonal'),
												),
												'timetable_filter_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#48cfad',
												    'label' => __('Tabs Filter Color', 'lpd-abcpersonal' )
												),
												'timetable_filter_active_color' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#ffffff',
												    'label' => __('Tabs Filter Active Color', 'lpd-abcpersonal' )
												),
												'timetable_filter_bg' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(255,255,255,0)',
												    'label' => __('Tabs Filter Background', 'lpd-abcpersonal' )
												),
												'timetable_filter_active_bg' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => '#48cfad',
												    'label' => __('Tabs Filter Active Background', 'lpd-abcpersonal' )
												),
												'timetable_filter_border' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(72, 207, 173, 0.5)',
												    'label' => __('Tabs Filter Border', 'lpd-abcpersonal' )
												),
												'timetable_filter_active_border' => array(
												    'type'  => 'rgba-color-picker',
												    'value' => 'rgba(255,255,255,0)',
												    'label' => __('Tabs Filter Active Border', 'lpd-abcpersonal' )
												),

											),
										),
										'show_borders' => false,
									),
									
								
								)
							),
	
						),
					),
					
					'event_hours_shortcode_options' => array(
						'title' => esc_html__( 'Event hours shortcode', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'event_hours_shortcode_options-box' => array(
								'title' => esc_html__( 'Event hours shortcode', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'event_hours_text_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Text Color', 'lpd-abcpersonal' )
									),
									'event_hours_title_font' => array(
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
									        'color'          => true,
									    ),
									    'label' => __('Title', 'lpd-abcpersonal'),
									),
									'event_hours_border_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#ebebeb',
									    'label' => __('Border Color', 'lpd-abcpersonal' )
									),
									'event_hours_background' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#ffffff',
									    'label' => __('Background Color', 'lpd-abcpersonal' )
									),
																
								)
							),
	
						),
					),
	
				)
			)
		),
	);
