<?php

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $builder_module
 * @return mixed
 */

// builder global modules
function wptd_acf_get_module_global( $module ) {
    return include( get_template_directory() . "/inc/acf/fields/builder/modules-global/{$module}.php" );
}

// builder detail modules (TODO: can we replace this with Gutenberg?)
function wptd_acf_get_module_detail( $module ) {
    return include( get_template_directory() . "/inc/acf/fields/builder/modules-detail/{$module}.php" );
}

// edit acf-field names in wp-backend
// function wptd_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {

//     // remove layout title from text
//     // $title = '<strong>' . $layout["label"] . '</strong>';

//     // load sub field image
//     // $title .= '<div class="thumbnail">';
//     // if( $image = get_sub_field('image') ) {
//     //     $title .= '<img src="' . $image['sizes']['thumbnail'] . '" height="36px" />';
//     // }
//     // $title .= '</div>';
//     // var_dump($title);
//     print_r($layout);
//     // var_dump($layout);
//     // var_dump($i);
//     var_dump(get_sub_field('backend_layout'));

//     // load text sub field
//     if( $text = get_sub_field('backend_layout') ) {
//         $title = '<strong>' . $layout["label"] . '</strong>' . " - " . $text;
//         $title_length = $layout["label"] . " - " . $text;
//         if ( strlen($title_length) > 60 ) {
//             $title = '<strong>' . $layout["label"] . '</strong>' . " - " . $text . "...";
//         }
//     }
//     return $title;
// }
// add_filter('acf/fields/flexible_content/layout_title', 'wptd_acf_flexible_content_layout_title', 10, 4);
