<?php
/**
 * ***********************************************************************************************
 *
 *  > ADD_EXTRA_IMAGE_THUMBS
 *  > ADD_NEW_USER_ROLE
 *  > REMOVE_HTML_COMMENTS
 *  >
 *  >
 *
 * @package wptd
 *********************************************************************************************** */

 /************************************************************************************************
     ADD_EXTRA_IMAGE_THUMBS
        Make sure featured images are enabled
 ************************************************************************************************* */

if ( function_exists('add_image_size') )  {
    add_theme_support( 'post-thumbnails' );
}
// Add featured image sizes
if ( function_exists('add_image_size') ) {
    add_image_size( 'own-thumb-xl', 1920, 9999 );
    add_image_size( 'own-thumb-l', 1600, 9999 );
    add_image_size( 'own-thumb-ml', 1200, 9999 );
    add_image_size( 'own-thumb-m', 900, 9999 );
    add_image_size( 'own-thumb-s', 600, 9999 );
    add_image_size( 'own-thumb-xs', 400, 9999 );

    //* Add new image sizes to media selection
    function post_image_sizes($sizes){
        $custom_sizes = array(
            'own-thumb-xl' => 'Special Size 1920w',
            'own-thumb-l'  => 'Special Size 1600w',
            'own-thumb-ml' => 'Special Size 1200w',
            'own-thumb-m'  => 'Special Size 900w',
            'own-thumb-s'  => 'Special Size 600w',
            'own-thumb-xs' => 'Special Size 400w'
        );
        return array_merge( $sizes, $custom_sizes );
    }
    add_filter('image_size_names_choose', 'post_image_sizes');
}



/************************************************************************************************
    ADD_NEW_USER_ROLE
*************************************************************************************************/

$admin_role_set = get_role( 'administrator' )->capabilities;
$role           = 'superadmin';
$display_name   = 'Superadmin';
add_role( $role, $display_name, $admin_role_set );

remove_role( 'content_admin' );



/************************************************************************************************
    REMOVE_HTML_COMMENTS
*************************************************************************************************/

function wptd_remove_html_comments($content = '') {
    return preg_replace('/<!--(.|\s)*?-->/', '', $content);
}


/************************************************************************************************
    REMOVE_WP_EMBED
*************************************************************************************************/

function wptd_remove_wp_embed(){
    wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'wptd_remove_wp_embed' );


/************************************************************************************************
    REMOVE_WP_EMOJI_SUPPORT
*************************************************************************************************/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
