<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

// make _globals variables available for other acf fields
$acf_field_group_definition_file_paths_globals = glob( get_template_directory() . '/inc/acf/fields/_globals/*.php' );
foreach ( $acf_field_group_definition_file_paths_globals as $globals_file_path ) {
    include( $globals_file_path );
}

$header_hero = new FieldsBuilder('header_hero', [
    'title' => 'Header',
    'menu_order' => 0,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$header_hero
    ->setLocation('post_type', '==', 'page')
        ->or('page_type', '==', 'posts_page');

$header_hero
    ->addGroup('header_hero', [
        'label' => '',
    ])
        ->addButtonGroup('header_to_show', [
            'label' => 'Header für diese Seite anzeigen?',
            'default_value' => 'mb-medium'
        ])
            ->addChoice('hero', 'Hero-Header')
            ->addChoice('base', 'Titel und Subtitel')
            ->addChoice('none', 'Kein Header')

        ->addTab('settings', [
            'label' => 'Einstellungen',
        ])
            ->conditional('header_to_show', '==', 'hero')
                ->or('header_to_show', '==', 'base')

            ->addFields($tab_settings)

        ->addTab('content', [
            'label' => 'Inhalt',
        ])
            ->conditional('header_to_show', '==', 'base')

            ->addGroup('headings', [
                'label' => 'Titel und Subtitel',
            ])
                ->addButtonGroup('layout', [
                    'label' => 'Ausrichtung auswählen',
                    'default_value' => 'left'
                ])
                    ->addChoice('left', 'Linksbündig')
                    ->addChoice('center', 'Zentriert')
                ->addText('heading', [
                    'label' => 'Titel',
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
                    'label' => 'Subtitel (optional)',
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

        ->addTab('background', [
            'label' => 'Inhalt: Hintergrund',
        ])
            ->conditional('header_to_show', '==', 'hero')

            ->addImage('image', [
                'label' => 'Hintergrundbild',
                'preview_size' => 'medium',
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

        ->addTab('foreground', [
            'label' => 'Inhalt: Vordergrund',
        ])
            ->conditional('header_to_show', '==', 'hero')

            ->addGroup('position', [
                'label' => 'Darstellung',
            ])
                ->addButtonGroup('choices', [
                    'label' => 'Ausrichtung',
                    'default_value' => 'left-top'
                ])
                    ->addChoice('left-top', 'Links oben')
                    ->addChoice('left-center', 'Links zentriert')
                    ->addChoice('left-bottom', 'Links unten')
                    ->addChoice('center-top', 'Mitte oben ')
                    ->addChoice('center-center', 'Zentriert')
                    ->addChoice('center-bottom', 'Mitte unten')
                    ->addChoice('right-top', 'Rechts oben')
                    ->addChoice('right-center', 'Rechts zentriert')
                    ->addChoice('right-bottom', 'Rechts unten')
            ->endGroup()

            ->addGroup('label', [
                'label' => 'Info-Label (optional)',
            ])
                ->addText('text', [
                    'label' => 'Text',
                    'default_value' => 'Jetzt mitmachen',
                    'wrapper' => ['width' => 50],
                ])
                ->addButtonGroup('color', [
                    'label' => 'Farbe',
                    'default_value' => 'white',
                    'wrapper' => ['width' => 50],
                ])
                    ->addChoice('white', 'Weiß')
                    ->addChoice('yellow', 'Gelb')
                    ->addChoice('gray', 'Grau')
            ->endGroup()

            ->addGroup('headline', [
                'label' => 'Überschrift',
            ])
                ->addButtonGroup('size', [
                    'label' => 'Größe',
                    'wrapper' => ['width' => 50],
                    'default_value' => '1'
                ])
                    ->addChoice('small', 'Klein')
                    ->addChoice('big', 'Groß')
                ->addTrueFalse('truefalse_heading_background', [
                    'label' => 'Kontrast verbessern (Hintergrund aufhellen)',
                    'wrapper' => ['width' => 50],
                    'ui' => 1,
                ])
                ->addText('heading', [
                    'label' => 'Überschrift',
                    'wrapper' => ['width' => 80],
                    'required' => 1,
                ])
                ->addSelect('heading_type', [
                    'label' => 'Hierarchie/Typ',
                    'default_value' => 'H1',
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
            ->addText('heading_sub', [
                'label' => 'Sub-Überschrift (optional)',
                'wrapper' => ['width' => 80],
            ])
            ->addSelect('heading_sub_type', [
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

            ->addLink('button', [
                'label' => 'Button (optional)',
                'required' => 0,
            ])

            ->addImage('image_2', [
                'label' => 'Bild / Unterschrift (optional)',
                'preview_size' => 'medium',
                'wrapper' => ['width' => 65],
            ])
            ->addGroup('image_2_settings', [
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

    ->endGroup();

return $header_hero;
