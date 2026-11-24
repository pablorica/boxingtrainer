<?php
/**
 * Plugin Name: BTL Site 2026
 * Description: Boxing Trainer London — 2026 page templates, content fields and assets. Theme-independent so it survives the future theme migration.
 * Version:     1.4.2a
 * Author:      Pablo Rica
 * Author URI:  https://codigo.co.uk/
 * Requires PHP: 8.0
 *
 * NOTE: the plugin folder and this filename are deliberately unchanged
 * (btl-homepage/btl-homepage.php). WordPress stores active plugins by path,
 * so renaming either would silently deactivate the plugin and take the
 * homepage template down with it. Only the display name has changed.
 */

if (!defined('ABSPATH')) exit;


define('BTL_HP_VERSION', '1.4.2a');
define('BTL_HP_PATH', plugin_dir_path(__FILE__));
define('BTL_HP_URL',  plugin_dir_url(__FILE__));

/* Kept for backwards compatibility — the ACF location rule and any existing
   pages still reference this slug directly. */
const BTL_HP_TEMPLATE = 'btl-home-2026.php';

/**
 * Template registry.
 *
 * Adding a page = one entry here + the template file + its css/js.
 * 'css' and 'js' are optional; base.css / base.js always load.
 */
function btl_templates(): array {
    return [
        'btl-home-2026.php' => [
            'label' => 'BTL Homepage 2026',
            'file'  => 'templates/home-2026.php',
            'css'   => 'assets/css/home.css',
            'js'    => 'assets/js/home.js',
        ],

        'btl-packages-2026.php' => [
            'label' => 'BTL Training Packages 2026',
            'file'  => 'templates/packages-2026.php',
            'css'   => 'assets/css/packages.css',
            'js'    => '',
        ],

        /* Blank-canvas template: a single client-managed HTML field rendered
           inside the site chrome. Used first for Gift Vouchers, then any page
           Paul wants to manage himself. No per-template JS by design — this
           template is HTML-only (scripts are stripped on render). */
        'btl-html-template.php' => [
            'label' => 'BTL HTML Template 2026',
            'file'  => 'templates/html-template.php',
            'css'   => 'assets/css/html-template.css',
            'js'    => '',
        ],
    ];
}

/** Slug of the BTL template on the current page, or '' if none. */
function btl_current_template(): string {
    if (!is_singular('page')) return '';
    $slug = (string) get_page_template_slug();
    return isset(btl_templates()[$slug]) ? $slug : '';
}

/* ---------- ACF fields (requires ACF Pro) ---------- */
add_action('acf/init', function () {
    require_once BTL_HP_PATH . 'inc/acf-fields.php';
});

require_once BTL_HP_PATH . 'inc/cleanup.php';

/* Admin notice if ACF Pro is missing */
add_action('admin_notices', function () {
    if (!function_exists('acf_add_options_page')) {
        echo '<div class="notice notice-error"><p><b>BTL Site 2026:</b> ACF Pro is required (repeaters + options page). The page fields will not load until it is active.</p></div>';
    }
});

/* ---------- Register the page templates from the plugin ---------- */
add_filter('theme_page_templates', function (array $templates): array {
    foreach (btl_templates() as $slug => $tpl) {
        $templates[$slug] = $tpl['label'];
    }
    return $templates;
});

add_filter('template_include', function (string $template): string {
    $slug = btl_current_template();
    if ($slug === '') return $template;

    $plugin_template = BTL_HP_PATH . btl_templates()[$slug]['file'];
    return file_exists($plugin_template) ? $plugin_template : $template;
});

