
# Change Log
All notable changes to this project will be documented in this file.
 
The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).


## [1.2.4] - 2026-07-24

### Update

- *About -> Photo* alignment

## [1.2.3] - 2026-07-22

### Fix

- Resolved a PHP fatal error affecting certain blog posts. 
  - The custom comments callback (`lpd_abcpersonal_comments_callback`) was being called statically by `wp_list_comments()`, but the method was declared as non-static. Updated the callback method to `public static`, restoring normal rendering of affected posts and preventing intermittent layout issues caused by the fatal error.

### Added

- New `.stubs` files


## [1.2.2] - 2026-07-21

### Added

- Plugin compressor made in Python

## [1.2.1] - 2026-07-20

### Added

- `.stubs` folder
- `.editorconfig`file
  
### Updated

- Custom Plugin: BTL Homepage 2026


## [1.2.0] - 2026-07-16

### Added

- Custom Plugin: BTL Homepage 2026
  

## [1.1.2] - 2025-12-13

### Fixed

- Plugin error message:
  - WPBakery License Error: cURL error 28: Connection timed out after 10001 milliseconds. Please try again.


### Added

- Add the main category to the blog URLs (e.g. https://boxingtrainer.london/blog/personal-training/best-sports-to-boost-energy/)
  

## [1.1.1] - 2025-09-18


# Performance improvements (mobile) 

Mobile PageSpeed Insights now scores **93/100** (up from \~76).
Primary focus: faster LCP on mobile and a leaner critical path.


## [1.1,0] - 2025-01-01

* **Hero (LCP) image**

  * No lazy-load; `loading="eager"`, `fetchpriority="high"`, `decoding="async"`.
  * Accurate `sizes` so phones don’t over-download:

    ```
    (max-width: 480px) 412px, (max-width: 768px) 520px, 1180px
    ```
  * Preloaded in `<head>` with matching `imagesrcset`/`imagesizes`.
  * Excluded from NitroPack’s lazy-loading.

* **Responsive image variants**

  * Added intermediate widths to improve browser choice on DPR 2–3 devices:

    * 480, **640**, **960**, 1180.
  * Regenerated thumbnails so these appear in `srcset`.

* **CSS & fonts**

  * Inline **Critical CSS**; defer the rest.
  * Reduced render-blocking font work:

    * Preconnect to `fonts.gstatic.com` (and CDN).
    * `font-display: swap`.
    * Only preload one above-the-fold face/weight.
  * Where possible, defer/replace icon fonts with SVGs.

* **JS & below-the-fold**

  * Defer/delay non-critical scripts.
  * Use `content-visibility: auto` for large below-the-fold sections.

* **Caching/optimization**

  * Using **NitroPack** (image optimisation, minification, caching).
    SiteGround cache intentionally **disabled** to avoid duplication/conflict.

