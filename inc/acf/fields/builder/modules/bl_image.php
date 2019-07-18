<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$bl_image = new FieldsBuilder('bl_image', ['title' => 'Bild']);

$bl_image
    ->addGroup('bl_image', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addImage('image', [
                'label' => 'Bild',
                'required' => 1,
                'preview_size' => 'large',
                'wrapper' => ['width' => '70'],
            ])
            ->addGroup('image_settings', [
                'label' => 'Einstellungen',
                'wrapper' => ['width' => '30'],
            ])
                ->addTrueFalse('truefalse_caption', [
                    'label' => 'mit Bildunterschrift',
                    'ui' => 1,
                ])
                ->addTrueFalse('truefalse_lightbox', [
                    'label' => 'mit Lightbox',
                    'ui' => 1,
                ])
            ->endGroup()

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

    ->endGroup();

return $bl_image;
