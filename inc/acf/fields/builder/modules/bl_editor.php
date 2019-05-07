<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$bl_editor = new FieldsBuilder('bl_editor', ['title' => 'Editor']);

$bl_editor
    ->addGroup('bl_editor', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addWysiwyg('wysiwyg', [
                'label' => 'Text',
                'media_upload' => 0,
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
            ->addChoice('sp-zero', 'Kein Abstand')
            ->addChoice('sp-sm', 'Klein')
            ->addChoice('sp-md', 'Standard')
            ->addChoice('sp-lg', 'Groß')

    ->endGroup();

return $bl_editor;
