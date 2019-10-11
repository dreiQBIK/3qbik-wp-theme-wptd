<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_card_teaser = new FieldsBuilder('blg_card_teaser', [
    'title' => 'Card-Teaser',
]);

$blg_card_teaser
    ->addGroup('blg_card_teaser', [
        'label' => '',
    ])
        // ->addFields($backend_layout)

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)
            ->addTrueFalse('toggle_heading', [
                'label' => 'Baustein-Überschrift',
                'instructions' => 'Diese Überschrift wird zentriert über dem Baustein angezeigt. Eine Sub-Überschrift kann optional mit angegeben werden.',
                'message' => 'Aktivieren/Deaktivieren',
                'default_value' => 1,
                'wrapper' => ['width' => 50],
                'ui' => 1,
            ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addGroup('headings', [
                'label' => 'Baustein-Überschrift',
            ])
                ->conditional('toggle_heading', '==', 1)

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
                    'default_value' => 'H3',
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

            ->addRepeater('teaser', [
                'label' => 'Teaser',
                'button_label' => 'Teaser hinzufügen',
                'min' => 2,
                'max' => 4,
                'layout' => 'block',
            ])
                ->addText('heading', [
                    'label' => 'Überschrift',
                    'wrapper' => ['width' => 80],
                ])
                ->addSelect('heading_type', [
                    'label' => 'Hierarchie/Typ',
                    'default_value' => 'H3',
                    'wrapper' => ['width' => 20],
                ])
                    ->addChoice('H1', 'H1')
                    ->addChoice('H2', 'H2')
                    ->addChoice('H3', 'H3')
                    ->addChoice('H4', 'H4')
                    ->addChoice('H5', 'H5')
                    ->addChoice('H6', 'H6')
                    ->addChoice('P', 'P')
                ->addWysiwyg('text', [
                    'label' => 'Text',
                    'media_upload' => 0,
                    'delay' => 0,
                    'required' => 1,
                ])
                ->addLink('link', [
                    'label' => 'Link',
                ])
            ->endRepeater()

    ->endGroup();

return $blg_card_teaser;
