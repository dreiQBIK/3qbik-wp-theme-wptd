<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$bl_heading = new FieldsBuilder('bl_heading', [
    'title' => 'Überschrift',
]);

$bl_heading
    ->addGroup('bl_heading', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addText('text', [
                'label' => 'Überschrift',
                'required' => 1,
            ])

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

return $bl_heading;
