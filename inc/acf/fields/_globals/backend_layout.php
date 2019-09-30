<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$backend_layout = new FieldsBuilder('backend_layout', ['title' => 'Backend Layout']);

$backend_layout
   ->addText('backend_layout', [
      'label' => 'Beschreibung des Bausteins',
      'instructions' => 'Beschreibungstext, der neben dem Namen des Bausteins hier im Backend angezeigt wird (maximal 60 Zeichen).',
      'maxlength' => '60',
   ]);
