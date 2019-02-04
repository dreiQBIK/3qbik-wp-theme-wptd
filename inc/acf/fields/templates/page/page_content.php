<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = [
   'wrapper' => ['width' => 50],
];

$page_content = new FieldsBuilder('page_content', [
      'title'          => 'Inhalt',
      'menu_order'     => 20,
      'hide_on_screen' => array(
         0 => 'the_content',
      ),
   ]
);

$page_content
   ->setLocation('post_type', '==', 'page');

$page_content
   ->addGroup('section_1', [
         'label'  => 'Abschnitt 1',
      ]
   )
      ->addFields(get_modules('modules/m_heading'))
      ->addFields(get_modules('modules/m_editor'))
   ->endGroup();

return $page_content;