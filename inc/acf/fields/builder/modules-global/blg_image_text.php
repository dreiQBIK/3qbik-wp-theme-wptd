<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$blg_image_text = new FieldsBuilder('blg_image_text', [
    'title' => 'Image-Text',
]);

$blg_image_text
    ->addGroup('blg_image_text', [
        'label' => '',
    ])
        // ->addFields($backend_layout)

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

        ->addTab('content', [
            'label' => 'Inhalt',
        ])

        ->addButtonGroup('position', [
            'label' => 'Bildausrichtung',
            'wrapper' => ['width' => 50],
        ])
            ->addChoice('left', 'Links')
            ->addChoice('right', 'Rechts')

        ->addImage('image', [
            'label' => 'Bild',
            'preview_size' => 'thumbnail',
        ])

        ->addWysiwyg('text', [
            'label' => 'Text',
            'media_upload' => 0,
            'delay' => 0,
        ])

    ->endGroup();

return $blg_image_text;
