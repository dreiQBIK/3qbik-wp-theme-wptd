<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$shortcode = new FieldsBuilder('shortcode', [
    'title' => 'Shortcode',
    'menu_order' => 100,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$shortcode
    ->setLocation('post_template', '==', 'tpl-shortcode.php');

$shortcode
    ->addText('shortcode', [
        'label' => 'Shortcode',
        'instructions' => __( "Hier kann ein Shortcode eingefügt werden.", "wptd" ),
        'required' => 0,
    ]);

return $shortcode;
