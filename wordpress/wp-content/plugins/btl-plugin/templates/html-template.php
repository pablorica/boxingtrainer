<?php
/**
 * BTL HTML Template 2026 — blank-canvas page (plugin-served, standalone).
 *
 * Renders the shared site header/footer and outputs a single client-managed
 * HTML field (btl_page_html) inside a width-constrained, self-contained wrapper.
 *
 * The field is sanitised on output by btl_render_user_html(): <script>/<style>/<link>
 * are removed, inline styles are sanitised, event handlers stripped, shortcodes run.
 * So whatever is pasted cannot load scripts, bleed global CSS into the chrome, or
 * affect any other page. The containment CSS in assets/css/html-template.css keeps
 * it inside the page width on every screen size and gives unstyled content sensible,
 * on-brand defaults on the dark theme.
 *
 * NOTE — schema/SEO: unlike home-2026 and packages-2026, this template populates
 * NO structured data automatically. Title/meta/canonical and any schema for pages
 * built with it are managed manually in AIOSEO (wp_head() below keeps AIOSEO fully
 * functional). This is intentional — see the scope agreed with Paul.
 */
if (!defined('ABSPATH')) exit;

$btl_body_class = 'btl-html-template';
require BTL_HP_PATH . 'templates/parts/head.php';
require BTL_HP_PATH . 'templates/parts/header.php';
?>

<main class="btl-html-main">
  <div class="wrap btl-user-html">
    <?php echo btl_render_user_html((string) get_field('btl_page_html')); ?>
  </div>
</main>

<?php
require BTL_HP_PATH . 'templates/parts/footer.php';
