<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$bl_video = new FieldsBuilder('bl_video', [
    'title' => 'Video',
]);

$bl_video
    ->addGroup('bl_video', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addOembed('video', [
                'label' => 'Video',
                'required' => 1,
            ])
            ->addTrueFalse('truefalse_alt', [
                'label' => 'Videounterschrift',
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

return $bl_video;
