# BTL Ste 2026 - Feed content

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

## Feed Images

Upload the script and images folder anywhere (e.g. ~/btl-seed/), 
```bash
cd wordpress/wp-content/plugins/btl-homepage/seed-package
wp eval-file btl-seed-home.php <Page ID> seed-package/seed-images

## In Siteground
cd ~/www/boxingtrainer.london/public_html/
wp eval-file /home/u655-cwxrryebznxq/www/boxingtrainer.london/public_html/wp-content/plugins/btl-homepage/seed-package/btl-seed-home.php 4814 /home/u655-cwxrryebznxq/www/boxingtrainer.london/public_html/wp-content/plugins/btl-homepage/seed-package/seed-images

## Remove seeder after populating
rm -R ~/www/boxingtrainer.london/public_html/wp-content/plugins/btl-homepage/seed-package/


## In Docker
docker compose run --rm wpcli eval-file /var/www/html/wp-content/plugins/btl-homepage/seed-package/btl-seed-home.php <Page ID> /var/www/html/wp-content/plugins/btl-homepage/seed-package/seed-images 
```
cd into the WordPress root or pass --path, and run it against the real page ID. 
Since it's idempotent, testing in Local first then running identically in production is exactly the right workflow.

One honest caveat: update_field() with repeater rows keyed by sub-field keys is the documented-correct approach for never-saved fields, but ACF has historic quirks here — so after seeding in Local, open the page in wp-admin and check the repeaters render their rows properly (pathways showing 4 rows with images, FAQs showing 8) before trusting it on SiteGround. 

If any repeater comes up empty in the editor despite the script reporting success, tell me which one and I'll adjust the row format. And once Local looks right, you're at the finish line: seed production, AIOSEO meta + Rich Results screenshots for Paul, CWV pass, the redirect one-liner, front-page switch, noindex off.



## Move ACF from Home to Global Settings

**Forget the manual copy/paste, and forget my "copy the values out first" warning.** That precaution only mattered because I thought retyping was the only route. The postmeta values survive the field-group move regardless of where the group is *located*, so nothing is at risk.

Revised sequence:

**1. Snapshot first**
```bash
wp db export btl-before-globals-$(date +%F).sql

## In Siteground
ssh BoxingTrainer  
cd ~/www/boxingtrainer.london/public_html/
wp db export btl-before-globals-$(date +%F).sql

## In Docker
cd ~/Dockers/boxingtrainer
docker compose run --rm wpcli db export btl-before-globals-$(date +%F).sql
 
```

**2. Find the homepage ID**
```bash
wp post list --post_type=page --meta_key=_wp_page_template \
  --meta_value=btl-home-2026.php --fields=ID,post_title

## In Siteground
cd ~/www/boxingtrainer.london/public_html/
wp post list --post_type=page --meta_key=_wp_page_template \
  --meta_value=btl-home-2026.php --fields=ID,post_title
+------+------------+
| ID   | post_title |
+------+------------+
| 4814 | Home 2026  |
+------+------------+

## In Docker
cd ~/Dockers/boxingtrainer
docker compose run --rm wpcli post list --post_type=page --meta_key=_wp_page_template \
  --meta_value=btl-home-2026.php --fields=ID,post_title \
  --skip-plugins --skip-themes
+------+---------------+
| ID   | post_title    |
+------+---------------+
| 4070 | Homepage 2026 |
+------+---------------+
```

**3. Move the four field definitions** from `group_btl_home_2026` into `group_btl_global` in `inc/acf-fields.php`, keeping the keys identical, and upload.

 - `btl_nav_links`
 - `btl_footer_blurb`
 - `btl_footer_site_links`
 - `btl_footer_training_links`

**4. Copy the values across**
```bash
wp eval '
$home = 123; // ID from step 2
foreach (["btl_nav_links","btl_footer_blurb","btl_footer_site_links","btl_footer_training_links"] as $f) {
    $v = get_field($f, $home);
    if (empty($v)) { WP_CLI::warning("empty: $f"); continue; }
    update_field($f, $v, "option");
    WP_CLI::success("$f migrated");
}'

## In Siteground
cd ~/www/boxingtrainer.london/public_html/
wp eval '
$home = 4814; // ID from step 2
foreach (["btl_nav_links","btl_footer_blurb","btl_footer_site_links","btl_footer_training_links"] as $f) {
    $v = get_field($f, $home);
    if (empty($v)) { WP_CLI::warning("empty: $f"); continue; }
    update_field($f, $v, "option");
    WP_CLI::success("$f migrated");
}'
Success: btl_nav_links migrated
Success: btl_footer_blurb migrated
Success: btl_footer_site_links migrated
Success: btl_footer_training_links migrated

## In Docker
cd ~/Dockers/boxingtrainer
docker compose run --rm wpcli eval '
$home = 4070; // ID from step 2
foreach (["btl_nav_links","btl_footer_blurb","btl_footer_site_links","btl_footer_training_links"] as $f) {
    $v = get_field($f, $home);
    if (empty($v)) { WP_CLI::warning("empty: $f"); continue; }
    update_field($f, $v, "option");
    WP_CLI::success("$f migrated");
}'
Success: btl_nav_links migrated
Success: btl_footer_blurb migrated
Success: btl_footer_site_links migrated
Success: btl_footer_training_links migrated

```

`update_field()` handles the repeater serialisation itself, so you get an exact transfer with no transcription risk. Run it *after* step 3 so the fields resolve against the options page.

**5. Verify**
```bash
wp option get options_btl_nav_links
wp eval 'print_r(get_field("btl_nav_links","option"));'

## In Siteground
cd ~/www/boxingtrainer.london/public_html/
wp option get options_btl_nav_links
wp eval 'print_r(get_field("btl_nav_links","option"));'

## In Docker
cd ~/Dockers/boxingtrainer
docker compose run --rm wpcli option get options_btl_nav_links
docker compose run --rm wpcli eval 'print_r(get_field("btl_nav_links","option"));'

```
Then check the frontend nav and footer render identically.

**6. Once confirmed**, `btl_shared_field()` and `btl_shared_text()` in `btl-homepage.php` can drop their fallback branches and become plain `get_field($f, 'option')` calls — and `btl_home_page_id()` can go entirely. I'd leave them in place for a week or so first; they cost nothing and they're the safety net if step 4 turns out to have missed something.

Old postmeta on the homepage can stay — it's harmless, and it's your rollback if anything looks wrong.

Want me to produce the edited `inc/acf-fields.php` with those four blocks relocated? That's the only file change in the whole sequence, and I can give you just the changed hunks rather than the full 286 lines.