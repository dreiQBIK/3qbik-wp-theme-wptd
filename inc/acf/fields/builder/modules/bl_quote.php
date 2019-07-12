<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$bl_quote = new FieldsBuilder('bl_quote', [
    'title' => 'Zitat',
]);

$bl_quote
    ->addGroup('bl_quote', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addTextarea('quote', [
                'label' => 'Zitat',
                'required' => 1,
                'wrapper' => ['width' => '75'],
            ])
            ->addText('author', [
                'label' => 'Autor',
                'wrapper' => ['width' => '25'],
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

return $bl_quote;
