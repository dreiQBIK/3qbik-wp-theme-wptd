<?php

/**
 * ***********************************************************************************************
 * Include functions for this theme from folder './inc/'.
 *
 * NOTE: Do not write any functions in this file - only file includes here.
 *********************************************************************************************** */


/* Include ACF builder */
require_once(realpath(__DIR__) . '/inc/vendor/acf-builder-master/autoload.php');

/* WordPress Basic Setup */
require_once get_template_directory() . '/inc/basic/b_setup.php';
require_once get_template_directory() . '/inc/basic/b_extras.php';
require_once get_template_directory() . '/inc/basic/b_template-tags.php';


/* Include Boilerplate Settings */
require_once get_template_directory() . '/inc/wptd_enqueue-scripts.php';
require_once get_template_directory() . '/inc/wptd_timber.php';
require_once get_template_directory() . '/inc/wptd_setup.php';
require_once get_template_directory() . '/inc/wptd_tinymce.php';
require_once get_template_directory() . '/inc/wptd_whitelabel.php';

/* ACF Components */
require_once get_template_directory() . '/inc/acf/acf_example.php';
require_once get_template_directory() . '/inc/acf/acf_page-builder.php';
