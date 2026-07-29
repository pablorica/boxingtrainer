<?php
/**
 * Boxing Trainer London — Homepage 2026 ACF fields
 * Loaded by the BTL Homepage plugin (btl-homepage.php). Do not include from the theme.
 *
 * - PHP-registered (version-controlled), prefixed btl_ to avoid collisions with existing field groups.
 * - One field group with tabs per section, assigned to btl-home-2026.php.
 * - Options page for site-wide values (header nav, footer, contact, reviews) shared by every BTL template.
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
    // Namespace sub-field keys with the parent key: ACF field keys must be globally unique.
    $sub = array_map(function (array $f) use ($key): array {
        $f['key'] = "field_{$key}_{$f['name']}";
        return $f;
    }, $sub);
    return btl_f($key, $label, 'repeater', array_merge([
        'layout' => 'row', 'button_label' => 'Add item', 'sub_fields' => $sub,
    ], $extra));
}

/* ---------- options page: site-wide settings ---------- */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Site-wide Settings — header, footer, contact & reviews',
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

        btl_tab('btl_g_contact', 'Contact'),
        btl_f('btl_phone_display',   'Phone (display)', 'text', ['default_value' => '07790 210 031']),
        btl_f('btl_phone_tel',       'Phone (tel: link format)', 'text', ['default_value' => '07790210031']),
        btl_f('btl_whatsapp_url',    'WhatsApp link', 'url', ['default_value' => 'https://wa.me/447790210031']),
        btl_f('btl_email',           'Email', 'email', ['default_value' => 'boxingtrainerlondon@icloud.com']),
        btl_f('btl_booking_url',     'Booking / enquiry URL (used by all "Book" buttons)', 'url',
              ['default_value' => 'https://boxingtrainer.london/contact/']),

        btl_tab('btl_g_reviews', 'Reviews'),
        btl_f('btl_google_score',    'Google review score', 'text', ['default_value' => '5.0']),
        btl_f('btl_google_count',    'Google review count', 'text', ['default_value' => '50+']),
        btl_f('btl_google_url',      'Google reviews link', 'url',
              ['default_value' => 'https://share.google/QUETiLFrIFNpZxGsX']),
        btl_f('btl_trustpilot_score','Trustpilot score', 'text', ['default_value' => '4.5']),
        btl_f('btl_trustpilot_url',  'Trustpilot link', 'url',
              ['default_value' => 'https://uk.trustpilot.com/review/boxingtrainer.london']),

        /* Moved here from group_btl_home_2026 in v1.1.2.
           Field keys are unchanged (field_btl_nav_links and its sub-fields), so
           existing values migrate cleanly and nothing in the templates changes. */
        btl_tab('btl_g_nav', 'Header / navigation'),
        btl_rep('btl_nav_links', 'Navigation links', [
            btl_f('label', 'Label', 'text'),
            btl_f('url',   'URL', 'url'),
        ], ['instructions' => 'Shown in the desktop header and the mobile menu on every BTL template.']),

        btl_tab('btl_g_footer', 'Footer'),
        btl_f('btl_footer_blurb', 'Footer blurb', 'textarea', ['rows' => 3, 'default_value' =>
              'Indoor and outdoor 1-to-1 boxing personal training across London, run by Paul Carroll — former British University Heavyweight Champion.']),
        btl_rep('btl_footer_site_links', 'Footer — Site column links', [
            btl_f('label', 'Label', 'text'),
            btl_f('url',   'URL', 'url'),
        ]),
        btl_rep('btl_footer_training_links', 'Footer — Training column links', [
            btl_f('label', 'Label', 'text'),
            btl_f('url',   'URL', 'url'),
        ]),
    ],
    'location' => [[[ 'param' => 'options_page', 'operator' => '==', 'value' => 'btl-global' ]]],
    'style'    => 'seamless',
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
        btl_f('btl_training_heading', 'Section heading (H2)', 'text', ['default_value' => 'One coach. Four ways to train.']),
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
        btl_f('btl_who_heading', 'Section heading (H2)', 'text', ['default_value' => 'Training built around you']),
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
        btl_f('btl_testi_heading', 'Section heading (H2) — line breaks allowed', 'textarea', ['rows' => 2,
              'default_value' => "Trusted by beginners,\nprofessionals & names you know"]),
        btl_rep('btl_testimonials', 'Testimonials (use real reviews only)', [
            btl_f('stars', 'Stars (1–5)', 'number', ['min' => 1, 'max' => 5, 'default_value' => 5]),
            btl_f('quote', 'Quote (verbatim from the review)', 'textarea', ['rows' => 3]),
            btl_f('name',  'Reviewer name', 'text'),
            btl_f('meta',  'Detail line (e.g. Consultant, Clapham)', 'text'),
        ]),
        btl_f('btl_celebrity_line', 'Celebrity line', 'text', ['default_value' =>
              'High-profile clients include Geri Halliwell-Horner, Ben Shephard and Anthony Costa.']),
        btl_f('btl_success_url', '"All success stories" URL', 'url',
              ['default_value' => 'https://boxingtrainer.london/success-stories/']),

        btl_tab('btl_first', 'First session'),
        btl_f('btl_first_heading', 'Heading', 'text', ['default_value' => 'Friendly, structured and built around you']),
        btl_f('btl_first_text', 'Text', 'textarea', ['rows' => 3]),
        btl_rep('btl_first_points', 'Bullet points', [
            btl_f('bold', 'Bold lead-in', 'text'),
            btl_f('rest', 'Rest of line', 'text'),
        ]),

        btl_tab('btl_about', 'About Paul'),
        btl_f('btl_about_heading', 'Section heading (H2)', 'text', ['default_value' => 'Paul Carroll']),
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
        btl_f('btl_where_heading_main',   'Heading — main part', 'text', ['default_value' => 'Sessions happen']),
        btl_f('btl_where_heading_accent', 'Heading — orange part', 'text', ['default_value' => 'wherever suits you']),
        btl_rep('btl_where_items', 'Location types', [ btl_f('label', 'Label', 'text') ]),

        btl_tab('btl_areas', 'Areas covered'),
        btl_f('btl_areas_heading', 'Section heading (H2)', 'text', ['default_value' => 'Mobile coaching across London']),
        btl_f('btl_areas_intro', 'Intro line', 'textarea', ['rows' => 2]),
        btl_rep('btl_area_links', 'Area links', [
            btl_f('label', 'Label', 'text'),
            btl_f('url',   'URL', 'url'),
        ]),
        btl_f('btl_areas_all_label', '"All areas" label', 'text', ['default_value' => 'All areas covered →']),
        btl_f('btl_areas_all_url',   '"All areas" URL', 'url', ['default_value' => 'https://boxingtrainer.london/areas-covered/']),

        btl_tab('btl_guides', 'Guides'),
        btl_f('btl_guides_heading', 'Section heading (H2)', 'text', ['default_value' => 'Boxing & training guides']),
        btl_f('btl_guides_browse_label', '"Browse all" label', 'text', ['default_value' => 'Browse all guides']),
        btl_f('btl_guides_browse_url', '"Browse all" URL', 'url', ['default_value' => 'https://boxingtrainer.london/fitness-blog/']),
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

        btl_tab('btl_seo', 'Bottom block'),
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


