<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_icon_teaser = new FieldsBuilder('blg_icon_teaser', [
    'title' => 'Teaser mit Icons',
]);

$blg_icon_teaser
    ->addGroup('blg_icon_teaser', [
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
                'label' => 'Teaser mit Icons',
                'button_label' => 'Teser hinzufügen',
                'min' => 1,
                'max' => 4,
                'layout' => 'block',
            ])
                ->addGroup('intro', [
                    'label' => 'Teaser mit Icon',
                ])
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

                    ->addButtonGroup('icon', [
                        'label' => __('Icon auswählen', 'wptd'),
                        'wrapper' => ['width' => 100],
                    ])
                        ->addChoice('#icon-circle-03', '<i class="icon icon-circle-03"></i>')
                        ->addChoice('#icon-left-arrow', '<i class="icon icon-left-arrow"></i>')
                        ->addChoice('#icon-right-arrow', '<i class="icon icon-right-arrow"></i>')
                        ->addChoice('#icon-up-arrow', '<i class="icon icon-up-arrow"></i>')
                        ->addChoice('#icon-down-arrow', '<i class="icon icon-down-arrow"></i>')
                        ->addChoice('#icon-move-layer-down', '<i class="icon icon-move-layer-down"></i>')
                        ->addChoice('#icon-move-up', '<i class="icon icon-move-up"></i>')
                        ->addChoice('#icon-pdf', '<i class="icon icon-pdf"></i>')
                        ->addChoice('#icon-img-stack', '<i class="icon icon-img-stack"></i>')
                        ->addChoice('#icon-shape-star-2', '<i class="icon icon-shape-star-2"></i>')
                        ->addChoice('#icon-shape-star-1', '<i class="icon icon-shape-star-1"></i>')
                        ->addChoice('#icon-zoom', '<i class="icon icon-zoom"></i>')
                        ->addChoice('#icon-heart-2', '<i class="icon icon-heart-2"></i>')
                        ->addChoice('#icon-heart-1', '<i class="icon icon-heart-1"></i>')
                        ->addChoice('#icon-pin-3-1', '<i class="icon icon-pin-3-1"></i>')

                        ->addWysiwyg('teaser_text', [
                            'label' => 'Teaser Text',
                            'instructions' => 'Der Text sollte nicht länger als --- Zeichen sein.',
                            'required' => 1,
                        ])
                ->endGroup()

            ->endRepeater()

    ->endGroup();

return $blg_icon_teaser;
