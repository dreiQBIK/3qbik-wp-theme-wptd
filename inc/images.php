<?php
/**
 * Custom image sizes and helpers
 *
 * @package wptd
 */

/* ****************************************************
   ADD_EXTRA_IMAGE_SIZES
******************************************************* */
function wptd_setup_image_sizes() {
    // Add custom image sizes
    add_image_size('wptd_thumb_1280', 1280, 9999);
    add_image_size('wptd_thumb_1600', 1600, 9999);
    add_image_size('wptd_thumb_1920', 1920, 9999);
}
add_action( 'after_setup_theme', 'wptd_setup_image_sizes' );

//* Add new image sizes to media selection
function wptd_media_selection_image_sizes( $sizes ) {
    $custom_sizes = array(
        'wptd_thumb_1280'  => __('1280px Breite', 'wpdt'),
        'wptd_thumb_1600'  => __('1600px Breite', 'wptd'),
        'wptd_thumb_1920'  => __('1920px Breite', 'wptd')
    );

    return array_merge($sizes, $custom_sizes);
}
add_filter( 'image_size_names_choose', 'wptd_media_selection_image_sizes' );
