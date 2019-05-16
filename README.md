# Theme WPTD

WordPress Theme with Timber, ACF and acf-builder

## Installing the Theme

Install this theme and be sure the Timber plugin is activated (see dependencies):

1. Install current [WordPress Version](https://de.wordpress.org/download/)
2. Setup localhost in your local-server (Naming-Convention: projectname.local)
3. Install plugins: [Timber Library](https://wordpress.org/plugins/timber-library/) and [Advanced Custom Fields](https://de.wordpress.org/plugins/advanced-custom-fields/)
4. Download the zip for this [theme](https://github.com/dreiQBIK/3qbik-wp-theme-wptd) (or clone it) and move it to `wp-content/themes/custom-theme-name` in your WordPress installation.
5. Rename the folder (custom-theme-name) to something that makes sense for your website (generally no spaces and all lowercase).
6. Activate the theme in WordPress Backend > Appearance > Themes.
7. Open console in path `wp-content/themes/custom-theme-name/_config`.
   -  Use command `npm install` or `yarn install` to install dependencies.
   -  Use command `ncu` to update dependencies.
8. Open file `wp-content/themes/custom-theme-name/_config/config.json` and rename host-settings to `"host": "projectname.local"`.
9. Open file `/wp-config.php` and add the line `define( 'WP_DEBUG', true );` below `$table_prefix = 'wp_';` at the bottom of the file.
10. Go to phpMyAdmin `http://localhost/phpMyAdmin/` chose the project database, then chose table `prefix_options` and add the `"host": "http://projectname.local"` to the rows `siteurl` and `home`
11. Go to WordPress Backend `http://projectname.local/wp-admin/options-permalink.php` and set/save permalinks

### Dependencies

This theme is build with Timber and ACF (including acf-builder). **Therefore you need to install these plugins first, before you activate the theme!**

-  [ACF PRO](https://www.advancedcustomfields.com/pro/)
-  [Timber](https://de.wordpress.org/plugins/timber-library/)
-  [Yoast SEO](https://de.wordpress.org/plugins/wordpress-seo/) (for title and description tags - they will not show up without it)

## Theme folder structure

`src/` is where you can keep your development front-end scripts, styles, or images.

`templates/` contains all of your Twig templates. These pretty much correspond 1 to 1 with the PHP files that respond to the WordPress template hierarchy. At the end of each PHP template, you'll notice a `Timber::render()` function whose first parameter is the Twig file where that data (or `$context`) will be used.

`inc/` contains all PHP functionality you want to add to your theme - these files get included in the `functions.php`.

`inc/acf/` is where you register you ACF fields. All ACF fields get included automatically!

## Other Resources

-  [Timber docs](https://timber.github.io/docs/)
-  [Twig for Timber Cheatsheet](http://notlaura.com/the-twig-for-timber-cheatsheet/)
-  [Twig Docs](https://twig.symfony.com/doc/2.x/functions/index.html)
-  [ACF Docs](https://www.advancedcustomfields.com/resources/)
-  [ACF Builder Docs](https://github.com/StoutLogic/acf-builder/wiki)
-  [Timber and Twig Reignited My Love for WordPress](https://css-tricks.com/timber-and-twig-reignited-my-love-for-wordpress/) on CSS-Tricks
