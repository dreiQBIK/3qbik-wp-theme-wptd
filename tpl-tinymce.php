<?php
/**
 * Template Name: Tinymce
 * Template Post Type: post, page
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
Timber::render( 'views/tpl-tinymce.twig', $context );
