# BTL Plugin 2026


## Folder structure v0.1.0

```bash
btl-homepage/
  btl-homepage.php        ← bootstrap: template registration, conditional assets, ACF loading
  inc/acf-fields.php      ← the full field spec, adapted (slug now btl-home-2026.php everywhere)
  templates/home-2026.php ← standalone template stub (wp_head/wp_footer wired, hero fields proven)
  assets/css/home.css     ← placeholder for the extracted mockup CSS
  assets/js/home.js       ← placeholder for the facade/hero JS
```

## Folder structure v1.0.0

- **templates/home-2026.php** 
  - the complete standalone template, every section from the approved mockup rendering from ACF fields, in the exact approved order: 
    - hero 
    - press wall 
    - credentials 
    - training options  
    - who-for 
    - featured video 
    - quote 
    - testimonials 
    - first session 
    - about 
    - where 
    - areas 
    - guides 
    - FAQ 
    - SEO block 
    - CTA 
    - footer 
    - 
  - Everything escaped (`esc_html/esc_url/wp_kses`), 
  - Empty repeaters skip their sections gracefully,
  - Hero image gets fetchpriority="high" + eager while everything below the fold lazy-loads, 
  - The video facade reads a data-video-id parsed from whatever YouTube URL Paul puts in the field — with a poster fallback chain (his uploaded poster → YouTube maxres thumbnail).
- **assets/css/home.css**  
  - The final mockup CSS extracted verbatim, including the hero transition system and its prefers-reduced-motion block.
- **assets/js/home.js** 
  - The hero enhancement script untouched (the progressive-enhancement pattern where text stays visible without JS is exactly right), 
  - The facade rewritten to use the dynamic video ID and gain keyboard support (Enter/Space, matching the tabindex I added to the facade markup).
- **inc/acf-fields.php** 
  - Extended with the fields the full page needed: 
    - nav links repeater
    - every section H2 now editable (Paul's requirement, literally)
    - footer blurb + link columns
    - success-stories URL
    - guides browse button.


## Smoke test sequence

1) confirm ACF Pro is active, 
2) upload/activate the plugin, 
3) new page → template "BTL Homepage 2026" → verify the tabbed fields appear in the editor and "Site-wide Settings" shows in the admin menu, 
4) view the page — you should see the unstyled hero text pulled from field defaults. 
   

## Install/Verify sequence

1) Upload the plugin and activate 
2) Add the content-filling session in wp-admin:
   1) Repeaters can't prefill, so `pathways/who-cards/FAQs/testimonials/areas/nav/footer` must get pasted once from the "Feed Content"
   2) Images (hero, four pathway cards, portrait, three guides, three press logos) must get uploaded to the media library with alt text and selected in their fields. 
   3) Compare the staging page against the preview side by side. Two known **deltas** to expect: 
      1) fonts load via the enqueued Google Fonts (check Oswald/Inter actually render), 
      2) and any pixel drift means the theme is leaking CSS into the page — if lpd-abcpersonal enqueues global styles that reach our standalone template, tell me and I'll add a scoped reset.
3) After that, what remains is the launch sequence from the build plan: 
   1) AIOSEO title/meta/canonical on the new page, 
   2) Rich Results screenshots for Paul, 
   3) CWV pass, 
   4) the .htaccess one-liner for the double-hop redirect, 
   5) the front-page switch, 
   6) and noindex removal. 
4) If the manual repeater-filling session feels tedious, the WP-CLI seeding script offer still stands — with SiteGround's SSH it would populate everything from the mockup content in one command.

## Feed content


### Homepage

The command:

```bash
wp eval-file btl-seed-home.php <page_id> /path/to/images
```
Full Local test sequence:

```bash
# 1. Install the plugin zip and activate, confirm ACF Pro active
# 2. Create the page and grab its ID:
wp post create --post_type=page --post_title="Home 2026" --post_status=draft --porcelain
# 3. Prepare the images folder: your 10 final image files (exact names in
#    REQUIRED-IMAGES.txt) + the 3 logo SVGs from seed-images/
# 4. Seed:
wp eval-file btl-seed-home.php <page_id> /path/to/images
```

It assigns the template, fills the options page, populates every field and repeater with the extracted mockup content imports the images with alt text, and reports progress per image. 
Idempotent by design: re-running overwrites field values but never duplicates images (matched by filename), and a missing image file just warns and leaves that field empty rather than aborting — so you can seed, drop in a missing file, and re-run.

