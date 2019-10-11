<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_cta_center = new FieldsBuilder('blg_cta_center', [
    'title' => 'CTA: Center',
]);

$blg_cta_center
    ->addGroup('blg_cta_center', [
        'label' => '',
    ])
        // ->addFields($backend_layout)

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

        ->addTab('content', [
            'label' => 'Vordergrund',
        ])

            ->addGroup('headings', [
                'label' => 'Baustein-Überschrift',
            ])

                ->addText('heading', [
                    'label' => 'Überschrift',
                    'wrapper' => ['width' => 80],
                    'required' => 1,
                ])
                ->addSelect('heading_type', [
                    'label' => 'Hierarchie/Typ',
                    'default_value' => 'H2',
                    'wrapper' => ['width' => 20],
                ])
                    ->addChoice('H1', 'H1')
                    ->addChoice('H2', 'H2')
                    ->addChoice('H3', 'H3')
                    ->addChoice('H4', 'H4')
                    ->addChoice('H5', 'H5')
                    ->addChoice('H6', 'H6')
                    ->addChoice('P', 'P')

                ->addText('heading_sub', [
                    'label' => 'Sub-Überschrift (optional)',
                    'wrapper' => ['width' => 80],
                ])

                ->addSelect('heading_sub_type', [
                    'label' => 'Hierarchie/Typ',
                    'default_value' => 'P',
                    'wrapper' => ['width' => 20],
                ])
                    ->addChoice('H1', 'H1')
                    ->addChoice('H2', 'H2')
                    ->addChoice('H3', 'H3')
                    ->addChoice('H4', 'H4')
                    ->addChoice('H5', 'H5')
                    ->addChoice('H6', 'H6')
                    ->addChoice('P', 'P')

            ->endGroup()

            ->addLink('link', [
                'label' => 'Button',
            ])

        ->addTab('background', [
            'label' => 'Hintergrund',
        ])

            ->addButtonGroup('bg_choices', [
                'label' => 'Hintergrundauswahl',
            ])
                ->addChoice('color', 'Farbe')
                ->addChoice('image', 'Bild')

            ->addButtonGroup('color', [
                'label' => 'Farbe',
            ])
                ->conditional('bg_choices', '==', 'color')
                ->addChoice('bg-c1-main', 'C1')
                ->addChoice('bg-c1-second', 'C2')
                ->addChoice('bg-c1-third', 'C3')

            ->addImage('bg_image', [
                'label' => 'Hintergrundbild',
            ])
                ->conditional('bg_choices', '==', 'image')

    ->endGroup();

return $blg_cta_center;
