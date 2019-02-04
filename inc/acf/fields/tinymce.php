<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$tinymce = new FieldsBuilder('tinymce', [
    'title' => 'Editor',
    'menu_order' => 0,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$tinymce
    ->setLocation('post_type', '==', 'page')
    ->and('post_template', '==', 'tpl-editor.php');

$tinymce
    ->addWysiwyg('tinymce', [
        'label' => 'Text',
        'media_upload' => 0,
    ]);

return $tinymce;
