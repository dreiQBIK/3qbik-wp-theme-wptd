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

// conditions should be structured like described here: https://github.com/StoutLogic/acf-builder/wiki/location
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
   // we could use a loop here instead, to add all layouts
   ->addLayout(get_module('bl_quote'))
   ->addLayout(get_module('bl_video'))
   ->addLayout(get_module('bl_gallery'))
   ->addLayout(get_module('bl_image'))
   ->addLayout(get_module('bl_editor'))
   ->addLayout(get_module('bl_heading'));

return $builder;
