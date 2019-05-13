<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$post_related_posts = new FieldsBuilder('post_related_posts', [
    'title' => 'Verwandte Beiträge',
    'menu_order' => 100,
]);

$post_related_posts
    ->setLocation('post_type', '==', 'post');

$post_related_posts
   ->addGroup('post_related_posts', [
      'label' => '',
   ])
      ->addPostObject('posts', [
         'label' => 'Beiträge auswählen',
         'post_type' => ['post'],
         'return_format' => 'object',
         'multiple' => 1,
         'ui' => 1,
      ])
   ->endGroup();

return $post_related_posts;
