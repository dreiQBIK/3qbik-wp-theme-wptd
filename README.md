# wptd Theme

WordPress Theme with Timber, ACF and acf-builder

## Installing the Theme

Install this theme and be sure the Timber plugin is activated (see dependencies):

1. Make sure you have installed the plugin for the [Timber Library](https://wordpress.org/plugins/timber-library/) and [Advanced Custom Fields](https://de.wordpress.org/plugins/advanced-custom-fields/)
2. Download the zip for this [theme](https://github.com/) (or clone it) and move it to `wp-content/themes/custom-theme-name` in your WordPress installation.
3. Rename the folder (custom-theme-name) to something that makes sense for your website (generally no spaces and all lowercase).
4. Activate the theme in WordPress Backend > Appearance > Themes.
5. Öffne deine Konsole in dem folgenden Pfad `wp-content/themes/custom-theme-name/_config`.
  - Führe `npm install` aus um die Dependencies zu installieren.
  - Führe `ncu` aus, um die Dependencies auf den neusten Stand zu bringen.

### Dependencies

This theme is build with Timber and ACF (including acf-builder). **Therefore you need to install these plugins first, before you activate the theme!**

-  [ACF PRO](https://www.advancedcustomfields.com/pro/)
-  [Timber](https://de.wordpress.org/plugins/timber-library/)
-  [Yoast SEO](https://de.wordpress.org/plugins/wordpress-seo/) (for title and description tags - they will not show up without it)

## Theme folder structure

`src/` is where you can keep your development front-end scripts, styles, or images.

`templates/` contains all of your Twig templates. These pretty much correspond 1 to 1 with the PHP files that respond to the WordPress template hierarchy. At the end of each PHP template, you'll notice a `Timber::render()` function whose first parameter is the Twig file where that data (or `$context`) will be used. Just an FYI.

`inc/` contains all PHP functionality you want to add to your theme - these files get included in the `functions.php`.

`inc/acf/` is where you register you ACF fields. Don't forget to include register each file in the `functions.php`!

## Other Resources

-  [Timber docs](https://timber.github.io/docs/)
-  [Twig for Timber Cheatsheet](http://notlaura.com/the-twig-for-timber-cheatsheet/)
-  [Twig Docs](https://twig.symfony.com/doc/2.x/functions/index.html)
-  [ACF Docs](https://www.advancedcustomfields.com/resources/)
-  [ACF Builder Docs](https://github.com/StoutLogic/acf-builder/wiki)
-  [Timber and Twig Reignited My Love for WordPress](https://css-tricks.com/timber-and-twig-reignited-my-love-for-wordpress/) on CSS-Tricks
