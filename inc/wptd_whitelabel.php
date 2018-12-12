<?php
/**
 * ***********************************************************************************************
 *
 *  > CHANGE_LOGIN_LOGO_URL
 *  > BACKEND_COLOR_TEHEME
 *  > ADD_NEW_USER_ROLE
 *  > REMOVE_ADMIN_MENU_ITEMS
 *  > REMOVE_SIDE_MENU_ITEMS
 *  > REMOVE_WP_TINYMCE
 *  > REMOVE_META_BOXES
 *  >
 *  >
 *
 * @package wptd
 *********************************************************************************************** */



 /************************************************************************************************
     CHANGE_LOGIN_LOGO_URL
 *************************************************************************************************/

 function wptd_login_logo_url() {
     return home_url();
 }
 add_filter( 'login_headerurl', 'wptd_login_logo_url' );



/************************************************************************************************
    BACKEND_TEHEME_FOOTER_TEXT
*************************************************************************************************/

function wptd_change_footer_admin () {
  echo 'Custom-Theme';
  // echo '<a href="" target="_blank">wptd<a/>';
}
add_filter('admin_footer_text', 'wptd_change_footer_admin');


/************************************************************************************************
    BACKEND_COLOR_TEHEME
*************************************************************************************************/

// add additional color scheme to wordpress backend
function wptd_backend_color_scheme() {
    $theme_dir = get_template_directory_uri();
    wp_admin_css_color(
        'wptd-backend-css',__('wptd Color-Theme'),$theme_dir . '/assets/css/style-theme.css',
        array(
            '#202A35',
            '#364250',
            '#fff191',
            '#ec764d'
        ),
        array(
            'base'    => '#202A35',
            'focus'   => '#fff191',
            'current' => '#ec764d'
        )
    );
}
add_action('admin_init', 'wptd_backend_color_scheme');

// set default color scheme for new users
function wptd_set_backend_color_scheme_as_default($user_id) {
    $args = array(
        'ID'          => $user_id,
        'admin_color' => 'wptd-backend-css',
    );
    wp_update_user($args);
}
add_action('user_register', 'wptd_set_backend_color_scheme_as_default');

// change default color scheme for all users
function wptd_update_backend_color_scheme($color_scheme) {
    $color_scheme = 'wptd-backend-css';
    return $color_scheme;
}
add_filter('get_user_option_admin_color', 'wptd_update_backend_color_scheme', 5);



/************************************************************************************************
    REMOVE_ADMIN_MENU_ITEMS
        https://digwp.com/2016/06/remove-toolbar-items/
*************************************************************************************************/

function wptd_remove_toolbar_nodes($wp_admin_bar) {

    //$wp_admin_bar->remove_node('site-name');
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
    //$wp_admin_bar->remove_node('updates');
    //$wp_admin_bar->remove_node('new-content');
    //$wp_admin_bar->remove_node('view');
    //$wp_admin_bar->remove_node('my-account');
}
add_action('admin_bar_menu', 'wptd_remove_toolbar_nodes', 999);



/************************************************************************************************
    REMOVE_SIDE_MENU_ITEMS
        https://code.tutsplus.com/articles/customizing-your-wordpress-admin--wp-24941
*************************************************************************************************/

//get current user
$user = wp_get_current_user();
// define a user or a list of users
$role = array('superadmin');

