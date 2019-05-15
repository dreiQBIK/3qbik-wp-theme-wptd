<?php
/**
 * ***********************************************************************************************
 * Initialize Timber
 *
 * @package wptd
 *********************************************************************************************** */


/* Show Admin Notice If Timber Is Not Active */
if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
    });

    add_filter('template_include', function($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });

    return;
}


/* Set The Default Directory To Look For Our .twig Views */
Timber::$dirname = 'templates';


/* Add Own Functions / Filters To Twig */
function wptd_add_to_twig( $twig ) {
    // To enable usage of template_from_string()
    $twig->addExtension( new Twig_Extension_StringLoader() );
    // Custom twig filters
    $twig->addFilter( new Twig_SimpleFilter('wptd_extra_video_params', 'wptd_extra_video_params') );
    return $twig;

}
add_filter( 'timber/twig', 'wptd_add_to_twig' );


/* Add To The Global Timber Context, e.g. Menus */
function wptd_add_to_global_timber_context( $context ) {
    $context['menu'] = new \Timber\Menu( 'primary' );
    $context['menu_footer'] = new \Timber\Menu( 'footer' );
    return $context;
}
add_filter( 'timber/context', 'wptd_add_to_global_timber_context' );
