<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('builder');

$builder
    ->addFlexibleContent('builder', ['button_label' => 'Baustein hinzufügen'])
            ->addLayout(get_field_partial('builder.editor'), [ 'title' => 'Editor'])
            ->addLayout(get_field_partial('builder.heading'), [ 'title' => 'Überschrift']);

return $builder;
