<?php
// https://www.majas-lapu-izstrade.lv/how-to-remove-wordpress-admin-profile-page-fields-including-personal-options-biographical-info-website-etc-and-titles-without-js/

//get current user
$user = wp_get_current_user();
// define a user or a list of users
$role_admin = array('admin');


// Removes ability to change Theme color for the users
if (array_intersect($role_admin, $user->roles)) {
   remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
}

// Remove fields from Admin profile page
/*if ( ! function_exists( wptdremove_personal_options' ) ) {
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
      if ( ! current_user_can('manage_options') ) {
         ob_start( 'wptd_remove_personal_options' );
      }
   }

   function wptd_profile_subject_end() {
      if ( ! current_user_can('manage_options') ) {
         ob_end_flush();
      }
   }
}
add_action( 'admin_head', 'wptd_profile_subject_start' );
add_action( 'admin_footer', 'wptd_profile_subject_end' );*/

//Remove fields from Admin profile page via JS to hide nickname field which is mandatory
/*function wptd_remove_additional_personal_options(){
   if ( ! current_user_can('manage_options') ) { // 'update_core' may be more appropriate
      echo '<script type="text/javascript">jQuery(document).ready(function($) {
			$(\'form#your-profile tr.user-nickname-wrap\').hide(); // Hide the "nickname" field
		});</script>';
   }
}
add_action('admin_head','wptd_remove_additional_personal_options');*/

