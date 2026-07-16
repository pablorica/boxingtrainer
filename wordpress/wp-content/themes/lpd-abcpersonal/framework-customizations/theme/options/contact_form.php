<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'contact_form' => array(
				'title' => esc_html__( 'Contact Form', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
					
					'contact_form_primary_styles' => array(
						'title' => esc_html__( 'Primary styles', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'contact_form_primary_options-box' => array(
								'title' => esc_html__( 'Primary styles', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(


									'contact_form_border_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#ebebeb',
									    'label' => __('Border Color', 'lpd-abcpersonal' )
									),
									'contact_form_border_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#c2c2c2',
									    'label' => __('Border Focus Color', 'lpd-abcpersonal' )
									),
									'contact_form_bg_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#fff',
									    'label' => __('Form Color', 'lpd-abcpersonal' )
									),
									'contact_form_bg_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#fffeef',
									    'label' => __('Form Focus Color', 'lpd-abcpersonal' )
									),
									'contact_form_label_font' => array(
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
									'contact_form_label_font_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Label Text Color', 'lpd-abcpersonal' )
									),
									'contact_form_label_element_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Label Element Color', 'lpd-abcpersonal'),
									),
									'contact_form_input_text_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Input Text Color', 'lpd-abcpersonal'),
									),
									'contact_form_placeholder_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.5)',
									    'label' => __('Placeholder Color', 'lpd-abcpersonal'),
									),
									'contact_form_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'contact_form_btn_text' => array(
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
											'contact_form_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'contact_form_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'contact_form_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'contact_form_btn_background_color_hover' => array(
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
					'contact_form_secondary_styles' => array(
						'title' => esc_html__( 'Secondary styles', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'contact_form_secondary_options-box' => array(
								'title' => esc_html__( 'Secondary styles', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(


									'contact_form_secondary_info' => array(
									    'type'  => 'html',
									    'value' => 'default hidden value',
									    'label' => __('How to use?', 'lpd-abcpersonal' ),
									    'html'  => __('Use <strong>secondary-style</strong> with <strong>html_class</strong> attribute in Contact Form 7 shortcode, example: [contact-form-7 id="" title="Contact form 1" <strong>html_class="secondary-style"</strong>]', 'lpd-abcpersonal' ),
									),
									'contact_form_secondary_border_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#ebebeb',
									    'label' => __('Border Color', 'lpd-abcpersonal' )
									),
									'contact_form_secondary_border_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#c2c2c2',
									    'label' => __('Border Focus Color', 'lpd-abcpersonal' )
									),
									'contact_form_secondary_bg_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#fff',
									    'label' => __('Form Color', 'lpd-abcpersonal' )
									),
									'contact_form_secondary_bg_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#fffeef',
									    'label' => __('Form Focus Color', 'lpd-abcpersonal' )
									),
									'contact_form_secondary_label_font' => array(
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
									'contact_form_secondary_label_font_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Label Text Color', 'lpd-abcpersonal' )
									),
									'contact_form_secondary_label_element_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Label Element Color', 'lpd-abcpersonal'),
									),
									'contact_form_secondary_input_text_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.8)',
									    'label' => __('Input Text Color', 'lpd-abcpersonal'),
									),
									'contact_form_secondary_placeholder_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => 'rgba(37,37,37,0.5)',
									    'label' => __('Placeholder Color', 'lpd-abcpersonal'),
									),
									'contact_form_secondary_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'contact_form_secondary_btn_text' => array(
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
											'contact_form_secondary_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'contact_form_secondary_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'contact_form_secondary_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'contact_form_secondary_btn_background_color_hover' => array(
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
