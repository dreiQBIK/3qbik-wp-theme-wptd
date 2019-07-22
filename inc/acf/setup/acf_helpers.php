<?php

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $builder_module
 * @return mixed
 */

function wptd_acf_get_module( $module ) {
    return include( get_template_directory() . "/inc/acf/fields/builder/modules/{$module}.php" );
}
