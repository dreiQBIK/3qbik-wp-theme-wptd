<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$tab_settings = new FieldsBuilder('tab_settings', ['title' => 'Allgemeine Einstellungen']);

$tab_settings
   ->addGroup('tab_settings', [
      'label' => 'Einstellungen',
   ])

      ->addButtonGroup('margin', [
         'label' => 'Abstand nach unten',
         'instructions' => 'Größe des Abstandes des gesamten Elementes nach unten / zum nächsten Element',
         'wrapper' => ['width' => 50],
         'default_value' => 'mb-0'
      ])
         ->addChoice('mb-0', 'Kein Abstand')
         ->addChoice('mb-small', 'Klein')
         ->addChoice('mb-medium', 'Standard')
         ->addChoice('mb-large', 'Groß')

      ->addText('id', [
         'label' => 'ID vergeben (optional)',
         'instructions' => 'Diese ID kann als Sprungmarke in einem Link verwendet werden, z.B. "https://gloeckle.de#ID"',
         'wrapper' => ['width' => 50],
      ])

   ->endGroup();
