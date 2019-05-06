<?php
/**
 * ***********************************************************************************************
 *
 *  > REMOVE_META_BOXES_FROM_POSTS_EDIT_SCREEN
 *  > REMOVE_META_SIDE_BOXES_FROM_POSTS_EDIT_SCREEN
 *  > REMOVE_META_ADVANCED_BOXES_FROM_POSTS_EDIT_SCREEN
 *  > REMOVE_OTHER_FROM_POSTS
 *
 * @package wptd
 *********************************************************************************************** */

/* ***********************************************************************************************
   https://developer.wordpress.org/reference/functions/remove_meta_box/
   https://codex.wordpress.org/Function_Reference/remove_meta_box
   https://gist.github.com/aliciaduffy/3362670

*********************************************************************************************** */

//get current user
$user = wp_get_current_user();
// define a user or a list of users
$role_administrator = array('administrator');


/* ****************************************************
   REMOVE_META_BOXES_FROM_POSTS_EDIT_SCREEN
******************************************************* */

function wptd_remove_meta_boxes() {
   // page
   remove_meta_box('commentstatusdiv', 'page', 'normal'); // Discussion
   remove_meta_box('commentsdiv', 'page', 'normal'); // Comments
   remove_meta_box('revisionsdiv', 'page', 'normal'); // Revisions
   remove_meta_box('slugdiv', 'page', 'normal'); // Slug

   // posts
   // remove_meta_box('formatdiv', 'post', 'normal'); // Format
   // remove_meta_box('revisionsdiv', 'post', 'normal'); // Revisions
}
if (!array_intersect($role_administrator, $user->roles)) {
   add_action('admin_menu', 'wptd_remove_meta_boxes');
}


/* ****************************************************
   REMOVE_META_SIDE_BOXES_FROM_POSTS_EDIT_SCREEN
******************************************************* */

function wptd_remove_side_meta_boxes() {
   // page
   remove_meta_box('postimagediv', 'page', 'side'); // Featured Image
}
if (!array_intersect($role_administrator, $user->roles)) {
   add_action('do_meta_boxes', 'wptd_remove_side_meta_boxes');
}


/* ****************************************************
   REMOVE_META_ADVANCED_BOXES_FROM_POSTS_EDIT_SCREEN
******************************************************* */

function wptd_remove_advanced_meta_boxes() {
   // page
   remove_meta_box('pluginid-example', 'page', 'advanced'); // Example Plugin
}
// if (!array_intersect($role_administrator, $user->roles)) {
//    add_action('do_meta_boxes', 'wptd_remove_advanced_meta_boxes');
// }


/* ****************************************************
   REMOVE_OTHER_FROM_POSTS
******************************************************* */

// remove screen-options
// if (!array_intersect($role_administrator, $user->roles)) {
//    add_filter('screen_options_show_screen', '__return_false');
// }

// remove help
function wptd_remove_help_tabs($old_help, $screen_id, $screen) {
   $screen->remove_help_tabs();
   return $old_help;
}
// if (!array_intersect($role_administrator, $user->roles)) {
//    add_filter('contextual_help', 'wptd_remove_help_tabs', 999, 3);
// }

// Remove Quick Edit Option from Posts
function wptd_remove_quick_edit( $actions ) {
   unset($actions['inline hide-if-no-js']);
   return $actions;
}
// if (!array_intersect($role_administrator, $user->roles)) {
//    add_filter('post_row_actions','wptd_remove_quick_edit',10,1);
// }
