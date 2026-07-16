<?php
/**
 * Boxing Trainer London — Homepage 2026 ACF fields
 * Loaded by the BTL Homepage plugin (btl-homepage.php). Do not include from the theme.
 *
 * - PHP-registered (version-controlled), prefixed btl_ to avoid collisions with existing field groups.
 * - One field group with tabs per section, assigned to btl-home-2026.php.
 * - Options page for site-wide values (reviews, contact) used in several places.
 * - FAQ schema auto-generation is toggleable per Paul's manual-AIOSEO workflow.
 */

if (!function_exists('acf_add_local_field_group')) return;

/* ---------- helpers ---------- */
function btl_f(string $key, string $label, string $type = 'text', array $extra = []): array {
    return array_merge([
        'key'   => "field_{$key}",
        'label' => $label,
        'name'  => $key,
        'type'  => $type,
    ], $extra);
}
function btl_tab(string $key, string $label): array {
    return ['key' => "field_tab_{$key}", 'label' => $label, 'type' => 'tab', 'placement' => 'left'];
}
function btl_rep(string $key, string $label, array $sub, array $extra = []): array {
    return btl_f($key, $label, 'repeater', array_merge([
        'layout' => 'row', 'button_label' => 'Add item', 'sub_fields' => $sub,
    ], $extra));
}

/* ---------- options page: site-wide settings ---------- */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Site-wide Settings — reviews & contact',
        'menu_title' => 'Site-wide Settings',
        'menu_slug'  => 'btl-global',
        'capability' => 'edit_pages',
        'redirect'   => false,
    ]);
}

acf_add_local_field_group([
    'key'    => 'group_btl_global',
    'title'  => 'Site-wide values (used across the site)',
    'fields' => [
        btl_f('btl_phone_display',   'Phone (display)', 'text', ['default_value' => '07790 210 031']),
        btl_f('btl_phone_tel',       'Phone (tel: link format)', 'text', ['default_value' => '07790210031']),
        btl_f('btl_whatsapp_url',    'WhatsApp link', 'url', ['default_value' => 'https://wa.me/447790210031']),
        btl_f('btl_email',           'Email', 'email', ['default_value' => 'boxingtrainerlondon@icloud.com']),
        btl_f('btl_booking_url',     'Booking / enquiry URL (used by all "Book" buttons)', 'url',
              ['default_value' => 'https://boxingtrainer.london/contact/']),
        btl_f('btl_google_score',    'Google review score', 'text', ['default_value' => '5.0']),
        btl_f('btl_google_count',    'Google review count', 'number', ['default_value' => 52]),
        btl_f('btl_google_url',      'Google reviews link', 'url',
              ['default_value' => 'https://share.google/QUETiLFrIFNpZxGsX']),
        btl_f('btl_trustpilot_score','Trustpilot score', 'text', ['default_value' => '4.5']),
        btl_f('btl_trustpilot_url',  'Trustpilot link', 'url',
              ['default_value' => 'https://uk.trustpilot.com/review/boxingtrainer.london']),
    ],
    'location' => [[[ 'param' => 'options_page', 'operator' => '==', 'value' => 'btl-global' ]]],
]);

