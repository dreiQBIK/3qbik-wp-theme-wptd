<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_testimonials = new FieldsBuilder('blg_testimonials', [
    'title' => 'Testimonials',
]);

$blg_testimonials
    ->addGroup('blg_testimonials', [
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
                'label' => 'Testimonials',
                'button_label' => 'Testimonial hinzufügen',
                'min' => 3,
                'layout' => 'block',
            ])
                ->addGroup('intro', [
                    'label' => 'Testimonial',
                ])
                    ->addImage('image', [
                        'label' => 'Bild',
                        'instructions' => 'Dieses Bild sollte für eine optimale Darstellung quadratisch sein',
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
                    ->addText('text', [
                        'label' => 'Text',
                        'required' => 1,
                    ])
                    ->addText('name', [
                        'label' => 'Name/Kunde',
                    ])
                ->endGroup()

            ->endRepeater()

    ->endGroup();

return $blg_testimonials;
