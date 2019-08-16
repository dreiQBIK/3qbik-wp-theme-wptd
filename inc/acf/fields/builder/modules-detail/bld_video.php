<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$bld_video = new FieldsBuilder('bld_video', [
    'title' => 'Video',
]);

$bld_video
    ->addGroup('bld_video', [
        'label' => '',
    ])

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addOembed('video', [
                'label' => 'Video',
                'required' => 1,
            ])
            ->addTrueFalse('truefalse_alt', [
                'label' => 'Videounterschrift',
                'ui' => 1,
            ])
            ->addText('text', [
                'label' => '',
            ])
                ->conditional('truefalse_alt', '==', '1')


    ->endGroup();

return $bld_video;
