<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder_global = new FieldsBuilder('builder_global', [
      'title' => 'Content: Baukasten (Global)',
      'menu_order' => 5,
      'hide_on_screen' => array(
         0 => 'the_content',
      ),
      'style' => 'seamless',
   ]
);

// conditions should be structured like described here: https://github.com/StoutLogic/acf-builder/wiki/location
$builder_global
   ->setLocation('post_type', '==', 'page')
      ->or('post_template', '==', 'tpl-builder-global');

$builder_global
   ->addFlexibleContent(
      'builder_global_content',
      [
         'label' => '',
         'button_label' => 'Baustein hinzufügen',
      ]
   )

   ->addLayout(wptd_acf_get_module_global('blg_text'))
   ->addLayout(wptd_acf_get_module_global('blg_site_teaser_carousel'))
   ->addLayout(wptd_acf_get_module_global('blg_card_teaser'))
   ->addLayout(wptd_acf_get_module_global('blg_testimonials'))
   ->addLayout(wptd_acf_get_module_global('blg_image_text'))
   ->addLayout(wptd_acf_get_module_global('blg_cta_center'))
   ->addLayout(wptd_acf_get_module_global('blg_icon_teaser'));

return $builder_global;
