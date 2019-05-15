<?php

/**
 * ***********************************************************************************************
 * Include functions for this theme from folder './inc/'.
 *
 * NOTE: Do not write any functions in this file - only file includes here.
 *********************************************************************************************** */

// Add all file paths to an array for inclusion
$includes = [];

/* Include ACF builder */
$includes[] = __DIR__ . '/inc/vendor/acf-builder-master/autoload.php';

/* Clean Up WordPress Defaults */
$includes[] = __DIR__ . '/inc/cleanup.php';

/* Add Theme Support */
$includes[] = __DIR__ . '/inc/theme-support.php';

/* Handle Everything Related To Images */
$includes[] = __DIR__ . '/inc/images.php';

/* Custom Template Tags */
$includes[] = __DIR__ . '/inc/template-tags.php';

/* ACF Builder Composition */
$includes = array_merge( $includes, glob( __DIR__ . '/inc/acf/setup/*.php' ) );

// TODO: Put Code in a Custom Plugin that is responsible for data structure and other non-theme-related stuff
/* Register Custom Post Types & Taxonomies */
$includes[] = __DIR__ . '/inc/taxonomies/taxonomies.php';
$includes[] = __DIR__ . '/inc/post-types/post-types.php';

/* Include Boilerplate Settings */
$includes[] = __DIR__ . '/inc/enqueue-scripts.php';
$includes[] = __DIR__ . '/inc/timber.php';
$includes[] = __DIR__ . '/inc/menus.php';
$includes[] = __DIR__ . '/inc/options-page.php';
$includes[] = __DIR__ . '/inc/tinymce.php';

/* User Roles */
$includes[] = __DIR__ . '/inc/user-roles/ur_manage-roles.php';
$includes[] = __DIR__ . '/inc/user-roles/ur_capabilities.php';

/* White Label */
$includes = array_merge( $includes, glob( __DIR__ . '/inc/white-label/*.php' ) );

/* Require all the files */
foreach ( $includes as $f ) {
    require_once $f;
}
