<?php
/**
 * ============================================================================
 * BTL Training Packages 2026 — content seeder (draft 3, client-approved)
 * ============================================================================
 * Fills every field of the Training Packages page with the approved draft-3
 * content, so the page matches the mockup without manual entry.
 *
 * USAGE (SSH, plugins loaded — do NOT pass --skip-plugins, ACF must be active):
 *
 *   1. Find/confirm the page ID that uses the packages template:
 *        wp post list --post_type=page \
 *          --meta_key=_wp_page_template --meta_value=btl-packages-2026.php \
 *          --fields=ID,post_title,post_status
 *
 *   2. Dry run (prints what it would write, changes nothing):
 *        wp eval-file seed-packages.php <PAGE_ID> dry
 *      (WP-CLI's eval-file rejects unknown --flags, so 'dry' has no dashes.)
 *
 *   3. Real run:
 *        wp eval-file seed-packages.php <PAGE_ID>
 *
 * Safe to re-run: update_field() overwrites, so running twice just re-seeds.
 * It writes ONLY the btl_pkg_* fields; it never touches the page title, slug,
 * template, status, or any AIOSEO/schema settings.
 *
 * Prices are exactly the approved draft-3 figures. Because Paul chose manual
 * pricing, the Schema — Prices & Offers tab is seeded to MATCH the visible
 * cards; when he changes a price later he updates both (per the checklist).
 * ============================================================================
 */

if (!function_exists('update_field')) {
    WP_CLI::error('ACF not loaded. Run without --skip-plugins so update_field() is available.');
}

$args = $args ?? [];
$page_id = isset($args[0]) ? (int) $args[0] : 0;
$dry     = in_array('dry', $args, true) || in_array('--dry', $args, true);

if (!$page_id) {
    WP_CLI::error('Pass the page ID: wp eval-file seed-packages.php <PAGE_ID> [dry]');
}
if (get_post_type($page_id) !== 'page') {
    WP_CLI::error("Post {$page_id} is not a page.");
}
$tpl = get_page_template_slug($page_id);
if ($tpl !== 'btl-packages-2026.php') {
    WP_CLI::warning("Page {$page_id} template is '{$tpl}', not 'btl-packages-2026.php'. Assign the template first, or continue if you know what you're doing.");
}

/* ---------------------------------------------------------------------------
 * The content map. Keys are ACF field NAMES (update_field resolves them on a
 * page that has the field group). Repeaters are arrays of rows.
 * ------------------------------------------------------------------------- */