/* ---------- Assets: base everywhere, then per template ---------- */
add_action('wp_enqueue_scripts', function () {
    $slug = btl_current_template();
    if ($slug === '') return;

    $tpl    = btl_templates()[$slug];
    // 'btl-home-2026.php' -> 'btl-home-2026'. Already btl- prefixed, which is
    // what cleanup.php's allowlist matches on — keep it that way.
    $handle = sanitize_key(str_replace('.php', '', $slug));

    // Google Fonts (Oswald + Inter, as approved in the design)
    wp_enqueue_style('btl-fonts',
        'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap',
        [], null);

    // Shared chrome — tokens, header, mobile menu, footer, CTA, FAQ
    wp_enqueue_style('btl-base', BTL_HP_URL . 'assets/css/base.css', ['btl-fonts'], BTL_HP_VERSION);
    wp_enqueue_script('btl-base', BTL_HP_URL . 'assets/js/base.js', [], BTL_HP_VERSION, ['strategy' => 'defer']);

    // Per-template additions (declared as dependent on base so order is guaranteed)
    if (!empty($tpl['css'])) {
        wp_enqueue_style($handle, BTL_HP_URL . $tpl['css'], ['btl-base'], BTL_HP_VERSION);
    }
    if (!empty($tpl['js'])) {
        wp_enqueue_script($handle, BTL_HP_URL . $tpl['js'], ['btl-base'], BTL_HP_VERSION, ['strategy' => 'defer']);
    }
});

/* ---------- Helpers ---------- */

/** Option value, optionally overridden by a page-level field. */
function btl_opt(string $field, string $override_field = ''): string {
    $val = $override_field ? (string) get_field($override_field) : '';
    if ($val === '') $val = (string) get_field($field, 'option');
    return $val;
}

/** Booking/enquiry URL, optionally overridden per page. */
function btl_booking_url(string $override_field = ''): string {
    return esc_url(btl_opt('btl_booking_url', $override_field));
}

/**
 * ID of the page using the homepage template.
 *
 * Only used as a fallback while site-wide chrome (nav + footer links) is
 * still stored on the homepage rather than the options page. Once those
 * values are re-entered under BTL Global Settings this is never reached.
 */
function btl_home_page_id(): int {
    static $id = null;
    if ($id !== null) return $id;

    $front = (int) get_option('page_on_front');
    if ($front && get_page_template_slug($front) === BTL_HP_TEMPLATE) {
        return $id = $front;
    }

    $found = get_posts([
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_key'       => '_wp_page_template',
        'meta_value'     => BTL_HP_TEMPLATE,
        'no_found_rows'  => true,
    ]);

    return $id = $found ? (int) $found[0] : 0;
}

/**
 * Site-wide chrome repeater (nav links, footer links).
 *
 * Reads the options page first; falls back to the homepage's own value so
 * nothing breaks before the values are migrated. Returns [] when empty.
 */
function btl_shared_field(string $field): array {
    $val = get_field($field, 'option');
    if (!empty($val)) return (array) $val;

    $home = btl_home_page_id();
    if (!$home) return [];

    $val = get_field($field, $home);
    return empty($val) ? [] : (array) $val;
}

/** Same as above, for single values such as the footer blurb. */
function btl_shared_text(string $field): string {
    $val = (string) get_field($field, 'option');
    if ($val !== '') return $val;

    $home = btl_home_page_id();
    return $home ? (string) get_field($field, $home) : '';
}

/* ---------- HTML Template: client-managed HTML rendering ---------- */

/**
 * Allowed tags/attributes for the client-managed HTML field.
 *
 * Starts from WordPress' 'post' allowlist (headings, paragraphs, lists, links,
 * images, tables, blockquotes, figures, etc.) — which already excludes script,
 * style, link, iframe, form and object — then guarantees inline style/class/id
 * survive on every element, because the AI-prompt guidance tells Paul to style
 * with inline style="" attributes. KSES still sanitises the style value itself,
 * strips on* event handlers and javascript: URLs.
 *
 * To allow embeds later (e.g. a YouTube/Maps iframe) this is the one place to
 * change — add an 'iframe' entry with an explicit src allowlist.
 */
