<?php
/**
 * Plugin Name: BTL Homepage 2026
 * Description: Boxing Trainer London homepage — template, content fields and assets. Theme-independent so it survives the future theme migration.
 * Version:     1.0.11
 * Author:      Pablo Rica
 * Author URI:  https://codigo.co.uk/
 * Requires PHP: 8.0
 */

if (!defined('ABSPATH')) exit;


define('BTL_HP_VERSION', '1.0.11');
define('BTL_HP_PATH', plugin_dir_path(__FILE__));
define('BTL_HP_URL',  plugin_dir_url(__FILE__));
const BTL_HP_TEMPLATE = 'btl-home-2026.php';

/* ---------- ACF fields (requires ACF Pro) ---------- */
add_action('acf/init', function () {
    require_once BTL_HP_PATH . 'inc/acf-fields.php';
});

require_once BTL_HP_PATH . 'inc/cleanup.php';

/* Admin notice if ACF Pro is missing */
add_action('admin_notices', function () {
    if (!function_exists('acf_add_options_page')) {
        echo '<div class="notice notice-error"><p><b>BTL Homepage 2026:</b> ACF Pro is required (repeaters + options page). The homepage fields will not load until it is active.</p></div>';
    }
});

/* ---------- Register the page template from the plugin ---------- */
add_filter('theme_page_templates', function (array $templates): array {
    $templates[BTL_HP_TEMPLATE] = 'BTL Homepage 2026';
    return $templates;
});

add_filter('template_include', function (string $template): string {
    if (is_singular('page') && get_page_template_slug() === BTL_HP_TEMPLATE) {
        $plugin_template = BTL_HP_PATH . 'templates/home-2026.php';
        if (file_exists($plugin_template)) return $plugin_template;
    }
    return $template;
});

/* ---------- Assets: only on this template ---------- */
add_action('wp_enqueue_scripts', function () {
    if (!is_singular('page') || get_page_template_slug() !== BTL_HP_TEMPLATE) return;

    // Google Fonts (Oswald + Inter, as approved in the design)
    wp_enqueue_style('btl-hp-fonts',
        'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap',
        [], null);

    wp_enqueue_style('btl-hp', BTL_HP_URL . 'assets/css/home.css', ['btl-hp-fonts'], BTL_HP_VERSION);
    wp_enqueue_script('btl-hp', BTL_HP_URL . 'assets/js/home.js', [], BTL_HP_VERSION, ['strategy' => 'defer']);
});

/* ---------- Helper: option with page-level override ---------- */
function btl_opt(string $field, string $override_field = ''): string {
    $val = $override_field ? (string) get_field($override_field) : '';
    if ($val === '') $val = (string) get_field($field, 'option');
    return $val;
}
