<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'portfolio' => array(
				'title' => esc_html__( 'Portfolio', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
				
					'portfolio_post_options' => array(
						'title' => esc_html__( 'Post options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'portfolio_post-box' => array(
								'title' => esc_html__( 'Post options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(


									'portfolio_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Post Color', 'lpd-abcpersonal'),
									),
									'portfolio_link_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#6CD8BD',
									    'label' => __('Post Hover Color', 'lpd-abcpersonal'),
									),
									'portfolio_related_post_title_group' => array(
									    'type' => 'group',
									    'options' => array(

											'portfolio_related_post_title' => array(
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
											    'label' => __('Related Post Title Font', 'lpd-abcpersonal'),
											),
											'portfolio_related_post_title_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Title Color', 'lpd-abcpersonal'),
											),
											'portfolio_related_post_title_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Title Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									'portfolio_related_post_meta' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'portfolio_related_post_switch' => array(
											    'type'  => 'switch',
											    'value' => 'disabled',
											    'label' => __('Related Post Meta', 'lpd-abcpersonal' ),
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
		
												'portfolio_related_post_meta_font' => array(
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
												    'label' => '',
												),
	
											),
										),
										'show_borders' => false,
									),
									'portfolio_related_post_img_replacement' =>array(
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
