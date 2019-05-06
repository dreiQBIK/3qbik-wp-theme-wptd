<?php
/**
 * ***********************************************************************************************
 *
 *  > CAPS_FOR_ADMIN
 *  >
 *
 * @package wptd
 *********************************************************************************************** */

/* *************************************************************************************
   https://isabelcastillo.com/list-capabilities-current-user-wordpress
   https://codex.wordpress.org/Roles_and_Capabilities

   $data = get_userdata( get_current_user_id() );
   if ( is_object( $data) ) {
      $current_user_caps = $data->allcaps;

      // print it to the screen
      echo '<pre>' . print_r( $current_user_caps, true ) . '</pre>';
   }

***************************************************************************************** */


 function wptd_set_custom_role_capabilities() {

   // get current user
   $user = wp_get_current_user();
   // get custom roles
   $role_admin = get_role('admin');

   /* ****************************************************
      CAPS_FOR_ADMIN
   ******************************************************* */

   $role_admin_capabilities = array(
      'update_core',
      'update_plugins',
      'update_themes',
      'install_plugins',
      'install_themes',
      'upload_plugins',
      'upload_themes',
      'delete_themes',
      'delete_plugins',
      'edit_plugins',
      'edit_themes',
      'edit_files',
      'edit_users',
      'create_users',
      'delete_users',
      'unfiltered_html',
      'activate_plugins',
      'delete_others_pages',
      'delete_others_posts',
      'delete_pages',
      'delete_posts',
      'delete_private_pages',
      'delete_private_posts',
      'delete_published_pages',
      'delete_published_posts',
      'edit_dashboard',
      'edit_others_pages',
      'edit_others_posts',
      'edit_pages',
      'edit_posts',
      'edit_private_pages',
      'edit_private_posts',
      'edit_published_pages',
      'edit_published_posts',
      'edit_theme_options',
      'export',
      'import',
      'list_users',
      'manage_categories',
      'manage_links',
      'manage_options',
      'moderate_comments',
      'promote_users',
      'publish_pages',
      'publish_posts',
      'read_private_pages',
      'read_private_posts',
      'read',
      'remove_users',
      'switch_themes',
      'upload_files',
      'customize',
      'delete_site',
   );
   foreach ($role_admin_capabilities as $role_admin_capability) {
      $role_admin->add_cap($role_admin_capability);
   }
}
// run this function only once on theme activation
add_action('after_switch_theme', 'wptd_set_custom_role_capabilities');
