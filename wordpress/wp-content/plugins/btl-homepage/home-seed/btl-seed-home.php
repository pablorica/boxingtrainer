<?php
/**
 * BTL Homepage 2026 — one-time content seeder.
 * Usage:  wp eval-file btl-seed-home.php <page_id> <images_dir>
 *   <page_id>    ID of the page using the "BTL Homepage 2026" template
 *   <images_dir> absolute path to a folder containing the homepage image files
 * Idempotent: re-running overwrites field values; images are imported once (matched by filename).
 */
if (!defined('WP_CLI') || !WP_CLI) exit("Run via WP-CLI: wp eval-file btl-seed-home.php <page_id> <images_dir>\n");
if (!function_exists('update_field')) WP_CLI::error('ACF Pro not active.');

[$page_id, $img_dir] = [(int)($args[0] ?? 0), rtrim($args[1] ?? '', '/')];
if (!$page_id || get_post_type($page_id) !== 'page') WP_CLI::error('Pass a valid page ID as the first argument.');
if (!$img_dir || !is_dir($img_dir)) WP_CLI::error('Pass the images directory as the second argument.');

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

/* Allow SVG for this seeding run only (the three press logos are our own trusted files). */
add_filter('upload_mimes', fn(array $m): array => $m + ['svg' => 'image/svg+xml']);
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename) {
    if (str_ends_with(strtolower($filename), '.svg')) {
        $data['ext'] = 'svg'; $data['type'] = 'image/svg+xml';
    }
    return $data;
}, 10, 3);

/** import image once; returns attachment ID (0 if file missing) */
function btl_img(string $file, string $dir, string $alt = ''): int {
    static $cache = [];
    if (isset($cache[$file])) return $cache[$file];
    $existing = get_posts(['post_type'=>'attachment','name'=>sanitize_title(pathinfo($file, PATHINFO_FILENAME)),
                           'posts_per_page'=>1,'fields'=>'ids']);
    if ($existing) return $cache[$file] = (int)$existing[0];
    $path = "$dir/$file";
    if (!file_exists($path)) { WP_CLI::warning("Image missing, field left empty: $file"); return $cache[$file] = 0; }
    $tmp = wp_tempnam($file); copy($path, $tmp);
    $id = media_handle_sideload(['name'=>$file, 'tmp_name'=>$tmp], 0);
    if (is_wp_error($id)) { WP_CLI::warning("Import failed: $file — ".$id->get_error_message()); return $cache[$file] = 0; }
    if ($alt) update_post_meta($id, '_wp_attachment_image_alt', $alt);
    WP_CLI::log("Imported: $file (#$id)");
    return $cache[$file] = (int)$id;
}

$P = fn(string $key, $val) => update_field("field_$key", $val, $page_id);
$O = fn(string $key, $val) => update_field("field_$key", $val, 'option');

/* ---------- template assignment ---------- */
update_post_meta($page_id, '_wp_page_template', 'btl-home-2026.php');

/* ---------- site-wide options ---------- */
$O('btl_phone_display','07790 210 031');
$O('btl_phone_tel','07790210031');
$O('btl_whatsapp_url','https://wa.me/447790210031');
$O('btl_email','boxingtrainerlondon@icloud.com');
$O('btl_booking_url','https://boxingtrainer.london/contact/');
$O('btl_google_score','5.0');  $O('btl_google_count',52);
$O('btl_google_url','https://share.google/QUETiLFrIFNpZxGsX');
$O('btl_trustpilot_score','4.5');
$O('btl_trustpilot_url','https://uk.trustpilot.com/review/boxingtrainer.london');

