<?php

define( 'LPD_ABCPERSONAL_THEME_VERSION', '1.1.0');

if ( ! isset( $content_width ) ) $content_width = 960;

add_action( 'vc_before_init', 'lpd_abcpersonal_vcSetAsTheme' );
function lpd_abcpersonal_vcSetAsTheme() {
    vc_set_as_theme();
}

if ( ! function_exists( 'lpd_abcpersonal_setup' ) ) :

function lpd_abcpersonal_setup() {

	load_theme_textdomain( 'lpd-abcpersonal', get_template_directory() . '/languages' );
	
	require_once get_template_directory() . '/functions/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/functions/fonts.php';
	
	lpd_abcpersonal_init();
	lpd_abcpersonal_helpers();
	lpd_abcpersonal_front_functions();
	lpd_abcpersonal_widgets();
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_unyson_check() ) {
		lpd_abcpersonal_front_css();
	}
	
	lpd_abcpersonal_nav_menu_walker();

	if( lpd_abcpersonal_helpers::lpd_abcpersonal_woocommerce_check() ) {
		lpd_abcpersonal_woocommerce_functions();
	}
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_event_calendar_check() ) {
		lpd_abcpersonal_tribe_calendar_functions();
	}
	
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_revslider_check() ) {
		if(is_admin()){set_revslider_as_theme();}
	}
	
    // The set_ess_grid_as_theme() function was removed in Essential Grid plugin Version 2.2 Artemis (23th February 2018)  because it causes trouble with premium plugin customers
	if( lpd_abcpersonal_helpers::lpd_abcpersonal_essential_grid_check() ) {
        if ( function_exists( 'set_ess_grid_as_theme' )   ) {
            if(is_admin()){ set_ess_grid_as_theme(); }
        }
	}
}

endif;

add_action( 'after_setup_theme', 'lpd_abcpersonal_setup' );


function lpd_abcpersonal_widgets() {
	
		require_once get_template_directory() . '/functions/widget-social_media.php';
	
}

function lpd_abcpersonal_init() {
	
		require_once get_template_directory() . '/functions/init.php';
		new lpd_abcpersonal_init();
	
}

function lpd_abcpersonal_front_enqueue() {
	
		require_once get_template_directory() . '/functions/front_enqueue.php';
		new lpd_abcpersonal_front_enqueue();
	
}

function lpd_abcpersonal_backend_enqueue() {
	
		require_once get_template_directory() . '/functions/backend_enqueue.php';
		new lpd_abcpersonal_backend_enqueue();
	
}

if( is_admin() ) {

	if ( function_exists( 'lpd_abcpersonal_backend_enqueue' ) ) :

		lpd_abcpersonal_backend_enqueue();
	
	endif;


}else{

	if ( function_exists( 'lpd_abcpersonal_front_enqueue' ) ) :
	
		lpd_abcpersonal_front_enqueue();
		
	endif;
	
}

function lpd_abcpersonal_helpers() {
	
		require_once get_template_directory() . '/functions/helpers.php';
		new lpd_abcpersonal_helpers();
	
}

function lpd_abcpersonal_front_functions() {
	
		require_once get_template_directory() . '/functions/front_functions.php';
		new lpd_abcpersonal_front_functions();
	
}

function lpd_abcpersonal_woocommerce_functions() {
	
		require_once get_template_directory() . '/functions/woocommerce_functions.php';
		new lpd_abcpersonal_woocommerce_functions();
	
}

function lpd_abcpersonal_tribe_calendar_functions() {
	
		require_once get_template_directory() . '/functions/tribe_calendar_functions.php';
		new lpd_abcpersonal_tribe_calendar_functions();
	
}

function lpd_abcpersonal_front_css() {
	
		require_once get_template_directory() . '/functions/front_css.php';
		new lpd_abcpersonal_front_css();
	
}

function lpd_abcpersonal_nav_menu_walker() {
	
		require_once get_template_directory() . '/functions/front_menu_walker.php';
		new lpd_abcpersonal_nav_menu_walker();
	
}


/**
 * Remove fields from the comments form
 * the filter 'comment_form_default_fields' is what displays on the comment form when you are not logged in.
 * The 'comment_form_field_comment' filter contains the code for when you are logged in.
 *
 * @param array $fields
 * @return array
 */
