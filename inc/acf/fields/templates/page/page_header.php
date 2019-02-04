<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$page_header = new FieldsBuilder(
   'page_header', [
      'title'          => 'Intro',
      'menu_order'     => 10,
      'hide_on_screen' => array(
         0 => 'the_content',
      ),
   ]
);

$page_header
   ->setLocation('post_type', '==', 'page');

$page_header
   ->addFields(get_modules('modules/m_editor'))
   ->addFields(get_modules('modules/m_heading'));

return $page_header;