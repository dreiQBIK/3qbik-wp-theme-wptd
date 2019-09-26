<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_contact = new FieldsBuilder('blg_contact', [
    'title' => 'Kontakt-Footer',
]);

$blg_contact
    ->addGroup('blg_contact', [
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

        ->addTrueFalse('toggle_page_teaser', [
            'label' => 'Seitenlinks',
            'wrapper' => ['width' => 50],
            'ui' => 1,
        ])
        ->addGroup('page_links', [
            'label' => 'Seiten-Links',
        ])
            ->conditional('toggle_page_teaser', '==', 1)

            ->addGroup('page_link_1', [
            'label' => 'Seite/Link links',
            ])
                ->addLink('link', [
                    'label' => 'Link auswählen',
                    'wrapper' => ['width' => 50],
                    'ui' => 1,
                ])
            ->endGroup()
            ->addGroup('page_link_2', [
            'label' => 'Seite/Link rechts',
            ])
                ->addLink('link', [
                    'label' => 'Link auswählen',
                    'wrapper' => ['width' => 50],
                    'ui' => 1,
                ])
            ->endGroup()
        ->endGroup()


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
                        'default_value' => '#icon-label-organisch'
                    ])
                        ->addChoice('#icon-label-abbaubar', '<i class="icon icon-xl icon-label-abbaubar"></i>')
                        ->addChoice('#icon-label-nachhaltig', '<i class="icon icon-xl icon-label-nachhaltig"></i>')
                        ->addChoice('#icon-label-organisch', '<i class="icon icon-xl icon-label-organisch"></i>')
                        ->addChoice('#icon-label-massgeschneidert', '<i class="icon icon-xl icon-label-massgeschneidert"></i>')
                        ->addChoice('#icon-label-fair', '<i class="icon icon-xl icon-label-fair"></i>')
                        ->addChoice('#icon-label-tierversuche', '<i class="icon icon-xl icon-label-tierversuche"></i>')
                ->endGroup()
            ->endGroup()

            ->addGroup('heading', [
                'label' => 'Überschrift',
             ])
                ->addText('heading_top', [
                   'label' => 'Überschrift (optional)',
                   'instructions' => 'Dieses Feld dient zum Überschreiben des Standard (siehe: Globale Inhalte).',
                   'wrapper' => ['width' => 50],
                ])
                ->addText('heading_sub', [
                   'label' => 'Sub-Überschrift (optional)',
                   'instructions' => 'Dieses Feld dient zum Überschreiben des Standard (siehe: Globale Inhalte).',
                   'wrapper' => ['width' => 50],
                ])
                ->addWysiwyg('text', [
                   'label' => 'Text (optional)',
                   'instructions' => 'Dieses Feld dient zum Überschreiben des Standard (siehe: Globale Inhalte).',
                   'media_upload' => 0,
                   'delay' => 0,
                   'wrapper' => ['width' => 50],
                ])
            ->endGroup()

            ->addLink('button_1', [
                'label' => 'Link 1 auswählen (optional)',
                'instructions' => 'Dieses Feld dient zum Überschreiben des Standard (siehe: Globale Inhalte).',
                'ui' => 1,
            ])
            ->addLink('button_2', [
                'label' => 'Link 2 auswählen (optional)',
                'instructions' => 'Dieses Feld dient zum Überschreiben des Standard (siehe: Globale Inhalte).',
                'ui' => 1,
            ])

            ->addImage('image', [
                'label' => 'Hintergrundbild (optional)',
                'instructions' => 'Dieses Feld dient zum Überschreiben des Standard (siehe: Globale Inhalte).',
                'preview_size' => 'medium',
                'wrapper' => ['width' => 65],
            ])

    ->endGroup();

return $blg_contact;
