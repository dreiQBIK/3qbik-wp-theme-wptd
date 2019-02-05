<?php

/**
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */


$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$template_modules = array();
foreach (glob(get_template_directory() . '/templates/partials/modules/*.twig') as $file) {
   $filename = str_replace(get_template_directory(). "/templates",  "", $file);
   $template_modules[] = $filename;
}
$context['template_modules'] = $template_modules;

Timber::render('styleguide/page-modules.twig', $context);