On SiteGround, same command via SSH — wp is preinstalled there; 

### Feed Images

Upload the script and images folder anywhere (e.g. ~/btl-seed/), 
```bash
cd wordpress/wp-content/plugins/btl-plugin/seed-package
wp eval-file btl-seed-home.php <Page ID> seed-package/seed-images

## In Siteground
cd ~/www/boxingtrainer.london/public_html/
wp eval-file /home/u655-cwxrryebznxq/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/home-seed/btl-seed-home.php 4814 /home/u655-cwxrryebznxq/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/home-seed/seed-images

## Remove seeder after populating
rm -R ~/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/home-seed/


## In Docker
docker compose run --rm wpcli eval-file /var/www/html/wp-content/plugins/btl-plugin/home-seed/btl-seed-home.php <Page ID> /var/www/html/wp-content/plugins/btl-plugin/home-seed/seed-images 
```
cd into the WordPress root or pass --path, and run it against the real page ID. 


### Training Pacakges

1. Find/confirm the page ID that uses the packages template:    
   
```bash
  wp post list --post_type=page \
    --meta_key=_wp_page_template --meta_value=btl-packages-2026.php \
    --fields=ID,post_title,post_status

  ## In Siteground
  ssh BoxingTrainer
  cd ~/www/boxingtrainer.london/public_html/
  wp post list --post_type=page \
    --meta_key=_wp_page_template --meta_value=btl-packages-2026.php \
    --fields=ID,post_title,post_status

  ## In Docker
  docker compose run --rm wpcli post list --post_type=page \
    --meta_key=_wp_page_template --meta_value=btl-packages-2026.php \
    --fields=ID,post_title,post_status 


+------+------------------------+-------------+
| ID   | post_title             | post_status |
+------+------------------------+-------------+
| 4873 | Training Packages 2026 | publish     |
+------+------------------------+-------------+
```

2. Upload the seeder

```bash
## In Docker
cd /Users/pablo/Dockers/boxingtrainer/wordpress/wp-content/plugins/btl-plugin/
tar -czvf training-packages-seed.tar.gz training-packages-seed/
scp training-packages-seed.tar.gz BoxingTrainer:/home/u655-cwxrryebznxq/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/

## In Siteground
ssh BoxingTrainer
cd ~/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/
tar -xzvf training-packages-seed.tar.gz

```
3. Dry run (prints what it would write, changes nothing):
  
