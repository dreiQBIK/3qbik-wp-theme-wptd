<?php
// https://www.majas-lapu-izstrade.lv/how-to-remove-wordpress-admin-profile-page-fields-including-personal-options-biographical-info-website-etc-and-titles-without-js/

// Remove fields from Admin profile page
/*if ( ! function_exists( 'cor_remove_personal_options' ) ) {
   function cor_remove_personal_options( $subject ) {
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
   
   function cor_profile_subject_start() {
      if ( ! current_user_can('manage_options') ) {
         ob_start( 'cor_remove_personal_options' );
      }
   }
   
   function cor_profile_subject_end() {
      if ( ! current_user_can('manage_options') ) {
         ob_end_flush();
      }
   }
}
add_action( 'admin_head', 'cor_profile_subject_start' );
add_action( 'admin_footer', 'cor_profile_subject_end' );*/

//Remove fields from Admin profile page via JS to hide nickname field which is mandatory
/*function remove_personal_options(){
   if ( ! current_user_can('manage_options') ) { // 'update_core' may be more appropriate
      echo '<script type="text/javascript">jQuery(document).ready(function($) {
			$(\'form#your-profile tr.user-nickname-wrap\').hide(); // Hide the "nickname" field
		});</script>';
   }
}
add_action('admin_head','remove_personal_options');*/

// Removes ability to change Theme color for the users
/*remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );*/