<?php
/**
 * ***********************************************************************************************
 *
 *  > REMOVE_MENU_ITEMS
 *  > REMOVE_SUBMENU_ITEMS
 *  > RENAME_MENU_ITEMS
 *
 * @package wptd
 *********************************************************************************************** */

/* ***********************************************************************************************
   https://code.tutsplus.com/articles/customizing-your-wordpress-admin--wp-24941
   https://hotexamples.com/examples/-/-/remove_menu_page/php-remove_menu_page-function-examples.html

      function list_menu_items() {
      global $menu;
      global $submenu;
      print_r($menu);
      print_r($submenu);
   }
   add_action('admin_menu', 'list_menu_items');

*********************************************************************************************** */


 //get current user
$user = wp_get_current_user();
// define a user or a list of users
$role_admin = array('admin');


/* ****************************************************
   REMOVE_MENU_ITEMS
******************************************************* */

function wptd_remove_menus() {

   // Menu Default
   // remove_menu_page('index.php'); //Dashboard
   remove_menu_page('themes.php'); //Design
   // remove_menu_page('plugins.php'); //Plugins
   // remove_menu_page('users.php'); //Users

   // Menu Plugins
   remove_menu_page('edit.php?post_type=acf-field-group'); // ACF
   // remove_menu_page('wpcf7'); // Contact Form 7
}

if (array_intersect($role_admin, $user->roles)) {
   add_action('admin_menu', 'wptd_remove_menus');
}


/* ****************************************************
   REMOVE_SUBMENU_ITEMS
******************************************************* */

// function wptd_remove_theme_submenu() {
//    //Dashborad
//    remove_submenu_page('index.php', 'index.php'); // Home
//    remove_submenu_page('index.php', 'update-core.php'); // Home

//    //Posts
//    remove_submenu_page('edit.php', 'edit.php'); // ALL Posts
//    remove_submenu_page('edit.php', 'post-new.php'); // Add New
//    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // Categories
//    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // Tags

//    //Media
//    remove_submenu_page('upload.php', 'upload.php'); // Library
//    remove_submenu_page('upload.php', 'media-new.php'); // Add New

//    //Pages
//    remove_submenu_page('edit.php?post_type=page', 'edit.php?post_type=page'); // Library
//    remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page'); // Add New

//    //Design
//    remove_submenu_page('themes.php', 'themes.php'); // Themes
//    remove_submenu_page('themes.php', 'widgets.php'); // Widgets
//    remove_submenu_page('themes.php', 'nav-menus.php'); // Menus
//    remove_submenu_page('themes.php', 'theme-editor.php'); // Editor

//    global $submenu;
//    unset($submenu['themes.php'][6]); // Customize
//    unset($submenu['themes.php'][20]); // Background

//    //Plugins
//    remove_submenu_page('plugins.php', 'plugins.php'); // Installed Plugins
//    remove_submenu_page('plugins.php', 'plugin-install.php'); // Add New
//    remove_submenu_page('plugins.php', 'plugin-editor.php'); // Editor

//    //Users
//    remove_submenu_page('users.php', 'users.php'); // All Users
//    remove_submenu_page('users.php', 'user-new.php'); // Add New
//    remove_submenu_page('users.php', 'profile.php'); // Profile

//    //Tools
//    remove_submenu_page('tools.php', 'tools.php'); // Tools
//    remove_submenu_page('tools.php', 'import.php'); // Import
//    remove_submenu_page('tools.php', 'export.php'); // Export

//    //Settings
//    remove_submenu_page('options-general.php', 'options-general.php'); // General
//    remove_submenu_page('options-general.php', 'options-reading.php'); // Rading
//    remove_submenu_page('options-general.php', 'options-writing.php'); // Writing
//    remove_submenu_page('options-general.php', 'options-discussion.php'); // Discussion
//    remove_submenu_page('options-general.php', 'options-media.php'); // Media
//    remove_submenu_page('options-general.php', 'options-permalink.php'); // Permalink
// }
// add_action('admin_init', 'wptd_remove_theme_submenu', 100);


/* ****************************************************
RENAME_MENU_ITEMS
******************************************************* */

// function wptd_rename_menu_items() {
//    global $menu;
//    global $submenu;

//    $menu[5][0] = 'Empfehlungen'; // Posts
//    $submenu['edit.php'][5][0] = 'Alle Empfehlungen';
// }
// add_action('admin_menu', 'wptd_rename_menu_items');



