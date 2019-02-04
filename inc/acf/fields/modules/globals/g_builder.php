<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$g_builder = new FieldsBuilder(
   'g_builder', [
   'title'          => 'Baukasten',
   'menu_order'     => 5,
   'hide_on_screen' => array(
      0 => 'the_content',
   ),
]
);

$g_builder
   ->setLocation('post_type', '==', 'post');

$g_builder
   ->addFlexibleContent(
      'g_builder_content',
      [
         'label'        => '',
         'button_label' => 'Baustein hinzufügen',
      ]
   )
   ->addLayout(get_modules('modules/m_editor'))
   ->addLayout(get_modules('modules/m_heading'));

return $g_builder;
