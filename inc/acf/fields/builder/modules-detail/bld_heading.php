<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$bld_heading = new FieldsBuilder('bld_heading', [
    'title' => 'Überschrift',
]);

$bld_heading
    ->addGroup('bld_heading', [
        'label' => '',
    ])

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addText('text', [
                'label' => 'Überschrift',
                'required' => 1,
            ])

    ->endGroup();

return $bld_heading;
