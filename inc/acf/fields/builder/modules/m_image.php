<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$m_image = new FieldsBuilder('m_image', ['title' => 'Bild']);

$m_image
    ->addGroup('m_image', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addImage('image', [
                'label' => 'Bild',
                'required' => 1,
                'preview_size' => 'large',
                'wrapper' => ['width' => '70'],
            ])
            ->addGroup('image_settings', [
                'label' => 'Einstellungen',
                'wrapper' => ['width' => '30'],
            ])
                ->addTrueFalse('truefalse_caption', [
                    'label' => 'mit Bildunterschrift',
                    'ui' => 1,
                ])
                ->addTrueFalse('truefalse_lightbox', [
                    'label' => 'mit Lightbox',
                    'ui' => 1,
                ])
            ->endGroup()

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

return $m_image;
