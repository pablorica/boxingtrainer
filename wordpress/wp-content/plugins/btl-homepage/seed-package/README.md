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
