<?php
/**
 * ***********************************************************************************************
 *
 *  > ADMIN_NOTICE_FOR_INACTIVE_TIMBER
 *  > ADD_OWN_FUNCTIONS_AND_FILTER_TO_TWIG
 *  > ADD_GLOBAL_TIMBER_CONTEXT
 *
 * @package wptd
 *********************************************************************************************** */

/* ***********************************************************************************************
    https://github.com/olefredrik/FoundationPress/blob/master/library/cleanup.php

*********************************************************************************************** */


/* Set The Default Directory To Look For Our .twig Views */
Timber::$dirname = 'templates';


/* ****************************************************
   ADMIN_NOTICE_FOR_INACTIVE_TIMBER
******************************************************* */

/* Show Admin Notice If Timber Is Not Active */
if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
    });
    return;
}


/* ****************************************************
   ADD_OWN_FUNCTIONS_AND_FILTER_TO_TWIG
******************************************************* */

/* Add Own Functions / Filters To Twig */
function wptd_add_to_twig( $twig ) {
    // To enable usage of template_from_string()
    $twig->addExtension( new Twig_Extension_StringLoader() );
    // Custom twig filters
    $twig->addFilter( new Twig_SimpleFilter('wptd_extra_video_params', 'wptd_extra_video_params') );
    $twig->addFilter( new Twig_SimpleFilter('shuffle', function( $array ) {
        shuffle($array);
        return $array;
    }) );
    $twig->addFilter(new \Twig_SimpleFilter('base64_encode', function ($string) {
        return base64_encode($string);
    }));
    $twig->addFilter(new \Twig_SimpleFilter('base64_decode', function ($string) {
        return base64_decode($string);
    }));

    return $twig;
}
add_filter( 'timber/twig', 'wptd_add_to_twig' );


/* ****************************************************
   ADD_GLOBAL_TIMBER_CONTEXT
******************************************************* */

/* Add To The Global Timber Context, e.g. Menus */
function wptd_add_to_global_timber_context( $context ) {
    $context['menu'] = new \Timber\Menu( 'primary' );
    $context['menu_footer'] = new \Timber\Menu( 'footer' );
    return $context;
}
add_filter( 'timber/context', 'wptd_add_to_global_timber_context' );
