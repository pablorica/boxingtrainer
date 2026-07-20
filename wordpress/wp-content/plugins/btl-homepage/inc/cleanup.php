<?php
/**
 * BTL Homepage 2026 — asset cleanup.
 *
 * The homepage template is standalone: it renders its own header/footer and needs
 * none of the theme's or page-builder plugins' CSS/JS. Those assets (two different
 * Bootstrap versions, the theme's 56KB inline Customizer CSS, Visual Composer,
 * Revolution Slider, Essential Grid, social-feed plugins, etc.) override the design
 * and slow the page down.
 *
 * This file removes them ON THIS TEMPLATE ONLY, using an allowlist so that anything
 * new a plugin adds in future is excluded by default rather than silently allowed in.
 * Every other page on the site is completely unaffected.
 */

if (!defined('ABSPATH')) exit;

/** Is the current request our standalone homepage template? */
function btl_hp_is_template(): bool {
    if (is_admin()) return false;
    return is_singular('page') && get_page_template_slug() === 'btl-home-2026.php';
}

/** Styles allowed to load on the homepage template. */
function btl_hp_allowed_styles(): array {
    return apply_filters('btl_hp_allowed_styles', [
        'btl-hp',        // our stylesheet
        'btl-hp-fonts',  // Oswald + Inter
        'admin-bar',     // logged-in admin bar (harmless, and looks broken without it)
        'dashicons',     // admin bar icons
    ]);
}

/** Scripts allowed to load on the homepage template. */
function btl_hp_allowed_scripts(): array {
    return apply_filters('btl_hp_allowed_scripts', [
        'btl-hp',                        // our JS (hero + video facade)
        'monsterinsights-frontend-script', // analytics — must never be removed
        'admin-bar',
        'jquery-core',                   // kept so stray inline snippets don't throw
        'jquery-migrate',
    ]);
}

/* ---------------------------------------------------------------------------
 * 1. Dequeue everything not on the allowlist.
 *    Dequeuing a handle also removes any inline CSS/JS attached to it,
 *    which is how the theme's 56KB Customizer block gets dropped.
 * ------------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', function () {
    if (!btl_hp_is_template()) return;

    $keep_styles = btl_hp_allowed_styles();
    foreach ((array) wp_styles()->queue as $handle) {          // copy: we modify the queue
        if (!in_array($handle, $keep_styles, true)) wp_dequeue_style($handle);
    }

    $keep_scripts = btl_hp_allowed_scripts();
    foreach ((array) wp_scripts()->queue as $handle) {
        if (!in_array($handle, $keep_scripts, true)) wp_dequeue_script($handle);
    }
}, 9999);

/* ---------------------------------------------------------------------------
 * 2. Belt and braces: suppress the <link>/<script> tags of anything not allowed.
 *    Catches assets pulled in as dependencies of a dequeued handle.
 * ------------------------------------------------------------------------ */
add_filter('style_loader_tag', function ($tag, $handle) {
    if (!btl_hp_is_template()) return $tag;
    return in_array($handle, btl_hp_allowed_styles(), true) ? $tag : '';
}, 9999, 2);

add_filter('script_loader_tag', function ($tag, $handle) {
    if (!btl_hp_is_template()) return $tag;
    return in_array($handle, btl_hp_allowed_scripts(), true) ? $tag : '';
}, 9999, 2);

/* ---------------------------------------------------------------------------
 * 3. Remove CSS printed directly on wp_head rather than enqueued.
 * ------------------------------------------------------------------------ */
add_action('wp', function () {
    if (!btl_hp_is_template()) return;

    // Customizer → Additional CSS
    remove_action('wp_head', 'wp_custom_css_cb', 101);

    // Emoji styles/scripts (older WP paths)
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);

    // Core block/global styles (this template uses no blocks)
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
    add_filter('should_load_separate_core_block_assets', '__return_false');

    // Theme support styles some themes print inline
    remove_action('wp_head', 'wp_custom_css_cb', 100);
});

/* ---------------------------------------------------------------------------
 * 4. Trim body classes: page-builder classes (vc_*, wpb-*, tribe-*) carry
 *    styling hooks. Keep only what our own CSS and WP core need.
 * ------------------------------------------------------------------------ */
add_filter('body_class', function (array $classes): array {
    if (!btl_hp_is_template()) return $classes;
    $allow_prefixes = ['btl-home-2026', 'page-id-', 'page-template', 'logged-in', 'admin-bar', 'wp-singular', 'page'];
    return array_values(array_filter($classes, function ($c) use ($allow_prefixes) {
        foreach ($allow_prefixes as $p) {
            if ($c === $p || str_starts_with($c, $p)) return true;
        }
        return false;
    }));
}, 9999);

/* ---------------------------------------------------------------------------
 * 5. Debug helper: add ?btl_assets=1 to the homepage URL (logged in as admin)
 *    to see exactly which styles/scripts survived the cleanup.
 * ------------------------------------------------------------------------ */
add_action('wp_footer', function () {
    if (!btl_hp_is_template() || !current_user_can('manage_options')) return;
    if (!isset($_GET['btl_assets'])) return;
    echo "\n<!-- BTL asset audit\nSTYLES: " . implode(', ', wp_styles()->done)
       . "\nSCRIPTS: " . implode(', ', wp_scripts()->done) . "\n-->\n";
}, 9999);