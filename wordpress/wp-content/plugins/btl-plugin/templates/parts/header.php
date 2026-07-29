<?php
/**
 * Shared site header + mobile menu for all BTL templates.
 *
 * Behaviour lives in assets/js/base.js (burger + hide-on-scroll header),
 * styling in assets/css/base.css. IDs must stay as they are — base.js
 * looks up #btl-burger and #btl-mobile-menu.
 *
 * Nav links come from the options page, falling back to the homepage's
 * own btl_nav_links repeater until the values are migrated.
 */
if (!defined('ABSPATH')) exit;

$btl_nav      = btl_shared_field('btl_nav_links');
$btl_phone    = btl_opt('btl_phone_display');
$btl_tel      = btl_opt('btl_phone_tel');
$btl_whatsapp = btl_opt('btl_whatsapp_url');
$btl_book     = btl_booking_url('btl_hero_cta_url');
?>
<header>
  <div class="wrap nav">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">Boxing Trainer <span>London</span></a>
    <?php if ($btl_nav): ?>
    <nav class="menu">
      <?php foreach ($btl_nav as $n): ?>
        <a href="<?php echo esc_url($n['url']); ?>"><?php echo esc_html($n['label']); ?></a>
      <?php endforeach; ?>
    </nav>
    <?php endif; ?>
    <div class="nav-cta">
      <a class="nav-phone" href="tel:<?php echo esc_attr($btl_tel); ?>"><?php echo esc_html($btl_phone); ?></a>
      <a class="btn btn-accent" href="<?php echo $btl_book; ?>">Book a session</a>
      <button id="btl-burger"
        class="burger"
        type="button"
        aria-label="Open menu"
        aria-expanded="false"
        aria-controls="btl-mobile-menu"
      >
        <i></i>
        <i></i>
        <i></i>
      </button>
    </div>
  </div>
  <div class="mobile-menu" id="btl-mobile-menu" hidden>
    <?php if ($btl_nav): ?>
    <nav aria-label="Mobile">
      <?php foreach ($btl_nav as $n): ?>
        <a href="<?php echo esc_url($n['url']); ?>"><?php echo esc_html($n['label']); ?></a>
      <?php endforeach; ?>
    </nav>
    <?php endif; ?>
    <div class="mobile-menu-cta">
      <a class="btn btn-accent" href="<?php echo $btl_book; ?>">Book a session</a>
      <a class="btn btn-ghost" href="<?php echo esc_url($btl_whatsapp); ?>">WhatsApp Paul</a>
      <a class="mobile-phone" href="tel:<?php echo esc_attr($btl_tel); ?>">&#10006; <?php echo esc_html($btl_phone); ?></a>
    </div>
  </div>
</header>
