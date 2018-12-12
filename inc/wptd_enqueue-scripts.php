<?php
/**
 * ***********************************************************************************************
 * Enqueue Scripts and Stylesheets
 *
 * @package wptd
 *********************************************************************************************** */


// Enqueue default-css and default-js files
function wptd_scripts()
{
    // CSS-Files DEV mode
    if ( WP_DEBUG ) {
        wp_enqueue_style('wptd-style', get_template_directory_uri() . '/style.css', date('H:i:s'));
    // CSS-Files PROD mode
    } else {
        wp_enqueue_style('wptd-style', get_template_directory_uri() . '/style.min.css', '18121201');
    }

    // JS-Files DEV mode
    if ( WP_DEBUG ) {
        wp_enqueue_script( 'wptd-vendor', get_template_directory_uri() . '/assets/js/vendor/vendor.js', array('jquery'), date('H:i:s'), true );
        wp_enqueue_script( 'wptd-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), date('H:i:s'), true );

    // JS-Files PROD mode
    } else {
        wp_enqueue_script( 'wptd-vendor', get_template_directory_uri() . '/assets/js/vendor/vendor.min.js', array('jquery'), '18121201', true );
        wp_enqueue_script( 'wptd-main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '18121201', true );
    }

    if (is_singular() && comments_open() && get_option( 'thread_comments' )) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'wptd_scripts' );


// Enqueue login-css file
function wptd_login_style() {
    if (WP_DEBUG) {
        wp_enqueue_style( 'wptd-login', get_stylesheet_directory_uri() . '/assets/css/style-login.css', date('H:i:s') );
    } else {
        wp_enqueue_style( 'wptd-login', get_stylesheet_directory_uri() . '/assets/css/style-login.min.css', '18121201' );
    }
}
add_action( 'login_enqueue_scripts', 'wptd_login_style' );


// Enqueue tinymce-css file
function wptd_tinymce_style() {
  if (WP_DEBUG) {
      add_editor_style( '/assets/css/style-tinymce.css');
  } else {
      add_editor_style( '/assets/css/style-tinymce.min.css' );
  }
}
add_action( 'admin_init', 'wptd_tinymce_style' );
