<?php
/**
 * ***********************************************************************************************
 *
 *  > THEME_BASIC_SETUP
 *  >
 *
 * @package wptd
 *********************************************************************************************** */

/* ***********************************************************************************************
    https://github.com/olefredrik/FoundationPress/blob/master/library/theme-support.php

*********************************************************************************************** */


/* ****************************************************
   THEME_BASIC_SETUP
******************************************************* */

function wptd_theme_support() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on wptd, use a find and replace
     * to change 'wptd' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'wptd', get_template_directory() . '/languages' );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5
    add_theme_support(
        'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'wptd_theme_support' );
