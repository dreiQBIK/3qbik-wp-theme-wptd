<?php
/**
 * ***********************************************************************************************
 *
 *  > SETUP_USER_ROLES
 *  > HIDE_ROLE_ADMINISTRATOR_FROM_ROLE_LIST
 *
 * @package wptd
 *********************************************************************************************** */

/* *************************************************************************************
   https://codex.wordpress.org/Roles_and_Capabilities
   CAUTION: ALL CHANGES HERE ARE PERMANENTLY CHANGES IN DATABASE

***************************************************************************************** */


//get current user
$user = wp_get_current_user();
// define a user or a list of users
$role_admin = array('admin');


/* ****************************************************
   SETUP_USER_ROLES
******************************************************* */

function wptd_setup_custom_roles() {

   // remove all default rules but administrator
   // remove_role('editor');
   // remove_role('author');
   // remove_role('contributor');
   // remove_role('subscriber');

   // define new role
   $role_admin = 'admin';

   // define display name
   $role_admin_display_name = 'Admin';

   // add new role without capabilities
   add_role($role_admin, $role_admin_display_name);
}
// run this function only once on theme activation
add_action('after_switch_theme', 'wptd_setup_custom_roles');


/* ****************************************************
   HIDE_ROLE_ADMINISTRATOR_FROM_ROLE_LIST
******************************************************* */

function wptd_hide_roles_in_rolelist( $roles ){
   if ( isset( $roles['administrator'] ) ){
      unset( $roles['administrator'] );
   }
   return $roles;
}
// if user is role Admin
if (array_intersect($role_admin, $user->roles)) {
   // hide Administrator role from roles list
   add_action( 'editable_roles' , 'wptd_hide_roles_in_rolelist' );
}
