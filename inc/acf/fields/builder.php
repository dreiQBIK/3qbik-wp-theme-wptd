<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('builder', [
    'title' => 'Baukasten',
    'menu_order' => 0,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$builder
    ->setLocation('post_type', '==', 'page')
    ->and('post_template', '!=', 'tpl-example.php')
    ->or('post_type', '==', 'post');

$builder
    ->addFlexibleContent('builder-modules', [
        'label' => '',
        'button_label' => 'Baustein hinzufügen',
    ])
        ->addLayout(get_field_partial('builder-modules.editor'))
        ->addLayout(get_field_partial('builder-modules.heading'));

return $builder;