/* ---------- header / hero ---------- */
$P('btl_nav_links', [
    ['field_btl_nav_links_label' => 'Training Packages', 'field_btl_nav_links_url' => 'https://boxingtrainer.london/training-packages/'],
    ['field_btl_nav_links_label' => 'About Paul', 'field_btl_nav_links_url' => 'https://boxingtrainer.london/about/'],
    ['field_btl_nav_links_label' => 'Success Stories', 'field_btl_nav_links_url' => 'https://boxingtrainer.london/successful-stories/'],
    ['field_btl_nav_links_label' => 'Areas Covered', 'field_btl_nav_links_url' => 'https://boxingtrainer.london/areas-covered/'],
    ['field_btl_nav_links_label' => 'Gift Vouchers', 'field_btl_nav_links_url' => 'https://boxingtrainer.london/boxing-training-gift-vouchers/'],
]);
$P('btl_hero_image', btl_img('hero.jpg', $img_dir, 'Paul Carroll, boxing personal trainer, coaching 1-to-1 padwork in London'));
$P('btl_hero_h1_main', 'Boxing Personal Trainer');
$P('btl_hero_h1_accent', 'London');
$P('btl_hero_tagline', 'Paul Carroll — Champion coach. Real 1-to-1 training.');
$P('btl_hero_lead', 'Private boxing personal training at your home, park or office across London. Coached by a former British University Heavyweight Champion with 25+ years\' experience.');
$P('btl_hero_cta_label', 'Book a session');
$P('btl_hero_cta_url', 'https://boxingtrainer.london/contact/');

/* ---------- press ---------- */
$P('btl_press_logos', [
    ['field_btl_press_logos_logo' => btl_img('logo-hello.svg', $img_dir, 'HELLO! Magazine feature'), 'field_btl_press_logos_url' => 'https://www.hellomagazine.com/fashion/celebrity-style/504198/geri-halliwell-horner-tiny-shorts-vest/', 'field_btl_press_logos_alt' => 'HELLO! Magazine feature'],
    ['field_btl_press_logos_logo' => btl_img('logo-womens-health.svg', $img_dir, 'Women\'s Health feature'), 'field_btl_press_logos_url' => 'https://www.womenshealthmag.com/uk/fitness/strength-training/a70220953/geri-horner-workout/', 'field_btl_press_logos_alt' => 'Women\'s Health feature'],
    ['field_btl_press_logos_logo' => btl_img('logo-daily-express.svg', $img_dir, 'Daily Express feature'), 'field_btl_press_logos_url' => '', 'field_btl_press_logos_alt' => 'Daily Express feature'],
]);

/* ---------- credentials ---------- */
$P('btl_credentials', [
    ['field_btl_credentials_big' => '25+', 'field_btl_credentials_title' => 'Years coaching', 'field_btl_credentials_text' => 'Tens of thousands of hours of real 1-to-1 coaching across London.'],
    ['field_btl_credentials_big' => 'CHAMP', 'field_btl_credentials_title' => 'British University Heavyweight Champion', 'field_btl_credentials_text' => 'Elite ring experience and proven technique.'],
    ['field_btl_credentials_big' => 'GB', 'field_btl_credentials_title' => 'Team GB decathlete', 'field_btl_credentials_text' => 'International 10-event background in speed, power and endurance.'],
    ['field_btl_credentials_big' => 'BSc', 'field_btl_credentials_title' => 'Sport Science', 'field_btl_credentials_text' => 'Science-backed programming built around your goals and level.'],
]);

