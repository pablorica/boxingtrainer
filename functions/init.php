<?php class lpd_abcpersonal_init {


	function __construct() {
		
		add_action( 'init', array( $this, 'add_theme_support'));
		add_action( 'init', array( $this, 'register_menus'));
		add_action( 'widgets_init', array( $this, 'register_sidebars'));
		add_action( 'tgmpa_register', array( $this, 'my_theme_register_required_plugins'));
		add_filter( 'fw:ext:backups-demo:demos', array( $this, '_filter_theme_fw_ext_backups_demos'));
		
	}
	
	function _filter_theme_fw_ext_backups_demos($demos) {
	    $demos_array = array(
	        'trainer-demo' => array(
	            'title' => __('Trainer', 'lpd-abcpersonal' ),
	            'screenshot' => get_template_directory_uri().'/assets/demo_trainer_02.jpg',
	            'preview_link' => 'http://themes.lpd-themes.com/abcpersonal-trainer/',
	        ),
	        'psychiatrist-demo' => array(
	            'title' => __('Psychiatrist', 'lpd-abcpersonal' ),
	            'screenshot' => get_template_directory_uri().'/assets/demo_psychiatrist_03.jpg',
	            'preview_link' => 'http://themes.lpd-themes.com/abcpersonal-psychiatrist/',
	        ),
	        'gardener-demo' => array(
	            'title' => __('Gardener', 'lpd-abcpersonal' ),
	            'screenshot' => get_template_directory_uri().'/assets/demo_gardener_04.jpg',
	            'preview_link' => 'http://themes.lpd-themes.com/abcpersonal-gardener/',
	        ),
	        'musician-demo' => array(
	            'title' => __('Musician', 'lpd-abcpersonal' ),
	            'screenshot' => get_template_directory_uri().'/assets/demo_musician_05.jpg',
	            'preview_link' => 'http://themes.lpd-themes.com/abcpersonal-musician/',
	        ),
	        'health-demo' => array(
	            'title' => __('Health Coach', 'lpd-abcpersonal' ),
	            'screenshot' => get_template_directory_uri().'/assets/demo_health_06.jpg',
	            'preview_link' => 'http://themes.lpd-themes.com/abcpersonal-health/',
	        ),
	        'finance-demo' => array(
	            'title' => __('Finance', 'lpd-abcpersonal' ),
	            'screenshot' => get_template_directory_uri().'/assets/demo_finance_07.jpg',
	            'preview_link' => 'http://themes.lpd-themes.com/abcpersonal-finance/',
	        ),
	        'preview-demo' => array(
	            'title' => __('Preview Version', 'lpd-abcpersonal' ),
	            'screenshot' => get_template_directory_uri().'/assets/demo_main_01.jpg',
	            'preview_link' => 'http://themes.lpd-themes.com/abcpersonal/',
	        ),
	    );
	
	    $download_url = 'http://demo.lpd-themes.com/restore_abcpersonal/';
	
	    foreach ($demos_array as $id => $data) {
	        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
	            'url' => $download_url,
	            'file_id' => $id,
	        ));
	        $demo->set_title($data['title']);
	        $demo->set_screenshot($data['screenshot']);
	        $demo->set_preview_link($data['preview_link']);
	
	        $demos[ $demo->get_id() ] = $demo;
	
	        unset($demo);
	    }
	
	    return $demos;
	}
	
	function add_theme_support() {
		add_theme_support( 'title-tag' );	
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'link',
		) );

		set_post_thumbnail_size( 100, 100, true ); // Normal post thumbnails
		add_image_size( 'lpd-abcpersonal-theme-size-4x3', 860, 645, true ); // 4x3
		add_image_size( 'lpd-abcpersonal-theme-size-3x2', 860, 574, true ); // 2x3
		add_image_size( 'lpd-abcpersonal-theme-size-16x9', 860, 483, true ); // 16x9
		add_image_size( 'lpd-abcpersonal-theme-size-1x1', 860, 860, true ); // 1x1
		add_image_size( 'lpd-abcpersonal-theme-size-3x4', 645, 860, true ); // 3x4
		add_image_size( 'lpd-abcpersonal-theme-size-2x3', 574, 860, true ); // 3x2

    // extra sizes for mobile
    add_image_size('w-480', 480, 0, false);
    add_image_size('w-640', 640, 0, false);
    add_image_size('w-960', 960, 0, false);
    add_image_size('w-1180', 1180, 0, false); // matches your desktop container
	}
	
	function register_menus() {
		register_nav_menus( array(
			'primary-menu' => __( 'Primary Menu', 'lpd-abcpersonal' ),
		) );
	}
	
	function register_sidebars() {
		
		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'lpd-abcpersonal' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__( 'Appears in the sidebar section.', 'lpd-abcpersonal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clearfix"></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 1', 'lpd-abcpersonal' ),
			'id'            => 'sidebar-footer-col-1',
			'description'   => esc_html__( 'Appears in the footer section, use "Theme Settings" for column width.', 'lpd-abcpersonal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clearfix"></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 2', 'lpd-abcpersonal' ),
			'id'            => 'sidebar-footer-col-2',
			'description'   => esc_html__( 'Appears in the footer section, use "Theme Settings" for column width.', 'lpd-abcpersonal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clearfix"></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 3', 'lpd-abcpersonal' ),
			'id'            => 'sidebar-footer-col-3',
			'description'   => esc_html__( 'Appears in the footer section, use "Theme Settings" for column width.', 'lpd-abcpersonal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clearfix"></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 4', 'lpd-abcpersonal' ),
			'id'            => 'sidebar-footer-col-4',
			'description'   => esc_html__( 'Appears in the footer section, use "Theme Settings" for column width.', 'lpd-abcpersonal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clearfix"></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'lpd-abcpersonal' ),
			'id'            => 'shop-sidebar',
			'description'   => esc_html__( 'Appears in the sidebar section.', 'lpd-abcpersonal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clearfix"></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Product Post Sidebar', 'lpd-abcpersonal' ),
			'id'            => 'product-sidebar',
			'description'   => esc_html__( 'Appears in the sidebar section.', 'lpd-abcpersonal' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '<div class="clearfix"></div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
		
	}
	
	function my_theme_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
	
			array(
				'name'         => 'Unyson WordPress Framework',
				'slug'         => 'unyson',
				'source'       => 'https://github.com/ThemeFuse/Unyson/archive/master.zip',
				'required'     => true,
				'external_url' => 'https://github.com/ThemeFuse/Unyson',
			),
			array(
				'name'         => 'WPBakery Visual Composer',
				'slug'         => 'js_composer',
				'source'       => get_template_directory() . '/plugins/js_composer.zip',
				'required'     => true,
				'version'      => '5.1.1',
				'external_url' => 'https://vc.wpbakery.com/',
			),
			array(
				'name'         => 'LPD VC Elements',
				'slug'         => 'lpd_vc_elements',
				'source'       => get_template_directory() . '/plugins/lpd_vc_elements.zip',
				'required'     => true,
				'version'      => '1.0.5',
				'external_url' => 'http://themeforest.net/user/lidplussdesign',
				'is_callable'  => 'js_composer'
			),
			array(
				'name'         => 'Easy Tables',
				'slug'         => 'vc-table-manager',
				'source'       => get_template_directory() . '/plugins/easy-tables-vc.zip',
				'required'     => false,
				'version'      => '1.0.10',
				'external_url' => 'https://vc.wpbakery.com/addons/easy-tables/',
				'is_callable'  => 'js_composer'
			),
			array(
				'name'         => 'Slider Revolution Responsive WordPress Plugin',
				'slug'         => 'revslider',
				'source'       => get_template_directory() . '/plugins/revslider.zip',
				'required'     => false,
				'version'      => '5.4.3.1',
				'external_url' => 'https://revolution.themepunch.com/',
			),
			array(
				'name'         => 'Essential Grid WordPress Plugin',
				'slug'         => 'essential-grid',
				'source'       => get_template_directory() . '/plugins/essential-grid.zip',
				'required'     => false,
				'version'      => '2.1.0.2',
				'external_url' => 'http://essential.themepunch.com/',
			),
			array(
				'name'         => 'Timetable Responsive Schedule For WordPress',
				'slug'         => 'timetable',
				'source'       => get_template_directory() . '/plugins/timetable.zip',
				'required'     => false,
				'version'      => '3.9',
				'external_url' => 'http://quanticalabs.com/wp_plugins/timetable/',
			),
			array(
				'name'         => 'Envato Market',
				'slug'         => 'envato-market',
				'source'       => 'https://github.com/envato/wp-envato-market/archive/master.zip',
				'required'     => false,
				'external_url' => 'https://github.com/envato/wp-envato-market/',
			),
			array(
				'name'      => 'WooCommerce',
				'slug'      => 'woocommerce',
				'required'  => false,
				'external_url' => 'https://wordpress.org/plugins/woocommerce/',
			),
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => false,
				'external_url' => 'https://wordpress.org/plugins/contact-form-7/',
			),
			array(
				'name'      => 'The Events Calendar',
				'slug'      => 'the-events-calendar',
				'required'  => false,
				'external_url' => 'https://wordpress.org/plugins/the-events-calendar/',
			),
	
		);
	
		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
	
		);
	
		tgmpa( $plugins, $config );
	}

}
?>
