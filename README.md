# Boxing Trainer

A clean slate Wordpress theme template with Bootstrap(5). Based in WP theme LPD ABCPersonal (https://themesinfo.com/wp-theme-lpd-abcpersonal-ewuv)


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