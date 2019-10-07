<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_site_teaser_carousel = new FieldsBuilder('blg_site_teaser_carousel', [
    'title' => 'Seiten-Teaser (Karussell)',
]);

$blg_site_teaser_carousel
    ->addGroup('blg_site_teaser_carousel', [
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

                ->addText('heading_sub', [
                    'label' => 'Sub-Überschrift (optional)',
                    'wrapper' => ['width' => 80],
                ])

                ->addSelect('heading_sub_type', [
                    'label' => 'Hierarchie/Typ',
                    'default_value' => 'H4',
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
                'label' => 'Kacheln',
                'button_label' => 'Kachel hinzufügen',
                'min' => 2,
                'max' => 3,
                'layout' => 'block',
            ])
                ->addGroup('intro', [
                    'label' => 'Allgemeines für diese Kachel',
                ])
                    ->addImage('image', [
                        'label' => 'Bild',
                        'preview_size' => 'thumbnail',
                        'wrapper' => ['width' => 65],
                        'required' => 1,
                    ])
                    ->addGroup('image_settings', [
                        'label' => 'Bild-Einstellungen',
                        'wrapper' => ['width' => 35],
                    ])
                        ->addTrueFalse('truefalse_caption', [
                            'label' => 'alternatives Alt-Tag',
                            'ui' => 1,
                        ])
                        ->addText('caption', [
                            'label' => '',
                            'instructions' => 'Alt-Tag angeben',
                        ])
                            ->conditional('truefalse_caption', '==', 1)
                    ->endGroup()

                    ->addText('heading', [
                        'label' => 'Überschrift',
                        'wrapper' => ['width' => 80],
                        'required' => 1,
                    ])
                    ->addSelect('heading_type', [
                        'label' => 'Hierarchie/Typ',
                        'default_value' => 'H4',
                        'wrapper' => ['width' => 20],
                    ])
                        ->addChoice('H1', 'H1')
                        ->addChoice('H2', 'H2')
                        ->addChoice('H3', 'H3')
                        ->addChoice('H4', 'H4')
                        ->addChoice('H5', 'H5')
                        ->addChoice('H6', 'H6')
                        ->addChoice('P', 'P')
                    ->addText('text', [
                        'label' => 'Text',
                        'required' => 1,
                    ])
                ->endGroup()

                ->addGroup('links', [
                    'label' => 'Link für diese Kachel',
                ])
                    ->addLink('link', [
                        'label' => 'Link',
                    ])
                ->endGroup()

            ->endRepeater()

    ->endGroup();

return $blg_site_teaser_carousel;
