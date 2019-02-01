<?php
// https://developer.wordpress.org/reference/functions/remove_meta_box/
// https://codex.wordpress.org/Function_Reference/remove_meta_box
// https://gist.github.com/aliciaduffy/3362670

/*if (is_admin()) {
   add_action('admin_menu', 'wpdocs_remove_meta_boxes');
   add_action('add_meta_boxes', 'plugin_remove_meta_boxes', 100);
}*/

/**
 * Remove meta boxes from the post edit screens
 */
/*function wpdocs_remove_meta_boxes()
{
   if (!current_user_can('manage_options')) {
      remove_meta_box('postexcerpt', 'post', 'normal');
      remove_meta_box('trackbacksdiv', 'post', 'normal');
      remove_meta_box('commentstatusdiv', 'post', 'normal');
      remove_meta_box('pageparentdiv', 'post', 'normal');
      remove_meta_box('tagsdiv-post_tag', 'post', 'normal');
      remove_meta_box('categorydiv', 'post', 'normal');
      remove_meta_box('formatdiv', 'post', 'normal');
   }
   
   // remove plugin meta-boxes
   function plugin_remove_meta_boxes()
   {
      if (!current_user_can('manage_options')) {
         remove_meta_box('novo-map-post-admin-menu', 'post', 'advanced'); // Novo-Maps meta-box
      }
   }
}*/

// remove screen-options
/*add_filter('screen_options_show_screen', '__return_false');*/

// remove help
/*add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
   $screen->remove_help_tabs();
   return $old_help;
}*/