function btl_user_html_allowed_tags(): array {
    $tags = wp_kses_allowed_html('post');
    foreach ($tags as $tag => &$attrs) {
        if (!is_array($attrs)) $attrs = [];
        $attrs['style'] = true;
        $attrs['class'] = true;
        $attrs['id']    = true;
    }
    unset($attrs);
    return $tags;
}

/**
 * Sanitise and render the client-managed HTML field.
 *
 * Pipeline:
 *  1. Remove <script> and <style> blocks entirely (tag AND contents), so their
 *     code/CSS can never run, and never print to the page as visible text —
 *     which is what wp_kses() alone would wrongly do (it drops the tag but keeps
 *     the text between it).
 *  2. Drop stray document-level / external-asset tags (html, head, body, link,
 *     meta, base, title, doctype) in case a full HTML document was pasted.
 *  3. wp_kses() against the allowlist above: keeps a safe HTML subset, sanitises
 *     inline styles, strips event handlers and dangerous protocols.
 *  4. do_shortcode() so genuine shortcodes still work (harmless if there are none).
 *
 * Combined with the containment CSS in html-template.css and the per-template
 * asset cleanup, whatever is pasted stays on its own page: it cannot load
 * scripts, leak global CSS into the site chrome, or affect any other page.
 */
function btl_render_user_html(string $raw): string {
    if (trim($raw) === '') return '';

    $clean = preg_replace('#<(script|style|head|title)\b[^>]*>.*?</\1>#is', '', $raw);
    $clean = preg_replace('#</?(?:html|head|body|link|meta|base|title|!doctype)\b[^>]*>#i', '', (string) $clean);

    $clean = wp_kses((string) $clean, btl_user_html_allowed_tags());

    return do_shortcode($clean);
}

/**
 * Intrinsic width/height for an ACF image array, so templates can output
 * width/height attributes and the browser reserves the space before load (CLS).
 *
 * Raster images: WordPress already stores the size in the attachment metadata.
 * SVGs: WordPress stores no size (ACF reports 0 or 1), so read the root <svg>
 * element's width/height or, failing that, its viewBox. Only the ratio matters —
 * the CSS still decides the rendered size.
 *
 * @return array{0:int,1:int}|null [width, height] or null if unknown.
 */
function btl_image_dims($image): ?array {
    if (!is_array($image)) return null;

    $w = (int) ($image['width']  ?? 0);
    $h = (int) ($image['height'] ?? 0);
    if ($w > 1 && $h > 1) return [$w, $h];

    $id   = (int) ($image['ID'] ?? $image['id'] ?? 0);
    $file = $id ? get_attached_file($id) : '';
    if (!$file || strtolower(pathinfo($file, PATHINFO_EXTENSION)) !== 'svg' || !is_readable($file)) return null;

    $cache_key = 'btl_svg_dims_' . $id . '_' . filemtime($file);
    $cached    = wp_cache_get($cache_key, 'btl');
    if (is_array($cached)) return $cached;

    // The root <svg> tag sits at the top of the file; no need to read it all.
    $head = (string) file_get_contents($file, false, null, 0, 8192);
    if (!preg_match('/<svg\b[^>]*>/is', $head, $tag)) return null;
    $tag = $tag[0];

    $num  = fn(string $attr) => preg_match('/\s' . $attr . '\s*=\s*["\']\s*([\d.]+)\s*(px)?\s*["\']/i', $tag, $m) ? (float) $m[1] : 0.0;
    $sw   = $num('width');
    $sh   = $num('height');

    if (!($sw > 0 && $sh > 0) && preg_match('/\sviewBox\s*=\s*["\']\s*[-\d.]+[\s,]+[-\d.]+[\s,]+([\d.]+)[\s,]+([\d.]+)/i', $tag, $vb)) {
        $sw = (float) $vb[1];
        $sh = (float) $vb[2];
    }
    if (!($sw > 0 && $sh > 0)) return null;

    $dims = [max(1, (int) round($sw)), max(1, (int) round($sh))];
    wp_cache_set($cache_key, $dims, 'btl', DAY_IN_SECONDS);
    return $dims;
}
