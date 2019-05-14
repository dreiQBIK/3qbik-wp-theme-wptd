<?php

/**
 * Add all our ACF field groups, making use of ACF Builder
 */
function wptd_add_acf_field_groups() {

   $acf_field_group_definition_file_paths = array_merge(
      glob(get_template_directory() . '/inc/acf/fields/**/*.php'),
      glob(get_template_directory() . '/inc/acf/fields/*.php')
   );

   $acf_field_group_definitions = array_map(
      function ($field) {
         return require_once($field);
      },
      $acf_field_group_definition_file_paths
   );

   foreach ( $acf_field_group_definitions as $field_group_definition ) {
      if ( $field_group_definition instanceof StoutLogic\AcfBuilder\FieldsBuilder ) {
         acf_add_local_field_group( $field_group_definition->build() );
      } elseif ( is_array( $field_group_definition ) ) {
         // enables us to use a standard acf config array to define our field group
         acf_add_local_field_group( $field_group_definition) ;
      }
   }

}
add_action( 'init', 'wptd_add_acf_field_groups' );