function codigo_remove_comment_fields($fields) {
    unset( $fields['url'] );
    return $fields;
}

add_filter(
    'comment_form_default_fields', 
    'codigo_remove_comment_fields',
    15, 
    1
);

/**
 * Enqueue scripts and styles.
 *
 * return void 
 */
function codigo_enqueue_scripts() {

//  DEPRECATED: The Essential Grid plugin has been updated and the problem has been fixed

    // If the Essential Grid plugin is installed and activated, reenqueue the necessary scripts changing the $handle value because is already registered by the Revolution Slider plugin and it is causing conflicts
//     if( class_exists('Essential_Grid')
//         && ( defined('EG_PLUGIN_URL') ) 
//     ) { 

//         error_log(print_r('Enqueueing Essential_Grid: '. EG_PLUGIN_URL . 'public/assets/js/jquery.themepunch.tools.min.js', true));

//         wp_enqueue_script( 
//             'essential-tp-tools', 
//             EG_PLUGIN_URL . 'public/assets/js/jquery.themepunch.tools.min.js', 
//             array( 'jquery', 'themepunchboxext' ), 
//             '2.1.0.2b', 
//             true 
//         );

//     }

}


// add_action( 
//     'wp_enqueue_scripts', 
//     'codigo_enqueue_scripts'
// );
function register_my_menus() {
	register_nav_menus(
	  array(
		'footer-menu' => __( 'Footer Menu' ),
	  )
	);
}
add_action( 'init', 'register_my_menus' );
/**/
function boxingtrainer_enqueue_style() {
    wp_enqueue_style( 'boxing-fontawesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css', array(), '6.7.1' );
	wp_enqueue_style( 'boxing-bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3' );
	wp_enqueue_style( 'boxing-slick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'boxing-style', get_stylesheet_uri(), array(), rand() );

	wp_enqueue_script( 'boxing-match-height', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array('jquery'), '0.7.2' );
	wp_enqueue_script( 'boxing-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1' );
	wp_enqueue_script( 'boxing-boostrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3' );
}
add_action( 'wp_enqueue_scripts', 'boxingtrainer_enqueue_style', 99 );
//
function boxingtrainer_head_code(){
	?>
	<!-- Lato Fonts -->
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/lato/LatoNormal100.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/lato/LatoNormal300.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/lato/LatoNormal400.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/lato/LatoNormal700.ttf" as="font" type="font/ttf" crossorigin="anonymous">

	<!-- Oswald Fonts -->
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/oswald/OswaldNormal300.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/oswald/OswaldNormal400.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/oswald/OswaldNormal500.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/oswald/OswaldNormal600.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/oswald/OswaldNormal700.ttf" as="font" type="font/ttf" crossorigin="anonymous">

	<!-- Poppins Fonts -->
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/poppins/PoppinsNormal300.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/poppins/PoppinsNormal400.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/poppins/PoppinsNormal500.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/poppins/PoppinsNormal600.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="//boxingtrainer.london/wp-content/themes/lpd-abcpersonal/assets/fonts/poppins/PoppinsNormal700.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<?php
}
add_action( 'wp_head', 'boxingtrainer_head_code', 1 );
// 
add_action( 'save_post', 'rewrite_page_content_on_save', 20); 
function rewrite_page_content_on_save ( $post_id ) {

	// Use a global variable as a flag
    global $is_updating;

    if ( isset( $is_updating ) && $is_updating ) {
        return;
    }
    
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

	 // Check the current user's permissions
	 if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
	
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
        return;
    }

	$template_file = get_post_meta( $post_id, '_wp_page_template', true );
	if($template_file != 'template-page-gift-page.php'){
		return ;
	} 

	// Set the flag to true before updating
    $is_updating = true;

	$content = "";

	$banner_text_1 = get_field( 'banner_text_1' );
	$banner_text_2 = get_field( 'banner_text_2' );

	$book_links = get_field( 'book_links' );

    $text_section_1_content = get_field( 'text_section_1_content', $post_id);
	$text_section_1_main_text = get_field( 'text_section_1_main_text', $post_id );
	$text_section_1_before_content_1 = get_field( 'text_section_1_before_content_1', $post_id );
	$text_section_1_title_1 = '<h3>' . get_field( 'text_section_1_title_1', $post_id ) . '</h3>';
	$text_section_1_content_1 = get_field( 'text_section_1_content_1', $post_id );

	$text_section_1_before_content_2 = get_field( 'text_section_1_before_content_2', $post_id );
	$text_section_1_title_2 = '<h3>' . get_field( 'text_section_1_title_2', $post_id ) . '</h3>';
	$text_section_1_content_2 = get_field( 'text_section_1_content_2', $post_id );

	$text_section_1_bottom_text = get_field( 'text_section_1_bottom_text', $post_id );

	// Append ACF content to the analyzed content
	if($banner_text_1) {
		$content .= ' <h1>' . $banner_text_1 . '</h1>';
	}
	if($banner_text_2) {
		$content .= ' <h2>' . $banner_text_1 . '</h2>';
	}
	if(!empty($book_links)) {
		ob_start();
		foreach($book_links as $bl) { 
			$title = $bl['title'];
			$per_session = $bl['per_session'];
			$text = $bl['text'];
			$image = $bl['image'];
			$book_link = $bl['book_link'];
			$book_button_label = $bl['book_button_label'];
			$i++;
			?>
			<div class="col-12 col-lg-4">
				<div class="book-item-wrap">
					<?php 
					if($i == 1){
						?>
						<img class="holly-elm holly-1" src="<?php echo get_template_directory_uri() ?>/assets/images/holly-transparent-background.png" alt="Holly 1" />
						<?php 
					}
					if($i == 3){
						?>
						<img class="holly-elm holly-3" src="<?php echo get_template_directory_uri() ?>/assets/images/holly-transparent-background.png" alt="Holly 2" />
						<?php 
					}
					?>
					<div class="book-in-wrap">
						<div class="t-c-wrap">
							<?php 
							if($title) {
								?>
								<h3 class="t-wrap">
									<?php echo $title ?> <span><?php echo ($per_session ? $per_session : 'PER SESSION') ?></span>
								</h3><?php // t-wrap ?>
								<?php 
							}
							if($text) {
								?>
								<div class="c-wrap">
									<?php echo wpautop($text) ?>
								</div><?php // .c-wrap ?>
								<?php 
							}
							?>
						</div><?php // .t-c-wrap ?>
						<div class="i-b-wrap">
							<?php 
							if($image) {
								?>
								<img src="<?php echo $image ?>" alt="<?php echo $title ?>" />
								<?php
							} 
							if($book_link){
								?>
								<div class="button-wrap">
									<a class="btn-book" href="<?php echo $book_link ?>" title="<?php echo ($book_button_label ? $book_button_label : 'Book Now') ?>" >
										<?php echo ($book_button_label ? $book_button_label : 'BOOK NOW') ?>
									</a>
								</div><?php // .button-wrap ?>
								<?php 
							}
							?>
						</div><?php // .i-b-wrap ?>
					</div><?php // .book-in-wrap ?>
				</div><?php // .book-item-wrap ?>
			</div><?php // .col ?>
		<?php 
		} // end foreach 
		$temp = ob_get_clean();

		if($temp) {
			$content .= ' ' . $temp;
		}
	}

	if ( $text_section_1_content ) {
		$content .= ' ' . $text_section_1_content;
	}
	if ( $text_section_1_main_text ) {
		$content .= ' ' . $text_section_1_main_text;
	}
	if ( $text_section_1_before_content_1 ) {
		$content .= ' ' . $text_section_1_before_content_1;
	}
	if ( $text_section_1_title_1 ) {
		$content .= ' ' . $text_section_1_title_1;
	}
	if ( $text_section_1_content_1 ) {
		$content .= ' ' . $text_section_1_content_1;
	}

	if ( $text_section_1_before_content_2 ) {
		$content .= ' ' . $text_section_1_before_content_2;
	}
	if ( $text_section_1_title_2 ) {
		$content .= ' ' . $text_section_1_title_2;
	}
	if ( $text_section_1_content_2 ) {
		$content .= ' ' . $text_section_1_content_2;
	}

	if ( $text_section_1_bottom_text ) {
		$content .= ' ' . $text_section_1_bottom_text;
	}

    if ( $content  ) {
        wp_update_post( [
            'ID'           => $post_id,
            'post_content' => $content,
        ] );
    }

	// Reset the flag after updating
    $is_updating = false;
};