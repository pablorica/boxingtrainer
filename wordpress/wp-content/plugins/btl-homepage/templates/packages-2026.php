<?php
/**
 * BTL Training Packages 2026 — full template (plugin-served, standalone).
 * Markup mirrors the client-approved draft-3 mockup 1:1; all content from ACF.
 * wp_head()/wp_footer() keep AIOSEO (title/meta/OG/canonical/custom schema),
 * MonsterInsights and other hooked plugins fully functional.
 */
if (!defined('ABSPATH')) exit;

/* helpers (same style as home-2026.php) */
$opt = fn(string $f) => get_field($f, 'option');
$e   = 'esc_html';
$u   = 'esc_url';
$booking = fn(string $override) => esc_url(get_field($override) ?: $opt('btl_booking_url'));

/* **bold** -> <strong>bold</strong>, then escape the rest. Lets Paul emphasise
   figures like "Save £400" in a plain text field without an HTML editor. */
$emph = function (string $text): string {
    $parts = preg_split('/\*\*(.+?)\*\*/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    $out = '';
    foreach ($parts as $i => $p) {
        $out .= $i % 2 ? '<b>' . esc_html($p) . '</b>' : esc_html($p);
    }
    return $out;
};

$btl_body_class = 'btl-packages-2026';
require BTL_HP_PATH . 'templates/parts/head.php';
require BTL_HP_PATH . 'templates/parts/header.php';
?>

<!-- HERO -->
<div class="p-hero" id="top">
  <div class="p-hero-media">
    <?php echo wp_get_attachment_image((int) get_field('btl_pkg_hero_image'), 'full', false, [
        'fetchpriority' => 'high', 'loading' => 'eager',
    ]); ?>
  </div>
  <div class="wrap p-hero-inner">
    <h1><?php echo $e(get_field('btl_pkg_hero_h1_main')); ?> <em><?php echo $e(get_field('btl_pkg_hero_h1_accent')); ?></em></h1>
    <div class="tag"><?php echo $e(get_field('btl_pkg_hero_tagline')); ?></div>
    <p class="lead"><?php echo $e(get_field('btl_pkg_hero_lead')); ?></p>
    <div class="p-hero-ctas">
      <a class="btn btn-accent" href="<?php echo $booking('btl_pkg_hero_cta_url'); ?>"><?php echo $e(get_field('btl_pkg_hero_cta_label')); ?></a>
      <a class="btn btn-ghost" href="<?php echo $u($opt('btl_whatsapp_url')); ?>">WhatsApp Paul</a>
    </div>
  </div>
</div>

<!-- AT-A-GLANCE PRICE STRIP -->
<?php if ($strip = get_field('btl_pkg_strip_items')): ?>
<div class="strip">
  <div class="wrap" style="padding-left:0;padding-right:0;">
    <div class="strip-grid">
      <?php foreach ($strip as $t): ?>
      <div class="strip-cell">
        <div class="big"><?php echo $e($t['big']); ?></div>
        <h3><?php echo $e($t['title']); ?></h3>
        <p><?php echo $e($t['note']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php
/* OPTIONAL PROMOTIONS BAND — shown only when enabled AND has text or custom HTML.
   When hidden, its jump-link is also suppressed (see jump nav below). */
$promo_on = get_field('btl_pkg_promo_enabled')
    && (trim((string) get_field('btl_pkg_promo_text')) !== '' || trim((string) get_field('btl_pkg_promo_html')) !== '');
if ($promo_on):
?>
<div class="promo" id="promotions">
  <div class="wrap">
    <?php if ($html = trim((string) get_field('btl_pkg_promo_html'))): ?>
      <?php echo $html; /* advanced: raw HTML by design */ ?>
    <?php else: ?>
    <div class="promo-body">
      <?php if ($tag = get_field('btl_pkg_promo_tag')): ?><span class="promo-tag"><?php echo $e($tag); ?></span><?php endif; ?>
      <div><?php echo wp_kses_post(get_field('btl_pkg_promo_text')); ?></div>
    </div>
    <?php if (($pl = get_field('btl_pkg_promo_btn_label')) && ($pu = get_field('btl_pkg_promo_btn_url'))): ?>
      <a class="btn btn-accent" href="<?php echo $u($pu); ?>"><?php echo $e($pl); ?></a>
    <?php endif; ?>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>

<!-- JUMP NAV -->
<?php if ($jump = get_field('btl_pkg_jumplinks')): ?>
<div class="subnav">
  <div class="wrap">
    <span class="label">Jump to</span>
    <?php foreach ($jump as $j):
        // Suppress the promotions jump-link when the band is hidden.
        if (trim((string) $j['anchor']) === '#promotions' && !$promo_on) continue;
    ?>
      <a class="pill-link" href="<?php echo $e($j['anchor']); ?>"><?php echo $e($j['label']); ?></a>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<!-- PRIVATE PACKAGES -->
<section class="prices" id="private">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">Private coaching</span>
        <h2><?php echo $e(get_field('btl_pkg_private_heading')); ?></h2>
        <p class="intro"><?php echo $e(get_field('btl_pkg_private_intro')); ?></p>
      </div>
      <a class="btn btn-ghost" href="https://boxingtrainer.london/boxing-for-beginners/">New to boxing?</a>
    </div>

    <?php if ($cards = get_field('btl_pkg_private_cards')): ?>
    <div class="price-grid">
      <?php foreach ($cards as $c): $feat = !empty($c['featured']); ?>
      <div class="price-card<?php echo $feat ? ' featured' : ''; ?>">
        <?php if ($feat && !empty($c['flag'])): ?><span class="flag"><?php echo $e($c['flag']); ?></span><?php endif; ?>
        <?php if (!empty($c['kicker'])): ?><div class="kicker"><?php echo $e($c['kicker']); ?></div><?php endif; ?>
        <h3><?php echo $e($c['title']); ?></h3>
        <div class="amount"><?php echo $e($c['amount']); ?></div>
        <?php if (!empty($c['per'])): ?><div class="per"><?php echo $e($c['per']); ?></div><?php endif; ?>
        <p class="desc"><?php echo $e($c['desc']); ?></p>
        <?php if (!empty($c['benefits'])): ?>
        <ul>
          <?php foreach ($c['benefits'] as $b): ?><li><?php echo $emph((string) $b['text']); ?></li><?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <a class="btn <?php echo $feat ? 'btn-accent' : 'btn-ghost'; ?>" href="<?php echo esc_url($c['button_url'] ?: $opt('btl_booking_url')); ?>"><?php echo $e($c['button_label']); ?></a>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php /* NEW-CLIENT OFFER PANEL */ if (get_field('btl_pkg_offer_enabled')): ?>
    <div class="callout" style="margin-top:28px;">
      <div class="callout-body">
        <div class="pct"><?php echo $e(get_field('btl_pkg_offer_pct')); ?></div>
        <div>
          <h3><?php echo $e(get_field('btl_pkg_offer_heading')); ?></h3>
          <p><?php echo $e(get_field('btl_pkg_offer_body')); ?></p>
        </div>
      </div>
      <a class="btn btn-accent" href="<?php echo $booking('btl_pkg_offer_btn_url'); ?>"><?php echo $e(get_field('btl_pkg_offer_btn_label')); ?></a>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- STRUCTURED PROGRAMMES -->
<section class="programmes" id="programmes">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">Structured programmes</span>
        <h2><?php echo $e(get_field('btl_pkg_prog_heading')); ?></h2>
        <p class="intro"><?php echo $e(get_field('btl_pkg_prog_intro')); ?></p>
      </div>
    </div>

    <?php if ($progs = get_field('btl_pkg_prog_cards')): ?>
    <div class="prog-grid">
      <?php foreach ($progs as $p): $feat = !empty($p['featured']); ?>
      <div class="prog-card<?php echo $feat ? ' featured' : ''; ?>">
        <?php if ($feat && !empty($p['flag'])): ?><span class="flag"><?php echo $e($p['flag']); ?></span><?php endif; ?>
        <div class="prog-head">
          <?php if (!empty($p['kicker'])): ?><div class="kicker"><?php echo $e($p['kicker']); ?></div><?php endif; ?>
          <h3><?php echo $e($p['title']); ?></h3>
          <div class="amount"><?php echo $e($p['amount']); ?></div>
          <div class="spec"><?php echo $e($p['spec']); ?></div>
        </div>
        <div class="prog-body">
          <p><?php echo $e($p['desc']); ?></p>
          <?php if (!empty($p['features'])): ?>
          <ul>
            <?php foreach ($p['features'] as $f): ?><li><?php echo $e($f['text']); ?></li><?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <a class="btn <?php echo $feat ? 'btn-accent' : 'btn-ghost'; ?>" href="<?php echo esc_url($p['button_url'] ?: $opt('btl_booking_url')); ?>"><?php echo $e($p['button_label']); ?></a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php /* WEDDING CALLOUT */ if (get_field('btl_pkg_wed_enabled')): ?>
    <div class="callout" style="margin-top:28px;">
      <div class="callout-body">
        <div>
          <h3><?php echo $e(get_field('btl_pkg_wed_heading')); ?></h3>
          <p><?php echo $e(get_field('btl_pkg_wed_body')); ?></p>
        </div>
      </div>
      <a class="btn btn-accent" href="<?php echo $booking('btl_pkg_wed_btn_url'); ?>"><?php echo $e(get_field('btl_pkg_wed_btn_label')); ?></a>
    </div>
    <?php endif; ?>

    <?php if ($fp = get_field('btl_pkg_prog_fineprint')): ?>
    <p class="fineprint"><?php echo $e($fp); ?></p>
    <?php endif; ?>
  </div>
</section>

<!-- OTHER WAYS TO TRAIN -->
<?php if ($ways = get_field('btl_pkg_ways_cards')): ?>
<section class="ways" id="ways">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">More ways to train</span>
        <h2><?php echo $e(get_field('btl_pkg_ways_heading')); ?></h2>
      </div>
    </div>
    <div class="ways-grid">
      <?php foreach ($ways as $w): ?>
      <div class="way">
        <?php if (!empty($w['kicker'])): ?><div class="kicker"><?php echo $e($w['kicker']); ?></div><?php endif; ?>
        <h3><?php echo $e($w['title']); ?></h3>
        <div class="amount"><?php echo $e($w['amount']); ?><?php if (!empty($w['amount_note'])): ?><small><?php echo $e($w['amount_note']); ?></small><?php endif; ?></div>
        <p><?php echo $e($w['body']); ?></p>
        <?php if (!empty($w['bullets'])): ?>
        <ul>
          <?php foreach ($w['bullets'] as $b): ?><li><?php echo $emph((string) $b['text']); ?></li><?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php if (!empty($w['link_label']) && !empty($w['link_url'])): ?>
          <a class="a-link" href="<?php echo $u($w['link_url']); ?>"><?php echo $e($w['link_label']); ?></a>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php /* GIFT VOUCHERS CALLOUT */ if (get_field('btl_pkg_vouch_enabled')): ?>
<section id="gift-vouchers" style="padding-top:0;">
  <div class="wrap">
    <div class="callout">
      <div class="callout-body">
        <div>
          <h3><?php echo $e(get_field('btl_pkg_vouch_heading')); ?></h3>
          <p><?php echo $e(get_field('btl_pkg_vouch_body')); ?></p>
        </div>
      </div>
      <a class="btn btn-accent" href="<?php echo $u(get_field('btl_pkg_vouch_btn_url')); ?>"><?php echo $e(get_field('btl_pkg_vouch_btn_label')); ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- WHAT'S INCLUDED -->
<section class="included" id="included">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow"><?php echo $e(get_field('btl_pkg_inc_eyebrow')); ?></span>
        <h2><?php echo $e(get_field('btl_pkg_inc_heading')); ?></h2>
      </div>
    </div>
    <?php if ($inc = get_field('btl_pkg_inc_cards')): ?>
    <div class="inc-grid">
      <?php foreach ($inc as $card): ?>
      <div class="who-card">
        <h3><?php echo $e($card['title']); ?></h3>
        <p><?php echo $e($card['text']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="who-wide">
      <div>
        <h3><?php echo $e(get_field('btl_pkg_inc_wide_title')); ?></h3>
        <p><?php echo $e(get_field('btl_pkg_inc_wide_text')); ?></p>
      </div>
      <?php if (($wl = get_field('btl_pkg_inc_wide_link_label')) && ($wu = get_field('btl_pkg_inc_wide_link_url'))): ?>
        <a class="a-link" href="<?php echo $u($wu); ?>"><?php echo $e($wl); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- WHY PAUL -->
<section class="about" id="why-paul">
  <div class="wrap">
    <div class="photo">
      <?php echo wp_get_attachment_image((int) get_field('btl_pkg_about_image'), 'large', false, [
          'alt' => 'Paul Carroll, boxing personal trainer in London', 'loading' => 'lazy',
      ]); ?>
    </div>
    <div>
      <span class="eyebrow">Your coach</span>
      <h2><?php echo $e(get_field('btl_pkg_about_heading')); ?></h2>
      <p class="lead"><?php echo $e(get_field('btl_pkg_about_lead')); ?></p>
      <?php if ($creds = get_field('btl_pkg_about_creds')): ?>
      <ul>
        <?php foreach ($creds as $cr): ?>
        <li><b><?php echo $e($cr['bold']); ?></b><?php echo $cr['rest'] ? ' ' . $e($cr['rest']) : ''; ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
      <div style="display:flex;gap:12px;flex-wrap:wrap;">
        <a class="pill-link hot" href="<?php echo $u($opt('btl_google_url')); ?>">Google reviews</a>
        <a class="pill-link" href="<?php echo $u($opt('btl_trustpilot_url')); ?>">Trustpilot</a>
      </div>
    </div>
  </div>
</section>

<!-- BOOKING & TERMS -->
<section class="terms" id="terms">
  <div class="wrap">
    <div class="inner">
      <div>
        <span class="eyebrow">The small print</span>
        <h2><?php echo $e(get_field('btl_pkg_terms_heading')); ?></h2>
        <p class="lead" style="margin-top:16px;"><?php echo $e(get_field('btl_pkg_terms_lead')); ?></p>
        <div class="callout" style="margin-top:28px;">
          <div>
            <h3><?php echo $e(get_field('btl_pkg_terms_callout_heading')); ?></h3>
            <p><?php echo $e(get_field('btl_pkg_terms_callout_body')); ?></p>
          </div>
        </div>
      </div>
      <?php if ($terms = get_field('btl_pkg_terms_items')): ?>
      <ul>
        <?php foreach ($terms as $t): ?><li><?php echo $e($t['text']); ?></li><?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- TRUSTED PROFESSIONALS -->
<?php
$partners_raw = (array) get_field('btl_pkg_partners_cards');
$partners = array_filter($partners_raw, function ($p) {
    // Render guard: name + at least one usable link required.
    if (empty($p['name'])) return false;
    foreach ((array) ($p['links'] ?? []) as $l) {
        if (!empty($l['label']) && !empty($l['url'])) return true;
    }
    return false;
});
if ($partners):
?>
<section class="partners" id="partners">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">Recommended by Paul</span>
        <h2><?php echo $e(get_field('btl_pkg_partners_heading')); ?></h2>
        <p class="intro"><?php echo $e(get_field('btl_pkg_partners_intro')); ?></p>
      </div>
    </div>
    <div class="partner-grid">
      <?php foreach ($partners as $p): ?>
      <article class="partner">
        <?php if (!empty($p['category'])): ?><span class="cat"><?php echo $e($p['category']); ?></span><?php endif; ?>
        <h3><?php echo $e($p['name']); ?></h3>
        <?php if (!empty($p['role'])): ?><div class="role"><?php echo $e($p['role']); ?></div><?php endif; ?>
        <?php if (!empty($p['meta'])): ?><div class="meta"><?php echo $e($p['meta']); ?></div><?php endif; ?>
        <?php if (!empty($p['description'])): ?><p class="desc"><?php echo $e($p['description']); ?></p><?php endif; ?>
        <?php if (!empty($p['quote'])): ?>
        <blockquote>
          <?php echo $e($p['quote']); ?>
          <?php if (!empty($p['quote_cite'])): ?><cite><?php echo $e($p['quote_cite']); ?></cite><?php endif; ?>
        </blockquote>
        <?php endif; ?>
        <?php if (!empty($p['bullets'])): ?>
        <ul>
          <?php foreach ($p['bullets'] as $b): if (empty($b['text'])) continue; ?><li><?php echo $e($b['text']); ?></li><?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="links">
          <?php foreach ((array) $p['links'] as $l):
              if (empty($l['label']) || empty($l['url'])) continue;
              $ext = strpos((string) $l['url'], 'boxingtrainer.london') === false;
          ?>
            <a class="<?php echo !empty($l['secondary']) ? 'secondary' : 'primary'; ?>" href="<?php echo $u($l['url']); ?>"<?php echo $ext ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo $e($l['label']); ?> <span aria-hidden="true"><?php echo $ext ? '↗' : '→'; ?></span></a>
          <?php endforeach; ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php if ($note = get_field('btl_pkg_partners_note')): ?>
    <p class="partner-note"><?php echo $e($note); ?></p>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<!-- FAQs -->
<?php if ($faqs = get_field('btl_pkg_faqs')): ?>
<section class="faq" id="faqs">
  <div class="wrap">
    <div class="inner">
      <div style="text-align:center;margin-bottom:clamp(30px,4vw,46px);">
        <span class="eyebrow">Questions</span>
        <h2><?php echo $e(get_field('btl_pkg_faq_heading')); ?></h2>
      </div>
      <?php foreach ($faqs as $i => $f): ?>
      <details<?php echo $i === 0 ? ' open' : ''; ?>>
        <summary><?php echo $e($f['question']); ?></summary>
        <div class="a"><?php echo wp_kses_post($f['answer']); ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- SEO COPY -->
<?php if (($sh = get_field('btl_pkg_seo_heading')) || ($sc = get_field('btl_pkg_seo_content'))): ?>
<section class="seo">
  <div class="wrap">
    <div class="inner">
      <?php if ($sh): ?><h2><?php echo $e($sh); ?></h2><?php endif; ?>
      <?php echo wp_kses_post(get_field('btl_pkg_seo_content')); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- CTA -->
<div class="cta">
  <div class="wrap">
    <div class="cta-text">
      <h2><?php echo $e(get_field('btl_pkg_cta_heading')); ?></h2>
      <p><?php echo $e(get_field('btl_pkg_cta_text')); ?></p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-white" href="<?php echo $booking('btl_pkg_cta_url'); ?>"><?php echo $e(get_field('btl_pkg_cta_label')); ?></a>
      <span class="phone">✆
        <a href="tel:<?php echo esc_attr($opt('btl_phone_tel')); ?>"><?php echo $e($opt('btl_phone_display')); ?></a>
        ·
        <a href="<?php echo $u($opt('btl_whatsapp_url')); ?>">WhatsApp</a>
      </span>
    </div>
  </div>
</div>

<?php require BTL_HP_PATH . 'templates/parts/footer.php'; ?>
