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
                'default_value' => 'pb-medium'
            ])
            ->addChoice('sp-zero', 'Kein Abstand')
            ->addChoice('pb-small', 'Klein')
            ->addChoice('pb-medium', 'Standard')
            ->addChoice('pb-large', 'Groß')

    ->endGroup();

return $bl_editor;
