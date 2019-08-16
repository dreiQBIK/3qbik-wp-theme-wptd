<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$page_teaser = new FieldsBuilder('page_teaser', [
    'title' => 'Weitere Seiten/Links',
    'menu_order' => 90,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$page_teaser
    ->setLocation('post_type', '==', 'post')
      ->or('post_template', '==', 'tpl-builder-detail.php')
      ->or('post_template', '==', 'tpl-builder-global.php');

$page_teaser
   ->addGroup('page_teaser', [
      'label' => '',
   ])
      ->addButtonGroup('show_teaser', [
         'label' => 'Weitere Seiten/Links für diese Seite anzeigen?',
         'default_value' => 'no'
      ])
         ->addChoice('no', 'Nein, nicht anzeigen')
         ->addChoice('yes', 'Ja, anzeigen')

      ->addGroup('headings', [
            'label' => 'Überschrift',
      ])
         ->conditional('show_teaser', '==', 'yes')

         ->addButtonGroup('layout', [
            'label' => 'Ausrichtung auswählen',
            'default_value' => 'left'
         ])
            ->addChoice('left', 'Linksbündig')
            ->addChoice('center', 'Zentriert')
         ->addText('heading', [
            'label' => 'Titel',
            'wrapper' => ['width' => 80],
            'default_value' => 'Das könnte Sie auch interessieren',
            'required' => 1,
         ])
         ->addSelect('heading_type', [
            'label' => 'Hierarchie/Typ',
            'default_value' => 'H2',
            'wrapper' => ['width' => 20],
         ])
            ->addChoice('H1', 'H1')
            ->addChoice('H2', 'H2')
            ->addChoice('H3', 'H3')
            ->addChoice('H4', 'H4')
            ->addChoice('H5', 'H5')
            ->addChoice('H6', 'H6')
            ->addChoice('P', 'P')
      ->endGroup()

      ->addRepeater('links', [
         'label' => 'Seiten/Links',
         'button_label' => 'Seite/Link hinzufügen',
         'min' => 1,
         'max' => 4,
         'layout' => 'block',
      ])
         ->conditional('show_teaser', '==', 'yes')
         ->addGroup('group_link', [
            'label' => 'Seite/Link',
         ])
            ->addLink('link', [
               'label' => 'Link auswählen',
               'ui' => 1,
            ])
            ->addText('title', [
               'label' => 'Titel',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])
            ->addText('subtitle', [
               'label' => 'Subtitel',
               'wrapper' => ['width' => 50],
               'required' => 1,
            ])
         ->endGroup()

         ->addImage('image', [
            'label' => 'Bild',
            'preview_size' => 'thumbnail',
            'wrapper' => ['width' => 65],
            'required' => 1,
         ])
         ->addGroup('image_settings', [
            'label' => 'Bild-Einstellungen',
            'wrapper' => ['width' => 35],
         ])
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

return $page_teaser;
