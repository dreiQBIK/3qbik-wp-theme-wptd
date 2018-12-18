<?php
/**
 * ***********************************************************************************************
 * Example ACF Components
 *
 *      > PB_EDITOR
 *      > PB_HEADLINE
 *      >
 *      > LOCATION
 *
 * @package wptd
 *********************************************************************************************** */


$page_builder = new StoutLogic\AcfBuilder\FieldsBuilder('page_builder', [
    'title' => 'ACF Feld',
    'menu_order' => 5,
]);
$page_builder

    /* PAGE_BUILDER */
    ->addFlexibleContent('pb', [
        'label' => 'Layout-Elemente',
        'button_label' => 'Element hinzufügen',
    ])

        // PB_EDITOR
        ->addLayout('pb_editor', [
            'title' => 'Text',
        ])
            ->addTab('pb_editor_content', [
                'label' => 'Inhalt',
            ])
                ->addWysiwyg('pb_editor_wysiwyg', [
                    'label'        => 'Text',
                    'tabs'         => 'visual',
                    'media_upload' => 0,
                    'required'     => 1,
                ])

            ->addTab('pb_editor_settings', [
                'label' => 'Einstellungen',
            ])
                ->addSelect('pb_editor_margin', [
                    'label'         => 'Abstand nach unten',
                    'instructions'  => 'Größe des Abstandes des gesamten Elementes nach unten/zum nächsten Element',
                    'wrapper'       => ['width' => 50],
                    'default_value' => 'pb-2'
                ])
                    ->addChoice('pb-1', 'Klein')
                    ->addChoice('pb-2', 'Standard')
                    ->addChoice('pb-4', 'Groß')

            // PB_HEADLINE
            ->addLayout('pb_headline', [
                'title' => 'Überschrift (h2)',
            ])
                ->addTab('pb_headline_content', [
                    'label' => 'Inhalt',
                ])
                    ->addText('pb_headline_text', [
                        'label'    => 'Überschrift',
                        'required' => 1,
                    ])

                ->addTab('pb_editor_settings', [
                    'label' => 'Einstellungen',
                ])
                    ->addSelect('pb_headline_margin', [
                        'label'         => 'Abstand nach unten',
                        'instructions'  => 'Größe des Abstandes des gesamten Elementes nach unten/zum nächsten Element',
                        'wrapper'       => ['width' => 50],
                        'default_value' => 'pb-2'
                    ])
                        ->addChoice('pb-1', 'Klein')
                        ->addChoice('pb-2', 'Standard')
                        ->addChoice('pb-4', 'Groß')

    /* END_PAGE_BUILDER */
    ->endFlexibleContent()


    /* LOCATION */
    ->setLocation('post_type', '==', 'post')
        ->and('post_template', '!=', 'tpl-tinymce.php')
        ->or('post_type', '==', 'page')
        ->and('post_template', '!=', 'tpl-tinymce.php')
        ->and('post_template', '!=', 'tpl-example.php');

add_action('acf/init', function() use ($page_builder) {
   acf_add_local_field_group($page_builder->build());
});
