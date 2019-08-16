<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$options_page_settings = new FieldsBuilder('options_page_settings', [
    'title' => 'Einstellungen',
    'menu_order' => 0,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$options_page_settings
    ->setLocation('options_page', '==', 'acf-theme-settings');

$options_page_settings
   ->addGroup('options_page_settings', [
      'label' => '',
   ])

      ->addTab('general', [
         'label' => 'Allgemein',
      ])
         ->addGroup('branding', [
            'label' => 'Branding',
         ])
            ->addImage('logo', [
               'label' => 'Logo',
               'preview_size' => 'thumbnail',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])
            ->addImage('logo_2', [
               'label' => 'Bildmarke',
               'preview_size' => 'thumbnail',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])
         ->endGroup()

         ->addGroup('contact', [
            'label' => 'Kontakt',
         ])
            ->addText('hotline_text', [
               'label' => 'Service-Hotline Text',
               'default_value' => 'Kostenlose Service-Hotline',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])
            ->addText('hotline_number', [
               'label' => 'Service-Hotline Nummer',
               'default_value' => '0800 880 81 82 1',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])
         ->endGroup()

      ->addTab('footer', [
         'label' => 'Footer',
      ])
         ->addRepeater('social', [
            'label' => 'Social Media',
            'button_label' => 'Icon hinzufügen',
            'min' => 1,
            'max' => 3,
            'layout' => 'block',
         ])
            ->addButtonGroup('icon', [
               'label' => 'Icon auswählen',
               'wrapper' => ['width' => 50],
            ])
               ->addChoice('#icon-facebook', '<i class="icon icon-lg icon-facebook"></i>')
               ->addChoice('#icon-twitter', '<i class="icon icon-lg icon-twitter"></i>')
               ->addChoice('#icon-youtube', '<i class="icon icon-lg icon-youtube"></i>')
            ->addLink('link', [
               'label' => 'Link',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])

         ->endRepeater()
         ->addWysiwyg('text_1', [
            'label' => 'Text links',
            'media_upload' => 0,
            'delay' => 0,
            'required' => 1,
         ])
         ->addWysiwyg('text_2', [
            'label' => 'Text rechts',
            'media_upload' => 0,
            'delay' => 0,
            'required' => 1,
         ])

   ->endGroup();

return $options_page_settings;