```bash
wp eval-file seed-packages.php <PAGE_ID> dry

## In Siteground
ssh BoxingTrainer
cd ~/www/boxingtrainer.london/public_html/
wp eval-file /home/u655-cwxrryebznxq/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/training-packages-seed/seed-packages.php 4873 dry


## In Docker
docker compose run --rm wpcli eval-file /var/www/html/wp-content/plugins/btl-plugin/training-packages-seed/seed-packages.php 4089 dry

btl_pkg_hero_h1_main             "Boxing Training Packages"
  btl_pkg_hero_h1_accent           "London"
  btl_pkg_hero_tagline             "Private · Couples · Small groups · Online"
  btl_pkg_hero_lead                "Flexible boxing coaching with Paul Carroll — from single 1-t…"
  btl_pkg_hero_cta_label           "Book a free consultation"
  btl_pkg_hero_cta_url             ""
  btl_pkg_strip_items              [4 row(s)]
  btl_pkg_promo_enabled            0
  btl_pkg_promo_tag                "Offer"
  btl_pkg_promo_text               ""
  btl_pkg_promo_btn_label          ""
  btl_pkg_promo_btn_url            ""
  btl_pkg_promo_html               ""
  btl_pkg_jumplinks                [8 row(s)]
  btl_pkg_private_heading          "1-to-1 boxing packages"
  btl_pkg_private_intro            "Standard private sessions normally last 60 minutes unless a …"
  btl_pkg_private_cards            [3 row(s)]
  btl_pkg_offer_enabled            1
  btl_pkg_offer_pct                "20%"
  btl_pkg_offer_heading            "Off your first private session"
  btl_pkg_offer_body               "New clients can book their first private 1-to-1 boxing sessi…"
  btl_pkg_offer_btn_label          "Book Your First Session"
  btl_pkg_offer_btn_url            ""
  btl_pkg_prog_heading             "4, 6 and 12-week training plans"
  btl_pkg_prog_intro               "Session blocks provide maximum flexibility and the lowest pr…"
  btl_pkg_prog_cards               [3 row(s)]
  btl_pkg_prog_fineprint           "Programme content is adapted to the client and may vary acco…"
  btl_pkg_wed_enabled              1
  btl_pkg_wed_heading              "Training for a wedding?"
  btl_pkg_wed_body                 "Wedding Knockout programmes are available for individuals an…"
  btl_pkg_wed_btn_label            "Discuss a Wedding Programme"
  btl_pkg_wed_btn_url              ""
  btl_pkg_ways_heading             "Couples, online & corporate"
  btl_pkg_ways_cards               [3 row(s)]
  btl_pkg_vouch_enabled            1
  btl_pkg_vouch_heading            "Give the gift of boxing training"
  btl_pkg_vouch_body               "Digital boxing gift vouchers are available for private 1-to-…"
  btl_pkg_vouch_btn_label          "View Gift Vouchers"
  btl_pkg_vouch_btn_url            "https://boxingtrainer.london/boxing-training-gift-vouchers/"
  btl_pkg_inc_eyebrow              "What you receive"
  btl_pkg_inc_heading              "What's included"
  btl_pkg_inc_cards                [4 row(s)]
  btl_pkg_inc_wide_title           "Mobile coaching across London"
  btl_pkg_inc_wide_text            "Training can be arranged at suitable parks, homes, offices, …"
  btl_pkg_inc_wide_link_label      "Areas covered"
  btl_pkg_inc_wide_link_url        "https://boxingtrainer.london/areas-covered/"
  btl_pkg_about_heading            "Why train with Paul Carroll?"
  btl_pkg_about_lead               "Private coaching that combines first-hand boxing experience,…"
  btl_pkg_about_creds              [4 row(s)]
  btl_pkg_terms_heading            "Booking & package terms"
  btl_pkg_terms_lead               "Clear terms agreed up front so there are no surprises later.…"
  btl_pkg_terms_callout_heading    "Not sure which package fits?"
  btl_pkg_terms_callout_body       "Book a free consultation by video, phone or WhatsApp. Paul c…"
  btl_pkg_terms_items              [9 row(s)]
  btl_pkg_partners_heading         "Trusted professionals & partners"
  btl_pkg_partners_intro           "Training can be one part of a wider approach to health, reco…"
  btl_pkg_partners_cards           [2 row(s)]
  btl_pkg_partners_note            "All professionals and businesses listed here operate indepen…"
  btl_pkg_faq_heading              "Boxing packages — FAQs"
  btl_pkg_faqs                     [13 row(s)]
  btl_pkg_faq_schema_auto          1
  btl_pkg_seo_heading              "Boxing training packages across London"
  btl_pkg_seo_content              "<p>Paul Carroll provides mobile <a href="https://boxingtrain…"
  btl_pkg_cta_heading              "Start with a free consultation"
  btl_pkg_cta_text                 "Talk to Paul about your goals, location and the package that…"
  btl_pkg_cta_label                "Book a free consultation"
  btl_pkg_cta_url                  ""
  btl_pkg_schema_enabled           1
  btl_pkg_schema_currency          "GBP"
  btl_pkg_schema_low               "65"
  btl_pkg_schema_high              "4000"
  btl_pkg_schema_offers            [8 row(s)]
  Success: DRY RUN — 72 fields would be written to page 4873. Images to set by hand: btl_pkg_hero_image, btl_pkg_about_image. No changes made.
``` 

4. Real run:
  
```bash
wp eval-file seed-packages.php <PAGE_ID> 

## In Siteground
ssh BoxingTrainer
cd ~/www/boxingtrainer.london/public_html/
wp eval-file /home/u655-cwxrryebznxq/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/training-packages-seed/seed-packages.php 4873

## In Docker
docker compose run --rm wpcli eval-file /var/www/html/wp-content/plugins/btl-plugin/training-packages-seed/seed-packages.php 4089

Success: Seeded 72 fields on page 4089. Set the two images by hand (btl_pkg_hero_image, btl_pkg_about_image), then preview. Remember to purge NitroPack.
``` 

5. Remove seeder after populating

```bash
rm -R training-packages-seed

## In Siteground
ssh BoxingTrainer
cd ~/www/boxingtrainer.london/public_html/wp-content/plugins/btl-plugin/
rm -R training-packages-seed/

``` 
