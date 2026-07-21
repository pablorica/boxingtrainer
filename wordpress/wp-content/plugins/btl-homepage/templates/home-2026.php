<?php
/**
 * BTL Homepage 2026 — full template (plugin-served, standalone).
 * Markup mirrors the client-approved mockup 1:1; all content from ACF fields.
 * wp_head()/wp_footer() keep AIOSEO (title/meta/OG/canonical/custom schema),
 * MonsterInsights and other hooked plugins fully functional.
 */
if (!defined('ABSPATH')) exit;

/* helpers */
$opt   = fn(string $f) => get_field($f, 'option');
$e     = 'esc_html';
$u     = 'esc_url';
$yt_id = function (string $url): string {
    return preg_match('~(?:youtu\.be/|[?&]v=|/embed/)([A-Za-z0-9_-]{6,})~', $url, $m) ? $m[1] : '';
};
$booking = fn(string $override) => esc_url(get_field($override) ?: $opt('btl_booking_url'));

$vid_id     = $yt_id((string) get_field('btl_video_youtube'));
$poster     = get_field('btl_video_poster');
$poster_url = $poster ? wp_get_attachment_image_url((int) $poster, 'full')
                      : ($vid_id ? "https://img.youtube.com/vi/{$vid_id}/maxresdefault.jpg" : '');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class('btl-home-2026'); ?>>
<?php wp_body_open(); ?>

<header>
  <div class="wrap nav">
    <a class="logo" href="<?php echo $u(home_url('/')); ?>">Boxing Trainer <span>London</span></a>
    <?php if ($nav = get_field('btl_nav_links')): ?>
    <nav class="menu">
      <?php foreach ($nav as $n): ?>
        <a href="<?php echo $u($n['url']); ?>"><?php echo $e($n['label']); ?></a>
      <?php endforeach; ?>
    </nav>
    <?php endif; ?>
    <div class="nav-cta">
      <a class="nav-phone" href="tel:<?php echo esc_attr($opt('btl_phone_tel')); ?>"><?php echo $e($opt('btl_phone_display')); ?></a>
      <a class="btn btn-accent" href="<?php echo $booking('btl_hero_cta_url'); ?>">Book a session</a>
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
    <?php if ($nav): ?>
    <nav aria-label="Mobile">
      <?php foreach ($nav as $n): ?>
        <a href="<?php echo $u($n['url']); ?>"><?php echo $e($n['label']); ?></a>
      <?php endforeach; ?>
    </nav>
    <?php endif; ?>
    <div class="mobile-menu-cta">
      <a class="btn btn-accent" href="<?php echo $booking('btl_hero_cta_url'); ?>">Book a session</a>
      <a class="btn btn-ghost" href="<?php echo $u($opt('btl_whatsapp_url')); ?>">WhatsApp Paul</a>
      <a class="mobile-phone" href="tel:<?php echo esc_attr($opt('btl_phone_tel')); ?>">✆ <?php echo $e($opt('btl_phone_display')); ?></a>
    </div>
  </div>
</header>

<!-- HERO -->
<div class="hero">
  <div class="hero-media">
    <?php echo wp_get_attachment_image((int) get_field('btl_hero_image'), 'full', false, [
        'fetchpriority' => 'high', 'loading' => 'eager',
    ]); ?>
  </div>
  <div class="wrap hero-inner">
    <h1><?php echo $e(get_field('btl_hero_h1_main')); ?> <em><?php echo $e(get_field('btl_hero_h1_accent')); ?></em></h1>
    <div class="tag"><?php echo $e(get_field('btl_hero_tagline')); ?></div>
    <p class="lead"><?php echo $e(get_field('btl_hero_lead')); ?></p>
    <div class="hero-ctas">
      <a class="btn btn-accent" href="<?php echo $booking('btl_hero_cta_url'); ?>"><?php echo $e(get_field('btl_hero_cta_label')); ?></a>
      <a class="btn btn-ghost" href="<?php echo $u($opt('btl_whatsapp_url')); ?>">WhatsApp Paul</a>
    </div>
    <div class="hero-trust">
      <span><span class="stars">★★★★★</span> <b><?php echo $e($opt('btl_google_score')); ?></b>
        from <?php echo $e($opt('btl_google_count')); ?> Google Reviews —
        <a href="<?php echo $u($opt('btl_google_url')); ?>">read verified feedback</a></span>
      <span><b><?php echo $e($opt('btl_trustpilot_score')); ?></b> on
        <a href="<?php echo $u($opt('btl_trustpilot_url')); ?>">Trustpilot</a></span>
    </div>
  </div>
</div>

