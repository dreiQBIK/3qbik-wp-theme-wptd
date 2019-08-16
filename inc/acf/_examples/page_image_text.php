<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$page_image_text = new FieldsBuilder('page_image_text', [
    'title' => 'Bild | Text',
    'menu_order' => 20,
    'hide_on_screen' => array(
       0 => 'the_content',
    ),
 ]);

 $page_image_text
    ->setLocation('post_type', '==', 'page')
    ->and('page_template', '==', 'default');

$page_image_text
    ->addGroup('page_image_text', [
        'label' => '',
    ])
    ->addTab('image', [
        'label' => 'Bild',
    ])
        ->addImage('image', [
            'label' => 'Bild',
            'required' => 1,
            'preview_size' => 'large',
            'wrapper' => ['width' => '70'],
        ])
        ->addGroup('image_settings', [
            'label' => 'Einstellungen',
            'wrapper' => ['width' => '30'],
        ])
            ->addTrueFalse('truefalse_caption', [
                'label' => 'mit Bildunterschrift',
                'ui' => 1,
            ])
            ->addTrueFalse('truefalse_lightbox', [
                'label' => 'mit Lightbox',
                'ui' => 1,
            ])
        ->endGroup()
    ->addTab('text', [
        'label' => 'Text',
    ])
        ->addWysiwyg('wysiwyg', [
            'label' => 'Text',
            'media_upload' => 0,
            'wrapper' => ['width' => '70'],
        ])
    ->endGroup();

return $page_image_text;
