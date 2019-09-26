<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$options_page_settings_general = new FieldsBuilder('options_page_settings_general', [
    'title' => 'Allgemein',
    'menu_order' => 0,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$options_page_settings_general
    ->setLocation('options_page', '==', 'acf-global-options');

$options_page_settings_general
   ->addGroup('options_page_settings_general', [
      'label' => '',
   ])

      ->addGroup('logos', [
         'label' => 'Logo',
      ])
         ->addImage('logo_small', [
            'label' => 'Logo (Mobile)',
            'preview_size' => 'thumbnail',
            'wrapper' => ['width' => 50],
            'required' => 1,
         ])
         ->addImage('logo_large', [
            'label' => 'Logo (Desktop)',
            'preview_size' => 'thumbnail',
            'wrapper' => ['width' => 50],
            'required' => 1,
         ])
      ->endGroup()

   ->endGroup();

return $options_page_settings_general;
