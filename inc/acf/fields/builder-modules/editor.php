<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object)[
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$editor = new FieldsBuilder('editor', ['title' => 'Editor']);

$editor
    ->addGroup('editor', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addWysiwyg('wysiwyg', [
                'label' => 'Text',
                'tabs' => 'visual',
                'media_upload' => 0,
                'required' => 1,
            ])

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addSelect('margin', [
                'label' => 'Abstand nach unten',
                'instructions' => 'Größe des Abstandes des gesamten Elementes nach unten/zum nächsten Element',
                'wrapper' => ['width' => 50],
                'default_value' => 'sp-md'
            ])
            ->addChoice('sp-sm', 'Klein')
            ->addChoice('sp-md', 'Standard')
            ->addChoice('sp-lg', 'Groß')

    ->endGroup();

return $editor;
