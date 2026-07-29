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
<?php
/**
 * Critical hero-reveal CSS, inlined here on purpose.
 *
 * NitroPack builds its own critical CSS and defers the rest of the
 * stylesheet, and it drops these keyframes from that critical set — so if
 * the reveal lived only in home.css it would not run on the cached page
 * until the deferred stylesheet loaded. Inlining it in <head> guarantees
 * it is present at first paint on every render, cached or not.
 *
 * It is a pure CSS animation with no class gate, so nothing here depends on
 * a script NitroPack might defer. Duplicated in home.css for the uncached
 * render; identical rules, so no conflict.
 */
?>
<style id="btl-hero-critical">
  .hero-inner{animation:btlHeroReveal 800ms ease 400ms both;}
  .hero-media img{animation:btlHeroZoom 1500ms cubic-bezier(.2,.7,.2,1) 100ms both;}
  .hero-media::after{animation:btlHeroFade 900ms ease 100ms both;}
  @keyframes btlHeroReveal{from{opacity:0;transform:translateY(28px);}to{opacity:1;transform:translateY(0);}}
  @keyframes btlHeroZoom{from{transform:scale(1.025);}to{transform:scale(1);}}
  @keyframes btlHeroFade{from{opacity:0;}to{opacity:1;}}
  @media (prefers-reduced-motion:reduce){
    .hero-inner,.hero-media img,.hero-media::after{animation:none!important;opacity:1!important;transform:none!important;}
  }
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class($btl_body_class); ?>>
<?php wp_body_open(); ?>
