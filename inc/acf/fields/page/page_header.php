<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$page_header = new FieldsBuilder('page_header', [
   'title' => 'Content: Header',
   'menu_order' => 20,
   'hide_on_screen' => array(
      0 => 'the_content',
   ),
]);

$page_header
   ->setLocation('post_type', '==', 'page')
   ->and('page_template', '==', 'default');

$page_header
   ->addGroup('page_header', [
      'label' => '',
   ])
   ->addText('heading', [
      'label' => 'Überschrift',
      'instructions' => 'Hier kann eine Anweisung an den Nutzer stehen',
      'wrapper' => ['width' => 40],
   ])
   ->addTextarea('text', [
      'label' => 'Text',
      'instructions' => 'Hier kann eine Anweisung an den Nutzer stehen',
      'wrapper' => ['width' => 60],
   ])
   ->endGroup();

return $page_header;