<!-- PRESS LOGO WALL -->
<?php if ($logos = get_field('btl_press_logos')): ?>
<div class="press">
  <div class="wrap">
    <span class="press-label">As featured in</span>
    <?php /* foreach ($logos as $l):
        if (empty($l['logo'])) continue;
        $href = $l['url'] ?: '#daily-express-quote'; ?>
      <a href="<?php echo $u($href); ?>" aria-label="<?php echo esc_attr($l['alt']); ?>">
        <img src="<?php echo $u($l['logo']['url']); ?>" alt="<?php echo esc_attr($l['alt'] ?: $l['logo']['alt']); ?>" loading="lazy">
      </a>
    <?php endforeach; */ ?>
    <?php foreach ($logos as $l):
        if (empty($l['logo'])) continue;
        $href = $l['url'] ?: '#daily-express-quote';
        $file = $l['logo']['filename'] ?? basename($l['logo']['url']);
        $slug = sanitize_html_class(preg_replace('/^logo-/', '', pathinfo($file, PATHINFO_FILENAME)));
        ?>
      <a class="press-logo press-logo-<?php echo esc_attr($slug); ?>"
         href="<?php echo $u($href); ?>" aria-label="<?php echo esc_attr($l['alt']); ?>">
        <img src="<?php echo $u($l['logo']['url']); ?>" alt="<?php echo esc_attr($l['alt'] ?: $l['logo']['alt']); ?>" loading="lazy">
      </a>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<!-- CREDENTIALS -->
