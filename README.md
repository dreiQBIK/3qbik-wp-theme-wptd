# wptd Theme

WordPress Theme with Timber, ACF and acf-builder

## Installing the Theme

Install this theme as you would any other, and be sure the Timber plugin is activated (see dependencies). But hey, let's break it down into some bullets:

1. Make sure you have installed the plugin for the [Timber Library](https://wordpress.org/plugins/timber-library/) (and Advanced Custom Fields - they [play quite nicely](http://timber.github.io/timber/#acf-cookbook) together).
2. Download the zip for this theme (or clone it) and move it to `wp-content/themes` in your WordPress installation.
3. Rename the folder to something that makes sense for your website (generally no spaces and all lowercase).
4. Activate the theme in Appearance > Themes.
5. Do your thing! And read [the docs](https://timber.github.io/docs/).

### Dependencies

This theme is build with Timber and ACF (including acf-builder). **Therefore you need to install these plugins first, before you activate the theme!**

-  ACF PRO
-  Timber
-  Yoast SEO (for title and description tags - they will not show up without it)

## What's here?

`src/` is where you can keep your development front-end scripts, styles, or images.

`templates/` contains all of your Twig templates. These pretty much correspond 1 to 1 with the PHP files that respond to the WordPress template hierarchy. At the end of each PHP template, you'll notice a `Timber::render()` function whose first parameter is the Twig file where that data (or `$context`) will be used. Just an FYI.

`inc/` contains all PHP functionality you want to add to your theme - these files get included in the `functions.php`.

`inc/acf/` is where you register you ACF fields. Don't forget to include register each file in the `functions.php`!

## Other Resources

The [main Timber Wiki](https://timber.github.io/docs/) is super great, so reference those often. Also, check out these articles and projects for more info:

-  [Twig for Timber Cheatsheet](http://notlaura.com/the-twig-for-timber-cheatsheet/)
-  [Timber and Twig Reignited My Love for WordPress](https://css-tricks.com/timber-and-twig-reignited-my-love-for-wordpress/) on CSS-Tricks
