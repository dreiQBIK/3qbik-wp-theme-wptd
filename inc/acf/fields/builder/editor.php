<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$editor = new FieldsBuilder('editor');

$editor
      ->addGroup('editor', [
            'label' => '',
        ])

            ->addTab('content', [
                'label' => 'Inhalt',
            ])
                ->addWysiwyg('wysiwyg', [
                    'label'        => 'Text',
                    'tabs'         => 'visual',
                    'media_upload' => 0,
                    'required'     => 1,
                ])

            ->addTab('settings', [
                'label' => 'Einstellungen',
            ])
                ->addSelect('margin', [
                    'label'         => 'Abstand nach unten',
                    'instructions'  => 'Größe des Abstandes des gesamten Elementes nach unten/zum nächsten Element',
                    'wrapper'       => ['width' => 50],
                    'default_value' => 'pb-2'
                ])
                    ->addChoice('pb-1', 'Klein')
                    ->addChoice('pb-2', 'Standard')
                    ->addChoice('pb-4', 'Groß')

      ->endGroup();

return $editor;
