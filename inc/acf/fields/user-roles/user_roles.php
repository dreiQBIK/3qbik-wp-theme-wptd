<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$user_roles_info = new FieldsBuilder('user_roles_info', [
    'title' => 'Portrait',
]);

$user_roles_info
    ->setLocation('user_role', '==', 'all');

$user_roles_info
   ->addGroup('user_roles_info', [
      'label' => '',
   ])
      ->addImage('image', [
         'label' => 'Portrait',
         'preview_size' => 'thumbnail',
      ])
      ->addWysiwyg('text', [
         'label' => 'Text',
         'media_upload' => 0,
      ])
   ->endGroup();

return $user_roles_info;