<?php if ($creds = get_field('btl_credentials')): ?>
<section>
  <div class="wrap">
    <div class="creds-grid">
      <?php foreach ($creds as $c): ?>
      <div class="cred">
        <div class="big"><?php echo $e($c['big']); ?></div>
        <h3><?php echo $e($c['title']); ?></h3>
        <p><?php echo $e($c['text']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- TRAINING OPTIONS -->
<section class="packages">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">Training options</span>
        <h2><?php echo $e(get_field('btl_training_heading')); ?></h2>
        <p class="intro"><?php echo $e(get_field('btl_training_intro')); ?></p>
      </div>
      <a class="btn btn-ghost" href="<?php echo $u(home_url('/training-packages/')); ?>">All packages</a>
    </div>
    <?php if ($packs = get_field('btl_pathways')): ?>
    <div class="pack-grid">
      <?php foreach ($packs as $p): ?>
      <div class="pack">
        <div class="img">
          <span class="dur"><?php echo $e($p['badge']); ?></span>
          <?php echo wp_get_attachment_image((int) $p['image'], 'large', false, ['loading' => 'lazy']); ?>
        </div>
        <div class="body">
          <h3><?php echo $e($p['title']); ?></h3>
          <p><?php echo $e($p['text']); ?></p>
          <a class="btn btn-accent" href="<?php echo $u($p['button_url']); ?>"><?php echo $e($p['button_label']); ?></a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if ($svc = get_field('btl_svc_links')): ?>
    <div class="svc-links">
      <h3><?php echo $e(get_field('btl_svc_title')); ?></h3>
      <div class="row">
        <?php foreach ($svc as $l): ?>
        <a class="pill-link" href="<?php echo $u($l['url']); ?>"><?php echo $e($l['label']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- WHO THIS IS FOR -->
<section class="who">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">Who this is for</span>
        <h2><?php echo $e(get_field('btl_who_heading')); ?></h2>
      </div>
    </div>
    <?php if ($cards = get_field('btl_who_cards')): ?>
    <div class="who-grid">
      <?php foreach ($cards as $c): ?>
      <a class="who-card" href="<?php echo $u($c['url']); ?>">
        <h3><?php echo $e($c['title']); ?></h3>
        <p><?php echo $e($c['text']); ?></p>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="who-wide">
      <div>
        <h3><?php echo $e(get_field('btl_who_wide_title')); ?></h3>
        <p><?php echo $e(get_field('btl_who_wide_text')); ?></p>
      </div>
      <a class="a-link" href="<?php echo $u(get_field('btl_who_wide_link_url')); ?>"><?php echo $e(get_field('btl_who_wide_link_label')); ?></a>
    </div>
  </div>
</section>

<!-- FEATURED VIDEO (poster-first facade) -->
<?php if ($vid_id): ?>
<section class="video-sec">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">Featured training</span>
        <h2><?php echo $e(get_field('btl_video_heading')); ?></h2>
      </div>
    </div>
    <div class="video-main" id="geri-video" role="button" tabindex="0" data-video-id="<?php echo esc_attr($vid_id); ?>"
         aria-label="Play video: <?php echo esc_attr(get_field('btl_video_heading')); ?>">
      <img src="<?php echo $u($poster_url); ?>" alt="<?php echo esc_attr(get_field('btl_video_caption')); ?>" loading="lazy">
      <div class="play"></div>
      <div class="video-caption"><small><?php echo $e(get_field('btl_video_small')); ?></small><?php echo $e(get_field('btl_video_caption')); ?></div>
    </div>
    <div class="video-meta">
      <?php echo wp_kses_post(wpautop((string) get_field('btl_video_text'))); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- PRESS QUOTE -->
<section class="quote-sec" id="daily-express-quote">
  <div class="wrap">
    <span class="qmark">"</span>
    <blockquote><?php echo $e(get_field('btl_quote_main')); ?> <em><?php echo $e(get_field('btl_quote_accent')); ?></em></blockquote>
    <cite><b><?php echo $e(get_field('btl_quote_name')); ?></b> — <?php echo $e(get_field('btl_quote_source')); ?></cite>
  </div>
</section>

<!-- TESTIMONIALS / PROOF -->
<section class="testi">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">Success stories</span>
        <h2><?php echo nl2br($e(get_field('btl_testi_heading'))); ?></h2>
      </div>
      <a class="btn btn-ghost" href="<?php echo $u(get_field('btl_success_url')); ?>">All success stories</a>
    </div>
    <?php if ($tst = get_field('btl_testimonials')): ?>
    <div class="t-grid">
      <?php foreach ($tst as $t): ?>
      <div class="t-card">
        <div class="stars"><?php echo str_repeat('★', max(1, min(5, (int) $t['stars']))); ?></div>
        <p>"<?php echo $e($t['quote']); ?>"</p>
        <div class="who"><?php echo $e($t['name']); ?><small><?php echo $e($t['meta']); ?></small></div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="proof-links">
      <a class="pill-link" href="<?php echo $u($opt('btl_google_url')); ?>">★ <?php echo $e($opt('btl_google_score')); ?> · <?php echo $e($opt('btl_google_count')); ?> Google Reviews</a>
      <a class="pill-link" href="<?php echo $u($opt('btl_trustpilot_url')); ?>">★ <?php echo $e($opt('btl_trustpilot_score')); ?> on Trustpilot</a>
      <a class="pill-link" href="<?php echo $u(get_field('btl_success_url')); ?>">All success stories</a>
    </div>
    <p class="celebrity"><?php echo wp_kses((string) get_field('btl_celebrity_line'), ['b' => []]); ?></p>
  </div>
</section>

<!-- FIRST SESSION -->
<section class="first">
  <div class="wrap">
    <div class="inner">
      <div>
        <span class="eyebrow">Your first session</span>
        <h2><?php echo $e(get_field('btl_first_heading')); ?></h2>
        <p><?php echo $e(get_field('btl_first_text')); ?></p>
      </div>
      <?php if ($pts = get_field('btl_first_points')): ?>
      <ul>
        <?php foreach ($pts as $pt): ?>
        <li><b><?php echo $e($pt['bold']); ?></b> — <?php echo $e($pt['rest']); ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ABOUT + WIDER TRAINING -->
<section class="about">
  <div class="wrap">
    <div class="photo">
      <?php echo wp_get_attachment_image((int) get_field('btl_about_image'), 'large', false, ['loading' => 'lazy']); ?>
    </div>
    <div>
      <span class="eyebrow">Your coach</span>
      <h2><?php echo $e(get_field('btl_about_heading')); ?></h2>
      <p class="lead" style="margin-top:14px;"><?php echo $e(get_field('btl_about_lead')); ?></p>
      <?php if ($ac = get_field('btl_about_creds')): ?>
      <ul>
        <?php foreach ($ac as $a): ?>
        <li><b><?php echo $e($a['bold']); ?></b> — <?php echo $e($a['rest']); ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
      <div class="wider">
        <h3><?php echo $e(get_field('btl_about_chips_title')); ?></h3>
        <?php if ($chips = get_field('btl_about_chips')): ?>
        <div class="row">
          <?php foreach ($chips as $ch): ?><span class="chip"><?php echo $e($ch['label']); ?></span><?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <a class="btn btn-accent" href="<?php echo $u(get_field('btl_about_cta_url')); ?>"><?php echo $e(get_field('btl_about_cta_label')); ?></a>
    </div>
  </div>
</section>

<!-- WHERE SESSIONS HAPPEN -->
<div class="where">
  <div class="wrap">
    <h3><?php echo $e(get_field('btl_where_heading_main')); ?> <em><?php echo $e(get_field('btl_where_heading_accent')); ?></em></h3>
    <?php if ($wh = get_field('btl_where_items')): ?>
    <div class="where-grid">
      <?php foreach ($wh as $w): ?><span class="where-item"><?php echo $e($w['label']); ?></span><?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</div>

<!-- AREAS -->
<section class="areas">
  <div class="wrap">
    <span class="eyebrow">Areas covered</span>
    <h2><?php echo $e(get_field('btl_areas_heading')); ?></h2>
    <p class="lead" style="margin-top:14px;"><?php echo $e(get_field('btl_areas_intro')); ?></p>
    <div class="row" style="margin-top:26px;">
      <?php if ($areas = get_field('btl_area_links')): foreach ($areas as $a): ?>
      <a class="pill-link" href="<?php echo $u($a['url']); ?>"><?php echo $e($a['label']); ?></a>
      <?php endforeach; endif; ?>
      <a class="pill-link hot" href="<?php echo $u(get_field('btl_areas_all_url')); ?>"><?php echo $e(get_field('btl_areas_all_label')); ?></a>
    </div>
  </div>
</section>

<!-- GUIDES -->
<section class="guides">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="eyebrow">From the blog</span>
        <h2><?php echo $e(get_field('btl_guides_heading')); ?></h2>
      </div>
      <a class="btn btn-ghost" href="<?php echo $u(get_field('btl_guides_browse_url')); ?>"><?php echo $e(get_field('btl_guides_browse_label')); ?></a>
    </div>
    <?php if ($gs = get_field('btl_featured_guides')): ?>
    <div class="g-grid">
      <?php foreach ($gs as $g): ?>
      <div class="g-card">
        <div class="img"><?php echo wp_get_attachment_image((int) $g['image'], 'large', false, ['loading' => 'lazy']); ?></div>
        <div class="g-body">
          <div class="g-cat"><?php echo $e($g['category']); ?></div>
          <h3><?php echo $e($g['title']); ?></h3>
          <p><?php echo $e($g['text']); ?></p>
          <a class="a-link" href="<?php echo $u($g['url']); ?>">Read the guide</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if ($mg = get_field('btl_more_guides')): ?>
    <div class="more-guides">
      <h3><?php echo $e(get_field('btl_more_guides_title')); ?></h3>
      <div class="row">
        <?php foreach ($mg as $m): ?>
        <a class="pill-link" href="<?php echo $u($m['url']); ?>"><?php echo $e($m['label']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- FAQ -->
<?php if ($faqs = get_field('btl_home_faqs')): ?>
<section class="faq">
  <div class="wrap">
    <div class="sec-head" style="justify-content:center;text-align:center;">
      <div>
        <span class="eyebrow" style="display:block;">FAQs</span>
        <h2><?php echo $e(get_field('btl_faq_heading')); ?></h2>
      </div>
    </div>
    <div class="inner">
      <?php foreach ($faqs as $f): ?>
      <details>
        <summary><?php echo $e($f['question']); ?></summary>
        <div class="a"><?php echo $e($f['answer']); ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- SEO CONTENT -->
<section class="seo">
  <div class="wrap inner">
    <h2><?php echo $e(get_field('btl_seo_heading')); ?></h2>
    <?php echo wp_kses_post((string) get_field('btl_seo_content')); ?>
  </div>
</section>

<!-- CTA -->
<div class="cta">
  <div class="wrap">
    <div>
      <h2><?php echo $e(get_field('btl_cta_heading')); ?></h2>
      <p><?php echo $e(get_field('btl_cta_text')); ?></p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-white" href="<?php echo $booking('btl_cta_url'); ?>"><?php echo $e(get_field('btl_cta_label')); ?></a>
      <span class="phone">✆ <?php echo $e($opt('btl_phone_display')); ?> · WhatsApp</span>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="wrap">
    <div class="f-grid">
      <div>
        <a class="logo" href="<?php echo $u(home_url('/')); ?>">Boxing Trainer <span>London</span></a>
        <p><?php echo $e(get_field('btl_footer_blurb')); ?></p>
      </div>
      <div>
        <h4>Site</h4>
        <?php if ($fs = get_field('btl_footer_site_links')): ?>
        <ul><?php foreach ($fs as $l): ?><li><a href="<?php echo $u($l['url']); ?>"><?php echo $e($l['label']); ?></a></li><?php endforeach; ?></ul>
        <?php endif; ?>
      </div>
      <div>
        <h4>Training</h4>
        <?php if ($ft = get_field('btl_footer_training_links')): ?>
        <ul><?php foreach ($ft as $l): ?><li><a href="<?php echo $u($l['url']); ?>"><?php echo $e($l['label']); ?></a></li><?php endforeach; ?></ul>
        <?php endif; ?>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li>Phone / WhatsApp — <?php echo $e($opt('btl_phone_display')); ?></li>
          <li><?php echo $e($opt('btl_email')); ?></li>
          <li>Central, South, East &amp; West London</li>
        </ul>
      </div>
    </div>
    <div class="f-bottom">
      <span>© <?php echo esc_html(date('Y')); ?> Boxing Trainer London. All rights reserved.</span>
      <span>Privacy · Terms</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
