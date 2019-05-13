<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$bl_gallery = new FieldsBuilder('bl_gallery', [
    'title' => 'Bildergalerie',
]);

$bl_gallery
    ->addGroup('bl_gallery', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])

            ->addGallery('gallery', [
                'label' => 'Bilder',
                'instructions' => '',
                'required' => 1,
                'min' => 3,
                'insert' => 'append',
                'library' => 'all',
            ])
            ->addTrueFalse('truefalse_thumbs', [
                'label' => 'Thumbnail-Preview',
                'ui' => 1,
            ])
            ->addTrueFalse('truefalse_alt', [
                'label' => 'Galerieunterschrift',
                'ui' => 1,
            ])
            ->addText('text', [
                'label' => '',
            ])
                ->conditional('truefalse_alt', '==', '1')

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addSelect('margin', [
                'label' => 'Abstand nach unten',
                'instructions' => 'Größe des Abstandes des gesamten Elementes nach unten/zum nächsten Element',
                'wrapper' => ['width' => '50'],
                'default_value' => 'sp-md'
            ])
            ->addChoice('sp-zero', 'Kein Abstand')
            ->addChoice('sp-sm', 'Klein')
            ->addChoice('sp-md', 'Standard')
            ->addChoice('sp-lg', 'Groß')

    ->endGroup();

return $bl_gallery;