/* ---------- training ---------- */
$P('btl_training_heading', 'One coach. Four ways to train.');
$P('btl_training_intro', 'Choose a starting point. Every session is still built around your goals, fitness level and experience.');
$P('btl_pathways', [
    ['field_btl_pathways_image' => btl_img('img-coaching.png', $img_dir, 'Beginner Boxing'), 'field_btl_pathways_badge' => 'Start here', 'field_btl_pathways_title' => 'Beginner Boxing', 'field_btl_pathways_text' => 'Start from zero. Learn stance, footwork, padwork and combinations safely — ideal for complete beginners, nervous first-timers, women, children and teens.', 'field_btl_pathways_button_label' => 'Beginners guide', 'field_btl_pathways_button_url' => 'https://boxingtrainer.london/boxing-for-beginners/'],
    ['field_btl_pathways_image' => btl_img('img-padwork.png', $img_dir, '1-to-1 Boxing Coaching'), 'field_btl_pathways_badge' => 'Most popular', 'field_btl_pathways_title' => '1-to-1 Boxing Coaching', 'field_btl_pathways_text' => 'Private coaching for technique, padwork, confidence, self-defence, white-collar preparation, fitness and long-term progress.', 'field_btl_pathways_button_label' => 'View 1-to-1 coaching', 'field_btl_pathways_button_url' => 'https://boxingtrainer.london/learn-to-box-with-a-coach/'],
    ['field_btl_pathways_image' => btl_img('img-sparring.png', $img_dir, 'Corporate & Group'), 'field_btl_pathways_badge' => 'Teams & events', 'field_btl_pathways_title' => 'Corporate & Group', 'field_btl_pathways_text' => 'Boxing sessions for offices, teams, small groups, events and workplace wellbeing across London.', 'field_btl_pathways_button_label' => 'Corporate training', 'field_btl_pathways_button_url' => 'https://boxingtrainer.london/corporate-boxing-training-london/'],
    ['field_btl_pathways_image' => btl_img('img-hoodie.png', $img_dir, 'Mobile & Online Training'), 'field_btl_pathways_badge' => 'We come to you', 'field_btl_pathways_title' => 'Mobile & Online Training', 'field_btl_pathways_text' => 'Train at home, in parks, offices, hotel gyms or online with live boxing coaching built around your schedule.', 'field_btl_pathways_button_label' => 'Mobile training', 'field_btl_pathways_button_url' => 'https://boxingtrainer.london/mobile-boxing-trainer-we-come-to-you/'],
]);
$P('btl_svc_title', 'Popular training options');
$P('btl_svc_links', [
    ['field_btl_svc_links_label' => 'Boxing for Beginners', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/boxing-for-beginners/'],
    ['field_btl_svc_links_label' => '1-to-1 Boxing Training London', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/one-to-one-boxing-london/'],
    ['field_btl_svc_links_label' => 'Mobile Boxing Trainer', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/mobile-boxing-trainer-we-come-to-you/'],
    ['field_btl_svc_links_label' => 'Boxing Classes London', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/boxing-classes-london/'],
    ['field_btl_svc_links_label' => 'Women\'s Boxing', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/womens-boxing-london/'],
    ['field_btl_svc_links_label' => 'Kids Boxing', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/boxing-lessons-for-children/'],
    ['field_btl_svc_links_label' => 'Self-Defence', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/london-self-defence-trainer/'],
    ['field_btl_svc_links_label' => 'Boxing for Weight Loss', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/best-exercise-for-weight-loss/'],
    ['field_btl_svc_links_label' => 'Boxing & Mental Health', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/case-studies/boxing-and-mental-health/'],
    ['field_btl_svc_links_label' => 'White Collar Boxing', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/white-collar-boxing-london/'],
    ['field_btl_svc_links_label' => 'Corporate Boxing', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/corporate-boxing-training-london/'],
    ['field_btl_svc_links_label' => 'Online Personal Training', 'field_btl_svc_links_url' => 'https://boxingtrainer.london/online-personal-training/'],
]);

/* ---------- who ---------- */
$P('btl_who_heading', 'Training built around you');
$P('btl_who_cards', [
    ['field_btl_who_cards_title' => 'Complete beginners', 'field_btl_who_cards_text' => 'No experience needed — most clients start from zero in a supportive 1-to-1 setting.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/boxing-for-beginners/'],
    ['field_btl_who_cards_title' => 'Busy professionals', 'field_btl_who_cards_text' => 'Sessions that fit your schedule, at your home, office or nearby park.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/mobile-boxing-trainer-we-come-to-you/'],
    ['field_btl_who_cards_title' => 'Children & teenagers', 'field_btl_who_cards_text' => 'Age-appropriate coaching that builds fitness, confidence and discipline.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/boxing-lessons-for-children/'],
    ['field_btl_who_cards_title' => 'Couples & friends', 'field_btl_who_cards_text' => 'Train together and share the motivation — and the padwork.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/couples-boxing-training-london/'],
    ['field_btl_who_cards_title' => 'Weight loss & fitness', 'field_btl_who_cards_text' => 'Boxing-led sessions that burn fat and build real conditioning.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/best-exercise-for-weight-loss/'],
    ['field_btl_who_cards_title' => 'Over-40s & over-50s', 'field_btl_who_cards_text' => 'Smart, sport-science-based programming adapted to your body and goals.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/personal-training-in-london/'],
    ['field_btl_who_cards_title' => 'White-collar boxers', 'field_btl_who_cards_text' => 'Structured technical training for professionals who want to box properly.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/white-collar-boxing-london/'],
    ['field_btl_who_cards_title' => 'Corporate clients', 'field_btl_who_cards_text' => 'Team bootcamps and events that deliver energy, focus and stress relief.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/corporate-boxing-training-london/'],
    ['field_btl_who_cards_title' => 'Nervous first-timers', 'field_btl_who_cards_text' => 'No crowded gyms, no pressure — just private coaching at your pace.', 'field_btl_who_cards_url' => 'https://boxingtrainer.london/first-boxing-session-london/'],
]);
$P('btl_who_wide_title', 'Neurodivergent children & adults');
$P('btl_who_wide_text', 'Paul also works with neurodivergent children, young people and adults — including boxing mentoring delivered with large charities across London.');
$P('btl_who_wide_link_label', 'Boxing mentoring for young people');
$P('btl_who_wide_link_url', 'https://boxingtrainer.london/boxing-mentoring-for-young-people-in-london/');

/* ---------- video ---------- */
$P('btl_video_heading', 'Training Geri Halliwell-Horner');
$P('btl_video_youtube', 'https://www.youtube.com/watch?v=1UGr5HpjaPc');
$P('btl_video_poster', btl_img('geri-video-thumbnail.jpg', $img_dir, '1-to-1 session with Paul'));
$P('btl_video_small', 'As featured in HELLO! & Women\'s Health');
$P('btl_video_caption', '1-to-1 session with Paul');
$P('btl_video_text', 'Paul coaches high-profile clients including <b>Geri Halliwell-Horner</b> — the same real 1-to-1 boxing training available to every client, delivered with performance, privacy and results in mind. <a href="https://www.youtube.com/watch?v=1UGr5HpjaPc">Watch the full training video</a>.');

/* ---------- quote ---------- */
$P('btl_quote_main', 'One session with Paul was worth ten training in');
$P('btl_quote_accent', 'that altar of self-deception — the gym.');
$P('btl_quote_name', 'Duncan Craig');
$P('btl_quote_source', 'Daily Express, Boxing Day feature, Hyde Park London');

/* ---------- testimonials ---------- */
$P('btl_testi_heading', 'Trusted by beginners,\nprofessionals & names you know');
$P('btl_testimonials', [
    ['field_btl_testimonials_stars' => 5, 'field_btl_testimonials_quote' => 'I have been Training with Paul for 7 years and it has been a total game-changer for my fitness and confidence! I love boxing and Paul made every session fun, challenging, and perfectly tailored to my level. His coaching is clear, professional, and incredibly motivating. The outdoor setting adds an extra boost of energy to the workouts, and I always leave feeling stronger and more confident.', 'field_btl_testimonials_name' => 'Alessandra Congiu', 'field_btl_testimonials_meta' => 'Google Reviews'],
    ['field_btl_testimonials_stars' => 5, 'field_btl_testimonials_quote' => 'I really enjoyed my 20 sessions with Paul. I learned a lot as he was able to highly adapt the sessions based on what I needed, while healthily pushing me to improve quickly! Highly recommend!', 'field_btl_testimonials_name' => 'Marc Medlej', 'field_btl_testimonials_meta' => 'Trustpilot'],
    ['field_btl_testimonials_stars' => 5, 'field_btl_testimonials_quote' => 'I\'ve been training with Paul for five months and would recommend him. I\'ve got fitter and stronger and picked up proper boxing technique, and the sessions have been good for my mental health too — a solid way to clear my head each week. He knows his stuff and pushes you the right amount without overdoing it.', 'field_btl_testimonials_name' => 'Aakanksha Mohan', 'field_btl_testimonials_meta' => 'Google Reviews'],
]);
$P('btl_celebrity_line', 'High-profile clients include <b>Geri Halliwell-Horner</b>, <b>Ben Shephard</b> and <b>Anthony Costa</b>.');
$P('btl_success_url', 'https://boxingtrainer.london/successful-stories/');

/* ---------- first session ---------- */
$P('btl_first_heading', 'Friendly, structured and built around you');
$P('btl_first_text', 'No boxing experience is needed. Your first boxing personal training session is relaxed and welcoming — Paul adapts everything to your goals, fitness level and confidence, so you leave feeling capable, not overwhelmed.');
$P('btl_first_points', [
    ['field_btl_first_points_bold' => 'Friendly and no-pressure', 'field_btl_first_points_rest' => 'a proper introduction, not a test'],
    ['field_btl_first_points_bold' => 'Structured from minute one', 'field_btl_first_points_rest' => 'warm-up, technique, padwork, cool-down'],
    ['field_btl_first_points_bold' => 'Beginner-friendly', 'field_btl_first_points_rest' => 'most clients start with zero experience'],
    ['field_btl_first_points_bold' => 'Adapted to you', 'field_btl_first_points_rest' => 'goals, fitness level and confidence all considered'],
]);

/* ---------- about ---------- */
$P('btl_about_heading', 'Paul Carroll');
$P('btl_about_image', btl_img('paul.jpg', $img_dir, 'Paul Carroll — founder of Boxing Trainer London'));
$P('btl_about_lead', 'One of London\'s first trainers to integrate boxing into personal training — coaching everyone from complete beginners to CEOs and household names.');
$P('btl_about_creds', [
    ['field_btl_about_creds_bold' => 'British University Heavyweight Boxing Champion', 'field_btl_about_creds_rest' => 'elite ring experience'],
    ['field_btl_about_creds_bold' => 'Former Team GB international decathlete', 'field_btl_about_creds_rest' => 'speed, power, endurance'],
    ['field_btl_about_creds_bold' => 'BSc (Hons) Sport Science', 'field_btl_about_creds_rest' => 'programming built on evidence'],
]);
$P('btl_about_chips_title', 'More than boxing');
$P('btl_about_chips', [
    ['field_btl_about_chips_label' => 'Personal training'],
    ['field_btl_about_chips_label' => 'Strength'],
    ['field_btl_about_chips_label' => 'Conditioning'],
    ['field_btl_about_chips_label' => 'Fat loss'],
    ['field_btl_about_chips_label' => 'Mobility'],
    ['field_btl_about_chips_label' => 'Posture'],
    ['field_btl_about_chips_label' => 'Confidence'],
    ['field_btl_about_chips_label' => 'Sport-science programming'],
]);
$P('btl_about_cta_label', 'About Paul');
$P('btl_about_cta_url', 'https://boxingtrainer.london/about/');

/* ---------- where / areas ---------- */
$P('btl_where_heading_main', 'Sessions happen');
$P('btl_where_heading_accent', 'wherever suits you');
$P('btl_where_items', [
    ['field_btl_where_items_label' => 'Your home'],
    ['field_btl_where_items_label' => 'Local parks'],
    ['field_btl_where_items_label' => 'Offices'],
    ['field_btl_where_items_label' => 'Hotel gyms'],
    ['field_btl_where_items_label' => 'Private spaces'],
    ['field_btl_where_items_label' => 'Online'],
]);
$P('btl_areas_heading', 'Mobile coaching across London');
$P('btl_areas_intro', 'Covering Central, South, East and West London — Paul comes to you, or coaches you online wherever you are.');
$P('btl_area_links', [
    ['field_btl_area_links_label' => 'Bexley & Dartford', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-training-in-bexley-dartford/'],
    ['field_btl_area_links_label' => 'Canary Wharf', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-training-canary-wharf/'],
    ['field_btl_area_links_label' => 'Clapham', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-training-in-clapham/'],
    ['field_btl_area_links_label' => 'Chelsea & Knightsbridge', 'field_btl_area_links_url' => 'https://boxingtrainer.london/best-personal-trainer-chelsea-knightsbridge/'],
    ['field_btl_area_links_label' => 'Bromley', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-training-in-bromley/'],
    ['field_btl_area_links_label' => 'Blackheath', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-training-blackheath/'],
    ['field_btl_area_links_label' => 'Battersea', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-trainer-battersea/'],
    ['field_btl_area_links_label' => 'Notting Hill', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-personal-trainer-notting-hill/'],
    ['field_btl_area_links_label' => 'Mayfair & Marylebone', 'field_btl_area_links_url' => 'https://boxingtrainer.london/boxing-in-mayfair-marylebone/'],
]);
$P('btl_areas_all_label', 'All areas covered →');
$P('btl_areas_all_url', 'https://boxingtrainer.london/areas-covered/');

/* ---------- guides ---------- */
$P('btl_guides_heading', 'Boxing & training guides');
$P('btl_guides_browse_label', 'Browse all guides');
$P('btl_guides_browse_url', 'https://boxingtrainer.london/blog/');
$P('btl_featured_guides', [
    ['field_btl_featured_guides_image' => btl_img('guide-1.jpg', $img_dir, 'Cost of a Personal Trainer in London'), 'field_btl_featured_guides_category' => 'Pricing · Updated for 2026', 'field_btl_featured_guides_title' => 'Cost of a Personal Trainer in London', 'field_btl_featured_guides_text' => 'A full price breakdown so you can compare coaches and choose the right option for your goals.', 'field_btl_featured_guides_url' => 'https://boxingtrainer.london/cost-of-a-personal-trainer-in-london/'],
    ['field_btl_featured_guides_image' => btl_img('guide-2.jpg', $img_dir, 'Best Boxing Trainers in London'), 'field_btl_featured_guides_category' => 'Guide · Updated for 2026', 'field_btl_featured_guides_title' => 'Best Boxing Trainers in London', 'field_btl_featured_guides_text' => 'Private coaching, classes and what to look for when choosing a boxing coach.', 'field_btl_featured_guides_url' => 'https://boxingtrainer.london/best-boxing-trainers-in-london/'],
    ['field_btl_featured_guides_image' => btl_img('guide-3.jpg', $img_dir, 'Your First Boxing Session — What to Expect'), 'field_btl_featured_guides_category' => 'Beginners · Updated for 2026', 'field_btl_featured_guides_title' => 'Your First Boxing Session — What to Expect', 'field_btl_featured_guides_text' => 'How sessions are structured, what to bring and how fast you\'ll progress.', 'field_btl_featured_guides_url' => 'https://boxingtrainer.london/first-boxing-session-london/'],
]);
$P('btl_more_guides_title', 'More guides');
$P('btl_more_guides', [
    ['field_btl_more_guides_label' => 'Best Personal Trainers in London', 'field_btl_more_guides_url' => 'https://boxingtrainer.london/best-personal-trainers-in-london/'],
    ['field_btl_more_guides_label' => 'Boxing and Mental Health', 'field_btl_more_guides_url' => 'https://boxingtrainer.london/boxing-and-mental-health/'],
    ['field_btl_more_guides_label' => 'Boxing Fitness London', 'field_btl_more_guides_url' => 'https://boxingtrainer.london/boxing-classes-london/'],
    ['field_btl_more_guides_label' => 'Women\'s Boxing London', 'field_btl_more_guides_url' => 'https://boxingtrainer.london/womens-boxing-london/'],
    ['field_btl_more_guides_label' => 'Boxing Lessons for Children', 'field_btl_more_guides_url' => 'https://boxingtrainer.london/boxing-lessons-for-children/'],
    ['field_btl_more_guides_label' => 'Couples Boxing Training', 'field_btl_more_guides_url' => 'https://boxingtrainer.london/couples-boxing-training-london/'],
]);

/* ---------- faq / seo / cta / footer ---------- */
$P('btl_faq_heading', 'Boxing Personal Training FAQs');
$P('btl_home_faqs', [
    ['field_btl_home_faqs_question' => 'How much does boxing personal training cost in London?', 'field_btl_home_faqs_answer' => 'Sessions are £75–£95 depending on your location and package, with online training at £65 per session. Package rates are available — see the full breakdown on the Training Packages page.'],
    ['field_btl_home_faqs_question' => 'I\'ve never boxed before — is this suitable for beginners?', 'field_btl_home_faqs_answer' => 'Yes — most clients start as complete beginners. Sessions are 1-to-1, friendly and fully adapted to your fitness level and confidence, so you learn proper technique safely from day one.'],
    ['field_btl_home_faqs_question' => 'Where do sessions take place?', 'field_btl_home_faqs_answer' => 'Wherever suits you: your home, a local park, your office, a hotel gym or a private space across Central, South, East and West London — or live online wherever you are.'],
    ['field_btl_home_faqs_question' => 'Do you come to me?', 'field_btl_home_faqs_answer' => 'Yes. Paul is a mobile boxing trainer and travels to you across London, bringing all the equipment needed for the session.'],
    ['field_btl_home_faqs_question' => 'Can children and teenagers train?', 'field_btl_home_faqs_answer' => 'Yes — age-appropriate 1-to-1 coaching that builds fitness, coordination, confidence and discipline in a safe, supportive way.'],
    ['field_btl_home_faqs_question' => 'Can couples or friends train together?', 'field_btl_home_faqs_answer' => 'Absolutely. Shared sessions are a popular option for couples and friends who want to train together and keep each other motivated.'],
    ['field_btl_home_faqs_question' => 'What is white-collar boxing training?', 'field_btl_home_faqs_answer' => 'Structured technical boxing training for professionals — whether you want to train like a boxer for fitness or prepare properly for a white-collar bout.'],
    ['field_btl_home_faqs_question' => 'Do you offer online training?', 'field_btl_home_faqs_answer' => 'Yes — live 1-to-1 online sessions covering boxing fitness, technique, strength and conditioning, available worldwide at £65 per session.'],
]);
$P('btl_faq_schema_auto', 1);
$P('btl_seo_heading', 'Boxing personal training in London');
$P('btl_seo_content', '<p>Paul Carroll is a London boxing personal trainer, founder of Boxing Trainer London and a former British University Heavyweight Boxing Champion. He provides private <a href="https://boxingtrainer.london/one-to-one-boxing-london/">1-to-1 boxing coaching in London</a> at parks, homes, offices, hotel gyms and private spaces across Central, South, East and West London.</p>\n\n<p>Sessions are designed for beginners, busy professionals, children and teenagers, couples, white-collar boxers and anyone who wants expert coaching without joining a crowded boxing gym — focused on <a href="https://boxingtrainer.london/the-benefits-of-boxing-training/">boxing fitness</a>, technique, padwork, footwork, defence, strength, weight loss, confidence, stress relief and real results.</p>');
$P('btl_cta_heading', 'Ready to put the gloves on?');
$P('btl_cta_text', 'Now welcoming new clients for 1-to-1 boxing personal training across London.');
$P('btl_cta_label', 'Book your 1-to-1 session');
$P('btl_cta_url', 'https://boxingtrainer.london/contact/');
$P('btl_footer_blurb', 'Indoor and outdoor 1-to-1 boxing personal training across London, run by Paul Carroll — former British University Heavyweight Champion.');
$P('btl_footer_site_links', [
    ['field_btl_footer_site_links_label' => 'Training Packages', 'field_btl_footer_site_links_url' => 'https://boxingtrainer.london/training-packages/'],
    ['field_btl_footer_site_links_label' => 'Success Stories', 'field_btl_footer_site_links_url' => 'https://boxingtrainer.london/successful-stories/'],
    ['field_btl_footer_site_links_label' => 'Areas Covered', 'field_btl_footer_site_links_url' => 'https://boxingtrainer.london/areas-covered/'],
    ['field_btl_footer_site_links_label' => 'Gift Vouchers', 'field_btl_footer_site_links_url' => 'https://boxingtrainer.london/boxing-training-gift-vouchers/'],
    ['field_btl_footer_site_links_label' => 'Fitness Blog', 'field_btl_footer_site_links_url' => 'https://boxingtrainer.london/blog'],
    ['field_btl_footer_site_links_label' => 'Contact', 'field_btl_footer_site_links_url' => 'https://boxingtrainer.london/contact'],
]);
$P('btl_footer_training_links', [
    ['field_btl_footer_training_links_label' => 'Boxing for Beginners', 'field_btl_footer_training_links_url' => 'https://boxingtrainer.london/boxing-for-beginners/'],
    ['field_btl_footer_training_links_label' => 'Mobile Boxing Trainer', 'field_btl_footer_training_links_url' => 'https://boxingtrainer.london/mobile-boxing-trainer-we-come-to-you/'],
    ['field_btl_footer_training_links_label' => 'White Collar Boxing', 'field_btl_footer_training_links_url' => 'https://boxingtrainer.london/white-collar-boxing-london/'],
    ['field_btl_footer_training_links_label' => 'Corporate Boxing', 'field_btl_footer_training_links_url' => 'https://boxingtrainer.london/corporate-boxing-training-london/'],
    ['field_btl_footer_training_links_label' => 'Online Personal Training', 'field_btl_footer_training_links_url' => 'https://boxingtrainer.london/online-personal-training/'],
]);

WP_CLI::success("Homepage #$page_id seeded with the approved mockup content.");