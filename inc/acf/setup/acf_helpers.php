<?php

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $builder_module
 * @return mixed
 */

function wptd_acf_get_module_global( $module ) {
    return include( get_template_directory() . "/inc/acf/fields/builder/modules-global/{$module}.php" );
}

// builder detail modules
function wptd_acf_get_module_detail( $module ) {
    return include( get_template_directory() . "/inc/acf/fields/builder/modules-detail/{$module}.php" );
}
