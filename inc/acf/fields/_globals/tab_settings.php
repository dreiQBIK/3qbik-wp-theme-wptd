<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$tab_settings = new FieldsBuilder('tab_settings', ['title' => 'Allgemeine Einstellungen']);

$tab_settings
   ->addGroup('tab_settings', [
      'label' => 'Einstellungen',
   ])

      ->addSelect('margin', [
            'label' => 'Abstand nach unten',
            'instructions' => 'Größe des Abstandes des gesamten Elementes nach unten/zum nächsten Element',
            'wrapper' => ['width' => 50],
            'default_value' => 'pb-medium'
      ])
         ->addChoice('sp-zero', 'Kein Abstand')
         ->addChoice('pb-small', 'Klein')
         ->addChoice('pb-medium', 'Standard')
         ->addChoice('pb-large', 'Groß')

   ->endGroup();
