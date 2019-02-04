<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder(
   'builder',
   [
      'title' => 'Baukasten',
      'menu_order' => 5,
      'hide_on_screen' => array(
         0 => 'the_content',
      ),
   ]
);

$builder
   ->setLocation('post_type', '==', 'post');

$builder
   ->addFlexibleContent(
      'builder_content',
      [
         'label' => '',
         'button_label' => 'Baustein hinzufügen',
      ]
   )
   ->addLayout(get_modules('m_editor'))
   ->addLayout(get_modules('m_heading'));

return $builder;
