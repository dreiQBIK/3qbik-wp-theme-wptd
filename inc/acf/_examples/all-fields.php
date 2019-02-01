<?php

/**
 * ***********************************************************************************************
 * Example ACF Components
 *
 *      Take a look at our docs (https://docs.dreiqbik.de/tools-workflow/entwicklung/acf.html),
 *      where you can find ALL fields and settings available!
 *
 *      > Flexible Content
 *      > Text
 *      > Text Area
 *      > Wysiwyg
 *      > Image
 *      > Gallery
 *      > Range
 *      > TrueFalse
 *      > Select
 *      > Conditional
 *      > Radio
 *      > File
 *      > Date Picker
 *      > Time Picker
 *      > Date-Time Picker
 *      > Color Picker
 *      > User
 *      > Post Object
 *      > Page Link
 *      > Taxonomy
 *      > Tab
 *      > Group
 *      > Repeater
 *      > Location
 *
 * @package wptd
 *********************************************************************************************** */


$example = new StoutLogic\AcfBuilder\FieldsBuilder('example', [
    'title' => 'ACF Feld',
    'menu_order' => 5,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);
$example

    /* Flexible Content */
    ->addFlexibleContent('example_layouts', [
        'label' => 'Layout-Elemente',
        'button_label' => 'Element hinzufügen',
    ])
        /* Flexible Content Component */
        ->addLayout('example_headline', [
            'title' => 'Überschrift',
        ])
            /* Text */
            ->addText('example_headline_text', [
                'label' => 'Text',
                'instructions' => 'Hier kann eine Anweisung an den Nutzer stehen',
                'wrapper' => ['width' => 30],
            ])

            /* Text Area */
            ->addTextArea('example_headline_text2', [
                'label' => 'Text2',
                'wrapper' => ['width' => 70],
            ])

        /* Other Flexible Content Component */
        ->addLayout('example_content', [
            'title' => 'Inhalt',
        ])
            /* Wysiwyg */
            ->addWysiwyg('example_content_text', [
                'label' => 'Text',
            ])

            ->addLayout('example_image', [
                'title' => 'Bild',
            ])
            /* Image */
            ->addImage('example_image_item', [
                'label' => 'Bild-Upload',
            ])

    ->endFlexibleContent()


    /* Gallery */
    ->addGallery('example_gallery', [
        'label' => 'Galerie',
        'mime_types' => 'png, jpeg, svg',
    ])


    /* Range */
    ->addRange('example_range', [
        'label' => 'Slider',
        'step' => '2',
        'min' => '2',
        'max' => '8',
        'default_value' => '4',
    ])


    /* TrueFalse */
    ->addTrueFalse('example_toggle', [
        'label' => 'Toggle',
        'message' => 'Aktivieren/Deaktivieren',
        'ui' => 1,
    ])


    /* Select */
    ->addSelect('example_select', [
        'label' => 'Auswahl',
    ])
    ->addChoice('example_select_left', 'Linksbündig')
    ->addChoice('example_select_centered', 'Zentriert')
    ->addChoice('example_select_right', 'Rechtsbündig')


    /* Radio */
    ->addRadio('example_radio', [
        'label' => 'Auswahl',
    ])
    ->addChoice('example_radio_choice1', 'Mann')
    ->addChoice('example_radio_choice2', 'Frau')


    /* File */
    ->addFile('example_file', [
        'label' => 'Datei',
        'mime_types' => 'png, jpeg, svg, pdf, docx',
    ])


    /* Conditional (e.g. after Radio, Select or TrueFalse) */
    ->conditional('example_radio', '==', 'example_radio_choice1')


    /* Date Picker */
    ->addDatePicker('example_date', [
        'label' => 'Datum',
    ])


    /* Time Picker */
    ->addTimePicker('example_time', [
        'label' => 'Uhrzeit',
    ])


    /* Date-Time Picker */
    ->addDateTimePicker('example_datetime', [
        'label' => 'Datum & Uhrzeit',
    ])


    /* Color Picker */
    ->addColorPicker('example_colorpicker', [
        'label' => 'Farbe',
    ])


    /* User */
    ->addUser('example_user', [
        'label' => 'Nutzer',
    ])


    /* Post Object */
    ->addPostObject('example_postobject', [
        'label' => 'Custom Post Type',
        'post_type' => 'post',
        'taxonomy' => 'post_tag',
        'multiple' => 0,
    ])


    /* Page Link */
    ->addPageLink('example_link', [
        'label' => 'Link',
        'post_type' => 'page',
        'taxonomy' => 'post_tag',
        'multiple' => 0,
    ])


    /* Taxonomy */
    ->addTaxonomy('example_taxonomy', [
        'label' => 'Taxonomie',
        'field_type' => 'multi_select',
        'taxonomy' => 'category',
    ])


    /* Tab */
    ->addTab('example_tab', [
        'label' => 'Tab',
    ])
        ->addText('example_tab_field')

    ->addTab('example_tab2', [
        'label' => 'Tab2',
    ])
        ->addText('example_tab2_field')


    /* Group */
    ->addGroup('example_group', [
        'label' => 'Gruppierung',
    ])
        ->addText('example_group_field')
    ->endGroup()


    /* Repeater */
    ->addRepeater('example_repeater', [
        'label' => 'Repeater',
        'button_label' => 'Reihe hinzufügen',
        'min' => 2,
        'max' => 6,
    ])
        ->addText('example_repeater_field')
    ->endRepeater()


    /* Location */
    ->setLocation('post_template', '==', 'tpl-example.php');

add_action('acf/init', function () use ($example) {
    acf_add_local_field_group($example->build());
});