$data = [

    /* HERO */
    'btl_pkg_hero_h1_main'   => 'Boxing Training Packages',
    'btl_pkg_hero_h1_accent' => 'London',
    'btl_pkg_hero_tagline'   => 'Private · Couples · Small groups · Online',
    'btl_pkg_hero_lead'      => 'Flexible boxing coaching with Paul Carroll — from single 1-to-1 sessions and discounted blocks to couples training, small groups and structured 4, 6 and 12-week programmes. Every plan is adapted to your experience, location and goals.',
    'btl_pkg_hero_cta_label' => 'Book a free consultation',
    'btl_pkg_hero_cta_url'   => '',

    /* PRICE STRIP */
    'btl_pkg_strip_items' => [
        ['big' => '£95', 'title' => 'Pay as you go',           'note' => 'One private 60-minute session, no commitment.'],
        ['big' => '£85', 'title' => 'Per session — block of 10','note' => '£850 for ten private sessions.'],
        ['big' => '£75', 'title' => 'Per session — block of 20','note' => '£1,500 for twenty sessions, gloves included.'],
        ['big' => '£55', 'title' => 'Couples & small groups',   'note' => 'Per person, for two or three people training together.'],
    ],

    /* PROMOTIONS BAND — off by default */
    'btl_pkg_promo_enabled'   => 0,
    'btl_pkg_promo_tag'       => 'Offer',
    'btl_pkg_promo_text'      => '',
    'btl_pkg_promo_btn_label' => '',
    'btl_pkg_promo_btn_url'   => '',
    'btl_pkg_promo_html'      => '',

    /* JUMP NAV */
    'btl_pkg_jumplinks' => [
        ['label' => 'Private packages',      'anchor' => '#private'],
        ['label' => '4, 6 & 12-week programmes', 'anchor' => '#programmes'],
        ['label' => 'Couples, online & corporate', 'anchor' => '#ways'],
        ['label' => "What's included",       'anchor' => '#included'],
        ['label' => 'Gift Vouchers',         'anchor' => '#gift-vouchers'],
        ['label' => 'Package terms',         'anchor' => '#terms'],
        ['label' => 'Trusted professionals', 'anchor' => '#partners'],
        ['label' => 'FAQs',                  'anchor' => '#faqs'],
    ],

    /* PRIVATE PACKAGES */
    'btl_pkg_private_heading' => '1-to-1 boxing packages',
    'btl_pkg_private_intro'   => 'Standard private sessions normally last 60 minutes unless a different arrangement is agreed in advance. Training is adapted to your fitness, experience and goals — padwork, footwork, combinations, defence, conditioning and mobility. No previous boxing experience needed.',
    'btl_pkg_private_cards' => [
        [
            'kicker' => 'Maximum flexibility',
            'title'  => 'Pay as you go',
            'amount' => '£95',
            'per'    => 'Per 60-minute session',
            'desc'   => 'One private session. Ideal for flexible or occasional training, or topping up an existing programme.',
            'benefits' => [
                ['text' => 'Private 1-to-1 coaching'],
                ['text' => 'Tailored to your level'],
                ['text' => 'Mobile training across London'],
            ],
            'button_label' => 'Enquire about a session',
            'button_url'   => '',
            'featured'     => 0,
            'flag'         => '',
        ],
        [
            'kicker' => 'Build consistency',
            'title'  => '10-session package',
            'amount' => '£850',
            'per'    => '£85 per session',
            'desc'   => 'Ten private sessions. A practical choice for improving fitness, technique and confidence through regular coaching.',
            'benefits' => [
                ['text' => '**Save £100** against pay as you go'],
                ['text' => 'Progressive session planning'],
                ['text' => 'Valid for 12 months'],
            ],
            'button_label' => 'Choose 10 sessions',
            'button_url'   => '',
            'featured'     => 0,
            'flag'         => '',
        ],
        [
            'kicker' => 'Lowest private 1-to-1 rate',
            'title'  => '20-session package',
            'amount' => '£1,500',
            'per'    => '£75 per session',
            'desc'   => 'Twenty private sessions. Built for sustained progress, stronger habits and deeper technical development.',
            'benefits' => [
                ['text' => '**Save £400** against pay as you go'],
                ['text' => '**Boxing gloves included**'],
                ['text' => 'Valid for 12 months'],
            ],
            'button_label' => 'Choose 20 sessions',
            'button_url'   => '',
            'featured'     => 1,
            'flag'         => 'Best value',
        ],
    ],

    /* NEW-CLIENT OFFER */
    'btl_pkg_offer_enabled'   => 1,
    'btl_pkg_offer_pct'       => '20%',
    'btl_pkg_offer_heading'   => 'Off your first private session',
    'btl_pkg_offer_body'      => 'New clients can book their first private 1-to-1 boxing session for £76 instead of £95. Available once per person, subject to location and availability. Prepayment is required and the offer cannot be combined with another promotion.',
    'btl_pkg_offer_btn_label' => 'Book Your First Session',
    'btl_pkg_offer_btn_url'   => '',

    /* PROGRAMMES */
    'btl_pkg_prog_heading' => '4, 6 and 12-week training plans',
    'btl_pkg_prog_intro'   => 'Session blocks provide maximum flexibility and the lowest private 1-to-1 session rates. Structured programmes reserve three sessions per week across an agreed period and include planned progression, general nutrition guidance, agreed WhatsApp support and progress reviews.',
    'btl_pkg_prog_cards' => [
        [
            'kicker' => 'Focused four-week start',
            'title'  => 'The Knockout Plan',
            'amount' => '£1,100',
            'spec'   => '4 weeks · 12 private sessions',
            'desc'   => 'A concentrated programme for building momentum, improving conditioning and establishing a productive boxing routine.',
            'features' => [
                ['text' => 'Three private sessions per week'],
                ['text' => 'Boxing, functional fitness and conditioning'],
                ['text' => 'General nutrition guidance and an optional food-diary review'],
                ['text' => 'WhatsApp support at agreed times'],
                ['text' => 'Initial goal and fitness review, plus a final progress review'],
            ],
            'button_label' => 'Discuss the Knockout Plan',
            'button_url'   => '',
            'featured'     => 0,
            'flag'         => '',
        ],
        [
            'kicker' => 'Six weeks of structured progress',
            'title'  => 'The Contender Plan',
            'amount' => '£1,450',
            'spec'   => '6 weeks · 18 private sessions',
            'desc'   => 'Long enough to develop real technique and conditioning, short enough to commit to around a busy schedule — with reviews built in at the start, middle and end.',
            'features' => [
                ['text' => 'Three private sessions per week'],
                ['text' => 'Boxing, functional fitness and conditioning'],
                ['text' => 'General nutrition guidance and an optional food-diary review'],
                ['text' => 'WhatsApp support at agreed times'],
                ['text' => 'Initial, midpoint and final progress reviews'],
            ],
            'button_label' => 'Discuss the Contender Plan',
            'button_url'   => '',
            'featured'     => 1,
            'flag'         => 'Recommended',
        ],
        [
            'kicker' => 'Complete 12-week programme',
            'title'  => "The Champion's Path",
            'amount' => '£2,800',
            'spec'   => '12 weeks · 36 private sessions',
            'desc'   => 'A progressive long-term programme combining boxing technique, fitness and conditioning across three structured phases.',
            'features' => [
                ['text' => 'Three private sessions per week'],
                ['text' => 'Foundation → Progression → Performance phases'],
                ['text' => 'General nutrition guidance and an optional food-diary review'],
                ['text' => 'WhatsApp support at agreed times'],
                ['text' => 'Initial, midpoint and final progress reviews'],
                ['text' => 'End-of-programme review and next-step plan'],
            ],
            'button_label' => "Discuss the Champion's Path",
            'button_url'   => '',
            'featured'     => 0,
            'flag'         => '',
        ],
    ],
    'btl_pkg_prog_fineprint' => 'Programme content is adapted to the client and may vary according to experience, fitness and agreed goals.',

    /* WEDDING CALLOUT */
    'btl_pkg_wed_enabled'   => 1,
    'btl_pkg_wed_heading'   => 'Training for a wedding?',
    'btl_pkg_wed_body'      => "Wedding Knockout programmes are available for individuals and couples, with every plan built around the wedding date, the clients' goals and their current fitness levels. Individual 12-week programmes start from £2,800. Couples can complete a 12-week programme together, including 36 joint sessions, for £4,000 in total. Each programme is planned backwards from the wedding date to provide a clear, structured route towards feeling fitter, stronger and more confident for the day.",
    'btl_pkg_wed_btn_label' => 'Discuss a Wedding Programme',
    'btl_pkg_wed_btn_url'   => '',

    /* WAYS TO TRAIN */
    'btl_pkg_ways_heading' => 'Couples, online & corporate',
    'btl_pkg_ways_cards' => [
        [
            'kicker' => 'Couples and small groups of up to three people',
            'title'  => 'Couples & small groups',
            'amount' => '£55',
            'amount_note' => 'per person, per session',
            'body'   => 'Train with a partner, friend or colleague while still receiving close technical coaching. Shared sessions make private boxing more social, motivating and cost-effective.',
            'bullets' => [
                ['text' => '**£110 total** for two people'],
                ['text' => '**£165 total** for three people'],
                ['text' => 'Maximum of three people per session'],
                ['text' => 'Couples, friends, family and small workplace groups'],
            ],
            'link_label' => 'Ask about shared coaching',
            'link_url'   => 'https://boxingtrainer.london/contact/',
        ],
        [
            'kicker' => 'Live 1-to-1, anywhere',
            'title'  => 'Online coaching',
            'amount' => 'From £65',
            'amount_note' => 'per session',
            'body'   => "Live one-to-one instruction when you can't train with Paul in person — movement, shadowboxing, technique and conditioning, with exercises chosen for your space and equipment.",
            'bullets' => [
                ['text' => 'Free video consultation first'],
                ['text' => 'Home-friendly programming'],
                ['text' => 'Same coaching, no travel'],
            ],
            'link_label' => 'Live online training',
            'link_url'   => 'https://boxingtrainer.london/online-personal-training/',
        ],
        [
            'kicker' => 'Teams & events',
            'title'  => 'Corporate full day',
            'amount' => 'From £800',
            'amount_note' => 'for a full day',
            'body'   => 'An energetic alternative to an ordinary wellbeing or team-building day, adapted for mixed fitness levels — boxing fundamentals, padwork, movement, fitness challenges and team activities.',
            'bullets' => [
                ['text' => 'Venue and timings agreed in advance'],
                ['text' => 'All equipment provided'],
                ['text' => 'Tailored proposal on request'],
            ],
            'link_label' => 'Corporate boxing training',
            'link_url'   => 'https://boxingtrainer.london/corporate-boxing-training-london/',
        ],
    ],

    /* GIFT VOUCHERS */
    'btl_pkg_vouch_enabled'   => 1,
    'btl_pkg_vouch_heading'   => 'Give the gift of boxing training',
    'btl_pkg_vouch_body'      => 'Digital boxing gift vouchers are available for private 1-to-1 sessions and multi-session packages. They are suitable for complete beginners or experienced clients and are valid for 12 months.',
    'btl_pkg_vouch_btn_label' => 'View Gift Vouchers',
    'btl_pkg_vouch_btn_url'   => 'https://boxingtrainer.london/boxing-training-gift-vouchers/',

    /* WHAT'S INCLUDED */
    'btl_pkg_inc_eyebrow' => 'What you receive',
    'btl_pkg_inc_heading' => "What's included",
    'btl_pkg_inc_cards' => [
        ['title' => 'Technique',       'text' => 'Stance, guard, footwork, punches, combinations, defence and movement.'],
        ['title' => 'Fitness',         'text' => 'Boxing conditioning, stamina, coordination, strength, mobility and core work.'],
        ['title' => 'Personalisation', 'text' => 'Training selected for your starting point, confidence, goals and preferred pace.'],
        ['title' => 'Structured programme support', 'text' => 'Clients completing a structured 4, 6 or 12-week programme receive agreed WhatsApp support, general nutrition guidance and scheduled progress reviews.'],
    ],
    'btl_pkg_inc_wide_title'      => 'Mobile coaching across London',
    'btl_pkg_inc_wide_text'       => 'Training can be arranged at suitable parks, homes, offices, hotel gyms, private gyms and private spaces. Location suitability, access and venue requirements are confirmed before booking.',
    'btl_pkg_inc_wide_link_label' => 'Areas covered',
    'btl_pkg_inc_wide_link_url'   => 'https://boxingtrainer.london/areas-covered/',

    /* WHY PAUL */
    'btl_pkg_about_heading' => 'Why train with Paul Carroll?',
    'btl_pkg_about_lead'    => 'Private coaching that combines first-hand boxing experience, athletic conditioning and sport science, with every session adapted to the individual.',
    'btl_pkg_about_creds' => [
        ['bold' => 'Former British Universities Heavyweight Boxing Champion', 'rest' => '— first-hand competitive boxing experience.'],
        ['bold' => 'Former Great Britain international decathlete', 'rest' => '— extensive athletic conditioning experience.'],
        ['bold' => 'BSc (Hons) Sport Science', 'rest' => '— training informed by physiology and sound programming principles.'],
        ['bold' => '25+ years coaching', 'rest' => '— working with beginners, busy professionals, couples, public figures and white-collar boxers.'],
    ],

    /* TERMS */
    'btl_pkg_terms_heading' => 'Booking & package terms',
    'btl_pkg_terms_lead'    => 'Clear terms agreed up front so there are no surprises later. Anything not covered here can be discussed during your free consultation.',
    'btl_pkg_terms_callout_heading' => 'Not sure which package fits?',
    'btl_pkg_terms_callout_body'    => "Book a free consultation by video, phone or WhatsApp. Paul can talk through your experience, location, schedule and goals before recommending anything — there's no need to choose a large package before that conversation.",
    'btl_pkg_terms_items' => [
        ['text' => 'Standard private sessions normally last 60 minutes unless a different arrangement is agreed in advance.'],
        ['text' => 'Session blocks are valid for 12 months from purchase.'],
        ['text' => 'Structured programmes run across their agreed 4, 6 or 12-week period, with the schedule confirmed before they begin.'],
        ['text' => 'Packages are intended for the named client and are non-transferable unless otherwise agreed in writing.'],
        ['text' => "Sessions cancelled with less than 24 hours' notice, or missed without notice, are charged in full or deducted from the prepaid package."],
        ['text' => "Cancellation and refund requests are handled under the full booking terms and do not affect the client's statutory rights."],
        ['text' => 'The new-client offer and other promotions cannot be combined unless specifically stated.'],
        ['text' => 'Training locations must be suitable and agreed in advance.'],
        ['text' => "Programme details may be adapted to the client's experience, fitness and agreed goals."],
    ],

    /* TRUSTED PROFESSIONALS */
    'btl_pkg_partners_heading' => 'Trusted professionals & partners',
    'btl_pkg_partners_intro'   => 'Training can be one part of a wider approach to health, recovery and performance. These are independent professionals and businesses whose work Paul knows through genuine client care or direct collaboration.',
    'btl_pkg_partners_cards' => [
        [
            'category'    => 'Osteopathy',
            'name'        => 'Isabel Kelly',
            'role'        => 'Senior Osteopath at Physio On',
            'meta'        => 'Victoria, Marylebone & Battersea, London',
            'description' => "Isabel provides osteopathic care for musculoskeletal conditions, and remained Scott's healthcare professional while his 1-to-1 boxing and fitness programme was adapted around his lower-back arthritis.",
            'quote'       => '"Scott has made great progress since incorporating the boxing routine into his management plan… I am really glad Scott has found someone as experienced as Paul."',
            'quote_cite'  => 'Isabel Kelly, Senior Osteopath',
            'bullets'     => [],
            'links'       => [
                ['label' => 'Visit Physio On', 'url' => 'https://www.physio-on.com/', 'secondary' => 0],
                ['label' => '@osteoisabel',    'url' => 'https://www.instagram.com/osteoisabel/', 'secondary' => 1],
                ['label' => "Read Scott's story", 'url' => 'https://boxingtrainer.london/case-studies/boxing-with-back-arthritis/', 'secondary' => 1],
            ],
        ],
        [
            'category'    => 'Website design & development',
            'name'        => 'Pablo Rica',
            'role'        => 'Website developer for Boxing Trainer London',
            'meta'        => 'Website design, development & WordPress CMS',
            'description' => "Pablo designed and developed the 2026 Boxing Trainer London website, translating the established brand into a more modern experience while keeping the content manageable through WordPress.",
            'quote'       => '',
            'quote_cite'  => '',
            'bullets'     => [
                ['text' => 'Custom homepage design and responsive development'],
                ['text' => 'Editable WordPress content structure'],
                ['text' => "Implementation shaped around the site's existing SEO content"],
            ],
            'links'       => [
                ['label' => 'Visit Codigo', 'url' => 'https://codigo.co.uk/', 'secondary' => 0],
            ],
        ],
    ],
    'btl_pkg_partners_note' => 'All professionals and businesses listed here operate independently from Boxing Trainer London. Please contact them directly to discuss suitability, services, availability and fees. Boxing Trainer London provides fitness coaching and does not diagnose or treat medical conditions.',

    /* FAQs */
    'btl_pkg_faq_heading' => 'Boxing packages — FAQs',
    'btl_pkg_faqs' => [
        ['question' => 'How much does private boxing training cost in London?', 'answer' => 'Private 60-minute boxing coaching costs £95 pay as you go, £850 for a block of 10 sessions, or £1,500 for a block of 20. The 20-session block brings the price down to £75 per session, the lowest regular private 1-to-1 rate.'],
        ['question' => 'Is there a new-client offer?', 'answer' => 'Yes. New clients can book their first private 1-to-1 boxing session with 20% off, reducing the standard £95 price to £76. The offer is available once per person, requires prepayment, is subject to location and availability and cannot be combined with another offer. It does not apply to couples or small-group sessions.'],
        ['question' => 'Are these packages suitable for complete beginners?', 'answer' => 'Yes. Most clients start without any previous boxing experience. The pace, exercises and technical detail are adapted to your fitness and confidence, with a strong focus on safe fundamentals. See the <a href="https://boxingtrainer.london/boxing-for-beginners/">beginners\' guide</a>.'],
        ['question' => 'Where can personal boxing sessions take place?', 'answer' => 'Sessions can be arranged at suitable parks, homes, offices, hotel gyms, private gyms and private spaces across London. The proposed location must be suitable and agreed before training begins.'],
        ['question' => 'What is the difference between a session block and a structured programme?', 'answer' => "Session blocks give you the most flexibility and the lowest private 1-to-1 session rates, used whenever suits you within 12 months. Structured programmes — the Knockout Plan over four weeks, the Contender Plan over six weeks and the Champion's Path over 12 weeks — reserve three sessions per week across an agreed period and add planned progression, general nutrition guidance, agreed WhatsApp support and scheduled progress reviews."],
        ['question' => 'What is included in the structured programmes?', 'answer' => "All three programmes include three private sessions per week, boxing and conditioning work, general nutrition guidance with an optional food-diary review, WhatsApp support at agreed times, and an initial goal and fitness review with a final progress review. The Contender Plan and Champion's Path also include a midpoint review, and the Champion's Path progresses through foundation, progression and performance phases before an end-of-programme review and next-step plan."],
        ['question' => 'How long do I have to use a session block?', 'answer' => 'Session blocks are valid for 12 months from the date of purchase, giving you flexibility to arrange training around work, travel and other commitments. Structured programmes instead run across their agreed 4, 6 or 12-week period, with the schedule confirmed before they begin.'],
        ['question' => 'Can I share or transfer my boxing package?', 'answer' => 'Packages are intended for the named client and are non-transferable unless otherwise agreed in writing. Separate <a href="https://boxingtrainer.london/boxing-training-gift-vouchers/">boxing training gift vouchers</a> are available when buying training for someone else.'],
        ['question' => 'What happens if I cancel a session?', 'answer' => "Sessions cancelled with less than 24 hours' notice, or missed without notice, are charged in full or deducted from the prepaid package. Cancellation and refund requests are handled under the full booking terms and do not affect your statutory rights."],
        ['question' => 'Can I train with a partner or small group?', 'answer' => "Yes. Couples and small groups of up to three people can train together for £55 per person per session. This is £110 total for two people or £165 total for three people. Training is adapted to the group's experience and goals."],
        ['question' => 'Do you offer online boxing coaching?', 'answer' => 'Yes. Private one-to-one online coaching starts from £65. Sessions can cover movement, shadowboxing, technique, fitness and conditioning using the space and equipment available to you.'],
        ['question' => 'Do you offer gift vouchers?', 'answer' => 'Yes. Digital gift vouchers are available for private 1-to-1 sessions and multi-session packages, are suitable for beginners and experienced clients alike, and are valid for 12 months. See the <a href="https://boxingtrainer.london/boxing-training-gift-vouchers/">boxing training gift vouchers</a> page.'],
        ['question' => 'Do I need to pay before choosing a package?', 'answer' => 'No. You can arrange a free consultation by video, phone or WhatsApp to discuss your goals, location and schedule before deciding which package is right.'],
    ],
    'btl_pkg_faq_schema_auto' => 1,

    /* SEO BOTTOM BLOCK */
    'btl_pkg_seo_heading' => 'Boxing training packages across London',
    'btl_pkg_seo_content' =>
        '<p>Paul Carroll provides mobile <a href="https://boxingtrainer.london/one-to-one-boxing-london/">one-to-one boxing coaching in London</a> at suitable parks, homes, offices, hotel gyms and private spaces. Sessions suit complete beginners, fitness clients, couples, busy professionals, white-collar boxers and anyone working towards a defined transformation goal.</p>' . "\n" .
        '<p>Session blocks offer the most flexibility and the lowest private 1-to-1 rates: £95 pay as you go, £850 for ten sessions and £1,500 for twenty. New clients can take 20% off a first private session, bringing it to £76.</p>' . "\n" .
        '<p>For a structured period of training, the Knockout Plan runs over four weeks, the Contender Plan over six weeks and the Champion\'s Path over 12 weeks, each reserving three sessions per week with planned progression and scheduled reviews. Date-led wedding programmes are available separately for individuals or couples.</p>' . "\n" .
        '<p>Couples and small groups of two or three people train together at £55 per person per session, online coaching starts from £65, and full corporate days start from £800.</p>' . "\n" .
        '<p>Not sure where to start? The <a href="https://boxingtrainer.london/boxing-for-beginners/">beginner boxing guide</a> introduces the fundamentals, or check the <a href="https://boxingtrainer.london/areas-covered/">areas covered</a> and send Paul your postcode.</p>',

    /* CTA */
    'btl_pkg_cta_heading' => 'Start with a free consultation',
    'btl_pkg_cta_text'    => 'Talk to Paul about your goals, location and the package that fits your schedule.',
    'btl_pkg_cta_label'   => 'Book a free consultation',
    'btl_pkg_cta_url'     => '',

    /* SCHEMA — PRICES & OFFERS (seeded to match the visible cards) */
    'btl_pkg_schema_enabled'  => 1,
    'btl_pkg_schema_currency' => 'GBP',
    'btl_pkg_schema_low'      => '65',
    'btl_pkg_schema_high'     => '4000',
    'btl_pkg_schema_offers' => [
        ['name' => 'Pay as you go (single session)', 'price' => '95'],
        ['name' => '10-session package',            'price' => '850'],
        ['name' => '20-session package',            'price' => '1500'],
        ['name' => 'The Knockout Plan (4 weeks)',   'price' => '1100'],
        ['name' => 'The Contender Plan (6 weeks)',  'price' => '1450'],
        ['name' => "The Champion's Path (12 weeks)",'price' => '2800'],
        ['name' => 'Online coaching (per session)', 'price' => '65'],
        ['name' => 'Corporate full day',            'price' => '800'],
    ],
];

/* Images are NOT seeded — attachment IDs differ per environment. Set the hero
   and portrait images by hand in the editor (or pass IDs below if known). */
$skipped_images = ['btl_pkg_hero_image', 'btl_pkg_about_image'];

/* --------------------------------------------------------------------------- */
$count = 0;
foreach ($data as $field => $value) {
    $count++;
    if ($dry) {
        $preview = is_array($value) ? '[' . count($value) . ' row(s)]' : (is_string($value) ? '"' . mb_substr($value, 0, 60) . (mb_strlen($value) > 60 ? '…' : '') . '"' : var_export($value, true));
        WP_CLI::log(sprintf('  %-32s %s', $field, $preview));
        continue;
    }
    update_field($field, $value, $page_id);
}

if ($dry) {
    WP_CLI::success("DRY RUN — {$count} fields would be written to page {$page_id}. Images to set by hand: " . implode(', ', $skipped_images) . '. No changes made.');
} else {
    // Bust ACF's field cache for the page.
    clean_post_cache($page_id);
    WP_CLI::success("Seeded {$count} fields on page {$page_id}. Set the two images by hand ({$skipped_images[0]}, {$skipped_images[1]}), then preview. Remember to purge NitroPack.");
}