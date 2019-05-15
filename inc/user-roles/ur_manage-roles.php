<?php
/**
 * ***********************************************************************************************
 *
 *  > SETUP_USER_ROLES
 *  > HIDE_ADMINISTRATOR_ROLE_FROM_ROLE_LIST
 *
 * @package wptd
 *********************************************************************************************** */

/* *************************************************************************************
    https://codex.wordpress.org/Roles_and_Capabilities
    CAUTION: ALL CHANGES HERE ARE PERMANENT CHANGES IN THE DATABASE

***************************************************************************************** */


// Get current user
$user = wp_get_current_user();
// Define a user or a list of users
$role_admin = array('admin');


/* ****************************************************
   SETUP_USER_ROLES
******************************************************* */

function wptd_setup_custom_roles() {

    // Remove all default roles but administrator
    // remove_role('editor');
    // remove_role('author');
    // remove_role('contributor');
    // remove_role('subscriber');

    // Define new role
    $role_admin = 'admin';

    // Define display name
    $role_admin_display_name = 'Admin';

    // Add new role without capabilities
    add_role($role_admin, $role_admin_display_name);
}
// Run this function only once on theme activation
add_action( 'after_switch_theme', 'wptd_setup_custom_roles' );


/* ****************************************************
   HIDE_ADMINISTRATOR_ROLE_FROM_ROLE_LIST
******************************************************* */

function wptd_hide_roles_in_rolelist( $roles ){
    if ( isset( $roles['administrator'] ) ) {
        unset( $roles['administrator'] );
    }
    return $roles;
}
// If user is role Admin
if ( array_intersect($role_admin, $user->roles) ) {
    // Hide Administrator role from roles list
    add_action( 'editable_roles' , 'wptd_hide_roles_in_rolelist' );
}
