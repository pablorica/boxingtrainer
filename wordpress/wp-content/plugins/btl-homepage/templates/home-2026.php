<?php
/**
 * BTL Homepage 2026 — standalone template (plugin-served).
 * Full markup lands here in the next build step, generated from the approved mockup.
 * Standalone by design: renders its own header/footer; wp_head()/wp_footer() keep
 * AIOSEO, schema, analytics and other hooked plugins fully functional.
 */
if (!defined('ABSPATH')) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class('btl-home-2026'); ?>>
<?php wp_body_open(); ?>

<!-- BUILD STEP 2: sections from the approved mockup are templated here, e.g.: -->
<div class="hero">
  <h1><?php echo esc_html(get_field('btl_hero_h1_main')); ?>
      <em><?php echo esc_html(get_field('btl_hero_h1_accent')); ?></em></h1>
  <p><?php echo esc_html(get_field('btl_hero_tagline')); ?></p>
  <a class="btn btn-accent" href="<?php echo esc_url(btl_opt('btl_booking_url', 'btl_hero_cta_url')); ?>">
    <?php echo esc_html(get_field('btl_hero_cta_label')); ?>
  </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
