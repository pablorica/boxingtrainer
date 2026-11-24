<?php
/**
 * Shared site footer for all BTL templates. Closes the document.
 *
 * Footer links and blurb come from the options page, falling back to the
 * homepage's own fields until the values are migrated.
 */
if (!defined('ABSPATH')) exit;

$btl_blurb    = btl_shared_text('btl_footer_blurb');
$btl_site     = btl_shared_field('btl_footer_site_links');
$btl_training = btl_shared_field('btl_footer_training_links');
$btl_phone    = btl_opt('btl_phone_display');
$btl_tel      = btl_opt('btl_phone_tel');
$btl_email    = btl_opt('btl_email');

/* Legal links. Each one only shows when its page exists, so nothing breaks
   before the policies are published. */
$btl_privacy_url = get_privacy_policy_url();          // Settings → Privacy page, '' unless published
$btl_cookie_page = get_page_by_path('cookie-policy-uk');
$btl_cookie_url  = ($btl_cookie_page && $btl_cookie_page->post_status === 'publish') ? get_permalink($btl_cookie_page) : '';
$btl_cmplz       = class_exists('COMPLIANZ');          // "Manage cookies" reopens the Complianz banner
?>
<footer>
  <div class="wrap">
    <div class="f-grid">
      <div>
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">Boxing Trainer <span>London</span></a>
        <p><?php echo esc_html($btl_blurb); ?></p>
      </div>
      <div>
        <h4>Site</h4>
        <?php if ($btl_site): ?>
        <ul><?php foreach ($btl_site as $l): ?><li><a href="<?php echo esc_url($l['url']); ?>"><?php echo esc_html($l['label']); ?></a></li><?php endforeach; ?></ul>
        <?php endif; ?>
      </div>
      <div>
        <h4>Training</h4>
        <?php if ($btl_training): ?>
        <ul><?php foreach ($btl_training as $l): ?><li><a href="<?php echo esc_url($l['url']); ?>"><?php echo esc_html($l['label']); ?></a></li><?php endforeach; ?></ul>
        <?php endif; ?>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li>Phone / WhatsApp — <a href="tel:<?php echo esc_attr($btl_tel); ?>"><?php echo esc_html($btl_phone); ?></a></li>
          <li><a href="mailto:<?php echo esc_attr($btl_email); ?>"><?php echo esc_html($btl_email); ?></a></li>
          <li>Central, South, East &amp; West London</li>
        </ul>
      </div>
    </div>
    <div class="f-bottom">
      <span>&copy; <?php echo esc_html(date('Y')); ?> Boxing Trainer London. All rights reserved.</span>
      <span class="f-legal">
        <?php if ($btl_privacy_url): ?><a href="<?php echo esc_url($btl_privacy_url); ?>">Privacy Policy</a><?php endif; ?>
        <?php if ($btl_cookie_url): ?><a href="<?php echo esc_url($btl_cookie_url); ?>">Cookie Policy</a><?php endif; ?>
        <?php if ($btl_cmplz): ?><a href="#" class="cmplz-show-banner">Manage cookies</a><?php endif; ?>
      </span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
