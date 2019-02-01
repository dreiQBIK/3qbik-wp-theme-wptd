<?php
// https://developer.wordpress.org/reference/functions/remove_meta_box/
// https://codex.wordpress.org/Function_Reference/remove_meta_box
// https://gist.github.com/aliciaduffy/3362670

// if (!is_admin()) {
add_action('admin_menu', 'wptd_remove_meta_boxes');
add_action('do_meta_boxes', 'wptd_remove_side_meta_boxes');
// }

/**
 * Remove meta boxes from the post edit screens
 */
function wptd_remove_meta_boxes()
{
   if (current_user_can('manage_options')) {
      // page
      remove_meta_box('commentstatusdiv', 'page', 'normal'); // Discussion
      remove_meta_box('commentsdiv', 'page', 'normal'); // Comments
      remove_meta_box('revisionsdiv', 'page', 'normal'); // Revisions

      // posts
      remove_meta_box('formatdiv', 'post', 'normal'); // Format
      remove_meta_box('revisionsdiv', 'post', 'normal'); // Revisions
   }
}

/**
 * Remove meta boxes from the post edit screens
 */
function wptd_remove_side_meta_boxes()
{
   if (current_user_can('manage_options')) {
      remove_meta_box('postimagediv', 'page', 'side'); // Featured Image
   }
}

// remove screen-options
// add_filter('screen_options_show_screen', '__return_false');

// remove help
/* add_filter('contextual_help', 'wptd_remove_help_tabs', 999, 3);
function wptd_remove_help_tabs($old_help, $screen_id, $screen)
{
   $screen->remove_help_tabs();
   return $old_help;
} */
