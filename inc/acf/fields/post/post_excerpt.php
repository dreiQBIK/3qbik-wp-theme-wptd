<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$post_excerpt = new FieldsBuilder('post_excerpt', [
    'title' => 'Content: Teaser',
    'menu_order' => 0,
]);

$post_excerpt
    ->setLocation('post_type', '==', 'post')
    ->and('post_template', '!=', 'tpl-editor.php');

$post_excerpt
   ->addTextArea('post_excerpt', [
      'label' => 'Kurzbeschreibung',
      'instructions' => 'Beschreibung, die auf der Listenansicht eines Beitrags angezeigt wird.',
      'required' => 0,
   ]);

return $post_excerpt;
