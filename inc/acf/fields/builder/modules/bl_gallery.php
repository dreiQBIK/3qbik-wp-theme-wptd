<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$bl_gallery = new FieldsBuilder('bl_gallery', [
    'title' => 'Bildergalerie',
]);

$bl_gallery
    ->addGroup('bl_gallery', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])

            ->addGallery('gallery', [
                'label' => 'Bilder',
                'instructions' => '',
                'required' => 1,
                'min' => 3,
                'insert' => 'append',
                'library' => 'all',
            ])
            ->addTrueFalse('truefalse_thumbs', [
                'label' => 'Thumbnail-Preview',
                'ui' => 1,
            ])
            ->addTrueFalse('truefalse_alt', [
                'label' => 'Galerieunterschrift',
                'ui' => 1,
            ])
            ->addText('text', [
                'label' => '',
            ])
                ->conditional('truefalse_alt', '==', '1')

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

    ->endGroup();

return $bl_gallery;
