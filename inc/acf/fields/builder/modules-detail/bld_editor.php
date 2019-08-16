<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$bld_editor = new FieldsBuilder('bld_editor', ['title' => 'Editor']);

$bld_editor
    ->addGroup('bld_editor', [
        'label' => '',
    ])

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addWysiwyg('wysiwyg', [
                'label' => 'Text',
                'media_upload' => 0,
            ])

    ->endGroup();

return $bld_editor;
