<?php
/**
 * ***********************************************************************************************
 *
 *  > ENQUEUE_DEFAULT_CSS_AND_JS
 *  > ENQUEUE_LOGIN_CSS
 *  > ENQUEUE_TINYMCE_CSS
 *  > ADD_VERSIONED_SCRIPT
 *  > ADD_VERSIONED_STYLE
 *
 * @package wptd
 *********************************************************************************************** */


/* ****************************************************
   ENQUEUE_DEFAULT_CSS_AND_JS
******************************************************* */

function wptd_frontend_enqueues() {

    $debug      = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
    $css_suffix = $debug ? '.css' : '.min.css';
    $js_suffix  = $debug ? '.js' : '.min.js';

    if ( $debug ) {
        // CSS for debugging Breakpoints
        wp_enqueue_style( 'wptd-debug', get_theme_file_uri( 'assets/css/debug.css' ), date('His') );
    }

    // Styles
    wptd_add_versioned_style( 'wptd-style', 'style' . $css_suffix, false, 'all', $debug );

    // Scripts
    wptd_add_versioned_script( 'wptd-vendor', 'assets/js/vendor/vendor' . $js_suffix, array('jquery'), true, $debug );
    wptd_add_versioned_script( 'wptd-main', 'assets/js/main' . $js_suffix, array('jquery'), true, $debug );
    // wptd_add_versioned_script( 'wptd-example-separate', 'assets/js/separate-files/vendor/example-separate' . $js_suffix, array('jquery'), true, $debug );

    if ( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }

}
add_action( 'wp_enqueue_scripts', 'wptd_frontend_enqueues' );


/* ****************************************************
   ENQUEUE_LOGIN_CSS
******************************************************* */

function wptd_login_style() {

    $debug = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
    $css_suffix = $debug ? '.css' : '.min.css';
    wptd_add_versioned_style( 'wptd-login', 'assets/css/style-login' . $css_suffix, false, 'all', $debug );

}
add_action( 'login_enqueue_scripts', 'wptd_login_style' );


/* ****************************************************
   ENQUEUE_TINYMCE_CSS
******************************************************* */

function wptd_tinymce_style() {

    $debug = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
    $css_suffix = $debug ? '.css' : '.min.css';
    add_editor_style( '/assets/css/style-tinymce' . $css_suffix );

}
add_action( 'admin_init', 'wptd_tinymce_style' );


/** ***************************************************
 * ADD_VERSIONED_SCRIPT
 * ****************************************************
 * Enqueues script with WordPress and adds version number that is a timestamp of the file modified date.
 * This should ensure that users always have the current version of the script, and that the CDN is properly updated.
 * @param string $name The name of the script
 * @param string $path the path to the script, relative to the template directory.
 * @param string $dependencies Array of dependencies (ie, array('jquery') )
 * @link https://iaintnoextra.tumblr.com/post/69085919046/cache-busting-js-and-css-in-wordpress
 */
function wptd_add_versioned_script( $name, $path, $dependencies = false, $in_footer = false, $debug = false ) {

    wp_enqueue_script( $name, get_theme_file_uri( $path ), $dependencies, $debug ? date('His') : filemtime( get_theme_file_path( $path ) ), $in_footer );

}

/** ***************************************************
 * ADD_VERSIONED_STYLE
 * ****************************************************
 * Enqueues stylesheet with WordPress and adds version number that is a timestamp of the file modified date.
 * This should ensure that users always have the current version of the file, and that the CDN is properly updated.
 * @param string $name The name of the stylesheet
 * @param string $path the path to the stylesheet, relative to the template directory.
 * @param string $dependencies Array of dependencies
 * @link https://iaintnoextra.tumblr.com/post/69085919046/cache-busting-js-and-css-in-wordpress
 */
function wptd_add_versioned_style( $name, $path, $dependencies = false, $media = 'all', $debug = false ) {

    wp_enqueue_style( $name, get_theme_file_uri( $path ), $dependencies, $debug ? date('His') : filemtime( get_theme_file_path( $path ) ), $media );

}