// if the user is not superadmin
if( !array_intersect($role, $user->roles ) ) {

    // Remove Menu-Items
    function remove_menus(){

        //Menu Default
        //remove_menu_page( 'index.php' ); //Dashboard
        //remove_menu_page( 'edit.php' ); //Posts
        //remove_menu_page( 'upload.php' ); //Media
        //remove_menu_page( 'edit.php?post_type=page' ); //Pages
        //remove_menu_page( 'edit-comments.php' ); //Comments
        //remove_menu_page( 'themes.php'); //Design
        remove_menu_page( 'plugins.php' ); //Plugins
        //remove_menu_page( 'users.php' ); //Users
        remove_menu_page( 'tools.php' ); //Tools
        remove_menu_page( 'options-general.php' ); //Settings

        //Menu Plugins
        remove_menu_page( 'edit.php?post_type=acf-field-group' ); // ACF
        //remove_menu_page( 'wpcf7' ); // Contact Form 7
    }
    add_action( 'admin_menu', 'remove_menus' );


    // Remove Submenu-Items
    function remove_theme_submenu() {

        //Dashborad
        //remove_submenu_page('index.php', 'index.php'); // Home
        //remove_submenu_page('index.php', 'update-core.php'); // Home

        //Posts
        //remove_submenu_page('edit.php', 'edit.php'); // ALL Posts
        //remove_submenu_page('edit.php', 'post-new.php'); // Add New
        //remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // Categories
        //remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // Tags

        //Media
        //remove_submenu_page('upload.php', 'upload.php'); // Library
        //remove_submenu_page('upload.php', 'media-new.php'); // Add New

        //Pages
        //remove_submenu_page('edit.php?post_type=page', 'edit.php?post_type=page'); // Library
        //remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page'); // Add New

        //Design
        remove_submenu_page('themes.php', 'themes.php'); // Themes
        remove_submenu_page('themes.php', 'widgets.php'); // Widgets
        //remove_submenu_page('themes.php', 'nav-menus.php'); // Menus
        remove_submenu_page('themes.php', 'theme-editor.php'); // Editor

        global $submenu;
        unset($submenu['themes.php'][6]); // Customize
        unset($submenu['themes.php'][20]); // Background

        //Plugins
        remove_submenu_page('plugins.php', 'plugins.php'); // Installed Plugins
        remove_submenu_page('plugins.php', 'plugin-install.php'); // Add New
        remove_submenu_page('plugins.php', 'plugin-editor.php'); // Editor

        //Users
        //remove_submenu_page('users.php', 'users.php'); // All Users
        //remove_submenu_page('users.php', 'user-new.php'); // Add New
        //remove_submenu_page('users.php', 'profile.php'); // Profile

        //Tools
        remove_submenu_page('tools.php', 'tools.php'); // Tools
        remove_submenu_page('tools.php', 'import.php'); // Import
        remove_submenu_page('tools.php', 'export.php'); // Export

        //Settings
        remove_submenu_page('options-general.php', 'options-general.php'); // General
        remove_submenu_page('options-general.php', 'options-reading.php'); // Rading
        remove_submenu_page('options-general.php', 'options-writing.php'); // Writing
        remove_submenu_page('options-general.php', 'options-discussion.php'); // Discussion
        remove_submenu_page('options-general.php', 'options-media.php'); // Media
        remove_submenu_page('options-general.php', 'options-permalink.php'); // Permalink
    }
    add_action('admin_init', 'remove_theme_submenu', 100);

    // Rename List-Items in Menu
    function wptd_rename_menu_items() {
        global $menu;
        global $submenu;
        // print_r($submenu['themes.php'][10][0]);

        $menu[60][0] = 'Navigation'; // Design
        $submenu['themes.php'][10][0] = 'Navigation';
    }
    add_action( 'admin_menu', 'wptd_rename_menu_items' );
}



/************************************************************************************************
 REMOVE_WP_TINYMCE
************************************************************************************************* */

// Remove default WordPress TinyMce on each template except tpl-tinymce.php
function wptd_hide_tinymce() {
    $template_file = basename( get_page_template() );
    if( $template_file != 'tpl-tinymce.php' ){
        remove_post_type_support('post', 'editor');
        remove_post_type_support('page', 'editor');
    }
}
add_action( 'admin_head', 'wptd_hide_tinymce' );



/************************************************************************************************
    REMOVE_META_BOXES
*************************************************************************************************/

// remove post formats from posts
function wptd_remove_formats()
{
   remove_theme_support('post-formats');
}
add_action('after_setup_theme', 'wptd_remove_formats');

// remove featured image from page
function wptd_remove_thumbnail_box() {
  remove_meta_box( 'postimagediv','page','side' );
}
add_action('do_meta_boxes', 'wptd_remove_thumbnail_box');

// remove comments from pages
function remove_comment_support() {
    remove_post_type_support( 'page', 'comments' );
}
add_action('init', 'remove_comment_support', 100);
