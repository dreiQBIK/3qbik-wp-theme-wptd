<?php
/**
 * ***********************************************************************************************
 *
 *  > REGISTER_TINY_MCE_SETTINGS
 *  > REGISTER_TINY_MCE_FIRST_TOOLBAR
 *  > REGISTER_TINY_MCE_SECOND_TOOLBAR
 *  > REGISTER_TINY_MCE_CUSTOM_COLORS
 *  > ADD_CLASS_TO_EMPTY_P
 *  > PREVENT_COLLAPSE
 *
 * @package wptd
 *********************************************************************************************** */


/* ****************************************************
   REGISTER_TINY_MCE_SETTINGS
******************************************************* */

 function wptd_mce_settings(array $settings) {

     // Add class to tinymve backend editor
     $settings['body_class'] .= ' tinymce';

     // Reduce block-formatselect options to sensible/necessary formats.
     $settings['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;Heading 5=h5';

     // Define the style_formats array
     $style_formats = [
         // [
         //     'title'   => 'Absatz Klein',
         //     'classes' => 'small',
         //     'wrapper' => false,
         //     'block'   => 'p'
         // ],
         [
             'title'   => 'Zentriert',
             'classes' => 'center',
             'selector' => 'p,ul,ol,h1,h2,h3,h4,h5'
         ],
     ];

     $settings['style_formats'] = json_encode($style_formats);

     return $settings;
 }
 add_filter( 'tiny_mce_before_init', 'wptd_mce_settings' );


/* ****************************************************
   REGISTER_TINY_MCE_FIRST_TOOLBAR
******************************************************* */

function wptd_mce_toolbar_01(array $buttons)
{
    // Only remove unwanted default buttons here.
    $buttons = array_diff($buttons, [
        'formatselect', // format dropdown menu for <p>, headings, etc
        'bold',
        'italic',
        'bullist',
        'numlist',
        'blockquote',
        'alignleft',
        'aligncenter',
        'alignright',
        'link',
        'unlink',
        'wp_more', // read more link
        'spellchecker',
        'dfw', // distraction free writing mode
        'wp_adv', // toggle for second toolbar
        'fullscreen',
    ]);
    // Add Buttons
    array_unshift($buttons, false);
    // $buttons[] = 'fontselect';
    // $buttons[] = 'fontsizeselect';
    // $buttons[] = 'forecolor';
    // $buttons[] = 'backcolor';

    $buttons[] = 'formatselect';
    $buttons[] = 'styleselect';
    $buttons[] = 'bold';
    $buttons[] = 'italic';
    $buttons[] = 'bullist';
    $buttons[] = 'numlist';
    $buttons[] = 'blockquote';
    $buttons[] = 'link';
    $buttons[] = 'unlink';
    $buttons[] = 'charmap';

    // $buttons[] = 'alignleft';
    // $buttons[] = 'aligncenter';
    // $buttons[] = 'alignright';
    // $buttons[] = 'outdent';
    // $buttons[] = 'indent';
    // $buttons[] = 'strikethrough';
    // $buttons[] = 'hr';
    // $buttons[] = 'subscript';
    // $buttons[] = 'superscript';

    // $buttons[] = 'cut';
    // $buttons[] = 'copy';
    // $buttons[] = 'paste';
    // $buttons[] = 'removeformat';
    // $buttons[] = 'undo';
    // $buttons[] = 'redo';
    // $buttons[] = 'wp_help';
    $buttons[] = 'fullscreen';
    // $buttons[] = 'wp_adv'; // toggle for second toolbar

    return $buttons;
}
add_filter('mce_buttons', 'wptd_mce_toolbar_01');


/* ****************************************************
   REGISTER_TINY_MCE_SECOND_TOOLBAR
******************************************************* */

function wptd_mce_toolbar_02(array $buttons)
{
    // Only remove unwanted default buttons here.
    $buttons = array_diff($buttons, [
        'formatselect', // format dropdown menu for <p>, headings, etc
        'strikethrough',
        'hr',
        'forecolor',
        'pastetext',
        'removeformat',
        'charmap',
        'undo',
        'redo',
        'outdent',
        'indent',
        'wp_help'
    ]);

    // Add Buttons
    array_unshift($buttons, false);
    // $buttons[] = 'example';

    return $buttons;
}
add_filter('mce_buttons_2', 'wptd_mce_toolbar_02');


/* ****************************************************
   REGISTER_TINY_MCE_CUSTOM_COLORS
******************************************************* */

function wptd_mce_custom_colors($init) {
    $default_colours = '
        "202A35", "c1-main",
        "364250", "c2-main",
        "F5F8FB", "c3-main",

        "fff191", "c1-second",
        "EEDE70", "c2-second",

        "ec764d", "c1-third",
        "d96a44", "c2-third",
        "ff855b", "c3-third"
    ';

  $custom_colours =  '';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 2;

  return $init;
}
add_filter('tiny_mce_before_init', 'wptd_mce_custom_colors');


/* ****************************************************
   ADD_CLASS_TO_EMPTY_P
******************************************************* */

function wptd_mce_add_class_to_empty_p( $content ) {
    return str_replace( '<p>&nbsp;</p>', '<span class="mce_brake"></span>', $content );
}
add_filter( 'acf_the_content', 'wptd_mce_add_class_to_empty_p', PHP_INT_MAX );


/* ****************************************************
   PREVENT_COLLAPSE
******************************************************* */

function wptd_acf_tinymce_prevent_collapse(){
    echo "<script type='text/javascript'>jQuery(document).ready(function($) {
        $('#acf-group_tinymce').removeClass('closed');
    });</script>";
}
add_action('admin_head','wptd_acf_tinymce_prevent_collapse');
