<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder_detail = new FieldsBuilder('builder_detail', [
      'title' => 'Content: Baukasten (Detail)',
      'menu_order' => 5,
      'hide_on_screen' => array(
         0 => 'the_content',
      ),
   ]
);

// conditions should be structured like described here: https://github.com/StoutLogic/acf-builder/wiki/location
$builder_detail
   ->setLocation('post_type', '==', 'post')
   ->or('post_template', '==', 'tpl-builder-detail.php');

$builder_detail
   ->addFlexibleContent(
      'builder_detail_content',
      [
         'label' => '',
         'button_label' => 'Baustein hinzufügen',
      ]
   )

   ->addLayout(wptd_acf_get_module_detail('bld_quote'))
   ->addLayout(wptd_acf_get_module_detail('bld_video'))
   ->addLayout(wptd_acf_get_module_detail('bld_gallery'))
   ->addLayout(wptd_acf_get_module_detail('bld_image'))
   ->addLayout(wptd_acf_get_module_detail('bld_editor'))
   ->addLayout(wptd_acf_get_module_detail('bld_heading'));

return $builder_detail;
