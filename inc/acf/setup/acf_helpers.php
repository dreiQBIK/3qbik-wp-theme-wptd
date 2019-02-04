<?php

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $builder_module
 * @return mixed
 */
function get_modules($module)
{
    return include(get_template_directory() . "/inc/acf/fields/builder/modules/{$module}.php");
}
