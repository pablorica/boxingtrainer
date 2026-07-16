<?php if (!defined( 'FW' )) die('Forbidden');

$options = array(

    'post_header_sub_title' => array(
        'type' => 'box',
        'title' => __('Sub-title', 'lpd-abcpersonal'),
        'options' => array(
        
			'post_header_sub_title_text' => array(
				'label' => esc_html__( 'Sub-title', 'lpd-abcpersonal' ),
				'type' => 'text',
				'value' => '',
			),
        
        ),
    ),
        
    'post_header_options' => array(
        'type' => 'box',
        'title' => __('Header Options', 'lpd-abcpersonal'),
        'options' => array(
        
			'post_header_options_group' => array(
			    'type' => 'group',
			    'options' => array(

					'post_header_custom_background' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'post_header_custom_background_switch' => array(
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

								'post_header_background_choice' => array(
									'type' => 'multi-picker',
									'show_borders' => false,
									'label' => false,
									'desc' => false,
									'value' => array(
										'post_header_background_type' => 'background_color',
									),
									'picker' => array(
										'post_header_background_type' => array(
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


			    
			    ),
			    
			),
			'post_header_title_padding_group' => array(
			    'type' => 'group',
			    'options' => array(
				
					'post_header_title_paddings' =>array(
					    'type'  => 'html',
					    'label' => __('Title Paddings', 'lpd-abcpersonal' ),
					    'html'  => '',
					),
					'post_header_title_padding_top' => array(
						'label' => '',
						'type' => 'short-text',
						'value' => '',
						'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
					),
					'post_header_title_padding_bottom' => array(
						'label' => '',
						'type' => 'short-text',
						'value' => '',
						'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
					),
					'post_header_title_padding_clearfix' =>array(
					    'type'  => 'html',
					    'label' => '',
					    'html'  => '<div class="wp-clearfix"></div>',
					),
			
				),
			),
			'post_header_title_visibility_group' => array(
			    'type' => 'group',
			    'options' => array(
			    
					'post_header_title_visibility' => array(
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
					'post_header_breadcrumb_visibility' => array(
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
			
        ),
    ),
    
    'page_options' => array(
        'type' => 'box',
        'title' => __('Page Options', 'lpd-abcpersonal'),
        'options' => array(
        
			'page_options_group' => array(
			    'type' => 'group',
			    'options' => array(
				
					'page_options_paddings' =>array(
					    'type'  => 'html',
					    'label' => __('Page Paddings', 'lpd-abcpersonal' ),
					    'html'  => '',
					),
					'page_options_padding_top' => array(
						'label' => '',
						'type' => 'short-text',
						'value' => '50',
						'desc' => esc_html__( 'top', 'lpd-abcpersonal' ),
					),
					'page_options_padding_bottom' => array(
						'label' => '',
						'type' => 'short-text',
						'value' => '30',
						'desc' => esc_html__( 'bottom', 'lpd-abcpersonal' ),
					),
					'page_options_padding_clearfix' =>array(
					    'type'  => 'html',
					    'label' => '',
					    'html'  => '<div class="wp-clearfix"></div>',
					),
			
				),
			),
			
			'portfolio_post_layout' => array(
			    'type'  => 'select',
			    'value' => 'full_width',
			    'label' => '',
			    'choices' => array(
			    	'full_width' => __('Full Width', 'lpd-abcpersonal' ),
			        'sidebar' => __('Sidebar', 'lpd-abcpersonal' ),
			    ),
			    'label' => __('Post Layouts', 'lpd-abcpersonal' ),
			    'no-validate' => false,
			),
			
			'portfolio_post_type' => array(
			    'type'  => 'select',
			    'value' => 'full_width',
			    'label' => '',
			    'choices' => array(
			    	'gallery' => __('Gallery', 'lpd-abcpersonal' ),
			        'slider' => __('Slider', 'lpd-abcpersonal' ),
			    ),
			    'label' => __('Post Type', 'lpd-abcpersonal' ),
			    'no-validate' => false,
			),
        
        ),
    ),
    
    'page_footer_settings' => array(
        'type' => 'box',
        'title' => __('Page Footer Settings', 'lpd-abcpersonal'),
        'options' => array(
        
			'page_footer_settings_group' => array(
			    'type' => 'group',
			    'options' => array(
				
					'page_footer' => array(
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
					'page_bottom_footer' => array(
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
        
        ),
    ),
    
    
);