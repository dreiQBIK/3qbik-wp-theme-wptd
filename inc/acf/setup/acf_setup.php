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
      foreach (glob(get_template_directory().'/inc/acf/fields/templates/**/*.php') as $file) {
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
            }
         },
         $acf_files_adjusted
      );
      
      
      $acf_files_global = array();
      foreach (glob(get_template_directory().'/inc/acf/fields/modules/globals/*.php') as $file) {
         $acf_files_global[] = $file;
      }
      
      $acf_files_adjusted_global = array_map(
         function ($field) {
            return require_once($field);
         },
         $acf_files_global
      );
      
      
      array_map(
         function ($field) {
            if ($field instanceof FieldsBuilder) {
               acf_add_local_field_group($field->build());
            }
         },
         $acf_files_adjusted_global
      );
   }
);

