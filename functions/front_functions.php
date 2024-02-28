<?php	

class lpd_abcpersonal_front_functions {

		function __construct() {
		
			add_filter('fw_ext_breadcrumbs_build', array( $this, 'lpd_abcpersonal_breadcrumbs_items') );
			add_action('wp_head', array( $this, 'lpd_abcpersonal_load_google_fonts'));
			add_filter('get_search_form', array( $this, 'lpd_abcpersonal_widget_search_form'), 100 );
			add_filter('the_content_more_link', array( $this, 'lpd_abcpersonal_read_more_link') );
			add_filter('body_class', array( $this, 'lpd_abcpersonal_body_classes'));
			add_filter('post_gallery', array( $this, 'lpd_abcpersonal_post_gallery'), 10, 2 );
			
			add_filter('wp_list_categories', array( $this, 'lpd_abcpersonal_cat_count'));
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check()) {
				add_action('init', array( $this, 'lpd_abcpersonal_add_excerpt_fw_portfolio'));
			}
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check()) {
				add_filter('woocommerce_add_to_cart_fragments', array( $this, 'lpd_abcpersonal_shopping_cart_dropdown_fragments'));
				add_filter('woocommerce_add_to_cart_fragments', array( $this, 'lpd_abcpersonal_shopping_cart_count_fragments'));
			}

			add_filter( 'excerpt_length',array($this,'lpd_abcpersonal_excerpt_length'));
			
			add_filter( 'theme_page_templates', array($this,'lpd_abcpersonal_page_template'));
		
		}
		
		function lpd_abcpersonal_page_template( $page_templates ) {
		    if( !lpd_abcpersonal_helpers::lpd_abcpersonal_revslider_check() ) {
		    	unset( $page_templates['slider-template.php'] );
		    }
		    return $page_templates;
		}
		
		function lpd_abcpersonal_comments_callback( $comment, $args, $depth) {
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ) :
				case 'pingback' :
				case 'trackback' :
				// Display trackbacks differently than normal comments.
			?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'lpd-abcpersonal' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'lpd-abcpersonal' ), '<span class="edit-link">', '</span>' ); ?></p>
			<?php
					break;
				default :
				// Proceed with normal comments.
				global $post;
			?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<div class="comment-wrap">
					<div class="avatar-wrap">
						<?php echo get_avatar( $comment, 100 ); ?>
						<span><i class="material-icons">&#xE0B9;</i></span>
					</div>
					<div class="comment-content">
					
						<div class="comment-meta">
							<ul>
								<li class="author"><?php echo get_comment_author_link(); ?></li>
								<li class="posted-on"><?php _e('posted on', 'lpd-abcpersonal' ) ?> <?php echo esc_html(get_comment_date())?></li>
							</ul>
							<div class="reply">
								<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'lpd-abcpersonal' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							</div>
							
						</div>
						<?php comment_text(); ?>
						<?php edit_comment_link( __( 'Edit', 'lpd-abcpersonal' ), '<p class="edit-link">', '</p>' ); ?>
					</div>
				</div>
			<?php
				break;
			endswitch; // end comment_type check
		}
		
		function lpd_abcpersonal_excerpt_length( $length ) {
			return 20;
		}
				
		function lpd_abcpersonal_body_classes( $classes ) {
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check()) {
				$shop_products_per_row = fw_get_db_settings_option('shop_products_per_row');
				if( is_shop()||is_product_category()||is_product_tag() ) {
					$classes[] = 'columns-'. $shop_products_per_row ;
				}
			}
			
			return $classes;
		}
		
		function lpd_abcpersonal_breadcrumbs_items( $items ) {
		
		if ( ! empty( $items ) ) : ?>
			<div class="breadcrumb">
				<ul class="clearfix">
					<?php for ( $i = 0; $i < count( $items ); $i ++ ) : ?>
						<?php if ( $i == ( count( $items ) - 1 ) ) : ?>
							<li class="breadcrumb-title last-item<?php if ( count( $items ) == 1 ) : ?> only-one-item<?php endif ?>"><?php echo $items[ $i ]['name'] ?></li>
						<?php elseif ( $i == 0 ) : ?>
							<li class="parent first-item<?php if ( $i == ( count( $items ) - 2 ) ) : ?> last-parent<?php endif ?>">
							<?php if( isset( $items[ $i ]['url'] ) ) : ?>
								<a href="<?php echo esc_url($items[ $i ]['url']) ?>"><?php echo $items[ $i ]['name'] ?></a>
							<?php else : echo $items[ $i ]['name']; endif ?>
							</li>
						<?php
						else : ?>
							<li class="parent <?php echo( $i - 1 ) ?>-item<?php if ( $i == ( count( $items ) - 2 ) ) : ?> last-parent<?php endif ?>">
								<?php if( isset( $items[ $i ]['url'] ) ) : ?>
									<a href="<?php echo esc_url($items[ $i ]['url']) ?>"><?php echo $items[ $i ]['name'] ?></a>
								<?php else : echo $items[ $i ]['name']; endif ?>
							</li>
						<?php endif ?>
					<?php endfor ?>
				</ul>
			</div>
		<?php endif; 
		    
		}
		
		static function lpd_abcpersonal_excerpt($limit) {
			$excerpt = explode(' ', get_the_excerpt(), $limit);
			if (count($excerpt)>=$limit) {
				array_pop($excerpt);
				$excerpt = implode(" ",$excerpt).' [...]';
			} else {
				$excerpt = implode(" ",$excerpt);
			}
			$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
			return '<p>'.$excerpt.'</p>';
		}
		
		function lpd_abcpersonal_load_google_fonts(){
		
			if (!defined('FW')) return;

		    $body_font = fw_get_db_settings_option('body_font');
			if($body_font['variation']!=''){
				$family = $body_font['family'].':'.$body_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($body_font['subset'])) );
			}
		    $headings_font = fw_get_db_settings_option('headings_font');
			if($headings_font['variation']!=''){
				$family = $headings_font['family'].':'.$headings_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($headings_font['subset'])) );
			}
		 
		    $widget_title_font = fw_get_db_settings_option('widget_title_font');
		    if($widget_title_font['variation']!=''){
				$family = $widget_title_font['family'].':'.$widget_title_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($widget_title_font['subset'])) );
			}
		    $tag_widget_title_font = fw_get_db_settings_option('tag_widget_title_font');
		    if($tag_widget_title_font['variation']!=''){
				$family = $tag_widget_title_font['family'].':'.$tag_widget_title_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($tag_widget_title_font['subset'])) );
			}
		    $header_logo_text = fw_get_db_settings_option('header_logo/text_logo/header_logo_text');
		    if($header_logo_text['variation']!=''){
				$family = $header_logo_text['family'].':'.$header_logo_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($header_logo_text['subset'])) );
			}
		    $menu_button_text = fw_get_db_settings_option('menu_button_text');
		    if($menu_button_text['variation']!=''){
				$family = $menu_button_text['family'].':'.$menu_button_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($menu_button_text['subset'])) );
			}
		    $dropdown_font = fw_get_db_settings_option('dropdown_font');
		    if($dropdown_font['variation']!=''){
				$family = $dropdown_font['family'].':'.$dropdown_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($dropdown_font['subset'])) );
			}
		    $dropdown_title_font = fw_get_db_settings_option('dropdown_title_font');
		    if($dropdown_title_font['variation']!=''){
				$family = $dropdown_title_font['family'].':'.$dropdown_title_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($dropdown_title_font['subset'])) );
			}
		    $msg_block_text = fw_get_db_settings_option('msg_container_visibility/enabled/msg_block_text');
		    if($msg_block_text['variation']!=''){
				$family = $msg_block_text['family'].':'.$msg_block_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($msg_block_text['subset'])) );
			}
		    $header_title = fw_get_db_settings_option('header_title');
		    if($header_title['variation']!=''){
				$family = $header_title['family'].':'.$header_title['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($header_title['subset'])) );
			}
			$header_subtitle = fw_get_db_settings_option('header_subtitle');
			if($header_subtitle['variation']!=''){
				$family = $header_subtitle['family'].':'.$header_subtitle['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($header_subtitle['subset'])) );
			}
			$breadcrumb = fw_get_db_settings_option('breadcrumb');
			if($breadcrumb['variation']!=''){
				$family = $breadcrumb['family'].':'.$breadcrumb['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($breadcrumb['subset'])) );
			}
			
		    $footer_font = fw_get_db_settings_option('footer_options/enabled/footer_font');
		    if($footer_font['variation']!=''){
				$family = $footer_font['family'].':'.$footer_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($footer_font['subset'])) );
			}
		    
		    $footer_bottom_font = fw_get_db_settings_option('footer_bottom_options/enabled/footer_bottom_font');
		    if($footer_bottom_font ['variation']!=''){
				$family = $footer_bottom_font ['family'].':'.$footer_bottom_font ['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($footer_bottom_font ['subset'])) );
			}
		    $footer_widget_title = fw_get_db_settings_option('footer_widget_title');
		    if($footer_widget_title['variation']!=''){
				$family = $footer_widget_title['family'].':'.$footer_widget_title['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($footer_widget_title['subset'])) );
			}
		    $blog_post_title = fw_get_db_settings_option('blog_post_title');
		    if($blog_post_title['variation']!=''){
				$family = $blog_post_title['family'].':'.$blog_post_title['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($blog_post_title['subset'])) );
			}
			$blog_post_meta_font = fw_get_db_settings_option('blog_post_meta_font');
			if($blog_post_meta_font['variation']!=''){
				$family = $blog_post_meta_font['family'].':'.$blog_post_meta_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($blog_post_meta_font['subset'])) );
			}
			$more_btn_font = fw_get_db_settings_option('more_btn_font');
			if($more_btn_font['variation']!=''){
				$family = $more_btn_font['family'].':'.$more_btn_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($more_btn_font['subset'])) );
			}
			$post_meta_font = fw_get_db_settings_option('post_meta_font');
			if($post_meta_font['variation']!=''){
				$family = $post_meta_font['family'].':'.$post_meta_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($post_meta_font['subset'])) );
			}
			$related_post_title = fw_get_db_settings_option('related_post_title');
			if($related_post_title['variation']!=''){
				$family = $related_post_title['family'].':'.$related_post_title['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($related_post_title['subset'])) );
			}
			$related_post_meta = fw_get_db_settings_option('related_post_meta/enabled/related_post_meta_font');
			if($related_post_meta['variation']!=''){
				$family = $related_post_meta['family'].':'.$related_post_meta['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($related_post_meta['subset'])) );
			}
			$comment_author_font = fw_get_db_settings_option('comment_author_font');
			if($comment_author_font['variation']!=''){
				$family = $comment_author_font['family'].':'.$comment_author_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($comment_author_font['subset'])) );
			}
			$comment_reply_font = fw_get_db_settings_option('comment_reply_font');
			if($comment_reply_font['variation']!=''){
				$family = $comment_reply_font['family'].':'.$comment_reply_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($comment_reply_font['subset'])) );
			}
			$comment_form_label_font = fw_get_db_settings_option('comment_form_label_font');
			if($comment_form_label_font['variation']!=''){
				$family = $comment_form_label_font['family'].':'.$comment_form_label_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($comment_form_label_font['subset'])) );
			}
			$comment_form_btn_text = fw_get_db_settings_option('comment_form_btn_text');
			if($comment_form_btn_text['variation']!=''){
				$family = $comment_form_btn_text['family'].':'.$comment_form_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($comment_form_btn_text['subset'])) );
			}
			$portfolio_related_post_title = fw_get_db_settings_option('portfolio_related_post_title');
			if($portfolio_related_post_title['variation']!=''){
				$family = $portfolio_related_post_title['family'].':'.$portfolio_related_post_title['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($portfolio_related_post_title['subset'])) );
			}
			$portfolio_related_post_meta = fw_get_db_settings_option('portfolio_related_post_meta/enabled/portfolio_related_post_meta_font');
			if($portfolio_related_post_meta['variation']!=''){
				$family = $portfolio_related_post_meta['family'].':'.$portfolio_related_post_meta['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($portfolio_related_post_meta['subset'])) );
			}
			$contact_form_label_font = fw_get_db_settings_option('contact_form_label_font');
			if($contact_form_label_font['variation']!=''){
				$family = $contact_form_label_font['family'].':'.$contact_form_label_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($contact_form_label_font['subset'])) );
			}
			$contact_form_btn_text = fw_get_db_settings_option('contact_form_btn_text');
			if($contact_form_btn_text['variation']!=''){
				$family = $contact_form_btn_text['family'].':'.$contact_form_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($contact_form_btn_text['subset'])) );
			}
			$contact_form_secondary_label_font = fw_get_db_settings_option('contact_form_secondary_label_font');
			if($contact_form_secondary_label_font['variation']!=''){
				$family = $contact_form_secondary_label_font['family'].':'.$contact_form_secondary_label_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($contact_form_secondary_label_font['subset'])) );
			}
			$contact_form_secondary_btn_text = fw_get_db_settings_option('contact_form_secondary_btn_text');
			if($contact_form_secondary_btn_text['variation']!=''){
				$family = $contact_form_secondary_btn_text['family'].':'.$contact_form_secondary_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($contact_form_secondary_btn_text['subset'])) );
			}
		    
		    $vc_table_body = fw_get_db_settings_option('vc_table_body');
		    if($vc_table_body['variation']!=''){
				$family = $vc_table_body['family'].':'.$vc_table_body['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($vc_table_body['subset'])) );
			}
		    $vc_table_heading = fw_get_db_settings_option('vc_table_heading');
		    if($vc_table_heading['variation']!=''){
				$family = $vc_table_heading['family'].':'.$vc_table_heading['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($vc_table_heading['subset'])) );
			}
		    $vc_table_secondary_body = fw_get_db_settings_option('vc_table_secondary_body');
		    if($vc_table_secondary_body['variation']!=''){
				$family = $vc_table_secondary_body['family'].':'.$vc_table_secondary_body['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($vc_table_secondary_body['subset'])) );
			}
		    $vc_table_secondary_heading = fw_get_db_settings_option('vc_table_secondary_heading');
		    if($vc_table_secondary_heading['variation']!=''){
				$family = $vc_table_secondary_heading['family'].':'.$vc_table_secondary_heading['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($vc_table_secondary_heading['subset'])) );
			}
		    
		    $events_form_label_font = fw_get_db_settings_option('events_form_label_font');
		    if($events_form_label_font['variation']!=''){
				$family = $events_form_label_font['family'].':'.$events_form_label_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($events_form_label_font['subset'])) );
			}
		    $events_form_btn_text = fw_get_db_settings_option('events_form_btn_text');
		    if($events_form_btn_text['variation']!=''){
				$family = $events_form_btn_text['family'].':'.$events_form_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($events_form_btn_text['subset'])) );
			}
		    $navigation_btn_font = fw_get_db_settings_option('navigation_btn_font');
		    if($navigation_btn_font['variation']!=''){
				$family = $navigation_btn_font['family'].':'.$navigation_btn_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($navigation_btn_font['subset'])) );
			}
		    $calendar_table_header = fw_get_db_settings_option('calendar_table_header');
		    if($calendar_table_header['variation']!=''){
				$family = $calendar_table_header['family'].':'.$calendar_table_header['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($calendar_table_header['subset'])) );
			}
		    $events_link_font = fw_get_db_settings_option('events_link_font');
		    if($events_link_font['variation']!=''){
				$family = $events_link_font['family'].':'.$events_link_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($events_link_font['subset'])) );
			}
		    $calendar_btn_text = fw_get_db_settings_option('calendar_btn_text');
		    if($calendar_btn_text['variation']!=''){
				$family = $calendar_btn_text['family'].':'.$calendar_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($calendar_btn_text['subset'])) );
			}
		    $listday_navigation_btn_font = fw_get_db_settings_option('listday_navigation_btn_font');
		    if($listday_navigation_btn_font['variation']!=''){
				$family = $listday_navigation_btn_font['family'].':'.$listday_navigation_btn_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($listday_navigation_btn_font['subset'])) );
			}
		    $listday_separator_font = fw_get_db_settings_option('listday_separator_font');
		    if($listday_separator_font['variation']!=''){
				$family = $listday_separator_font['family'].':'.$listday_separator_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($listday_separator_font['subset'])) );
			}
		    $events_front_title_font = fw_get_db_settings_option('events_front_title_font');
		    if($events_front_title_font['variation']!=''){
				$family = $events_front_title_font['family'].':'.$events_front_title_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($events_front_title_font['subset'])) );
			}
		    $findoutmore_btn_font = fw_get_db_settings_option('findoutmore_btn_font');
		    if($findoutmore_btn_font['variation']!=''){
				$family = $findoutmore_btn_font['family'].':'.$findoutmore_btn_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($findoutmore_btn_font['subset'])) );
			}
		    $price_badge_font = fw_get_db_settings_option('price_badge_font');
		    if($price_badge_font['variation']!=''){
				$family = $price_badge_font['family'].':'.$price_badge_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($price_badge_font['subset'])) );
			}
		    $listday_btn_text = fw_get_db_settings_option('listday_btn_text');
		    if($listday_btn_text['variation']!=''){
				$family = $listday_btn_text['family'].':'.$listday_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($listday_btn_text['subset'])) );
			}
		    $event_post_navigation_btn_font = fw_get_db_settings_option('event_post_navigation_btn_font');
		    if($event_post_navigation_btn_font['variation']!=''){
				$family = $event_post_navigation_btn_font['family'].':'.$event_post_navigation_btn_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($event_post_navigation_btn_font['subset'])) );
			}
		    $event_post_price_badge_font = fw_get_db_settings_option('event_post_price_badge_font');
		    if($event_post_price_badge_font['variation']!=''){
				$family = $event_post_price_badge_font['family'].':'.$event_post_price_badge_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($event_post_price_badge_font['subset'])) );
			}
		    $event_post_defines_terms_font = fw_get_db_settings_option('event_post_defines_terms_font');
		    if($event_post_defines_terms_font['variation']!=''){
				$family = $event_post_defines_terms_font['family'].':'.$event_post_defines_terms_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($event_post_defines_terms_font['subset'])) );
			}
		    $event_post_btn_text = fw_get_db_settings_option('event_post_btn_text');
		    if($event_post_btn_text['variation']!=''){
				$family = $event_post_btn_text['family'].':'.$event_post_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($event_post_btn_text['subset'])) );
			}
		    
		    $timetable_th = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_th');
		    if($timetable_th['variation']!=''){
				$family = $timetable_th['family'].':'.$timetable_th['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($timetable_th['subset'])) );
			}
		    $timetable_hours = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_hours');
		    if($timetable_hours['variation']!=''){
				$family = $timetable_hours['family'].':'.$timetable_hours['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($timetable_hours['subset'])) );
			}
		    $timetable_font = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_font');
		    if($timetable_font['variation']!=''){
				$family = $timetable_font['family'].':'.$timetable_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($timetable_font['subset'])) );
			}
		    $timetable_title = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_title');
		    if($timetable_title['variation']!=''){
				$family = $timetable_title['family'].':'.$timetable_title['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($timetable_title['subset'])) );
			}
		    $timetable_time = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_time');
		    if($timetable_time['variation']!=''){
				$family = $timetable_time['family'].':'.$timetable_time['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($timetable_time['subset'])) );
			}
		    $timetable_filter_font = fw_get_db_settings_option('custom_timetable_options/enabled/timetable_filter_font');
		    if($timetable_filter_font['variation']!=''){
				$family = $timetable_filter_font['family'].':'.$timetable_filter_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($timetable_filter_font['subset'])) );
			}
		    $event_hours_title_font = fw_get_db_settings_option('event_hours_title_font');
		    if($event_hours_title_font['variation']!=''){
				$family = $event_hours_title_font['family'].':'.$event_hours_title_font['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($event_hours_title_font['subset'])) );
			}
		    
		    $search_page_title = fw_get_db_settings_option('search_page_title');
		    if($search_page_title['variation']!=''){
				$family = $search_page_title['family'].':'.$search_page_title['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($search_page_title['subset'])) );
			}
		    
		    $search_page_form_btn_text = fw_get_db_settings_option('search_page_form_btn_text');
		    if($search_page_form_btn_text['variation']!=''){
				$family = $search_page_form_btn_text['family'].':'.$search_page_form_btn_text['variation'];
				lpd_abcpersonal_enqueue_font(sanitize_title($family), array( "family"  => array($family), "subset"  => array($search_page_form_btn_text['subset'])) );
			}
			
		}
				
		public static function lpd_abcpersonal_get_css_styles( $styles ) {
			
			$css_styles = '';
			
			if( isset( $styles['width'] ) && $styles['width'] <> '' ) {
				$css_styles .= 'width: ' . $styles['width'] .'px; ';
			}
			
			if( isset( $styles['height'] ) && $styles['height'] <> '' ) {
				$css_styles .= 'height: ' . $styles['height'] .'px; ';
			}
			
			if( isset( $styles['top_margin'] ) && $styles['top_margin'] <> '' ) {
				$css_styles .= 'margin-top: ' . $styles['top_margin'] .'px; ';
			}
			
			if( isset( $styles['right_margin'] ) && $styles['right_margin'] <> '' ) {
				$css_styles .= 'margin-right: ' . $styles['right_margin'] .'px; ';
			}
			
			if( isset( $styles['bottom_margin'] ) && $styles['bottom_margin'] <> '' ) {
				$css_styles .= 'margin-bottom: ' . $styles['bottom_margin'] .'px; ';
			}
			
			if( isset( $styles['left_margin'] ) && $styles['left_margin'] <> '' ) {
				$css_styles .= 'margin-left: ' . $styles['left_margin'] .'px; ';
			}
			
			if( isset( $styles['top_padding'] ) && $styles['top_padding'] <> '' ) {
				$css_styles .= 'padding-top: ' . $styles['top_padding'] .'px; ';
			}
			
			if( isset( $styles['right_padding'] ) && $styles['right_padding'] <> '' ) {
				$css_styles .= 'padding-right: ' . $styles['right_padding'] .'px; ';
			}
			
			if( isset( $styles['bottom_padding'] ) && $styles['bottom_padding'] <> '' ) {
				$css_styles .= 'padding-bottom: ' . $styles['bottom_padding'] .'px; ';
			}
			
			if( isset( $styles['left_padding'] ) && $styles['left_padding'] <> '' ) {
				$css_styles .= 'padding-left: ' . $styles['left_padding'] .'px;';
			}
			
			if( isset( $styles['top_border'] ) && $styles['top_border'] <> '' ) {
				$css_styles .= 'border-top-width: ' . $styles['top_border'] .'px; ';
			}
			
			if( isset( $styles['right_border'] ) && $styles['right_border'] <> '' ) {
				$css_styles .= 'border-right-width: ' . $styles['right_border'] .'px; ';
			}
			
			if( isset( $styles['bottom_border'] ) && $styles['bottom_border'] <> '' ) {
				$css_styles .= 'border-bottom-width: ' . $styles['bottom_border'] .'px; ';
			}
			
			return $css_styles;
			
		}
	
		public static function lpd_abcpersonal_page_title() {

			echo "<h2>";
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && ( is_shop() || is_product_category() || is_product_tag() || is_singular('product') ) ):
			
				$shop_title = esc_html__( 'Shop', 'lpd-abcpersonal' );
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && (fw_get_db_settings_option( 'shop_title' )!='') ) {
					$shop_title = fw_get_db_settings_option( 'shop_title' );
				}
				echo wp_kses_post( $shop_title );
			
			elseif(is_front_page() && is_home() ):
			
				$blog_title = esc_html__( 'Blog', 'lpd-abcpersonal' );
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
					$blog_title = fw_get_db_settings_option( 'blog_title' );
				}
				echo wp_kses_post( $blog_title );

			elseif( is_single() ):
			
				single_post_title();
			
			elseif( is_home() ):
			
				$blog_title = esc_html__( 'Blog', 'lpd-abcpersonal' );
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
					$blog_title = fw_get_db_settings_option( 'blog_title' );
				}
				echo wp_kses_post( $blog_title );
			
			elseif( is_category() ):
			
				$blog_title = esc_html__( 'Blog', 'lpd-abcpersonal' );
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
					$blog_title = fw_get_db_settings_option( 'blog_title' );
				}
				echo wp_kses_post( $blog_title );
			
			elseif( is_tag() ):
			
				$blog_title = esc_html__( 'Blog', 'lpd-abcpersonal' );
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
					$blog_title = fw_get_db_settings_option( 'blog_title' );
				}
				echo wp_kses_post( $blog_title );
			
			elseif( is_archive()):
				
				if (lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check()&&tribe_is_event_query()){
					
					$events_title = esc_html__( 'Events', 'lpd-abcpersonal' );
					
					if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
						$events_title = fw_get_db_settings_option( 'events_title' );
					}
					
					echo wp_kses_post( $events_title );
					
				}else{
					
					echo get_the_archive_title();
					
				}
			
			elseif( is_author() ):
			
				$blog_title = esc_html__( 'Blog', 'lpd-abcpersonal' );
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
					$blog_title = fw_get_db_settings_option( 'blog_title' );
				}
				echo wp_kses_post( $blog_title );
			
			elseif( is_404() ):
			
				esc_html_e( 'Page not found', 'lpd-abcpersonal' );
				
			elseif( is_search() ):
			
				esc_html_e( 'Search results', 'lpd-abcpersonal' );
				
			elseif( is_singular() ):
			
				single_post_title();
			
			endif;
			
			echo "</h2>";

		}
		
		public static function lpd_abcpersonal_shopping_cart() {
		
			$shopping_cart_alternative = '';
		
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				$shopping_cart_alternative = fw_get_db_settings_option('shopping_cart/enabled/shopping_cart_alternative/shopping_cart_alternative_switch');
			}

			echo "<div class='shopping-cart-container woocommerce'>";
				echo "<div class='shopping-cart-btn-wrap'>";
					echo "<a href='".esc_url(WC()->cart->get_cart_url())."' class='shopping-cart-btn";
					if($shopping_cart_alternative=='enabled'){
						echo " shopping-cart-btn-type-1";
					}
					echo "'>";
						echo "<span class='shopping-cart-btn-content'><span>";
							echo '<i class="material-icons">&#xE8CC;</i>';
							echo '<span class="count">'.esc_html(WC()->cart->get_cart_contents_count()).'</span>';
						echo "</span></span>";
					echo "</a>";
					lpd_abcpersonal_front_functions::lpd_abcpersonal_shopping_cart_dropdown();
				echo "</div>";
			echo "</div>";
			
		}
		
		public static function lpd_abcpersonal_shopping_cart_dropdown() {
			echo "<div class='shopping-cart-dropdown'>";
				if ( sizeof( WC()->cart->get_cart() ) > 0 ) :
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					
						$product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
						
						if ( $product && $product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						
							$product_name = apply_filters( 'woocommerce_cart_item_name', $product->get_title(), $cart_item, $cart_item_key );
							$product_thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $product ), $cart_item, $cart_item_key );
						
							echo "<div class='items'>";
								echo "<div class='item clearfix'>";
										echo "<a href='".esc_url(get_permalink( $product_id ))."'>".$product_name."".$product_thumbnail."</a>";
										echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key );;
								echo "</div>";
							echo "</div>";
						}
					}
				else :
					echo "<p class='empty'>".esc_html__( 'No products in the cart.', 'lpd-abcpersonal' )."</p>";
				endif;
				echo "<div class='shopping-cart-subtotal clearfix'><strong>".esc_html__( 'Subtotal:', 'lpd-abcpersonal' )."</strong><span class='amount'>".WC()->cart->get_cart_subtotal()."</span></div>";
				echo "<div class='shopping-cart-navigation clearfix'>";
					echo "<a href='".esc_url(WC()->cart->get_cart_url())."' class='button'><span>".esc_html__( 'View Cart', 'lpd-abcpersonal' )."</span></a>";
					echo "<a href='".esc_url(WC()->cart->get_checkout_url())."' class='button alt'><span>".esc_html__( 'Checkout', 'lpd-abcpersonal' )."</span></a>";
				echo "</div>";
			echo "</div>";
		}
		
		function lpd_abcpersonal_shopping_cart_count_fragments( $fragments ) {
			global $woocommerce;
			ob_start();
			
			echo '<span class="count">'.esc_html(WC()->cart->get_cart_contents_count()).'</span>';
			
			$fragments['.shopping-cart-btn-content .count'] = ob_get_clean();
			return $fragments;
		}
					
		function lpd_abcpersonal_shopping_cart_dropdown_fragments( $fragments ) {
			global $woocommerce;
			ob_start();
			
			lpd_abcpersonal_front_functions::lpd_abcpersonal_shopping_cart_dropdown();
			
			$fragments['.shopping-cart-dropdown'] = ob_get_clean();
			return $fragments;
		}
		
		public static function lpd_abcpersonal_page_sub_title() {
		
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
			
			
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$header_sub_title = fw_get_db_settings_option( 'events_sub_title' );
					
					if($header_sub_title) {
						
						echo "<span class='subtitle'>";
						echo $header_sub_title;
						echo "</span>";
						
					}
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					$header_sub_title = fw_get_db_post_option( $shop_page->ID, 'post_header_sub_title_text' );
					
					if($header_sub_title) {
						
						echo "<span class='subtitle'>";
						echo $header_sub_title;
						echo "</span>";
						
					}
					
				
				}elseif(is_single() || is_page()) {
				
					$header_sub_title = fw_get_db_post_option( get_the_ID(), 'post_header_sub_title_text' );
					
					if($header_sub_title) {
						
						echo "<span class='subtitle'>";
						echo $header_sub_title;
						echo "</span>";
						
					}
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					$header_sub_title = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_sub_title_text' );
					
					if($header_sub_title) {
						
						echo "<span class='subtitle'>";
						echo $header_sub_title;
						echo "</span>";
						
					}
					
				}
			
			}
		}
		
		public static function lpd_abcpersonal_main_class() {
			
			$main_class = '';
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() && function_exists('fw_ext_sidebars_get_current_position') ) {
			
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$current_position = fw_get_db_settings_option( 'events_sidebar' );
				
				}else{
				
					$current_position = fw_ext_sidebars_get_current_position();
					
				}
			
				if( $current_position === 'left' ){
					
					$main_class .= 'inner-page-left-sidebar';
					
				}elseif( $current_position === 'right' ){
					
					$main_class .= 'inner-page-right-sidebar';
					
				}elseif( $current_position === 'full' ){
					
					$main_class .= 'inner-page-no-sidebar';
					
				}else {
					
					$main_class .= 'inner-page-right-sidebar';
					
				}
			
			}
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				$main_layouts = fw_get_db_settings_option('main_layouts');
				
				if( $main_layouts=="1480" ) {
					$main_class .= ' min-width-1480';
				}
			}
			
			if((is_front_page() && is_home()) || is_home() || is_archive()) {
					
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$main_class .= ' inner_events_page';
				
				}else{
				
					$main_class .= ' front-blog-post';
					
				}
				
			}
			
			if(is_singular('post')) {
			
				$main_class .= ' inner-blog-post';
				
			}
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_cart()) {
			
				$main_class .= ' inner-cart-page';
				
			}
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_checkout()) {
			
				$main_class .= ' inner-checkout-page';
				
			}
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_product()) {
			
				$main_class .= ' inner-product-post';
				
				global $post;
				
				$product = get_product( $post->ID );
				
				if( $product->is_type( 'simple' ) ){
				
					$main_class .= ' inner-single-product';
					
				}elseif( $product->is_type( 'variable' ) ){
				
					$main_class .= ' inner-variable-product';
					
				}
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check()) {
					
					$product_post_layout = fw_get_db_post_option( get_the_ID(), 'product_post_layout');
					
					if($product_post_layout=='50-50') {
					
						$main_class .= ' inner-product-post-50-50';
					
					}
					
				}
				
			}
			
			if(is_singular('fw-portfolio')) {
			
				$main_class .= ' inner-portfolio-post';
				
			}
			
			if ( is_singular('post') && comments_open() || get_comments_number() ) {
				
				$main_class .= ' inner-comment-page';
				
			}
			
			if ( is_page() && comments_open() || get_comments_number() ) {
				
				$main_class .= ' inner-comment-page';
				
			}
			
			if ( wp_attachment_is_image() ) {
				
				$main_class .= ' inner-comment-page';
				
			}
			
			if( is_search() ){
				
				$main_class .= ' inner-search-page';
			}
			
			if( is_404() ){
				
				$main_class .= ' inner-404-page';
			}
			

			echo $main_class;
		}
		
		public static function lpd_abcpersonal_page_paddings() {
			
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				$page_options_padding_top=$page_options_padding_bottom='';
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$page_options_padding_top = fw_get_db_settings_option( 'events_options_padding_top' );
					$page_options_padding_bottom = fw_get_db_settings_option( 'events_options_padding_bottom' );
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					$page_options_padding_top  = fw_get_db_post_option( $shop_page->ID, 'page_options_padding_top' );
					$page_options_padding_bottom  = fw_get_db_post_option( $shop_page->ID, 'page_options_padding_bottom' );
				
				}elseif(is_single() || is_page()) {
				
					$page_options_padding_top  = fw_get_db_post_option( get_the_ID(), 'page_options_padding_top' );
					$page_options_padding_bottom  = fw_get_db_post_option( get_the_ID(), 'page_options_padding_bottom' );
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					$page_options_padding_top = fw_get_db_post_option( get_option( 'page_for_posts'), 'page_options_padding_top' );
					$page_options_padding_bottom = fw_get_db_post_option( get_option( 'page_for_posts'), 'page_options_padding_bottom' );
				}
				
				return array(
					'top' => $page_options_padding_top,
					'bottom' => $page_options_padding_bottom,
				);
			}
			
		}
		
		public static function lpd_abcpersonal_footer_visibility() {
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				$footer_visibility = '';
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$footer_visibility = fw_get_db_settings_option( 'events_footer' );
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					$footer_visibility  = fw_get_db_post_option( $shop_page->ID, 'page_footer' );
				
				}elseif(is_single() || is_page()) {
				
					$footer_visibility  = fw_get_db_post_option( get_the_ID(), 'page_footer' );
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					$footer_visibility = fw_get_db_post_option( get_option( 'page_for_posts'), 'page_footer' );
					
				}
				return $footer_visibility;
				
			}
		}
		
		public static function lpd_abcpersonal_footer_bottom_visibility() {
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				$footer_bottom_visibility = '';
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$footer_bottom_visibility = fw_get_db_settings_option( 'events_bottom_footer' );
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					$footer_bottom_visibility  = fw_get_db_post_option( $shop_page->ID, 'page_bottom_footer' );
				
				}elseif(is_single() || is_page()) {
				
					$footer_bottom_visibility  = fw_get_db_post_option( get_the_ID(), 'page_bottom_footer' );
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					$footer_bottom_visibility = fw_get_db_post_option( get_option( 'page_for_posts'), 'page_bottom_footer' );
					
				}else{
					
					$footer_bottom_visibility = fw_get_db_settings_option('footer_bottom_options/footer_bottom_switch');
					
				}
				return $footer_bottom_visibility;
				
			}
		}
		
		function lpd_abcpersonal_widget_search_form( $form ) {
		    $form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
			    <label><span class="screen-reader-text">' . __( 'Search for:', 'lpd-abcpersonal' ) . '</span>
			        <input type="search" class="search-field"
			            placeholder="' . __( 'Search For', 'lpd-abcpersonal' ) . '"
			            value="' . get_search_query() . '" name="s"
			            title="' . __( 'Search for:', 'lpd-abcpersonal' ) . '" />
			    </label>
			    <button type="submit" id="search-submit"><i class="material-icons">&#xE8B6;</i></button>
			    
			</form>';
		 
		    return $form;
		}
		
 		public static function lpd_abcpersonal_header_title_padding_top() {
	
			$header_title_padding_top = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					if(fw_get_db_settings_option( 'events_header_title_padding_top' )!=''){
						$header_title_padding_top = fw_get_db_settings_option( 'events_header_title_padding_top' );
					}else{
						$header_title_padding_top = fw_get_db_settings_option('header_title_padding_top');
					}
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					
					if(fw_get_db_post_option( $shop_page->ID, 'post_header_title_padding_top' )!=''){
						$header_title_padding_top  = fw_get_db_post_option( $shop_page->ID, 'post_header_title_padding_top' );
					}else{
						$header_title_padding_top = fw_get_db_settings_option('header_title_padding_top');
					}
					
				
				}elseif(is_single() || is_page()) {
				
					if(fw_get_db_post_option( get_the_ID(), 'post_header_title_padding_top' )!=''){
						$header_title_padding_top  = fw_get_db_post_option( get_the_ID(), 'post_header_title_padding_top' );
					}else{
						$header_title_padding_top = fw_get_db_settings_option('header_title_padding_top');
					}
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					if(fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_title_padding_top' )!=''){
						$header_title_padding_top = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_title_padding_top' );
					}else{
						$header_title_padding_top = fw_get_db_settings_option('header_title_padding_top');
					}
					
				} else {
				
					$header_title_padding_top = fw_get_db_settings_option('header_title_padding_top');
					
				}
			}
			return $header_title_padding_top;
 		}
 		
 		public static function lpd_abcpersonal_header_title_padding_bottom() {
	
			$header_title_padding_bottom = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					if(fw_get_db_settings_option( 'events_header_title_padding_bottom' )!=''){
						$header_title_padding_bottom = fw_get_db_settings_option( 'events_header_title_padding_bottom' );
					}else{
						$header_title_padding_bottom = fw_get_db_settings_option('header_title_padding_bottom');
					}
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					
					if(fw_get_db_post_option( $shop_page->ID, 'post_header_title_padding_bottom' )!=''){
						$header_title_padding_bottom = fw_get_db_post_option( $shop_page->ID, 'post_header_title_padding_bottom' );
					}else{
						$header_title_padding_bottom = fw_get_db_settings_option('header_title_padding_bottom');
					}
				
				}elseif(is_single() || is_page()) {
				
					if(fw_get_db_post_option( get_the_ID(), 'post_header_title_padding_bottom' )!=''){
						$header_title_padding_bottom = fw_get_db_post_option( get_the_ID(), 'post_header_title_padding_bottom' );
					}else{
						$header_title_padding_bottom = fw_get_db_settings_option('header_title_padding_bottom');
					}
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					if(fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_title_padding_bottom' )!=''){
						$header_title_padding_bottom = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_title_padding_bottom' );
					}else{
						$header_title_padding_bottom = fw_get_db_settings_option('header_title_padding_bottom');
					}
					
				} else {
				
					$header_title_padding_bottom = fw_get_db_settings_option('header_title_padding_bottom');
					
				}
			}
			return $header_title_padding_bottom;
 		}
 		
 		public static function lpd_abcpersonal_header_title_visibility() {
	
			$header_title_visibility = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$header_title_visibility = fw_get_db_settings_option( 'events_header_title_visibility' );
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					$header_title_visibility = fw_get_db_post_option( $shop_page->ID, 'post_header_title_visibility' );
				
				}elseif(is_single() || is_page()) {
				
					$header_title_visibility = fw_get_db_post_option( get_the_ID(), 'post_header_title_visibility' );
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					$header_title_visibility = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_title_visibility' );
					
				} else {
				
					$header_title_visibility = fw_get_db_settings_option('header_title_visibility');
					
				}
			}
			return $header_title_visibility;
 		}
 		
 		public static function lpd_abcpersonal_header_breadcrumb_visibility() {
	
			$header_breadcrumb_visibility = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()){
				
					$header_breadcrumb_visibility = fw_get_db_settings_option( 'events_header_breadcrumb_visibility' );
				
				}elseif( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop() ){
				
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
					$header_breadcrumb_visibility = fw_get_db_post_option( $shop_page->ID, 'post_header_breadcrumb_visibility' );
				
				}elseif(is_single() || is_page()) {
				
					$header_breadcrumb_visibility = fw_get_db_post_option( get_the_ID(), 'post_header_breadcrumb_visibility' );
					
				} elseif((is_front_page() && is_home()) || is_home()) {
				
					$header_breadcrumb_visibility = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_breadcrumb_visibility' );
					
				} else {
				
					$header_breadcrumb_visibility = fw_get_db_settings_option('header_breadcrumb_visibility');
					
				}
			}
			return $header_breadcrumb_visibility;
 		}
		
 		public static function lpd_abcpersonal_header_background_type() {
	
			$header_bg_type = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {

				if(lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check()) { $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );}
				
				if( (lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()) && fw_get_db_settings_option( 'events_header_custom_background/events_header_custom_background_switch' )  == 'enabled' ){
				
					$header_bg_type = fw_get_db_settings_option( 'events_header_custom_background/enabled/events_header_background_choice/events_header_background_type' );
				
				}elseif( (lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop()) && fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_type = fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/enabled/post_header_background_choice/post_header_background_type' );
				
				}elseif( (is_single() || is_page()) && fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_type = fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/enabled/post_header_background_choice/post_header_background_type' );
					
				} elseif( ((is_front_page() && is_home()) || is_home()) && fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_type = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/enabled/post_header_background_choice/post_header_background_type' );
					
				} else {
				
					$header_bg_type = fw_get_db_settings_option('header_background_choice/header_background_type');
					
				}
			}
			return $header_bg_type;
 		}
 		
 		public static function lpd_abcpersonal_header_background_color() {
	
			$header_bg_color = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				if(lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check()) { $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );}
				
				if( (lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()) && fw_get_db_settings_option( 'events_header_custom_background/events_header_custom_background_switch' )  == 'enabled' ){
				
					$header_bg_color = fw_get_db_settings_option( 'events_header_custom_background/enabled/events_header_background_choice/background_color/header_background_color' );
				
				}elseif( (lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop()) && fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_color = fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/enabled/post_header_background_choice/background_color/header_background_color' );
				
				}elseif( (is_single() || is_page()) && fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_color = fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/enabled/post_header_background_choice/background_color/header_background_color' );
					
				} elseif( ((is_front_page() && is_home()) || is_home()) && fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_color = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/enabled/post_header_background_choice/background_color/header_background_color' );
					
				} else {
				
					$header_bg_color = fw_get_db_settings_option('header_background_choice/background_color/header_background_color');
					
				}
			}
			return $header_bg_color;
 		}
		
 		public static function lpd_abcpersonal_header_background_image_color() {
	
			$header_bg_color = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
				
				if(lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check()) { $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );}
				
				if( (lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()) && fw_get_db_settings_option( 'events_header_custom_background/events_header_custom_background_switch' )  == 'enabled' ){
				
					$header_bg_color = fw_get_db_settings_option( 'events_header_custom_background/enabled/events_header_background_choice/background_image/header_background_color' );
				
				}elseif( (lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop()) && fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_color = fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_color' );
				
				}elseif( (is_single() || is_page()) && fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_color = fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_color' );
					
				} elseif( ((is_front_page() && is_home()) || is_home()) && fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_color = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_color' );
					
				} else {
				
					$header_bg_color = fw_get_db_settings_option('header_background_choice/background_image/header_background_color');
					
				}
			}
			return $header_bg_color;
 		}
		
 		public static function lpd_abcpersonal_header_background_settings() {
	
			$header_bg_settings = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
			
				if(lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check()) { $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );}
				
				if( (lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()) && fw_get_db_settings_option( 'events_header_custom_background/events_header_custom_background_switch' )  == 'enabled' ){
				
					$header_bg_settings = fw_get_db_settings_option( 'events_header_custom_background/enabled/events_header_background_choice/background_image/header_background_settings' );
				
				}elseif( (lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop()) && fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_settings = fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_settings' );
				
				}elseif( (is_single() || is_page()) && fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_settings = fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_settings' );
					
				} elseif( ((is_front_page() && is_home()) || is_home()) && fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_settings = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_settings' );
					
				} else {
				
					$header_bg_settings = fw_get_db_settings_option('header_background_choice/background_image/header_background_settings');
					
				}
			}
			return $header_bg_settings;
 		}
		
 		public static function lpd_abcpersonal_header_background_image() {
	
			$header_bg_image = '';
			if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
			
				if(lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check()) { $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );}
				
				if( (lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() && tribe_is_event_query() && is_archive()) && fw_get_db_settings_option( 'events_header_custom_background/events_header_custom_background_switch' )  == 'enabled' ){
				
					$header_bg_image = fw_get_db_settings_option( 'events_header_custom_background/enabled/events_header_background_choice/background_image/header_background_image/url' );
				
				}elseif( (lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() && is_shop()) && fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_image = fw_get_db_post_option( $shop_page->ID, 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_image/url' );
				
				}elseif( (is_single() || is_page()) && fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_image = fw_get_db_post_option( get_the_ID(), 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_image/url' );
					
				} elseif( ((is_front_page() && is_home()) || is_home()) && fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/post_header_custom_background_switch' ) == 'enabled' ) {
				
					$header_bg_image = fw_get_db_post_option( get_option( 'page_for_posts'), 'post_header_custom_background/enabled/post_header_background_choice/background_image/header_background_image/url' );
					
				} else {
				
					$header_bg_image = fw_get_db_settings_option('header_background_choice/background_image/header_background_image/url');
					
				}
			}
			return $header_bg_image;
 		}
		
		function lpd_abcpersonal_read_more_link() {
			return '<a class="more-link" href="' . esc_url(get_permalink()) . '">'. __('Continue Reading', 'lpd-abcpersonal'). '<i class="material-icons">&#xE315;</i></a>';
		}
	
		public static function lpd_abcpersonal_get_youtube_url( $content ) {
			
			preg_match_all(
			    "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
			    $content,
			    $matches
			);
			if (isset($matches[0][0])) {
				return $matches[0][0];
			} 
		}
		
		public static function lpd_abcpersonal_get_youtube_id( $url ) {
	    	$video_id = false;
		    $url = parse_url($url);
		    if ( isset( $url['host'] ) && strcasecmp($url['host'], 'youtu.be') === 0) {
		        $video_id = substr($url['path'], 1);
		    }
		    elseif ( isset( $url['host'] ) && strcasecmp($url['host'], 'www.youtube.com') === 0) {
		        if (isset($url['query'])) {
		          parse_str($url['query'], $url['query']);
		          if (isset($url['query']['v'])) {
		
		            $video_id = $url['query']['v'];
		          }
		        }
		        if ($video_id == false) {
		          $url['path'] = explode('/', substr($url['path'], 1));
		          if (in_array($url['path'][0], array('e', 'embed', 'v'))) {
		            $video_id = $url['path'][1];
		          }
		        }
		    }
	    	return $video_id;
		}
		
		public static function lpd_abcpersonal_get_categories( $separator = ', ' ) {
			
			$post_type = get_post_type();
			
			if($post_type=='post'){
				return get_the_category_list( $separator );
			}elseif($post_type=='fw-portfolio'){
				return get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', $separator, '' );
			}
			
		}
		
		function lpd_abcpersonal_cat_count($links) {
			$links = str_replace('(', '<span class="countWrap">', $links);
			$links = str_replace(')', '</span>', $links);
			return $links;
		}
		
		function lpd_abcpersonal_add_excerpt_fw_portfolio() {
			add_post_type_support( 'fw-portfolio', 'excerpt' );
		}
		
		function lpd_abcpersonal_language_selector_flags(){
		    $languages = icl_get_languages('skip_missing=0&orderby=code');
		    
		    if(!empty($languages)){
		        foreach($languages as $l){
		        
		        	if($l['active']) echo '<a href="#" class="wpml-btn"><span><img title="'.esc_attr($l['translated_name']).'" src="'.esc_attr($l['country_flag_url']).'" alt="'.esc_attr($l['language_code']).'" height="12"/>'.esc_html($l['language_code']).'</span></a>';
		        
		        }
		    }
		    
		    echo '<div class="wpml-dropdown">';
				echo '<ul>';
			    if(!empty($languages)){
			        foreach($languages as $l){
			        if(!$l['active']) echo '<li>';
			            if(!$l['active']) echo '<a href="'.esc_url($l['url']).'">';
			            if(!$l['active']) echo '<img title="'.esc_attr($l['translated_name']).'" src="'.esc_attr($l['country_flag_url']).'" alt="'.esc_attr($l['language_code']).'" height="12"/>';
			            if(!$l['active']) echo ''.esc_html($l['translated_name']).'';
			            if(!$l['active']) echo '</a>';
			        if(!$l['active']) echo '</li>';
			        }
			    } 
			    echo '</ul>';
		    echo '</div>';
		    
		}
		
		function lpd_abcpersonal_post_gallery( $output, $attr) {
		    global $post, $wp_locale;
		
		    static $instance = 0;
		    $instance++;
		
		    if ( isset( $attr['orderby'] ) ) {
		        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		        if ( !$attr['orderby'] )
		            unset( $attr['orderby'] );
		    }
		
		    extract(shortcode_atts(array(
		        'order'      => 'ASC',
		        'orderby'    => 'menu_order ID',
		        'id'         => $post->ID,
		        'itemtag'    => 'dl',
		        'icontag'    => 'dt',
		        'captiontag' => 'dd',
		        'columns'    => 3,
		        'size'       => 'zoom',
		        'include'    => '',
		        'exclude'    => ''
		    ), $attr));
		
		    $id = intval($id);
		    if ( 'RAND' == $order )
		        $orderby = 'none';
		
		    if ( !empty($include) ) {
		        $include = preg_replace( '/[^0-9,]+/', '', $include );
		        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		
		        $attachments = array();
		        foreach ( $_attachments as $key => $val ) {
		            $attachments[$val->ID] = $_attachments[$key];
		        }
		    } elseif ( !empty($exclude) ) {
		        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		    } else {
		        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		    }
		
		    if ( empty($attachments) )
		        return '';
		
		    if ( is_feed() ) {
		        $output = "\n";
		        foreach ( $attachments as $att_id => $attachment )
		            $output .= wp_get_attachment_link($att_id, 'lpd-abcpersonal-theme-size-1x1', true) . "\n";
		        return $output;
		    }
		
		    $itemtag = tag_escape($itemtag);
		    $captiontag = tag_escape($captiontag);
		    $columns = intval($columns);
		    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
		    $float = is_rtl() ? 'right' : 'left';
		
		    $selector = "gallery-{$instance}";
		
			wp_enqueue_style( 'lpd_abcpersonal_prettyphoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), LPD_ABCPERSONAL_THEME_VERSION );
			
	        $js = '<script>
			jQuery(document).ready(function(){
				jQuery("#'.$selector.' a[rel^=\'prettyPhoto\']").prettyPhoto({animation_speed:\'normal\',theme:\'light_square\',slideshow:3000, autoplay_slideshow: false});
			});
	        </script>';
		
		    $output = apply_filters('gallery_style', "
		        <style type='text/css'>
		            #{$selector} {
		                margin: auto;
		            }
		            #{$selector} .gallery-item {
		                float: {$float};
		                text-align: center;
		                margin: 0;
		                width: {$itemwidth}%;
		            }
		        </style>
				$js
		        <!-- see gallery_shortcode() in wp-includes/media.php -->
		        <div id='$selector' class='gallery galleryid-{$id}'>");
		
		    $i = 0;
		    
		    foreach ( $attachments as $id => $attachment ) {
		    
		        $image = wp_get_attachment_image_src($id, 'lpd-abcpersonal-theme-size-1x1', false);
		        $image_full = wp_get_attachment_image_src($id, 'full', false);
		
		        $output .= "<{$itemtag} class='gallery-item'>";
		        $output .= "
		            <{$icontag} class='gallery-icon'>
		                <a href='".$image_full[0]."' rel='prettyPhoto[{$selector}]' title='".$attachment->post_content."'><img src='".$image[0]."' alt='" . wptexturize($attachment->post_excerpt) . "' ><span class='hover-effect'><span class='hover-effect-btn'><i class='material-icons'>&#xE042;</i></span></span></a>
		            </{$icontag}>";
		        if ( $captiontag && trim($attachment->post_excerpt) ) {
		            $output .= "
		                <{$captiontag} class='gallery-caption'>
		                " . wptexturize($attachment->post_excerpt) . "
		                </{$captiontag}>";
		        }
		        $output .= "</{$itemtag}>";
		        if ( $columns > 0 && ++$i % $columns == 0 )
		            $output .= '<br style="clear: both" />';
		    }
		
		    $output .= "
		            <br style='clear: both;' />
		        </div>\n";
		
		    return $output;
		}

		
		
	
}