<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Initialize ACF Builder
 */
add_action(
   'init',
   function () {

      $acf_files = array();
      foreach (glob(get_template_directory() . '/inc/acf/fields/**/*.php') as $file) {
         $acf_files[] = $file;
      }

      $acf_files_adjusted = array_map(
         function ($field) {
            return require_once($field);
         },
         $acf_files
      );

      array_map(
         function ($field) {
            if ($field instanceof FieldsBuilder) {
               acf_add_local_field_group($field->build());
            } elseif (is_array($field)) {
               // enables us to use a standard acf config array to define our field group
               acf_add_local_field_group($field);
            }
         },
         $acf_files_adjusted
      );

      $acf_files_2 = array();
      foreach (glob(get_template_directory() . '/inc/acf/fields/*.php') as $file) {
         $acf_files_2[] = $file;
      }

      $acf_files_adjusted_2 = array_map(
         function ($field) {
            return require_once($field);
         },
         $acf_files_2
      );

      array_map(
         function ($field) {
            if ($field instanceof FieldsBuilder) {
               acf_add_local_field_group($field->build());
            } elseif (is_array($field)) {
               // enables us to use a standard acf config array to define our field group
               acf_add_local_field_group($field);
            }
         },
         $acf_files_adjusted_2
      );
   }
);
