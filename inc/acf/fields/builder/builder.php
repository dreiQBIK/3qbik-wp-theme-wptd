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
   ->setLocation('post_type', '==', 'post')
   ->or('post_template', '==', 'tpl-builder.php');

$builder
   ->addFlexibleContent(
      'builder_content',
      [
         'label' => '',
         'button_label' => 'Baustein hinzufügen',
      ]
   )
   // we could use a loop here instead, to add all layouts
   ->addLayout(wptd_acf_get_module('bl_quote'))
   ->addLayout(wptd_acf_get_module('bl_video'))
   ->addLayout(wptd_acf_get_module('bl_gallery'))
   ->addLayout(wptd_acf_get_module('bl_image'))
   ->addLayout(wptd_acf_get_module('bl_editor'))
   ->addLayout(wptd_acf_get_module('bl_heading'));

return $builder;
