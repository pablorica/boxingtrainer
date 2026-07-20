# BTL Homepage 2026


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
   1) Repeaters can't prefill, so `pathways/who-cards/FAQs/testimonials/areas/nav/footer` must get pasted once from the mockup 
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
wp eval-file btl-seed-home.php 123 /path/to/images
```

It assigns the template, fills the options page, populates every field and repeater with the extracted mockup content (your final version — I parsed it directly, so your link fixes, renamed images, and real testimonial names all carry over), imports the images with alt text, and reports progress per image. Idempotent by design: re-running overwrites field values but never duplicates images (matched by filename), and a missing image file just warns and leaves that field empty rather than aborting — so you can seed, drop in a missing file, and re-run.

On SiteGround, same command via SSH — wp is preinstalled there; upload the script and images folder anywhere (e.g. ~/btl-seed/), cd into the WordPress root or pass --path, and run it against the real page ID. Since it's idempotent, testing in Local first then running identically in production is exactly the right workflow.
One honest caveat: update_field() with repeater rows keyed by sub-field keys is the documented-correct approach for never-saved fields, but ACF has historic quirks here — so after seeding in Local, open the page in wp-admin and check the repeaters render their rows properly (pathways showing 4 rows with images, FAQs showing 8) before trusting it on SiteGround. If any repeater comes up empty in the editor despite the script reporting success, tell me which one and I'll adjust the row format. And once Local looks right, you're at the finish line: seed production, AIOSEO meta + Rich Results screenshots for Paul, CWV pass, the redirect one-liner, front-page switch, noindex off.
