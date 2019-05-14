<?php
/**
 * ***********************************************************************************************
 * Initialize Timber
 *
 * @package wptd
 *********************************************************************************************** */


/* Initialize Timber */
if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
    });

    add_filter('template_include', function($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });

    return;
}

Timber::$dirname = 'templates';

class StarterSite extends TimberSite {

    function __construct() {
        add_filter( 'timber_context', array( $this, 'add_to_global_context' ) );
        add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        parent::__construct();
    }

    //  TODO: move this to a better place
    // add extra params to iframe src
    function wptd_extra_video_params( $iframe ) {

        // use preg_match to find iframe src
        $pattern = '/src="(.+?)"/';
        preg_match($pattern, $iframe, $matches);
        $src = $matches[1];

        // add extra params to iframe src
        $params = array(
            'rel'            => 0,
            'modestbranding' => 1,
            'iv_load_policy' => 3,
        );
        $new_src = add_query_arg($params, $src);
        $iframe = str_replace($src, $new_src, $iframe);

        // add extra attributes to iframe html
        $attributes = 'frameborder="0"';
        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

        // always use youtube-nocookie.com
        if ( preg_match('#https?://(www\.)?youtu#i', $src) ) {
            $iframe = preg_replace(
                '#src=(["\'])(https?:)?//(www\.)?youtube\.com#i',
                'src=$1$2//$3youtube-nocookie.com',
                $iframe
            );
        }

        // return $iframe
        return $iframe;
    }

    function add_to_global_context( $context ) {
        // TODO: Was hiervon ist wirklich nötig?
        $context['menu'] = new \Timber\Menu( 'primary' );
        $context['menu_footer'] = new \Timber\Menu( 'footer' );
        $context['site'] = $this;
        return $context;
    }

    function add_to_twig( $twig ) {
        // to enable usage of template_from_string()
        $twig->addExtension( new Twig_Extension_StringLoader() );
        // custom twig filters
        $twig->addFilter( new Twig_SimpleFilter('wptd_extra_video_params', array($this, 'wptd_extra_video_params')) );
        return $twig;
    }

}

new StarterSite();
