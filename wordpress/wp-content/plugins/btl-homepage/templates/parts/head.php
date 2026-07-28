<?php
/**
 * Shared document head for all BTL templates.
 *
 * Set $btl_body_class before including, e.g.:
 *   $btl_body_class = 'btl-home-2026';
 *   require BTL_HP_PATH . 'templates/parts/head.php';
 *
 * wp_head()/wp_footer() keep AIOSEO (title/meta/OG/canonical/custom schema),
 * MonsterInsights and other hooked plugins fully functional.
 */
if (!defined('ABSPATH')) exit;

$btl_body_class = $btl_body_class ?? '';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>document.documentElement.className+=" js";</script>
<?php wp_head(); ?>
</head>
<body <?php body_class($btl_body_class); ?>>
<?php wp_body_open(); ?>
