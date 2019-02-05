<?php

/**
 * The template for displaying a styleguide - ONLY FOR DEVELOPMENT/OVERVIEW.
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */


$context = Timber::get_context();
$templates = 'styleguide/page-styleguide.twig';

$post = new TimberPost();
$context['post'] = $post;

$styleguide_partials = array();
foreach (glob(get_template_directory() . '/templates/styleguide/partials/*.twig') as $file) {
   $filename = str_replace(get_template_directory() . "/templates", "", $file);
   $styleguide_partials[] = $filename;
}
$context['styleguide_partials'] = $styleguide_partials;

Timber::render($templates, $context);