/* ---------- homepage field group ---------- */
acf_add_local_field_group([
    'key'    => 'group_btl_home_2026',
    'title'  => 'Homepage 2026 content',
    'fields' => [

        btl_tab('btl_hero', 'Hero'),
        btl_f('btl_hero_image', 'Hero background image', 'image', ['return_format' => 'id', 'preview_size' => 'medium',
              'instructions' => 'Landscape, min 2400px wide. Subject centre-right; headline sits on the left.']),
        btl_f('btl_hero_h1_main',   'H1 — main part', 'text', ['default_value' => 'Boxing Personal Trainer']),
        btl_f('btl_hero_h1_accent', 'H1 — orange part', 'text', ['default_value' => 'London']),
        btl_f('btl_hero_tagline',   'Tagline', 'text', ['default_value' => 'Paul Carroll — Champion coach. Real 1-to-1 training.']),
        btl_f('btl_hero_lead',      'Lead paragraph', 'textarea', ['rows' => 3, 'default_value' =>
              "Private boxing personal training at your home, park or office across London. Coached by a former British University Heavyweight Champion with 25+ years' experience."]),
        btl_f('btl_hero_cta_label', 'Primary button label', 'text', ['default_value' => 'Book your 1-to-1 session']),
        btl_f('btl_hero_cta_url',   'Primary button URL (blank = site-wide booking URL)', 'url'),

        btl_tab('btl_press', 'As featured in'),
        btl_rep('btl_press_logos', 'Media logos', [
            btl_f('logo', 'Logo file (SVG/PNG)', 'image', ['return_format' => 'array']),
            btl_f('url',  'Link to coverage (blank = links to quote section)', 'url'),
            btl_f('alt',  'Alt text', 'text'),
        ]),

        btl_tab('btl_creds', 'Credentials strip'),
        btl_rep('btl_credentials', 'Credential blocks', [
            btl_f('big',   'Big text (e.g. 25+, CHAMP, GB, BSc)', 'text'),
            btl_f('title', 'Title', 'text'),
            btl_f('text',  'Short text', 'textarea', ['rows' => 2]),
        ], ['min' => 4, 'max' => 4]),

        btl_tab('btl_training', 'Training options'),
        btl_f('btl_training_intro', 'Intro line', 'text', ['default_value' =>
              'Choose a starting point. Every session is still built around your goals, fitness level and experience.']),
        btl_rep('btl_pathways', 'Pathway cards', [
            btl_f('image',        'Card image', 'image', ['return_format' => 'id']),
            btl_f('badge',        'Corner badge (e.g. Start here)', 'text'),
            btl_f('title',        'Title', 'text'),
            btl_f('text',         'Text', 'textarea', ['rows' => 3]),
            btl_f('button_label', 'Button label', 'text'),
            btl_f('button_url',   'Button URL', 'url'),
        ], ['min' => 4, 'max' => 4]),
        btl_f('btl_svc_title', '"Popular training options" heading', 'text', ['default_value' => 'Popular training options']),
        btl_rep('btl_svc_links', 'Popular training links', [
            btl_f('label', 'Label', 'text'),
            btl_f('url',   'URL', 'url'),
        ]),

        btl_tab('btl_who', 'Who this is for'),
        btl_rep('btl_who_cards', 'Audience cards (clickable)', [
            btl_f('title', 'Title', 'text'),
            btl_f('text',  'Text', 'textarea', ['rows' => 2]),
            btl_f('url',   'Card links to', 'url'),
        ]),
        btl_f('btl_who_wide_title', 'Highlight card — title', 'text',
              ['default_value' => 'Neurodivergent children & adults']),
        btl_f('btl_who_wide_text', 'Highlight card — text', 'textarea', ['rows' => 2, 'default_value' =>
              'Paul also works with neurodivergent children, young people and adults — including boxing mentoring delivered with large charities across London.']),
        btl_f('btl_who_wide_link_label', 'Highlight card — link label', 'text',
              ['default_value' => 'Boxing mentoring for young people']),
        btl_f('btl_who_wide_link_url', 'Highlight card — link URL', 'url',
              ['default_value' => 'https://boxingtrainer.london/boxing-mentoring-for-young-people-in-london/']),

        btl_tab('btl_video', 'Featured video'),
        btl_f('btl_video_heading', 'Section heading', 'text', ['default_value' => 'Training Geri Halliwell-Horner']),
        btl_f('btl_video_youtube', 'YouTube URL', 'url', ['default_value' => 'https://www.youtube.com/watch?v=1UGr5HpjaPc']),
        btl_f('btl_video_poster',  'Poster image (optional — blank uses the YouTube thumbnail)', 'image', ['return_format' => 'id']),
        btl_f('btl_video_small',   'Small label over video', 'text', ['default_value' => "As featured in HELLO! & Women's Health"]),
        btl_f('btl_video_caption', 'Caption over video', 'text', ['default_value' => '1-to-1 session with Paul']),
        btl_f('btl_video_text',    'Paragraph next to video', 'wysiwyg',
              ['toolbar' => 'basic', 'media_upload' => 0, 'tabs' => 'visual']),

        btl_tab('btl_quote', 'Press quote'),
        btl_f('btl_quote_main',   'Quote — first part', 'textarea', ['rows' => 2,
              'default_value' => 'One session with Paul was worth ten training in']),
        btl_f('btl_quote_accent', 'Quote — orange part', 'text',
              ['default_value' => 'that altar of self-deception — the gym.']),
        btl_f('btl_quote_name',   'Attribution name', 'text', ['default_value' => 'Duncan Craig']),
        btl_f('btl_quote_source', 'Attribution source', 'text',
              ['default_value' => 'Daily Express, Boxing Day feature, Hyde Park London']),

        btl_tab('btl_testi', 'Testimonials'),
        btl_rep('btl_testimonials', 'Testimonials (use real reviews only)', [
            btl_f('stars', 'Stars (1–5)', 'number', ['min' => 1, 'max' => 5, 'default_value' => 5]),
            btl_f('quote', 'Quote (verbatim from the review)', 'textarea', ['rows' => 3]),
            btl_f('name',  'Reviewer name', 'text'),
            btl_f('meta',  'Detail line (e.g. Consultant, Clapham)', 'text'),
        ]),
        btl_f('btl_celebrity_line', 'Celebrity line', 'text', ['default_value' =>
              'High-profile clients include Geri Halliwell-Horner, Ben Shephard and Anthony Costa.']),

        btl_tab('btl_first', 'First session'),
        btl_f('btl_first_heading', 'Heading', 'text', ['default_value' => 'Friendly, structured and built around you']),
        btl_f('btl_first_text', 'Text', 'textarea', ['rows' => 3]),
        btl_rep('btl_first_points', 'Bullet points', [
            btl_f('bold', 'Bold lead-in', 'text'),
            btl_f('rest', 'Rest of line', 'text'),
        ]),

        btl_tab('btl_about', 'About Paul'),
        btl_f('btl_about_image', 'Portrait image', 'image', ['return_format' => 'id']),
        btl_f('btl_about_lead',  'Lead paragraph', 'textarea', ['rows' => 3]),
        btl_rep('btl_about_creds', 'Credential list', [
            btl_f('bold', 'Bold part', 'text'),
            btl_f('rest', 'Rest of line', 'text'),
        ]),
        btl_f('btl_about_chips_title', '"More than boxing" heading', 'text', ['default_value' => 'More than boxing']),
        btl_rep('btl_about_chips', 'Chips', [ btl_f('label', 'Label', 'text') ]),
        btl_f('btl_about_cta_label', 'Button label', 'text', ['default_value' => 'About Paul']),
        btl_f('btl_about_cta_url',   'Button URL', 'url', ['default_value' => 'https://boxingtrainer.london/about/']),

        btl_tab('btl_where', 'Where sessions happen'),
        btl_rep('btl_where_items', 'Location types', [ btl_f('label', 'Label', 'text') ]),

        btl_tab('btl_areas', 'Areas covered'),
        btl_f('btl_areas_intro', 'Intro line', 'textarea', ['rows' => 2]),
        btl_rep('btl_area_links', 'Area links', [
            btl_f('label', 'Label', 'text'),
            btl_f('url',   'URL', 'url'),
        ]),
        btl_f('btl_areas_all_label', '"All areas" label', 'text', ['default_value' => 'All areas covered →']),
        btl_f('btl_areas_all_url',   '"All areas" URL', 'url', ['default_value' => 'https://boxingtrainer.london/areas-covered/']),

        btl_tab('btl_guides', 'Guides'),
        btl_rep('btl_featured_guides', 'Featured guide cards', [
            btl_f('image',    'Image (clean photo, no embedded text)', 'image', ['return_format' => 'id']),
            btl_f('category', 'Category label', 'text'),
            btl_f('title',    'Title', 'text'),
            btl_f('text',     'Text', 'textarea', ['rows' => 2]),
            btl_f('url',      'URL', 'url'),
        ], ['min' => 3, 'max' => 3]),
        btl_f('btl_more_guides_title', '"More guides" heading', 'text', ['default_value' => 'More guides']),
        btl_rep('btl_more_guides', 'More guide links', [
            btl_f('label', 'Label', 'text'),
            btl_f('url',   'URL', 'url'),
        ]),

        btl_tab('btl_faq', 'FAQs'),
        btl_f('btl_faq_heading', 'Section heading', 'text', ['default_value' => 'Boxing Personal Training FAQs']),
        btl_rep('btl_home_faqs', 'Questions & answers', [
            btl_f('question', 'Question', 'text'),
            btl_f('answer',   'Answer', 'textarea', ['rows' => 3]),
        ]),
        btl_f('btl_faq_schema_auto', 'Auto-generate FAQ schema from these questions', 'true_false', [
            'ui' => 1, 'default_value' => 1,
            'instructions' => 'ON: FAQPage JSON-LD is generated automatically from the questions above, so the schema always matches the visible FAQs. Turn OFF if you prefer to manage FAQ schema manually in the AIOSEO Custom Schema box (it will never output twice).',
        ]),

        btl_tab('btl_seo', 'SEO content block'),
        btl_f('btl_seo_heading', 'Heading', 'text', ['default_value' => 'Boxing personal training in London']),
        btl_f('btl_seo_content', 'Content (internal links welcome)', 'wysiwyg',
              ['toolbar' => 'basic', 'media_upload' => 0]),

        btl_tab('btl_cta', 'CTA band'),
        btl_f('btl_cta_heading', 'Heading', 'text', ['default_value' => 'Ready to put the gloves on?']),
        btl_f('btl_cta_text',    'Text', 'text',
              ['default_value' => 'Now welcoming new clients for 1-to-1 boxing personal training across London.']),
        btl_f('btl_cta_label',   'Button label', 'text', ['default_value' => 'Book your 1-to-1 session']),
        btl_f('btl_cta_url',     'Button URL (blank = site-wide booking URL)', 'url'),
    ],
    'location' => [[[ 'param' => 'page_template', 'operator' => '==', 'value' => 'btl-home-2026.php' ]]],
    'style'    => 'seamless',
    'hide_on_screen' => ['the_content'],
]);

/* ---------- FAQ schema: auto from the same fields Paul edits, toggleable, duplicate-safe ---------- */
add_filter('aioseo_schema_output', function ($graphs) {
    // Runs wherever the template is used — including the pre-launch staging page,
    // so the Rich Results Test can validate schema before the front-page switch.
    if (!is_page_template('btl-home-2026.php')) return $graphs;
    if (!function_exists('get_field')) return $graphs;
    if (!get_field('btl_faq_schema_auto')) return $graphs;           // Paul's manual-control toggle
    $faqs = get_field('btl_home_faqs');
    if (!$faqs) return $graphs;
    foreach ((array) $graphs as $g) {                                 // never duplicate a FAQPage
        if (is_array($g) && ($g['@type'] ?? '') === 'FAQPage') return $graphs;
    }
    $graphs[] = [
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(static fn($f) => [
            '@type'          => 'Question',
            'name'           => $f['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => wp_strip_all_tags($f['answer'])],
        ], $faqs),
    ];
    return $graphs;
}, 20);
