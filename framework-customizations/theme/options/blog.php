<?php if (!defined( 'FW' )) die('Forbidden');

	$options = array(
		array(
			'blog' => array(
				'title' => esc_html__( 'Blog', 'lpd-abcpersonal' ),
				'type' => 'tab',
				'options' => array(
				
					'blog_options' => array(
						'title' => esc_html__( 'Blog options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'theme_options-box' => array(
								'title' => esc_html__( 'Blog options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(
									
									'blog_title' => array(
								        'type'  => 'text',
								        'value' => 'The Blog',
								        'label' => __('Blog Title', 'lpd-abcpersonal' ),
									),
									'blog_post_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Blog Post Color', 'lpd-abcpersonal'),
									),
									'blog_post_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#6CD8BD',
									    'label' => __('Blog Post Hover Color', 'lpd-abcpersonal'),
									),
									'blog_post_title' => array(
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
									    'label' => __('Blog Post Title Font', 'lpd-abcpersonal'),
									),
									'blog_post_title_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#252525',
									    'label' => __('Title Link Color', 'lpd-abcpersonal'),
									),
									'blog_post_title_hover_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#252525',
									    'label' => __('Title Hover Link Color', 'lpd-abcpersonal'),
									),
									'blog_post_meta_font' => array(
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
									    'label' => __('Post Meta Font', 'lpd-abcpersonal'),
									),
									'more_btn_font' => array(
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
									    'label' => __('"Continue Reading" Button Font', 'lpd-abcpersonal'),
									),
									'more_btn_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#252525',
									    'label' => __('"Continue Reading" Button Color', 'lpd-abcpersonal'),
									),
									'more_btn_hover_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('"Continue Reading" Button Hover Color', 'lpd-abcpersonal'),
									),
									'thumbnail_overlay_group' => array(
									    'type' => 'group',
									    'options' => array(

											'thumbnail_overlay_bg' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(72,207,173,0.2)',
											    'label' => __('Thumbnail Overlay Background', 'lpd-abcpersonal'),
											),
											'thumbnail_overlay_btn' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Thumbnail Button Color', 'lpd-abcpersonal'),
											),
											'thumbnail_overlay_btn_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#6CD8BD',
											    'label' => __('Thumbnail Button Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
								
								)
							),
	
						),
					),
					
					'post_options' => array(
						'title' => esc_html__( 'Post options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'post_options-box' => array(
								'title' => esc_html__( 'Post options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'post_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Post Color', 'lpd-abcpersonal'),
									),
									'post_link_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#6CD8BD',
									    'label' => __('Post Hover Color', 'lpd-abcpersonal'),
									),
									'post_meta_font' => array(
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
									    'label' => __('Post Meta Font', 'lpd-abcpersonal'),
									),
								
								)
							),
	
						),
					),
					
					'related_post_options' => array(
						'title' => esc_html__( 'Related posts', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'related_post-box' => array(
								'title' => esc_html__( 'Related posts', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'related_post_thumbnail_group' => array(
									    'type' => 'group',
									    'options' => array(

											'related_post_thumb_overlay_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,0.5)',
											    'label' => __('Thumbnail Overlay Color', 'lpd-abcpersonal'),
											),
											'related_post_thumb_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Thumbnail Button Color', 'lpd-abcpersonal'),
											),
											'related_post_thumb_btn_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#6cd8bd',
											    'label' => __('Thumbnail Button Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									'related_post_title_group' => array(
									    'type' => 'group',
									    'options' => array(

											'related_post_title' => array(
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
											'related_post_title_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#252525',
											    'label' => __('Title Color', 'lpd-abcpersonal'),
											),
											'related_post_title_hover_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Title Hover Color', 'lpd-abcpersonal'),
											),
									    
									    ),
									    
									),
									'related_post_meta' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'related_post_switch' => array(
											    'type'  => 'switch',
											    'value' => 'disabled',
											    'label' => __('Post Meta', 'lpd-abcpersonal' ),
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
		
												'related_post_meta_font' => array(
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
									'related_post_img_replacement' =>array(
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
									'related_post_excerpt' => array(
								        'type'  => 'short-text',
								        'value' => '10',
								        'label' => __('Excerpt', 'lpd-abcpersonal' ),
								        'desc' => esc_html__( 'Choose number of words for description.', 'lpd-abcpersonal' ),
									),
								
								)
							),
	
						),
					),
					
					'comments_options' => array(
						'title' => esc_html__( 'Comments options', 'lpd-abcpersonal' ),
						'type' => 'tab',
						'options' => array(
	
							'post_comment_options-box' => array(
								'title' => esc_html__( 'Comment options', 'lpd-abcpersonal' ),
								'type' => 'box',
								'options' => array(

									'comment_link_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Comments Color', 'lpd-abcpersonal'),
									),
									'comment_link_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#6CD8BD',
									    'label' => __('Comments Hover Color', 'lpd-abcpersonal'),
									),
									'comment_author_font' => array(
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
									    'label' => __('Comment Author Font', 'lpd-abcpersonal'),
									),
									'comment_reply_font' => array(
									    'type' => 'typography-v2',
									    'value' => array(
									        'family' => 'Poppins',
									        'subset' => 'latin-ext',
									        'variation' => '600',
									        'size' => 11,
									        'letter-spacing' => 1,
									    ),
									    'components' => array(
									        'family'         => true,
									        'size'           => true,
									        'line-height'    => false,
									        'letter-spacing' => true,
									        'color'          => false
									    ),
									    'label' => __('Reply Button Font', 'lpd-abcpersonal'),
									),
									'comment_reply_btn_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Reply Button Color', 'lpd-abcpersonal'),
									),
									'comment_reply_btn_hover_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#6CD8BD',
									    'label' => __('Reply Button Hover Color', 'lpd-abcpersonal'),
									),
									'comment_form_label_font' => array(
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
									'comment_form_label_element_color' => array(
									    'type'  => 'rgba-color-picker',
									    'value' => '#48cfad',
									    'label' => __('Label Element Color', 'lpd-abcpersonal'),
									),
									'comment_form_btn_group' => array(
									    'type' => 'group',
									    'options' => array(

											'comment_form_btn_text' => array(
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
											'comment_form_btn_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Color', 'lpd-abcpersonal' )
											),
											'comment_form_btn_color_hover' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => 'rgba(255,255,255,1)',
											    'label' => __('Button Text Hover Color', 'lpd-abcpersonal' )
											),
											'comment_form_btn_background_color' => array(
											    'type'  => 'rgba-color-picker',
											    'value' => '#48cfad',
											    'label' => __('Button Color', 'lpd-abcpersonal' )
											),
											'comment_form_btn_background_color_hover' => array(
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
