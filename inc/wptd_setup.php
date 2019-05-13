<?php
/**
 * ***********************************************************************************************
 *
 *  > ADD_EXTRA_IMAGE_THUMBS
 *  > REMOVE_HTML_COMMENTS
 *  > REMOVE_WP_EMBED
 *  > REMOVE_WP_EMOJI_SUPPORT
 *  > REMOVE_COMMENTS_IP
 *  >
 *
 * @package wptd
 *********************************************************************************************** */


/* ****************************************************
   ADD_EXTRA_IMAGE_THUMBS
******************************************************* */

// Make sure featured images are enabled
if (function_exists('add_image_size')) {
   add_theme_support('post-thumbnails');
}
// Add featured image sizes
if (function_exists('add_image_size')) {
   add_image_size('wptd_thumb_1280', 1280, 9999);
   add_image_size('wptd_thumb_1600', 1600, 9999);
   add_image_size('wptd_thumb_1920', 1920, 9999);

   //* Add new image sizes to media selection
   function post_image_sizes($sizes)
   {
      $custom_sizes = array(
         'wptd_thumb_1280'  => 'Size 1280w',
         'wptd_thumb_1600'  => 'Size 1600w',
         'wptd_thumb_1920' => 'Size 1920w',
      );

      return array_merge($sizes, $custom_sizes);
   }
   add_filter('image_size_names_choose', 'post_image_sizes');
}


/* ****************************************************
   REMOVE_HTML_COMMENTS
******************************************************* */

function wptd_remove_html_comments($content = '') {
   return preg_replace('/<!--(.|\s)*?-->/', '', $content);
}


/* ****************************************************
   REMOVE_WP_EMBED
******************************************************* */

function wptd_remove_wp_embed() {
   wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'wptd_remove_wp_embed');


/* ****************************************************
   REMOVE_WP_EMOJI_SUPPORT
******************************************************* */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/* ****************************************************
   REMOVE_COMMENTS_IP
******************************************************* */

function  wptd_remove_commentsip( $comment_author_ip ) {
   return '';
}
add_filter( 'pre_comment_user_ip', 'wptd_remove_commentsip' );