/* ---------- Training Packages 2026 field group ---------- */
acf_add_local_field_group([
    'key'    => 'group_btl_packages_2026',
    'title'  => 'Training Packages 2026 content',
    'fields' => [

        /* ---------------- HERO ---------------- */
        btl_tab('btl_pkg_hero', 'Hero'),
        btl_f('btl_pkg_hero_image', 'Hero background image', 'image', ['return_format' => 'id', 'preview_size' => 'medium',
              'instructions' => 'Landscape, min 2400px wide. Subject centre-right; headline sits on the left.']),
        btl_f('btl_pkg_hero_h1_main',   'H1 — main part', 'text', ['default_value' => 'Boxing Training Packages']),
        btl_f('btl_pkg_hero_h1_accent', 'H1 — orange part', 'text', ['default_value' => 'London']),
        btl_f('btl_pkg_hero_tagline',   'Tagline', 'text', ['default_value' => 'Private · Couples · Small groups · Online']),
        btl_f('btl_pkg_hero_lead',      'Lead paragraph', 'textarea', ['rows' => 3, 'default_value' =>
              'Flexible boxing coaching with Paul Carroll — from single 1-to-1 sessions and discounted blocks to couples training, small groups and structured 4, 6 and 12-week programmes. Every plan is adapted to your experience, location and goals.']),
        btl_f('btl_pkg_hero_cta_label', 'Primary button label', 'text', ['default_value' => 'Book a free consultation']),
        btl_f('btl_pkg_hero_cta_url',   'Primary button URL (blank = site-wide booking URL)', 'url'),

        /* ---------------- AT-A-GLANCE PRICE STRIP ---------------- */
        btl_tab('btl_pkg_strip', 'Price strip'),
        btl_rep('btl_pkg_strip_items', 'At-a-glance tiles', [
            btl_f('big',   'Big figure (e.g. £95)', 'text'),
            btl_f('title', 'Title', 'text'),
            btl_f('note',  'Small note', 'text'),
        ], ['instructions' => 'The four tiles directly under the hero. Plain text so you control the exact figures shown.']),

        /* ---------------- OPTIONAL PROMOTIONS BAND ---------------- */
        btl_tab('btl_pkg_promo', 'Promotions band'),
        btl_f('btl_pkg_promo_enabled', 'Show the promotions band', 'true_false', [
            'ui' => 1, 'default_value' => 0,
            'instructions' => 'OFF by default. When off (or when both the text and custom HTML are empty) the band, its jump-link and any related schema are hidden completely — no gap is left on the page.']),
        btl_f('btl_pkg_promo_tag',   'Small tag (e.g. Offer)', 'text', ['default_value' => 'Offer']),
        btl_f('btl_pkg_promo_text',  'Promotion text', 'wysiwyg', ['toolbar' => 'basic', 'media_upload' => 0, 'tabs' => 'visual']),
        btl_f('btl_pkg_promo_btn_label', 'Button label (optional)', 'text'),
        btl_f('btl_pkg_promo_btn_url',   'Button URL (optional)', 'url'),
        btl_f('btl_pkg_promo_html',  'Custom HTML (optional, advanced)', 'textarea', ['rows' => 4,
              'instructions' => 'Optional raw HTML, output as-is for seasonal announcements. Leave blank to use the text + button above.']),

        /* ---------------- JUMP NAV ---------------- */
        btl_tab('btl_pkg_jump', 'Jump navigation'),
        btl_rep('btl_pkg_jumplinks', 'Jump links', [
            btl_f('label',  'Label', 'text'),
            btl_f('anchor', 'Anchor (e.g. #private)', 'text'),
        ], ['instructions' => 'The sticky in-page navigation. Anchor must match a section ID on the page (#private, #programmes, #ways, #included, #gift-vouchers, #terms, #partners, #faqs).']),

        /* ---------------- PRIVATE PACKAGES ---------------- */
        btl_tab('btl_pkg_private', 'Private packages'),
        btl_f('btl_pkg_private_heading', 'Section heading (H2)', 'text', ['default_value' => '1-to-1 boxing packages']),
        btl_f('btl_pkg_private_intro',   'Intro line', 'textarea', ['rows' => 3, 'default_value' =>
              'Standard private sessions normally last 60 minutes unless a different arrangement is agreed in advance. Training is adapted to your fitness, experience and goals — padwork, footwork, combinations, defence, conditioning and mobility. No previous boxing experience needed.']),
        btl_rep('btl_pkg_private_cards', 'Private package cards', [
            btl_f('kicker',       'Kicker (small label)', 'text'),
            btl_f('title',        'Title', 'text'),
            btl_f('amount',       'Big price (e.g. £1,500)', 'text'),
            btl_f('per',          'Per-session line (e.g. £75 per session)', 'text'),
            btl_f('desc',         'Description', 'textarea', ['rows' => 3]),
            btl_rep('benefits', 'Benefit bullets', [
                btl_f('text', 'Bullet (wrap emphasis in **double asterisks** for bold)', 'text'),
            ]),
            btl_f('button_label', 'Button label', 'text'),
            btl_f('button_url',   'Button URL (blank = booking URL)', 'url'),
            btl_f('featured',     'Featured card (orange border + flag)', 'true_false', ['ui' => 1]),
            btl_f('flag',         'Flag text (e.g. Best value) — only shows if Featured is on', 'text'),
        ]),

        /* ---------------- NEW-CLIENT OFFER PANEL ---------------- */
        btl_tab('btl_pkg_offer', 'New-client offer'),
        btl_f('btl_pkg_offer_enabled', 'Show the offer panel', 'true_false', ['ui' => 1, 'default_value' => 1,
              'instructions' => 'The orange percentage panel under the private cards. Turn off to hide it entirely.']),
        btl_f('btl_pkg_offer_pct',     'Big figure (e.g. 20%)', 'text', ['default_value' => '20%']),
        btl_f('btl_pkg_offer_heading', 'Heading', 'text', ['default_value' => 'Off your first private session']),
        btl_f('btl_pkg_offer_body',    'Body text', 'textarea', ['rows' => 3, 'default_value' =>
              'New clients can book their first private 1-to-1 boxing session for £76 instead of £95. Available once per person, subject to location and availability. Prepayment is required and the offer cannot be combined with another promotion.']),
        btl_f('btl_pkg_offer_btn_label', 'Button label', 'text', ['default_value' => 'Book Your First Session']),
        btl_f('btl_pkg_offer_btn_url',   'Button URL (blank = booking URL)', 'url'),

        /* ---------------- STRUCTURED PROGRAMMES ---------------- */
        btl_tab('btl_pkg_programmes', 'Programmes'),
        btl_f('btl_pkg_prog_heading', 'Section heading (H2)', 'text', ['default_value' => '4, 6 and 12-week training plans']),
        btl_f('btl_pkg_prog_intro',   'Intro line', 'textarea', ['rows' => 3, 'default_value' =>
              'Session blocks provide maximum flexibility and the lowest private 1-to-1 session rates. Structured programmes reserve three sessions per week across an agreed period and include planned progression, general nutrition guidance, agreed WhatsApp support and progress reviews.']),
        btl_rep('btl_pkg_prog_cards', 'Programme cards', [
            btl_f('kicker',       'Kicker (small label)', 'text'),
            btl_f('title',        'Title', 'text'),
            btl_f('amount',       'Big price (e.g. £1,450)', 'text'),
            btl_f('spec',         'Duration line (e.g. 6 weeks · 18 private sessions)', 'text'),
            btl_f('desc',         'Description', 'textarea', ['rows' => 3]),
            btl_rep('features', 'Feature bullets', [
                btl_f('text', 'Bullet', 'text'),
            ]),
            btl_f('button_label', 'Button label', 'text'),
            btl_f('button_url',   'Button URL (blank = booking URL)', 'url'),
            btl_f('featured',     'Featured card (orange border + flag)', 'true_false', ['ui' => 1]),
            btl_f('flag',         'Flag text (e.g. Recommended) — only shows if Featured is on', 'text'),
        ]),
        btl_f('btl_pkg_prog_fineprint', 'Fine print under the cards', 'textarea', ['rows' => 2, 'default_value' =>
              'Programme content is adapted to the client and may vary according to experience, fitness and agreed goals.']),

        /* ---------------- WEDDING CALLOUT ---------------- */
        btl_tab('btl_pkg_wedding', 'Wedding callout'),
        btl_f('btl_pkg_wed_enabled', 'Show the wedding callout', 'true_false', ['ui' => 1, 'default_value' => 1]),
        btl_f('btl_pkg_wed_heading', 'Heading', 'text', ['default_value' => 'Training for a wedding?']),
        btl_f('btl_pkg_wed_body',    'Body text', 'textarea', ['rows' => 4, 'default_value' =>
              'Wedding Knockout programmes are available for individuals and couples, with every plan built around the wedding date, the clients\' goals and their current fitness levels. Individual 12-week programmes start from £2,800. Couples can complete a 12-week programme together, including 36 joint sessions, for £4,000 in total. Each programme is planned backwards from the wedding date to provide a clear, structured route towards feeling fitter, stronger and more confident for the day.']),
        btl_f('btl_pkg_wed_btn_label', 'Button label', 'text', ['default_value' => 'Discuss a Wedding Programme']),
        btl_f('btl_pkg_wed_btn_url',   'Button URL (blank = booking URL)', 'url'),

        /* ---------------- OTHER WAYS TO TRAIN ---------------- */
        btl_tab('btl_pkg_ways', 'Couples / online / corporate'),
        btl_f('btl_pkg_ways_heading', 'Section heading (H2)', 'text', ['default_value' => 'Couples, online & corporate']),
        btl_rep('btl_pkg_ways_cards', 'Cards', [
            btl_f('kicker',     'Kicker (small label)', 'text'),
            btl_f('title',      'Title', 'text'),
            btl_f('amount',     'Big figure (e.g. £55)', 'text'),
            btl_f('amount_note','Small note under figure (e.g. per person, per session)', 'text'),
            btl_f('body',       'Body text', 'textarea', ['rows' => 3]),
            btl_rep('bullets', 'Bullets', [
                btl_f('text', 'Bullet (wrap emphasis in **double asterisks** for bold)', 'text'),
            ]),
            btl_f('link_label', 'Link label', 'text'),
            btl_f('link_url',   'Link URL', 'url'),
        ]),

        /* ---------------- GIFT VOUCHERS CALLOUT ---------------- */
        btl_tab('btl_pkg_vouchers', 'Gift Vouchers callout'),
        btl_f('btl_pkg_vouch_enabled', 'Show the gift vouchers callout', 'true_false', ['ui' => 1, 'default_value' => 1]),
        btl_f('btl_pkg_vouch_heading', 'Heading', 'text', ['default_value' => 'Give the gift of boxing training']),
        btl_f('btl_pkg_vouch_body',    'Body text', 'textarea', ['rows' => 3, 'default_value' =>
              'Digital boxing gift vouchers are available for private 1-to-1 sessions and multi-session packages. They are suitable for complete beginners or experienced clients and are valid for 12 months.']),
        btl_f('btl_pkg_vouch_btn_label', 'Button label', 'text', ['default_value' => 'View Gift Vouchers']),
        btl_f('btl_pkg_vouch_btn_url',   'Button URL', 'url', ['default_value' => 'https://boxingtrainer.london/boxing-training-gift-vouchers/']),

        /* ---------------- WHAT'S INCLUDED ---------------- */
        btl_tab('btl_pkg_included', "What's included"),
        btl_f('btl_pkg_inc_eyebrow', 'Eyebrow label', 'text', ['default_value' => 'What you receive']),
        btl_f('btl_pkg_inc_heading', 'Section heading (H2)', 'text', ['default_value' => "What's included"]),
        btl_rep('btl_pkg_inc_cards', 'Included cards', [
            btl_f('title', 'Title', 'text'),
            btl_f('text',  'Text', 'textarea', ['rows' => 2]),
        ]),
        btl_f('btl_pkg_inc_wide_title', 'Wide card — title', 'text', ['default_value' => 'Mobile coaching across London']),
        btl_f('btl_pkg_inc_wide_text',  'Wide card — text', 'textarea', ['rows' => 2, 'default_value' =>
              'Training can be arranged at suitable parks, homes, offices, hotel gyms, private gyms and private spaces. Location suitability, access and venue requirements are confirmed before booking.']),
        btl_f('btl_pkg_inc_wide_link_label', 'Wide card — link label', 'text', ['default_value' => 'Areas covered']),
        btl_f('btl_pkg_inc_wide_link_url',   'Wide card — link URL', 'url', ['default_value' => 'https://boxingtrainer.london/areas-covered/']),

        /* ---------------- WHY PAUL ---------------- */
        btl_tab('btl_pkg_about', 'Why Paul'),
        btl_f('btl_pkg_about_heading', 'Section heading (H2)', 'text', ['default_value' => 'Why train with Paul Carroll?']),
        btl_f('btl_pkg_about_image',   'Portrait image', 'image', ['return_format' => 'id']),
        btl_f('btl_pkg_about_lead',    'Lead paragraph', 'textarea', ['rows' => 3, 'default_value' =>
              'Private coaching that combines first-hand boxing experience, athletic conditioning and sport science, with every session adapted to the individual.']),
        btl_rep('btl_pkg_about_creds', 'Credential list', [
            btl_f('bold', 'Bold part', 'text'),
            btl_f('rest', 'Rest of line', 'text'),
        ]),

        /* ---------------- BOOKING & TERMS ---------------- */
        btl_tab('btl_pkg_terms', 'Booking & terms'),
        btl_f('btl_pkg_terms_heading', 'Section heading (H2)', 'text', ['default_value' => 'Booking & package terms']),
        btl_f('btl_pkg_terms_lead',    'Intro line', 'textarea', ['rows' => 2, 'default_value' =>
              'Clear terms agreed up front so there are no surprises later. Anything not covered here can be discussed during your free consultation.']),
        btl_f('btl_pkg_terms_callout_heading', 'Callout — heading', 'text', ['default_value' => 'Not sure which package fits?']),
        btl_f('btl_pkg_terms_callout_body',    'Callout — body', 'textarea', ['rows' => 3, 'default_value' =>
              'Book a free consultation by video, phone or WhatsApp. Paul can talk through your experience, location, schedule and goals before recommending anything — there\'s no need to choose a large package before that conversation.']),
        btl_rep('btl_pkg_terms_items', 'Terms (one line each)', [
            btl_f('text', 'Term', 'text'),
        ]),

        /* ---------------- TRUSTED PROFESSIONALS ---------------- */
        btl_tab('btl_pkg_partners', 'Trusted professionals'),
        btl_f('btl_pkg_partners_heading', 'Section heading (H2)', 'text', ['default_value' => 'Trusted professionals & partners']),
        btl_f('btl_pkg_partners_intro',   'Intro line', 'textarea', ['rows' => 3, 'default_value' =>
              'Training can be one part of a wider approach to health, recovery and performance. These are independent professionals and businesses whose work Paul knows through genuine client care or direct collaboration.']),
        btl_rep('btl_pkg_partners_cards', 'Professional cards', [
            btl_f('category',   'Category (e.g. Osteopathy)', 'text'),
            btl_f('name',       'Name', 'text'),
            btl_f('role',       'Role', 'text'),
            btl_f('meta',       'Location / meta line', 'text'),
            btl_f('description','Description', 'textarea', ['rows' => 3]),
            btl_f('quote',      'Quote (optional)', 'textarea', ['rows' => 3]),
            btl_f('quote_cite', 'Quote attribution (optional)', 'text'),
            btl_rep('bullets', 'Bullets (optional, alternative to quote)', [
                btl_f('text', 'Bullet', 'text'),
            ]),
            btl_rep('links', 'Links', [
                btl_f('label',     'Label', 'text'),
                btl_f('url',       'URL', 'url'),
                btl_f('secondary', 'Secondary style (outline)', 'true_false', ['ui' => 1]),
            ]),
        ], ['instructions' => 'Add, remove or reorder cards freely. A card is only shown if it has a name and at least one link, so a half-finished card never appears on the live page. Duplicate a row to add a new partner.']),
        btl_f('btl_pkg_partners_note', 'Disclaimer note under the cards', 'textarea', ['rows' => 3, 'default_value' =>
              'All professionals and businesses listed here operate independently from Boxing Trainer London. Please contact them directly to discuss suitability, services, availability and fees. Boxing Trainer London provides fitness coaching and does not diagnose or treat medical conditions.']),

        /* ---------------- FAQs ---------------- */
        btl_tab('btl_pkg_faq', 'FAQs'),
        btl_f('btl_pkg_faq_heading', 'Section heading', 'text', ['default_value' => 'Boxing packages — FAQs']),
        btl_rep('btl_pkg_faqs', 'Questions & answers', [
            btl_f('question', 'Question', 'text'),
            btl_f('answer',   'Answer (basic HTML links allowed)', 'textarea', ['rows' => 3]),
        ]),
        btl_f('btl_pkg_faq_schema_auto', 'Auto-generate FAQ schema from these questions', 'true_false', [
            'ui' => 1, 'default_value' => 1,
            'instructions' => 'ON: FAQPage JSON-LD is generated automatically from the questions above, so the schema always matches the visible FAQs. Turn OFF to manage FAQ schema manually in AIOSEO (it will never output twice).']),

        /* ---------------- SEO BOTTOM BLOCK ---------------- */
        btl_tab('btl_pkg_seo', 'Bottom block'),
        btl_f('btl_pkg_seo_heading', 'Heading', 'text', ['default_value' => 'Boxing training packages across London']),
        btl_f('btl_pkg_seo_content', 'Content (internal links welcome)', 'wysiwyg', ['toolbar' => 'basic', 'media_upload' => 0]),

        /* ---------------- CTA BAND ---------------- */
        btl_tab('btl_pkg_cta', 'CTA band'),
        btl_f('btl_pkg_cta_heading', 'Heading', 'text', ['default_value' => 'Start with a free consultation']),
        btl_f('btl_pkg_cta_text',    'Text', 'text', ['default_value' =>
              'Talk to Paul about your goals, location and the package that fits your schedule.']),
        btl_f('btl_pkg_cta_label',   'Button label', 'text', ['default_value' => 'Book a free consultation']),
        btl_f('btl_pkg_cta_url',     'Button URL (blank = site-wide booking URL)', 'url'),

        /* ---------------- SCHEMA — PRICES & OFFERS ---------------- */
        /* Paul's dedicated, clearly-labelled schema area. All figures that feed
           the Service/Offer JSON-LD live here, in one place, so his annual price
           update has a single schema tab to check. The visible cards above are
           separate fields (his choice: manual, no auto-linking), so this tab is
           the "also update these" list the checklist will point to. */
        btl_tab('btl_pkg_schema', 'Schema — Prices & Offers'),
        btl_f('btl_pkg_schema_enabled', 'Output Service/Offer price schema', 'true_false', ['ui' => 1, 'default_value' => 1,
              'instructions' => 'Adds Service + Offer JSON-LD for the packages using the figures below. FAQ schema is handled separately on the FAQs tab. Note: Google does not show rich results for service prices — this is for consistency and AI/answer engines, not star ratings in search.']),
        btl_f('btl_pkg_schema_currency', 'Currency code', 'text', ['default_value' => 'GBP']),
        btl_f('btl_pkg_schema_low',  'Lowest price (number only, e.g. 65)', 'text', ['default_value' => '65',
              'instructions' => 'Used for the priceRange low end. Numbers only, no £ sign.']),
        btl_f('btl_pkg_schema_high', 'Highest price (number only, e.g. 4000)', 'text', ['default_value' => '4000']),
        btl_rep('btl_pkg_schema_offers', 'Named offers for schema', [
            btl_f('name',  'Offer name (e.g. 20-session package)', 'text'),
            btl_f('price', 'Price (number only, e.g. 1500)', 'text'),
        ], ['instructions' => 'Each becomes an Offer in the Service schema. Numbers only, no £ sign or commas (1500, not £1,500).']),
    ],
    'location' => [[[ 'param' => 'page_template', 'operator' => '==', 'value' => 'btl-packages-2026.php' ]]],
    'style'    => 'seamless',
    'hide_on_screen' => ['the_content'],
]);

