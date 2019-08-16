<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$bld_quote = new FieldsBuilder('bld_quote', [
    'title' => 'Zitat',
]);

$bld_quote
    ->addGroup('bld_quote', [
        'label' => '',
    ])

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->addFields($tab_settings)

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->addTextarea('quote', [
                'label' => 'Zitat',
                'required' => 1,
                'wrapper' => ['width' => '75'],
            ])
            ->addText('author', [
                'label' => 'Autor',
                'wrapper' => ['width' => '25'],
            ])

    ->endGroup();

return $bld_quote;
