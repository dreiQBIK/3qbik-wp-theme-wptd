<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$sidebar_boxes = new FieldsBuilder('sidebar_boxes', [
    'title' => 'Sidebar',
    'menu_order' => 60,
    'hide_on_screen' => array(
       0 => 'the_content',
    ),
]);

$sidebar_boxes
   ->setLocation('post_type', '==', 'page')
      ->and('post_template', '==', 'tpl-builder-detail-sidebar.php');

$sidebar_boxes
    ->addGroup('sidebar_boxes', [
        'label' => '',
    ])
        ->addRepeater('boxes', [
            'label' => 'Sidebars',
            'button_label' => 'Sidebar-Box hinzufügen',
            'min' => 1,
            'max' => 8,
            'layout' => 'block',
        ])
            ->addText('heading', [
                'label' => 'Überschrift',
                'wrapper' => ['width' => 80],
                'required' => 1,
            ])
            ->addSelect('heading_type', [
                'label' => 'Hierarchie/Typ',
                'default_value' => 'H4',
                'wrapper' => ['width' => 20],
            ])
                ->addChoice('H1', 'H1')
                ->addChoice('H2', 'H2')
                ->addChoice('H3', 'H3')
                ->addChoice('H4', 'H4')
                ->addChoice('H5', 'H5')
                ->addChoice('H6', 'H6')
                ->addChoice('P', 'P')
            ->addWysiwyg('wysiwyg', [
                'label' => 'Text',
                'media_upload' => 0,
                'delay' => 0,
                'required' => 1,
            ])
            ->addTrueFalse('truefalse_link', [
                'label' => 'Link/Button hinzufügen',
                'ui' => 1,
                'wrapper' => ['width' => 33],
            ])
            ->addButtonGroup('design', [
                'label' => '',
                'instructions' => 'Button-Design auswählen',
                'wrapper' => ['width' => 34],
                'default_value' => 'btn_1'
            ])
                ->addChoice('btn_1', 'Rot (Fläche)')
                ->addChoice('btn_2', 'Rot (Rahmen)')
                ->conditional('truefalse_link', '==', 1)
            ->addLink('link', [
                'label' => '',
                'instructions' => 'Link auswählen',
                'wrapper' => ['width' => 33],
            ])
                ->conditional('truefalse_link', '==', 1)
            ->addTrueFalse('truefalse_image', [
                'label' => 'Bild/Logo hinzufügen',
                'ui' => 1,
            ])
            ->addImage('image', [
                'label' => 'Bild',
                'preview_size' => 'thumbnail',
                'wrapper' => ['width' => 65],
                'required' => 1,
            ])
                ->conditional('truefalse_image', '==', 1)
            ->addGroup('image_settings', [
                'label' => 'Bild-Einstellungen',
                'wrapper' => ['width' => 35],
            ])
                ->conditional('truefalse_image', '==', 1)
                ->addTrueFalse('truefalse_caption', [
                    'label' => 'alternatives Alt-Tag',
                    'ui' => 1,
                ])
                ->addText('caption', [
                    'label' => '',
                    'instructions' => 'Alt-Tag angeben',
                ])
                    ->conditional('truefalse_caption', '==', 1)
            ->endGroup()
        ->endRepeater()

    ->endGroup();

return $sidebar_boxes;
