<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$subheader = new FieldsBuilder('subheader', [
    'title' => 'Sub-Header (Sticky)',
    'menu_order' => 10,
    'hide_on_screen' => array(
       0 => 'the_content',
    ),
]);

$subheader
   ->setLocation('post_type', '==', 'page')
      ->and('post_template', '==', 'tpl-builder-global-subheader.php');

$subheader
    ->addGroup('subheader', [
        'label' => '',
    ])
         ->addTrueFalse('truefalse_show', [
            'label' => 'Anzeigen/Ausblenden',
            'ui' => 1,
         ])

         ->addImage('image', [
            'label' => 'Logo',
            'preview_size' => 'thumbnail',
            'wrapper' => ['width' => 65],
            'required' => 1,
         ])
            ->conditional('truefalse_show', '==', 1)
         ->addGroup('image_settings', [
            'label' => 'Logo-Einstellungen',
            'wrapper' => ['width' => 35],
         ])
            ->conditional('truefalse_show', '==', 1)
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

         ->addGroup('cta_teaser', [
            'label' => 'CTA-Banner',
         ])
            ->conditional('truefalse_show', '==', 1)
            ->addButtonGroup('icon', [
               'label' => 'Icon auswählen',
               'default_value' => '#icon-bulb-63',
               'wrapper' => ['width' => 50],
            ])
               ->addChoice('#icon-money', '<i class="icon icon-lg icon-money"></i>')
               ->addChoice('#icon-coins', '<i class="icon icon-lg icon-coins"></i>')
               ->addChoice('#icon-handshake', '<i class="icon icon-lg icon-handshake"></i>')
               ->addChoice('#icon-bulb-63', '<i class="icon icon-lg icon-bulb-63"></i>')
               ->addChoice('#icon-c-warning', '<i class="icon icon-lg icon-c-warning"></i>')
               ->addChoice('#icon-coupon', '<i class="icon icon-lg icon-coupon"></i>')
               ->addChoice('#icon-bag-delivery', '<i class="icon icon-lg icon-bag-delivery"></i>')
               ->addChoice('#icon-spaceship', '<i class="icon icon-lg icon-spaceship"></i>')
               ->addChoice('#icon-handout', '<i class="icon icon-lg icon-handout"></i>')
            ->addText('text', [
               'label' => 'Text',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])
         ->endGroup()

         ->addLink('cta_button', [
            'label' => 'CTA-Button',
         ])
         ->conditional('truefalse_show', '==', 1)

    ->endGroup();

return $subheader;
