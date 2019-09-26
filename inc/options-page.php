<?php
/**
 * ***********************************************************************************************
 *
 * @package wptd
 *********************************************************************************************** */


function wptd_acf_init() {
   $options_settings = acf_add_options_page(array(
      'page_title' 	 => __('Globale Inhalte', 'wptd'),
      'menu_title' 	 => __('Globale Inhalte', 'wptd'),
      'menu_slug' 	 => 'acf-global-options',
      'position'      => '30',
      'icon_url'      => 'dashicons-admin-generic',
      'post_id' 	    => 'acf-global-options',
      'update_button' => __('Aktualisieren', 'wptd'),
   ));
}
add_action('acf/init', 'wptd_acf_init');
