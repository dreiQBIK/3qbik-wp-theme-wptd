<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$g_tinymce = new FieldsBuilder('g_tinymce', [
    'title' => 'Editor',
    'menu_order' => 0,
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
]);

$g_tinymce
    ->setLocation('post_type', '==', 'page')
    ->and('post_template', '==', 'tpl-example.php');

$g_tinymce
    ->addWysiwyg('wysiwyg', [
        'label' => 'Text',
        'media_upload' => 0,
    ]);

return $g_tinymce;