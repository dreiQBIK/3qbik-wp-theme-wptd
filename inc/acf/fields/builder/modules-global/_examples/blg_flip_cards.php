<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_flip_cards = new FieldsBuilder('blg_flip_cards', [
    'title' => 'Flip-Cards',
]);

$blg_flip_cards
    ->addGroup('blg_flip_cards', [
        'label' => '',
    ])

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
            ->addTrueFalse('section_arrow', [
                'label' => 'mit Pfeil',
                'wrapper' => ['width' => 25],
                'ui' => 1,
            ])
            ->addText('section_arrow_anchor', [
                'label' => 'Pfeil-Anchor (ID)',
                'wrapper' => ['width' => 25],
            ])
                ->conditional('section_arrow', '==', 1)

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
                ->addTrueFalse('toggle_label', [
                    'label' => 'mit Label',
                    'wrapper' => ['width' => 25],
                    'ui' => 1,
                ])
                ->addGroup('label', [
                    'label' => 'Label',
                    'wrapper' => ['width' => 75],
                ])
                    ->conditional('toggle_label', '==', 1)
                    ->addButtonGroup('choices', [
                        'label' => 'Label wählen',
                        'default_value' => '#icon-label-massgeschneidert'
                    ])
                        ->addChoice('#icon-label-abbaubar', '<i class="icon icon-xl icon-label-abbaubar"></i>')
                        ->addChoice('#icon-label-nachhaltig', '<i class="icon icon-xl icon-label-nachhaltig"></i>')
                        ->addChoice('#icon-label-organisch', '<i class="icon icon-xl icon-label-organisch"></i>')
                        ->addChoice('#icon-label-massgeschneidert', '<i class="icon icon-xl icon-label-massgeschneidert"></i>')
                        ->addChoice('#icon-label-fair', '<i class="icon icon-xl icon-label-fair"></i>')
                        ->addChoice('#icon-label-tierversuche', '<i class="icon icon-xl icon-label-tierversuche"></i>')
                ->endGroup()
            ->endGroup()

            ->addRepeater('cards', [
                'label' => 'Cards',
                'button_label' => 'Card hinzufügen',
                'min' => 1,
                'max' => 6,
                'layout' => 'block',
            ])
                ->addTab('front', [
                    'label' => 'Vorderseite',
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
                    ->addWysiwyg('front_text', [
                        'label' => 'Text',
                        'media_upload' => 0,
                        'delay' => 0,
                        'required' => 1,
                    ])
                    ->addText('front_linkname', [
                        'label' => 'Link-Name',
                        'default_value' => 'im Detail',
                        'required' => 1,
                    ])

                ->addTab('back', [
                    'label' => 'Rückseite',
                ])
                    ->addWysiwyg('back_text', [
                        'label' => 'Text',
                        'media_upload' => 0,
                        'delay' => 0,
                        'required' => 1,
                    ])
                    ->addText('back_linkname', [
                        'label' => 'Link-Name',
                        'default_value' => 'Alles klar',
                        'required' => 1,
                    ])
            ->endRepeater()

    ->endGroup();

return $blg_flip_cards;
