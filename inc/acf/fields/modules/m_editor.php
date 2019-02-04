<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$m_editor = new FieldsBuilder('m_editor', ['title' => 'Editor']);

$m_editor
    ->addGroup('m_editor_group', [
        'label' => '',
        /*'wrapper' => ['width' => 50],*/
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
            ->addChoice('sp-sm', 'Klein')
            ->addChoice('sp-md', 'Standard')
            ->addChoice('sp-lg', 'Groß')

    ->endGroup();

return $m_editor;