/* ---------- FAQ schema: auto from the same fields Paul edits, toggleable, duplicate-safe ---------- */
add_filter('aioseo_schema_output', function ($graphs) {
    // Runs wherever the template is used — including the pre-launch staging page,
    // so the Rich Results Test can validate schema before the front-page switch.
    if (!function_exists('get_field')) return $graphs;

    // Map each BTL template to its FAQ repeater + toggle field.
    $faq_map = [
        'btl-home-2026.php'     => ['toggle' => 'btl_faq_schema_auto',     'repeater' => 'btl_home_faqs'],
        'btl-packages-2026.php' => ['toggle' => 'btl_pkg_faq_schema_auto', 'repeater' => 'btl_pkg_faqs'],
    ];

    foreach ($faq_map as $tpl => $f) {
        if (!is_page_template($tpl)) continue;
        if (!get_field($f['toggle'])) return $graphs;                 // Paul's manual-control toggle
        $faqs = get_field($f['repeater']);
        if (!$faqs) return $graphs;
        foreach ((array) $graphs as $g) {                             // never duplicate a FAQPage
            if (is_array($g) && ($g['@type'] ?? '') === 'FAQPage') return $graphs;
        }
        $graphs[] = [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(static fn($q) => [
                '@type'          => 'Question',
                'name'           => $q['question'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => wp_strip_all_tags($q['answer'])],
            ], $faqs),
        ];
        return $graphs;
    }
    return $graphs;
}, 20);

