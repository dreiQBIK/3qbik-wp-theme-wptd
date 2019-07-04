<?php
/**
 * ***********************************************************************************************
 *
 *  > CLEAN_UP
 *  > CLEAN_UP_HEAD
 *  > RENAME_MENU_ITEMS
 *
 * @package wptd
 *********************************************************************************************** */

/* ***********************************************************************************************
    https://github.com/olefredrik/FoundationPress/blob/master/library/cleanup.php

*********************************************************************************************** */


/* ****************************************************
   CLEAN_UP
******************************************************* */

function wptd_start_cleanup() {

    // Launching operation cleanup
    add_action( 'init', 'wptd_cleanup_head' );

    // Remove the 'wp-block-library.css' file from wp_head()
    add_action( 'wp_enqueue_scripts', function() {
        wp_dequeue_style( 'wp-block-library' );
    } );

    // Remove WP version from RSS
    add_filter( 'the_generator', '__return_empty_string' );

}
add_action( 'after_setup_theme', 'wptd_start_cleanup' );


/* ****************************************************
   CLEAN_UP_HEAD
******************************************************* */

function wptd_cleanup_head() {

    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );

    // Category feed links
    remove_action( 'wp_head', 'feed_links_extra', 3 );

    // Post and comment feed links
    remove_action( 'wp_head', 'feed_links', 2 );

    // Windows Live Writer
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Index link
    remove_action( 'wp_head', 'index_rel_link' );

    // Previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10 );

    // Start link
    remove_action( 'wp_head', 'start_post_rel_link', 10 );

    // Canonical
    remove_action( 'wp_head', 'rel_canonical', 10 );

    // Shortlink
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );

    // Links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

    // Links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

    // WP version
	remove_action( 'wp_head', 'wp_generator' );

    // Emoji detection script
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

    // Emoji styles
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}


/* ****************************************************
   REMOVE_IPS_FROM_COMMENTS
******************************************************* */

function  wptd_remove_commentsip( $comment_author_ip ) {
    return '';
}
add_filter( 'pre_comment_user_ip', 'wptd_remove_commentsip' );
