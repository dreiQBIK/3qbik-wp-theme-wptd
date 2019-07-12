<?php
/**
 * ***********************************************************************************************
 *
 *  > REMOVE_ADMIN_BAR_ITEMS
 *
 * @package wptd
 *********************************************************************************************** */

/* ***********************************************************************************************
   https://paulund.co.uk/how-to-remove-links-from-wordpress-admin-bar

   'wp-logo'          // Remove the Wordpress logo
   'about'            // Remove the about Wordpress link
   'wporg'            // Remove the Wordpress.org link
   'documentation'    // Remove the Wordpress documentation link
   'support-forums'   // Remove the support forums link
   'feedback'         // Remove the feedback link
   'site-name'        // Remove the site name menu
   'view-site'        // Remove the view site link
   'updates'          // Remove the updates link
   'comments'         // Remove the comments link
   'new-content'      // Remove the content link
   'w3tc'             // If you use w3 total cache remove the performance link
   'my-account'       // Remove the user details tab

*********************************************************************************************** */


// Get current user
$user = wp_get_current_user();
// Define a user or a list of users
$role_admin = array('admin');


/* ****************************************************
   REMOVE_ADMIN_BAR_ITEMS
******************************************************* */

function wptd_remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');          // Remove the Wordpress logo
    $wp_admin_bar->remove_menu('about');            // Remove the about Wordpress link
    $wp_admin_bar->remove_menu('wporg');            // Remove the Wordpress.org link
    $wp_admin_bar->remove_menu('documentation');    // Remove the Wordpress documentation link
    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
}
if ( array_intersect($role_admin, $user->roles) ) {
    add_action('wp_before_admin_bar_render', 'wptd_remove_admin_bar_links');
}
