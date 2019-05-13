<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder(
   'builder',
   [
      'title' => 'Content: Baukasten',
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
   ->addLayout(get_modules('bl_quote'))
   ->addLayout(get_modules('bl_video'))
   ->addLayout(get_modules('bl_gallery'))
   ->addLayout(get_modules('bl_image'))
   ->addLayout(get_modules('bl_editor'))
   ->addLayout(get_modules('bl_heading'));

return $builder;
