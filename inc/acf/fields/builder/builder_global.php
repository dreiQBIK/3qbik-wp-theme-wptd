<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder_global = new FieldsBuilder('builder_global', [
      'title' => 'Content: Baukasten (Global)',
      'menu_order' => 5,
      'hide_on_screen' => array(
         0 => 'the_content',
      ),
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
   // ->addLayout(wptd_acf_get_module_global('blg_contact'))
   // ->addLayout(wptd_acf_get_module_global('blg_team_teaser'))
   // ->addLayout(wptd_acf_get_module_global('blg_team_teaser_big'))
   // ->addLayout(wptd_acf_get_module_global('blg_logos'))
   // ->addLayout(wptd_acf_get_module_global('blg_card_teaser'))
   // ->addLayout(wptd_acf_get_module_global('blg_flip_cards'))
   // ->addLayout(wptd_acf_get_module_global('blg_project_teaser'))
   // ->addLayout(wptd_acf_get_module_global('blg_images_styleguide'))
   // ->addLayout(wptd_acf_get_module_global('blg_images_frontend'))
   // ->addLayout(wptd_acf_get_module_global('blg_intro_box_client'))
   // ->addLayout(wptd_acf_get_module_global('blg_intro_box'))
   ->addLayout(wptd_acf_get_module_global('blg_testimonials'));

return $builder_global;
