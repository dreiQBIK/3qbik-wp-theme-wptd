<?php

/**
 * ***********************************************************************************************
 *
 *  > CHANGE_LOGIN_LOGO_URL
 *  > BACKEND_TEHEME_FOOTER_TEXT
 *  > BACKEND_COLOR_TEHEME
 *  > REMOVE_WP_TINYMCE
 *  >
 *  >
 *
 * @package wptd
 *********************************************************************************************** */


/* ****************************************************
   CHANGE_LOGIN_LOGO_URL
******************************************************* */

function wptd_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wptd_login_logo_url' );


/* ****************************************************
   BACKEND_TEHEME_FOOTER_TEXT
******************************************************* */

function wptd_change_footer_admin() {
    echo 'developed by ';
    echo '<a href="https://dreiqbik.de/" target="_blank">dreiQBIK GmbH<a/>';
}
add_filter( 'admin_footer_text', 'wptd_change_footer_admin' );


/* ****************************************************
   BACKEND_COLOR_TEHEME
******************************************************* */

function wptd_backend_color_scheme() {
    $theme_dir = get_template_directory_uri();
    wp_admin_css_color(
        'wptd-backend-css',
        __('wptd Color-Theme', 'wptd'),
        $theme_dir . '/assets/css/style-theme.css',
        array(
            '#202A35',
            '#364250',
            '#fff191',
            '#ec764d',
        ),
        array(
            'base' => '#202A35',
            'focus' => '#fff191',
            'current' => '#ec764d',
        )
    );
}
add_action( 'admin_init', 'wptd_backend_color_scheme' );

// set default color scheme for new users
function wptd_set_backend_color_scheme_as_default( $user_id ) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'wptd-backend-css',
    );
    wp_update_user($args);
}
add_action( 'user_register', 'wptd_set_backend_color_scheme_as_default' );

// change default color scheme for all users
function wptd_update_backend_color_scheme( $color_scheme ) {
    $color_scheme = 'wptd-backend-css';
    return $color_scheme;
}
add_filter( 'get_user_option_admin_color', 'wptd_update_backend_color_scheme', 5 );


/* ****************************************************
   REMOVE_WP_TINYMCE
******************************************************* */

// Remove default WordPress TinyMce globally on each template except tpl-tinymce.php
function wptd_hide_tinymce() {
    $template_file = basename(get_page_template());

    if ($template_file != 'tpl-tinymce.php') {
        remove_post_type_support('post', 'editor');
        remove_post_type_support('page', 'editor');
    }
}
add_action( 'admin_head', 'wptd_hide_tinymce' );
