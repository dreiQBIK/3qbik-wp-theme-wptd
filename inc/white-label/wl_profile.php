<?php
/**
* ***********************************************************************************************
*
*  > REMOVE_META_BOXES_FROM_POSTS_EDIT_SCREEN
*  > REMOVE_FIELDS
*  > REMOVE_FIELDS_VIA_JS
*
* @package wptd
*********************************************************************************************** */

/* ***********************************************************************************************
   https://www.majas-lapu-izstrade.lv/how-to-remove-wordpress-admin-profile-page-fields-including-personal-options-biographical-info-website-etc-and-titles-without-js/
   CAUTION: ALL REMOVALS HERE ARE PERMANENT CHANGES IN THE DATABASE

*********************************************************************************************** */

// Get current user
$user = wp_get_current_user();
// Define a user or a list of users
$role_admin = array('admin');


/* ****************************************************
   REMOVE_CHANGE_THEME_COLOR
******************************************************* */

if ( !array_intersect($role_administrator, $user->roles) ) {
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
}


/* ****************************************************
   REMOVE_FIELDS
******************************************************* */

function wptd_remove_personal_options( $subject ) {
    $subject = preg_replace('#<h2>'.__("Personal Options").'</h2>#s', '', $subject, 1); // Remove the "Personal Options" title
    $subject = preg_replace('#<tr class="user-rich-editing-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Visual Editor" field
    $subject = preg_replace('#<tr class="user-comment-shortcuts-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Keyboard Shortcuts" field
    $subject = preg_replace('#<tr class="show-admin-bar(.*?)</tr>#s', '', $subject, 1); // Remove the "Toolbar" field
    $subject = preg_replace('#<h2>'.__("Name").'</h2>#s', '', $subject, 1); // Remove the "Name" title
    $subject = preg_replace('#<tr class="user-display-name-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Display name publicly as" field
    $subject = preg_replace('#<h2>'.__("Contact Info").'</h2>#s', '', $subject, 1); // Remove the "Contact Info" title
    $subject = preg_replace('#<tr class="user-url-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Website" field
    $subject = preg_replace('#<h2>'.__("About Yourself").'</h2>#s', '', $subject, 1); // Remove the "About Yourself" title
    $subject = preg_replace('#<tr class="user-description-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Biographical Info" field
    $subject = preg_replace('#<tr class="user-profile-picture(.*?)</tr>#s', '', $subject, 1); // Remove the "Profile Picture" field
    $subject = preg_replace('#<h2>'.__("Additional Capabilities").'</h2>#s', '', $subject, 1); // Remove "Additional Capabilities" title
    $subject = preg_replace('#<tr class="user-capabilities-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Capability Info" field
    return $subject;
}

function wptd_profile_subject_start() {
    ob_start( 'wptd_remove_personal_options' );
}

function wptd_profile_subject_end() {
    ob_end_flush();
}

if ( !array_intersect($role_administrator, $user->roles) ) {
    add_action( 'admin_head', 'wptd_profile_subject_start' );
    add_action( 'admin_footer', 'wptd_profile_subject_end' );
}


/* ****************************************************
   REMOVE_FIELDS_VIA_JS
******************************************************* */

function wptd_remove_additional_personal_options() {
    echo '<script type="text/javascript">jQuery(document).ready(function($) {
        $(\'form#your-profile tr.user-syntax-highlighting-wrap\').hide(); // Hide the "user-syntax" field
        $(\'form#your-profile tr.user-language-wrap\').hide(); // Hide the "user-language-wrap" field
        $(\'form#your-profile tr.user-first-name-wrap\').hide(); // Hide the "user-first-name-wrap" field
        $(\'form#your-profile tr.user-last-name-wrap\').hide(); // Hide the "user-last-name-wrap" field
        $(\'form#createuser tr.form-field:nth-child(3)\').hide(); // Hide the "first-name" field
        $(\'form#createuser tr.form-field:nth-child(4)\').hide(); // Hide the "last-name" field
        $(\'form#createuser tr.form-field:nth-child(5)\').hide(); // Hide the "website" field
    });</script>';
}
if ( !array_intersect( $role_administrator, $user->roles ) ) {
    add_action( 'admin_head', 'wptd_remove_additional_personal_options' );
}
