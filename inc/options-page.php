<?php
/**
 * ***********************************************************************************************
 *
 *  > THEME_SETTINGS
 *  >
 *
 * @package wptd
 *********************************************************************************************** */


 /* ****************************************************
   THEME_SETTINGS
******************************************************* */

function wptd_acf_init() {
   $options_settings = acf_add_options_page(array(
      'page_title' 	=> __('Theme Einstellungen', 'wptd'),
      'menu_title' 	=> __('Theme', 'wptd'),
      'menu_slug' 	=> 'acf-theme-settings',
      'position' => '30',
      'icon_url' => 'dashicons-admin-generic',
      'update_button' => __('Aktualisieren', 'wptd'),
   ));
}
add_action('acf/init', 'wptd_acf_init');