/* ---------- Packages: Service + Offer price schema (Paul's dedicated schema tab) ---------- */
add_filter('aioseo_schema_output', function ($graphs) {
    if (!function_exists('get_field')) return $graphs;
    if (!is_page_template('btl-packages-2026.php')) return $graphs;
    if (!get_field('btl_pkg_schema_enabled')) return $graphs;

    $currency = (string) (get_field('btl_pkg_schema_currency') ?: 'GBP');
    $low  = preg_replace('/[^0-9.]/', '', (string) get_field('btl_pkg_schema_low'));
    $high = preg_replace('/[^0-9.]/', '', (string) get_field('btl_pkg_schema_high'));

    $offers = [];
    foreach ((array) get_field('btl_pkg_schema_offers') as $o) {
        $price = preg_replace('/[^0-9.]/', '', (string) ($o['price'] ?? ''));
        if ($price === '' || empty($o['name'])) continue;             // skip incomplete rows
        $offers[] = [
            '@type'         => 'Offer',
            'name'          => $o['name'],
            'price'         => $price,
            'priceCurrency' => $currency,
        ];
    }

    $service = [
        '@type'       => 'Service',
        '@id'         => home_url('/training-packages/#service-packages'),
        'name'        => 'Boxing Training Packages in London',
        'serviceType' => 'Private 1-to-1 boxing personal training',
        'provider'    => ['@id' => home_url('/#organization')],
        'areaServed'  => 'London',
    ];
    if ($low !== '' && $high !== '') {
        $service['offers'] = [
            '@type'         => 'AggregateOffer',
            'priceCurrency' => $currency,
            'lowPrice'      => $low,
            'highPrice'     => $high,
        ] + ($offers ? ['offers' => $offers] : []);
    } elseif ($offers) {
        $service['offers'] = $offers;
    }

    $graphs[] = $service;
    return $graphs;
}, 21);
