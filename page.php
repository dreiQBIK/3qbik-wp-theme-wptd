<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$templates = array( 'views/page-' . $post->post_name . '.twig', 'views/page.twig' );

$post = new TimberPost();
$context['post'] = $post;

Timber::render( $templates, $context );
