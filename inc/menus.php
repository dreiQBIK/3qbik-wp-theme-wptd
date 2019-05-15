<?php
/**
 * ***********************************************************************************************
 *
 *  > REGISTER_MENUS
 *  >
 *
 * @package wptd
 *********************************************************************************************** */


/* ****************************************************
   REGISTER_MENUS
******************************************************* */

function wptd_register_menus() {
   register_nav_menus( array(
      'primary' => __( 'Hauptnavigation', 'wptd' ),
      'footer' => __( 'Footer', 'wptd' ),
   ) );
}
add_action( 'after_setup_theme', 'wptd_register_menus' );
