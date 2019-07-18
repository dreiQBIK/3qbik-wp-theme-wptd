<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    require_once( $globals_file_path );
}

$bl_heading = new FieldsBuilder('bl_heading', [
    'title' => 'Überschrift',
]);

$bl_heading
    ->addGroup('bl_heading', [
        'label' => '',
    ])

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addText('text', [
                'label' => 'Überschrift',
                'required' => 1,
            ])

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

    ->endGroup();

return $bl_heading;
