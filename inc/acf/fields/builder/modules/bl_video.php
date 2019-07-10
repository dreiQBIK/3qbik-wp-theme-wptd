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
                'default_value' => 'pb-medium'
            ])
            ->addChoice('sp-zero', 'Kein Abstand')
            ->addChoice('pb-small', 'Klein')
            ->addChoice('pb-medium', 'Standard')
            ->addChoice('pb-large', 'Groß')

    ->endGroup();

return $bl_video;
