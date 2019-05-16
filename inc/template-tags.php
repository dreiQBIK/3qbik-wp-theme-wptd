<?php
/**
 * ***********************************************************************************************
 *
 *  > SETUP_YOUTUBE_IFRAME
 *  >
 *
 * @package wptd
 *********************************************************************************************** */


/* ****************************************************
   SETUP_YOUTUBE_IFRAME
******************************************************* */

// Add extra params to iframe src and use youtube-nocookie.com
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
