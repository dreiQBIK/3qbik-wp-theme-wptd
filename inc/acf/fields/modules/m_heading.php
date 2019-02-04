<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;


$m_heading = new FieldsBuilder('m_heading', [
   'title' => 'Überschrift',
]);

$m_heading
    ->addGroup('m_heading_group', [
        'label' => '',
        /*'wrapper' => ['width' => 50],*/
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
                'wrapper' => ['width' => 50],
                'default_value' => '2'
            ])
            ->addChoice('1', 'Klein')
            ->addChoice('2', 'Standard')
            ->addChoice('4', 'Groß')

    ->endGroup();

return $m_heading;
