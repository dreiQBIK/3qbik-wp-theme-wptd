<?php
/**
 * ***********************************************************************************************
 *
 *  > ADD_EXTRA_IMAGE_THUMBS
 *  > ADD_NEW_USER_ROLE
 *  > REMOVE_HTML_COMMENTS
 *  > REGISTER_MENUS
 *  >
 *
 * @package wptd
 *********************************************************************************************** */

/************************************************************************************************
 * ADD_EXTRA_IMAGE_THUMBS
 * Make sure featured images are enabled
 ************************************************************************************************* */

if (function_exists('add_image_size')) {
   add_theme_support('post-thumbnails');
}
// Add featured image sizes
if (function_exists('add_image_size')) {
   add_image_size('wptd_thumb_l', 1600, 9999);
   add_image_size('wptd_thumb_xl', 1920, 9999);

   //* Add new image sizes to media selection
   function post_image_sizes($sizes)
   {
      $custom_sizes = array(
         'wptd_thumb_l'  => 'Size 1600w',
         'wptd_thumb_xl' => 'Size 1920w',
      );

      return array_merge($sizes, $custom_sizes);
   }

   add_filter('image_size_names_choose', 'post_image_sizes');
}


/************************************************************************************************
 * REMOVE_HTML_COMMENTS
 *************************************************************************************************/

function wptd_remove_html_comments($content = '')
{
   return preg_replace('/<!--(.|\s)*?-->/', '', $content);
}


/************************************************************************************************
 * REMOVE_WP_EMBED
 *************************************************************************************************/

function wptd_remove_wp_embed()
{
   wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'wptd_remove_wp_embed');


/************************************************************************************************
 * REMOVE_WP_EMOJI_SUPPORT
 *************************************************************************************************/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/************************************************************************************************
 * REGISTER_MENUS
 *************************************************************************************************/
function wptd_register_menus() {
   register_nav_menus( array(
      'primary' => __( 'Hauptnavigation', 'wptd' ),
      'footer' => __( 'Footer', 'wptd' ),
   ));
}
add_action( 'after_setup_theme', 'wptd_register_menus' );
