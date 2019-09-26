<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$options_page_settings_contact = new FieldsBuilder('options_page_settings_contact', [
    'title' => 'Kontakt',
    'menu_order' => 0,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$options_page_settings_contact
    ->setLocation('options_page', '==', 'acf-global-options');

$options_page_settings_contact
   ->addGroup('options_page_settings_contact', [
      'label' => '',
   ])

      ->addGroup('contact', [
         'label' => 'Kontaktdaten',
      ])
         ->addWysiwyg('address', [
            'label' => 'Adresse',
            'media_upload' => 0,
            'delay' => 0,
            'wrapper' => ['width' => 50],
            'required' => 1,
         ])
         ->addText('phone', [
            'label' => 'Telefon',
            'wrapper' => ['width' => 50],
            'required' => 1,
         ])
         ->addLink('button_1', [
            'label' => 'Link 1 auswählen',
            'ui' => 1,
         ])
      ->endGroup()

      ->addRepeater('social', [
         'label' => 'Social Media',
         'button_label' => 'Icon hinzufügen',
         'max' => 4,
         'layout' => 'block',
      ])
         ->addButtonGroup('icon', [
            'label' => 'Icon auswählen',
            'wrapper' => ['width' => 50],
         ])
            ->addChoice('#icon-shape-star-1', '<i class="icon icon--lg icon-shape-star-1"></i>')
            ->addChoice('#icon-heart-1', '<i class="icon icon--lg icon-logo-instagram"></i>')
         ->addLink('link', [
            'label' => 'Link',
            'wrapper' => ['width' => 50],
            'required' => 1,
         ])
      ->endRepeater()

   ->endGroup();

return $options_page_settings_contact;
