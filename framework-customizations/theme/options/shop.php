<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'shop' => array(
				'title' => esc_html__( 'Shop', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
				
					'shop_options' => array(
						'title' => esc_html__( 'Shop options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'shop_options-box' => array(
								'title' => esc_html__( 'Shop options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'shop_title' => array(
								        'type'  => 'text',
								        'value' => 'Shop',
								        'label' => __('Shop Title', 'lpd-abcpersonal' ),
									),
									'shop_products_per_row' => array(
									    'type'  => 'short-select',
									    'value' => '4',
									    'label' => '',
									    'choices' => array(
									    	'1' => '1',
									        '2' => '2',
									        '3' => '3',
									        '4' => '4',
									        '5' => '5',
									        '6' => '6',
									    ),
									    'label' => __('Shop Columns', 'lpd-abcpersonal' ),
									    'no-validate' => false,
									),
									'shop_products_per_page' => array(
								        'type'  => 'short-text',
								        'value' => '12',
								        'label' => __('Products Per Page', 'lpd-abcpersonal' ),
									),
									'shop_price_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => 'regular',
									        'letter-spacing' => 0,
									        'color' => '#48cfad',
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => false,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Price Font', 'lpd-abcpersonal'),
									),
									'shop_rating_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Rating Color', 'lpd-abcpersonal'),
									),
									
									'shop_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'shop_btn_text' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'letter-spacing' => 1
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => false,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Button Text', 'lpd-abcpersonal' )
											),
											'shop_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'shop_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'shop_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'shop_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Hover Color', 'lpd-abcpersonal' )
											),
											'shop_btn_overlay_effect' =>array(
											    'type'  => 'switch',
											    'value' => 'enabled',
											    'label' => __('Button Overlay Effect', 'lpd-abcpersonal' ),
											    'left-choice' => array(
											        'value' => 'disabled',
											        'label' => __('Disabled', 'lpd-abcpersonal' ),
											    ),
											    'right-choice' => array(
											        'value' => 'enabled',
											        'label' => __('Enabled', 'lpd-abcpersonal' ),
											    ),
											),
																				    
									    ),
									    
									),
									'shop_alt_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'alt_shop_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Alt. Button Text Color', 'lpd-abcpersonal' )
											),
											'alt_shop_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Alt. Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'alt_shop_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Alt. Button Color', 'lpd-abcpersonal' )
											),
											'alt_shop_btn_background_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Alt. Button Hover Color', 'lpd-abcpersonal' )
											),
											
									    ),
									    
									),
									'shop_sale_badge' => array(
									    'type' => 'group',
									    'options' => array(

											'shop_sale_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('"Sale" Badge Color', 'lpd-abcpersonal'),
											),
											'shop_sale_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'size' => 12,
											        'letter-spacing' => 1,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('"Sale" Badge Font', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									'shop_out_badge' => array(
									    'type' => 'group',
									    'options' => array(

											'shop_out_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('"Out of Stock" Badge Color', 'lpd-abcpersonal'),
											),
											'shop_out_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '700',
											        'size' => 12,
											        'letter-spacing' => 1,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('"Out of Stock" Badge Font', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									'shop_form_group' => array(
									    'type' => 'group',
									    'options' => array(

											'shop_form_label_font' => array(
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
											'shop_form_label_element_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Label Element Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
								
								)
							),
	
						),
					),
					
					
					'product_catalog_options' => array(
						'title' => esc_html__( 'Catalog options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'product_catalog-box' => array(
								'title' => esc_html__( 'Catalog options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
								
									'product_catalog_item_group' => array(
									    'type' => 'group',
									    'options' => array(

											'product_catalog_title_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 16,
											        'letter-spacing' => 0,
											        'color' => '#252525',
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => true
											    ),
											    'label' => __('Product Title', 'lpd-abcpersonal'),
											),
											'product_catalog_item_border' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'product_category_item_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Product Border', 'lpd-abcpersonal' ),
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
				
														'product_catalog_item_border_weight' => array(
															'label' => __('Border Weight', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '1',
														),
														'product_catalog_item_border_color' => array(
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
									'product_category_item_group' => array(
									    'type' => 'group',
									    'options' => array(


											'product_category_title_font' => array(
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
											    'label' => __('Category Title Font', 'lpd-abcpersonal'),
											),
											'product_category_counter_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => 'regular',
											        'size' => 30,
											        'letter-spacing' => 0,
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => false
											    ),
											    'label' => __('Category Counter Font', 'lpd-abcpersonal'),
											),
											'product_category_item_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Category Item Color', 'lpd-abcpersonal'),
											),
											'product_category_item_border' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'product_category_item_switch' => array(
														'type'  => 'switch',
													    'value' => 'disabled',
													    'label' => __('Caregory Border', 'lpd-abcpersonal' ),
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
				
														'product_category_item_border_weight' => array(
															'label' => __('Border Weight', 'lpd-abcpersonal' ),
															'type' => 'short-text',
															'value' => '1',
														),
														'product_category_item_border_color' => array(
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
					
					'product_post_options' => array(
						'title' => esc_html__( 'Product options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'product_post-box' => array(
								'title' => esc_html__( 'Product options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'product_post_title_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 30,
									        'letter-spacing' => 0,
									        'color' => '#252525',
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Product Title', 'lpd-abcpersonal'),
									),
									'product_post_heading_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 24,
									        'letter-spacing' => 0,
									        'color' => '#252525',
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Heading Font', 'lpd-abcpersonal'),
									),
									
									'product_post_tab_group' => array(
									    'type' => 'group',
									    'options' => array(


											'product_post_tab_btn_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
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
											    'label' => __('Tab Button Font', 'lpd-abcpersonal'),
											),
											'product_post_tab_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Button Font Color', 'lpd-abcpersonal'),
											),
											'product_post_tab_btn_active_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Font Active Color', 'lpd-abcpersonal'),
											),
																				    
									    ),
									    
									),
									
									'product_post_review_author_group' => array(
									    'type' => 'group',
									    'options' => array(


											'product_post_review_author_font' => array(
											    'type' => 'typography-v2',
											    'value' => array(
											        'family' => 'Poppins',
											        'subset' => 'latin-ext',
											        'variation' => '600',
											        'size' => 14,
											        'letter-spacing' => 0,
											        'color' => '#48cfad',
											    ),
											    'components' => array(
											        'family'         => true,
											        'size'           => true,
											        'line-height'    => false,
											        'letter-spacing' => true,
											        'color'          => true
											    ),
											    'label' => __('Review Author Font', 'lpd-abcpersonal'),
											),
											
									    
									    ),
									    
									),
								
								)
							),
	
						),
					),
					
					'shop_checkout_options' => array(
						'title' => esc_html__( 'Checkout options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'shop_checkout-box' => array(
								'title' => esc_html__( 'Checkout options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'shop_checkout_heading_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 24,
									        'letter-spacing' => 0,
									        'color' => '#252525',
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Page Headings', 'lpd-abcpersonal'),
									),
								
								)
							),
	
						),
					),
					
					'shop_cart_options' => array(
						'title' => esc_html__( 'Cart options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'shop_cart-box' => array(
								'title' => esc_html__( 'Cart options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'shop_cart_heading_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 24,
									        'letter-spacing' => 0,
									        'color' => '#252525',
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Page Headings', 'lpd-abcpersonal'),
									),
									
									'shop_cart_remove_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'shop_cart_remove_btn' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Remove Button', 'lpd-abcpersonal'),
											),
											'shop_cart_remove_btn_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Remove Button Hover', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									
									'shop_cart_product_title' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 16,
									        'letter-spacing' => 0,
									        'color' => '#252525',
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => true
									    ),
									    'label' => __('Product Title', 'lpd-abcpersonal'),
									),
								
								)
							),
	
						),
					),
					
					'shop_widget_options' => array(
						'title' => esc_html__( 'Widget options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'shop_widget-box' => array(
								'title' => esc_html__( 'Widget options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'prodcut_widget_title_font' => array(
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
									    'label' => __('Product Widget Title', 'lpd-abcpersonal'),
									),
									'prodcut_widget_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'prodcut_widget_btn' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Remove Button', 'lpd-abcpersonal'),
											),
											'prodcut_widget_btn_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Remove Button Hover', 'lpd-abcpersonal'),
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
