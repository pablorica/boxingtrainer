# Boxing Trainer

A clean slate Wordpress theme template with Bootstrap(5). Based in WP theme LPD ABCPersonal (https://themesinfo.com/wp-theme-lpd-abcpersonal-ewuv)


[![version](https://img.shields.io/badge/version-1.2.6-green.svg)](https://semver.org)


## Plugin Compressor 

Small script that creates a `.zip` package of a WordPress plugin.

- [PYTHON.md](https://github.com/pablorica/boxingtrainer/blob/main/PYTHON.md)


## BTL Homepage 2026

 Custom plugin to generate the 2026 pages



## Unyson Framework

The theme comes with the [Unyson Framework](https://unyson.io/), which is an extension package with some features for the theme.


### Backup & Demo Content

This extension lets you create an automated backup schedule, import demo content or even create a demo content archive for migration purposes.

  

### Sidebars

Brings a new layer of customization freedom to your website by letting you add more than one sidebar to a page, or different sidebars on different pages.

  
  

### Portfolio

This extension will add a fully fledged portfolio module that will let you display your projects using the built in portfolio pages.

  
  

### Breadcrumbs

Creates a simplified navigation menu for the pages that can be placed anywhere in the theme. This will make navigating the website much easier.

  

### SEO

This extension will enable you to have a fully optimized WordPress website by adding optimized meta titles, keywords and descriptions.

  

### Analytics

Enables the possibility to add the Google Analytics tracking code that will let you get all the analytics about visitors, page views and more.
  

## Theme Settings

Go to *Appareance -> Theme Settings*. There you will find the following options:

 - General
 - Header 
 - Footer
 - Blog
 - Shop
 - Portfolio
 - Events
 - Timetable
 - Contact Form
 - Tables

### Custom CSS and JS

Go to *Appareance -> Theme Settings -> General -> Custom Css/Js*. There you will find two boxes to add your custom CSS and JS.

There is a copy of the custom codes in the files:

 - `custom-css-js/custom-style.css`
- `custom-css-js/custom-script.js`

## Content

The content is managed by [WP Bakery](https://wpbakery.com/) 
The current version is deprecated and shows many JS errors in the console.
Also, backend mode does not work well in a staging environment.

#### HTML Video

The visual composer does not support HTML5 video tags. It only allows to embed videos from Vimeo or Youtube using iframes.
However, we can add a video tag using the raw HTML block:

```html 
<video width="100%" height="100%" autoplay muted loop>
<source  src="/wp-content/uploads/2024/02/kickboxing_girl.mp4"  type="video/mp4">
</video>

The column that contains this Raw HTML block must have the following class: `bgvideo-column`


---


## Code snippets

### 1) Hero image markup (template)

```php
<?php 
if (has_post_thumbnail()) :
  $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
  $attachment = wp_get_attachment_image_src($post_thumbnail_id, 'full');
  $srcset = wp_get_attachment_image_srcset($post_thumbnail_id, 'full');
  $sizes  = '(max-width: 480px) 412px, (max-width: 768px) 520px, 1180px';
?>
  <img
    alt="Main Home Image"
    class="main-home-image"
    src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
    srcset="<?php echo esc_attr($srcset); ?>"
    sizes="<?php echo esc_attr($sizes); ?>"
    width="<?php echo (int) $attachment[1]; ?>"
    height="<?php echo (int) $attachment[2]; ?>"
    loading="eager"
    decoding="async"
    fetchpriority="high"
  />
<?php endif; ?>
```

### 2) Extra responsive widths (in `functions.php`)

```php
add_action('after_setup_theme', function () {
  add_image_size('w-480',  480,  0, false);
  add_image_size('w-640',  640,  0, false);
  add_image_size('w-960',  960,  0, false);
  add_image_size('w-1180', 1180, 0, false); // desktop container max
});
```

Then regenerate:

* WP-CLI: `wp media regenerate` (or “Regenerate Thumbnails” plugin).

In this particular case we just needed to regenerate the hero image (ID 3070):

```bash
wp media regenerate 3070
```

### 3) Preload the hero (in `wp_head`)

```php
add_action('wp_head', function () {
  if (!is_front_page()) return;
  $id = get_post_thumbnail_id(get_the_ID());
  if (!$id) return;

  $src    = wp_get_attachment_image_url($id, 'w-1180');
  $srcset = wp_get_attachment_image_srcset($id, 'full');
  $sizes  = '(max-width: 480px) 412px, (max-width: 768px) 520px, 1180px';

  echo '<link rel="preload" as="image" href="' . esc_url($src) . '" imagesrcset="' .
       esc_attr($srcset) . '" imagesizes="' . esc_attr($sizes) .
       '" fetchpriority="high" crossorigin>';
});
```

## Further optimizations

### Head hints (top of `<head>`)

```html
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn-ilcfgkh.nitrocdn.com" crossorigin> <!-- when CDN enabled -->
<link rel="preconnect" href="https://boxingtrainer.london" crossorigin>
```

### Defer non-critical CSS (if not handled by optimizer)

```html
<link rel="preload" as="style" href="/path/combined.css">
<link rel="stylesheet" href="/path/combined.css" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="/path/combined.css"></noscript>
```

### Below-the-fold sections

```css
.section-below-fold {
  content-visibility: auto;
  contain-intrinsic-size: 1px 1000px; /* reserve space to prevent layout shift */
}
```

## NitroPack configuration

* **Images**: WebP/AVIF on; **exclude** `.main-home-image` from lazy; keep compression \~60–70 quality for mobile candidates.
* **CSS**: Critical CSS enabled; combine/defer non-critical.
* **JS**: Defer/delay non-critical; load heavy widgets on interaction.
* **Caching**: Nitro cache on. SiteGround cache **off** (by design).


## Verification checklist

* PSI/Lighthouse (Mobile) shows **LCP element** = hero image; **LCP resource** is **preloaded** and **not lazy-loaded**.
* DevTools → Elements: `sizes` present and matches layout slot widths.
* DevTools → Console:

  ```js
  document.querySelector('.main-home-image').currentSrc
  ```

  returns a \~640–960w asset on DPR 2 phones.
* Fonts load with `font-display: swap`; only one above-the-fold preload.
* Initial render blocked by ≤1 CSS file (plus inline critical).


## Copyright and License

Copyright 2025 Codigo Wordpress Theme released under the [MIT](https://github.com/pablorica/sparemytime/blob/main/LICENSE) license.

## Versioning

We use [SemVer](https://semver.org/) for versioning. For the versions available, [list of tags can be found in this page](https://github.com/pablorica/boxingtrainer/tags).

### Changelog

[CHANGELOG.md](https://github.com/pablorica/boxingtrainer/blob/main/CHANGELOG.md)
